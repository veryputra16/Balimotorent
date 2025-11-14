<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use Midtrans\Config;
use Midtrans\Notification;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');
    }

    /**
     * ✅ Handle Notifikasi dari Midtrans
     */
    public function handleNotification(Request $request)
    {
        $notification = new Notification();

        $transaction = $notification->transaction_status;
        $type = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraud = $notification->fraud_status ?? null;

        $loan = Loan::where('id', $orderId)->first();

        if (!$loan) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Update status berdasarkan transaction_status
        switch ($transaction) {
            case 'capture':
                if ($type == 'credit_card') {
                    $loan->status = ($fraud == 'challenge') ? 'pending' : 'paid';
                }
                break;

            case 'settlement':
                $loan->status = 'paid';
                break;

            case 'pending':
                $loan->status = 'pending';
                break;

            case 'deny':
                $loan->status = 'failed';
                break;

            case 'expire':
                $loan->status = 'expired';
                break;

            case 'cancel':
                $loan->status = 'cancelled';
                break;
        }

        $loan->save();

        return response()->json(['message' => 'Notification processed', 'status' => $loan->status]);
    }

    /**
     * ✅ Redirect Success
     */
    public function paymentSuccess($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->update(['status' => 'paid']);
        // return redirect()->route('rent.index')->with('success', 'Payment Successful!');
        return redirect()
            ->route('rent.detail', ['motor' => $loan->motor->name ?? $loan->motor_id])
            ->with('success', 'Booking Successfully! Thank you for your payment. Please check your booking details.');
    }

    /**
     * ⚠️ Redirect Pending
     */
    public function paymentPending($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->update(['status' => 'pending']);
        return redirect()
        // ->route('rent.index')
        ->route('rent.detail', ['motor' => $loan->motor->name])
        ->with('info', 'Payment is Pending! Please complete your payment.');
    }

    /**
     * ❌ Redirect Failed
     */
    public function paymentFailed($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->update(['status' => 'failed']);

         // 🔁 Kembalikan stok motor
        $motor = $loan->motor;
        $motor->increment('stok');

        return redirect()
        // ->route('rent.index')
        ->route('rent.detail', ['motor' => $loan->motor->name])
        ->with('failed', 'Payment Failed!'); //restored stok
    }
}
