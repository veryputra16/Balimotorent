<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Skill;
use App\Models\Education;

class AboutController extends Controller
{
    
    public function index(){
        return view('about', [
            "title" => "About",
            "bg" => "img/aboutus-bg.jpg",
            "profile" => Admin::all(),
        ]);
    }

    public function profile(Admin $admin){
        return view('about_pp', [
            "title" => $admin->name,
            "skill" => Skill::where('admin_id', $admin->id)->get(),
            "education" => Education::where('admin_id', $admin->id)->get(),
            "data" => $admin
        ]);
    }

}
