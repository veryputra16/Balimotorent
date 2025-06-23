<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HowToRentController extends Controller
{
    public function index()
    {
        return view('how-to-rent', [
            'title' => 'how-to-rent'
        ]);
    }
}
