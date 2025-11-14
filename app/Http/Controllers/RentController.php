<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Loan;
use App\Models\User;
use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Midtrans\Config;
use Midtrans\Snap;

/**
 * Class RentController
 * 
 * Controller untuk menangani penyewaan motor, termasuk menampilkan daftar motor,
 * melihat detail motor, dan melakukan pemesanan (booking).
 */
class RentController extends Controller
{
    // /**
    //  * Menampilkan halaman utama penyewaan motor dengan daftar motor yang tersedia.
    //  *
    //  * @return \Illuminate\View\View Halaman rent.blade.php dengan data motor.
    //  */
    public function index()
    {
        return view('rent', [
            'title' => 'RentScooter',

            'klx' => Motor::where('id', 7)->get(),
            'nmax' => Motor::where('id', 8)->get(),
            'vespa' => Motor::where('id', 10)->get(),
            'vixion' => Motor::where('id', 9)->get(),

            // 🔥 Ambil langsung motor dengan peminjaman terbanyak
            'topPick' => Motor::withCount('loans')
                ->orderBy('loans_count', 'desc')
                ->take(4)
                ->get(),

            'dataManually' => Motor::where("transmition", "Manual")->get(),
            'dataAutometic' => Motor::where("transmition", "Autometic")->get()
        ]);
    }


    //   /**
    //  * Menampilkan detail motor berdasarkan ID.
    //  *
    //  * @param Motor $motor Model motor yang dipilih.
    //  * @return \Illuminate\View\View Halaman booking.blade.php dengan detail motor.
    //  */
    public function detail(Motor $motor){
        return view('booking', [
            "title" => $motor->name,
            "data" => $motor,
            "date" => Carbon::tomorrow()->setTimezone('Asia/Ujung_Pandang')->format('Y-m-d'),
            "timeNow" => Carbon::now()->setTimezone('Asia/Ujung_Pandang')->toTimeString(),
            "timeTomorrow" => Carbon::now()->setTimezone('Asia/Ujung_Pandang')->addDay()->toTimeString(),
        ]);
    }

    // /**
    //  * Memproses pemesanan motor (booking).
    //  *
    //  * @param Request $request Data dari form booking.
    //  * @return \Illuminate\Http\RedirectResponse Redirect ke halaman sebelumnya dengan pesan sukses/gagal.
    //  */
    // public function booking(Request $request)
    // {
    //     $rules = [
    //         'delivery_date' => 'required',
    //         'return_date' => 'required',
    //         'delivery_bike' => 'required',
    //         'return_bike' => 'required',
    //         'payment_method' => 'required|string|max:25', // ✅ tambahkan validasi ini
    //     ];
        
    //     $result2 = User::where('id', auth()->user()->id)->get();
    //     foreach($result2 as $r2){
    //         $result_name = $r2->name;
    //         $result_telpon = $r2->telpon;
    //     }

    //     if($result_name == "" && $result_telpon == ""){
    //         $rules['name'] = 'required';
    //         $rules['telpon'] = 'required';
    //     }

    //     $request->validate($rules);

    //     if($result_name == "" && $result_telpon == ""){
    //         User::where('id', auth()->user()->id)->update(['name' => $request->name, 'telpon' => $request->telpon]);
    //     }

    //     $result = Motor::where('id', $request->motor_id)->get();
    //     foreach($result as $r){
    //         $stok = $r->stok - 1;
    //     }

    //     if($stok >= 0){
    //         Motor::where('id', $request->motor_id)->update(['stok' => $stok]);
    //     } else {
    //         return back()->with('failed', 'Stock Motor is Unavailable');
    //     }

    //     // ✅ handle upload bukti transfer (hanya jika ada)
    //     $bukti_tr = null;
    //     if ($request->hasFile('bukti_tr')) {
    //         $bukti_tr = $request->file('bukti_tr')->store('tf-images');
    //     }

    //     // ✅ simpan data booking ke tabel loans
    //     Loan::create([
    //         'user_id' => auth()->user()->id,
    //         'motor_id' => $request->motor_id,
    //         'delivery_date' => $request->delivery_date,
    //         'return_date' => $request->return_date,
    //         'delivery_time' => $request->delivery_time,
    //         'return_time' => $request->return_time,
    //         'delivery_bike' => $request->delivery_bike,
    //         'return_bike' => $request->delivery_bike, // lokasi kembali = lokasi kirim
    //         'total_price' => $request->total_price,
    //         'bukti_tr' => $bukti_tr,
    //         'payment_method' => $request->payment_method,
    //     ]);

    //     return back()->with('success', "Booking Successfully!!! Check Detail Booking In Your Dashboard");
    // }

    public function booking(Request $request)
    {
        // Validasi form
        $rules = [
            'delivery_date' => 'required',
            'return_date' => 'required',
            'delivery_bike' => 'required',
            'return_bike' => 'required',
            'payment_method' => 'required|string|max:25',
        ];

        $user = auth()->user();
        if ($user->name == "" && $user->telpon == "") {
            $rules['name'] = 'required';
            $rules['telpon'] = 'required';
        }

        $request->validate($rules);

        // Update user info jika kosong
        $user = User::where('id', auth()->user()->id)->first(); // first() bukan get()

        if ($user->name == "" && $user->telpon == "") {
            $user->update([
                'name' => $request->name,
                'telpon' => $request->telpon
            ]);
        }

        $motor = Motor::findOrFail($request->motor_id);
        if ($motor->stok <= 0) {
            return back()->with('failed', 'Stock Motor is Unavailable');
        }

        // Kurangi stok motor
        $motor->decrement('stok');

        // Upload bukti transfer jika ada
        $bukti_tr = null;
        if ($request->hasFile('bukti_tr')) {
            $bukti_tr = $request->file('bukti_tr')->store('tf-images');
        }

        // Jika pembayaran manual/transfer/cash → langsung simpan di database
        if ($request->payment_method === 'Manual Transfer' || $request->payment_method === 'Pay on Location (Cash)') {
            Loan::create([
                'user_id' => $user->id,
                'motor_id' => $request->motor_id,
                'delivery_date' => $request->delivery_date,
                'return_date' => $request->return_date,
                'delivery_time' => $request->delivery_time,
                'return_time' => $request->return_time,
                'delivery_bike' => $request->delivery_bike,
                'return_bike' => $request->delivery_bike,
                'total_price' => $request->total_price,
                'bukti_tr' => $bukti_tr,
                'payment_method' => $request->payment_method,
            ]);

            return back()->with('success', "Booking Successfully!!! Check Detail Booking In Your Dashboard");
        }

        //Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // 1. Buat dulu loan tanpa status paid
        $loan = Loan::create([
            'user_id' => $user->id,
            'motor_id' => $request->motor_id,
            'delivery_date' => $request->delivery_date,
            'return_date' => $request->return_date,
            'delivery_time' => $request->delivery_time,
            'return_time' => $request->return_time,
            'delivery_bike' => $request->delivery_bike,
            'return_bike' => $request->delivery_bike,
            'total_price' => $request->total_price,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        // 2. Generate ORDER ID
        $formattedId = str_pad($loan->id, 5, '0', STR_PAD_LEFT);
        $datePart = now()->format('Ymd');
        $loan->order_id = "ORD-{$datePart}-{$formattedId}";
        $loan->save();

        // 3. Kirim ke Midtrans
        $transaction_details = [
            'order_id' => $loan->order_id,
            'gross_amount' => $request->total_price,
        ];

        $customer_details = [
            'first_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->telpon,
        ];

        $params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'enabled_payments' => [
                'credit_card','gopay','shopeepay','qris',
                'bca_klikpay','bca_klikbca','bri_epay',
                'echannel','akulaku'
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return view('midtrans-payment', compact('snapToken', 'loan'));
        } catch (\Exception $e) {
            return back()->with('failed', 'Payment failed: ' . $e->getMessage());
        }
    }

    public function paymentSuccess($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->update(['status' => 'paid']);

        return redirect()
            ->route('rent.detail', ['motor' => $loan->motor_id])
            ->with('success', 'Booking Successfully! Thank you for your payment. Please check your booking details.');
    }

    public function paymentPending($id) {
        $loan = Loan::findOrFail($id);
        $loan->update(['status' => 'pending']);
        return redirect('/dashboard')->with('info', 'Payment is Pending!');
    }

    public function paymentFailed($id) {
        $loan = Loan::findOrFail($id);
        $loan->update(['status' => 'failed']);
        return redirect('/dashboard')->with('failed', 'Payment Failed!');
    }

    public function showPaymentPage($id)
    {
        $loan = \App\Models\Loan::findOrFail($id);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        // Buat parameter transaksi
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $loan->id,
                'gross_amount' => $loan->total_price,
            ],
            'customer_details' => [
                'first_name' => $loan->user->name ?? 'Customer',
                'email' => $loan->user->email ?? 'customer@example.com',
                'phone' => $loan->user->telpon ?? '08123456789',
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('midtrans-payment', compact('loan', 'snapToken'));
    }
}
