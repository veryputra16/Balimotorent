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
            'topPick' => Loan::query()->selectRaw('count(motor_id) as total_motor_id, motor_id')->groupBy('motor_id')->orderBy('total_motor_id', 'desc')->take(4)->get(),
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
    public function booking(Request $request){

        $rules = [
            'delivery_date' => 'required',
            'return_date' => 'required',
            'delivery_bike' => 'required',
            'return_bike' => 'required'
        ];
        
        $result2 = User::where('id', auth()->user()->id)->get();
        foreach($result2 as $r2){
            $result_name = $r2->name;
            $result_telpon = $r2->telpon;
        }
        if($result_name == "" && $result_telpon == ""){
            $rules['name'] = 'required';
            $rules['telpon'] = 'required';
        }

        $request->validate($rules);
        
        if($result_name == "" && $result_telpon == ""){
            User::where('id', auth()->user()->id)->update(['name' => $request->name, 'telpon' => $request->telpon]);
        }


        $result = Motor::where('id', $request->motor_id)->get();
        foreach($result as $r){
            $stok = $r->stok-1;
        }
        if($stok >= 0){
            Motor::where('id', $request->motor_id)->update(['stok' => $stok]);
        }else {
            return back()->with('failed', 'Stock Motor is Unavailable');
        }
        
        // $image = null;

        if ($request->hasFile('bukti_tr')) {
            $bukti_tr = $request->file('bukti_tr')->store('tf-images');
        }
        Loan::create([
            'user_id' => auth()->user()->id,
            'motor_id' => $request->motor_id,
            'delivery_date' => $request->delivery_date,
            'return_date' => $request->return_date,
            'delivery_time' => $request->delivery_time,
            'return_time' => $request->return_time,
            'delivery_bike' => $request->delivery_bike,
            'return_bike' => $request->return_bike,
            'total_price' => $request->total_price,
            'bukti_tr' => $bukti_tr,
            // 'bukti_tr' => $request -> $bukti_tr->bukti_tr
        ]);

        // if ($request->file('image')) {
        //     if ($request->oldImage) {
        //         Storage::delete($request->oldImage);
        //     }
        //     $validateData['image'] = $request->file('image')->store('post-images');
        // }

        return back()->with('success', "Booking Successfully!!! Check Detail Booking In Your Dashboard");
    }
}
