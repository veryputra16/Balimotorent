<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ReviewController extends Controller
{
    public function index()
    {
        $url = "https://script.google.com/macros/s/AKfycbxxxxxxx/exec"; // URL doGet Apps Script

        $response = Http::get($url);
        $reviews = $response->successful() ? $response->json() : [];

        return view('welcome', compact('reviews')); // langsung kirim ke welcome.blade.php
    }
}


