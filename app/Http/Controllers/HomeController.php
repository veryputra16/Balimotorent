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

class HomeController extends Controller
{
    
    public function index(){


        return view('welcome',[
            "title" => "Home",
            "image1" => "img/bike1.png",
            "image2" => "img/bike2.png",
            'vespaPrimavera' => 'img/matic-bike/PiaggioVespa125Primavera.png',
            'scoopy125' => 'img/matic-bike/HondaScoopy125.png',
            'vario125' => 'img/matic-bike/HondaVario125.png',
            // 'nmax' => 'img/matic-bike/PCX.png',

            "motor" => Loan::query()->selectRaw('count(motor_id) as total_motor_id, motor_id')->groupBy('motor_id')->orderBy('total_motor_id', 'desc')->take(4)->get(),
            'klx' => Motor::where('id', 9)->get(),
            'nmax' => Motor::where('id', 8)->get(),
            'vespaa' => Motor::where('id', 10)->get(),
            'vixion' => Motor::where('id', 7)->get(),

            'honda' => 'img/brand/honda.png',
            'vespa' => 'img/brand/vespa.png',
            'yamaha' => 'img/brand/yamaha.png',

            "customer1" => ""

        ]);
    }

}
