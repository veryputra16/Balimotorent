<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Hal_Admin(){
        return view ('admin.Dashboard',[
            'title' => 'Admin',
            "image1" => "/img/logo.png"
        ]);
    }
}
