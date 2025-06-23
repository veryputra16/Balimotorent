<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function booking()
    {
        return view('booking', [
            'title' => 'booking-bike'
        ]);
    }
}

?>
