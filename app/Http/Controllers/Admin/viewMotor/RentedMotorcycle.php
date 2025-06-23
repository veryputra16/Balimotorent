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
    public function index()
    {
        return view('admin.create-motor.rented', [
            'title' => 'rented-motorcycle',
            'loan' => Loan::paginate(12),
            // 'loan' => Loan::latest()->filter(request(['search']))->paginate(12)
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
        
        
    
    public function generatePDF()
    {
        $loans = Loan::all();// Ambil data yang sedang disewa

        $data = [
            'title' => 'Laporan Peminjaman Motor',
            'date' => date('d-m-Y'),
            'loans' => $loans
        ];

        // Render Blade View jadi HTML
        $html = view('admin.create-motor.pdf', $data)->render();

        // Konfigurasi DOMPDF
        $options = new Options();
        $options->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output PDF ke browser
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


