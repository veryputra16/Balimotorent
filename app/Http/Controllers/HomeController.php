<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Loan;
use App\Models\Motor;
use App\Mail\LoanEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    
    // public function index(){

    // // Panggil Google Apps Script (doGet)
    // $url = "https://script.google.com/macros/s/AKfycbynXwaCIFag44P_hfJTzo8wNI_NiHApe7RBAYAxneINSr14HmWMe8VkwTmm4LEkIcnc/exec"; // ganti dengan URL deployment kamu
    // $response = Http::get($url);
    // $reviews = $response->successful() ? $response->json() : [];

    //     return view('welcome',[
    //         "title" => "Home",
    //         "image1" => "img/bike1.png",
    //         "image2" => "img/bike2.png",
    //         'vespaPrimavera' => 'img/matic-bike/PiaggioVespa125Primavera.png',
    //         'scoopy125' => 'img/matic-bike/HondaScoopy125.png',
    //         'vario125' => 'img/matic-bike/HondaVario125.png',
    //         // 'nmax' => 'img/matic-bike/PCX.png',

    //         "motor" => Loan::query()->selectRaw('count(motor_id) as total_motor_id, motor_id')->groupBy('motor_id')->orderBy('total_motor_id', 'desc')->take(4)->get(),
    //         'klx' => Motor::where('id', 9)->get(),
    //         'nmax' => Motor::where('id', 8)->get(),
    //         'vespaa' => Motor::where('id', 10)->get(),
    //         'vixion' => Motor::where('id', 7)->get(),

    //         'honda' => 'img/brand/honda.png',
    //         'vespa' => 'img/brand/vespa.png',
    //         'yamaha' => 'img/brand/yamaha.png',

    //         "customer1" => "",
    //         "reviews"   => $reviews, // ← ini tambahan

    //     ]);
    // }

    public function index()
    {
        // Ambil review dari Google Apps Script
        $url = "https://script.google.com/macros/s/AKfycbynXwaCIFag44P_hfJTzo8wNI_NiHApe7RBAYAxneINSr14HmWMe8VkwTmm4LEkIcnc/exec";
        $response = Http::get($url);
        $reviews = $response->successful() ? $response->json() : [];

        return view('welcome', [
            "title" => "Home",
            "image1" => "img/bike1.png",
            "image2" => "img/bike2.png",

            // semua motor untuk carousel
            "motors" => Motor::all(),

            // top 4 motor dengan peminjaman terbanyak
            "topMotors" => Motor::withCount('loans')
                ->orderBy('loans_count', 'desc')
                ->take(3)
                ->get(),

            // brand logo
            'honda' => 'img/brand/honda.png',
            'vespa' => 'img/brand/vespa.png',
            'yamaha' => 'img/brand/yamaha.png',

            "reviews" => $reviews,
        ]);
    }

}
