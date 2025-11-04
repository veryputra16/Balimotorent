<?php

namespace App\Http\Controllers\Admin\viewMotor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Loan;
use Dompdf\Dompdf;
use Dompdf\Options;

class RentedMotorcycle extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $deliveryDate = $request->input('delivery_date');
        $returnDate = $request->input('return_date');

        $loans = Loan::with(['user', 'motor'])
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->whereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%")
                                ->orWhere('telpon', 'like', "%{$search}%");
                    })->orWhereHas('motor', function ($motorQuery) use ($search) {
                        $motorQuery->where('name', 'like', "%{$search}%");
                    });
                });
            })
            ->when($deliveryDate, function ($query, $deliveryDate) {
                $query->whereDate('delivery_date', '>=', $deliveryDate);
            })
            ->when($returnDate, function ($query, $returnDate) {
                $query->whereDate('return_date', '<=', $returnDate);
            })
            ->paginate(12)
            ->appends(request()->query()); // supaya pagination tetap membawa filter

        return view('admin.create-motor.rented', [
            'title' => 'rented-motorcycle',
            'loan' => $loans,
        ]);
    }

    public function destroy(Loan $loan)
    {
        if ($loan->image) {
            Storage::delete($loan->image);
        }
        Loan::destroy($loan->id);
        return redirect('/admin/motors/rented')->with('delete', 'Delete data success!');
    }
        
        
    
    public function generatePDF(Request $request)
    {
        // Tangkap filter dari request
        $search = $request->input('search');
        $deliveryDate = $request->input('delivery_date');
        $returnDate = $request->input('return_date');

        // Gunakan logika filter yang sama seperti di index()
        $loans = Loan::with(['user', 'motor'])
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->whereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%")
                                ->orWhere('telpon', 'like', "%{$search}%");
                    })->orWhereHas('motor', function ($motorQuery) use ($search) {
                        $motorQuery->where('name', 'like', "%{$search}%");
                    });
                });
            })
            ->when($deliveryDate, function ($query, $deliveryDate) {
                $query->whereDate('delivery_date', '>=', $deliveryDate);
            })
            ->when($returnDate, function ($query, $returnDate) {
                $query->whereDate('return_date', '<=', $returnDate);
            })
            ->get(); // get semua hasil filter (tanpa paginate)

        // Siapkan data untuk PDF
        $data = [
            'title' => 'Laporan Peminjaman Motor',
            'date' => date('d-m-Y'),
            'loans' => $loans
        ];

        $html = view('admin.create-motor.pdf', $data)->render();

        // Konfigurasi DOMPDF
        $options = new Options();
        $options->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return response($dompdf->output(), 200)->header('Content-Type', 'application/pdf');
    }
}
use PDF;

// public function generatePDF()
// {
//     $loans = Loan::all(); // Ambil data bookingan

//     $pdf = PDF::loadView('admin.rented-pdf', compact('loans'));

//     return $pdf->download('laporan_booking.pdf'); // Download PDF
// }


