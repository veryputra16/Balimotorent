<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutProfileController extends Controller
{
    //
    public function index()
    {
        return view('about_pp', [
            'title' => 'Profile'
        ]);
    }

    public function rama_profile()
    {
        return view('about_pp', [
            'title' => 'Profile/rama',

            // personal data
            'img' => 'img/profile/RamaPutra.jpg',
            'nama' => 'Setiawan Rama Putra',
            'alamat' => 'Jl.Raya Kerobokan, Br.Muding Tengah, No.42',
            'negara' => 'Indonesia',
            'whatsapp' => '+62 814-730-9044',
            'email' => 'exchangerama@gmail.com',
            'instagram' => '@rmaputraa',
            'birthday' => 'December 22, 2003',
            'gender' => 'Male',

            // education
            'sdn' => 'SDN 2 Kerobokan Kaja',
            'smpn' => 'SPMN 2 Kuta',
            'smkn' => 'SMKN 1 Denpasar',
            'universitas' => 'Institut Teknologi Bandung(ITB)',

            // skills
            'html' => 'HTML',
            'css' => 'CSS',
            'php' => 'PHP',
            'js' => 'JavaScript',
            'angular' => 'Angular',
            'ui' => 'UI',

            // other
            'status' => 'Programmer'
        ]);
    }

    public function wintara_profile()
    {
        return view('about_pp', [
            'title' => 'Profile/wintara',

            //personal
            'img' => 'img/profile/WintaraPutra.png',
            'nama' => 'Gusti Putu Wintara Putra',
            'alamat' => 'Desa Mambal, Badung',
            'negara' => 'Indonesia',
            'whatsapp' => '+62 814-730-9044',
            'email' => 'wintaraputra@gmail.com',
            'instagram' => '@g_wintara_p',
            'birthday' => 'Januari 21, 2004',
            'gender' => 'Male',

            // education
            'sdn' => 'SDN 4 Mambal',
            'smpn' => 'SPMN 1 Mambal',
            'smkn' => 'SMKN 1 Denpasar',
            'universitas' => 'Institut Teknologi Bandung(ITB)',

            // skills
            'html' => 'HTML',
            'css' => 'CSS',
            'php' => 'PHP',
            'js' => 'JavaScript',
            'angular' => 'Angular',
            'ui' => 'UI',

            // other
            'status' => 'Programmer'
        ]);
    }

    public function very_profile()
    {
        return view('about_pp', [
            'title' => 'Profile/very',

            //personal
            'img' => 'img/profile/VeryPutra.jpg',
            'nama' => 'I Putu Very Putra Pratama',
            'alamat' => 'Jl.Raya Kerobokan, Br.Gede',
            'negara' => 'Indonesia',
            'whatsapp' => '+62 8595 3929 150',
            'email' => 'veryputra28@gmail.com',
            'instagram' => '@veryputra_21',
            'birthday' => 'April 08, 2004',
            'gender' => 'Male',

            // education
            'sdn' => 'SD 3 Kerobokan',
            'smpn' => 'SMP Negeri 1 Kuta Utara',
            'smkn' => 'SMKN 1 Denpasar',
            'universitas' => 'Institut Teknologi Bandung(ITB)',

            // skills
            'html' => 'HTML',
            'css' => 'CSS',
            'php' => 'PHP',
            'js' => 'JavaScript',
            'angular' => 'Angular',
            'ui' => 'UI',

            // other
            'status' => 'Programmer'
        ]);
    }

    public function angga_profile()
    {
        return view('about_pp', [
            'title' => 'Profile/angga',

            //personal
            'img' => 'img/profile/AnggaRaditya.jpg',
            'nama' => 'Kadek Angga Raditya Dwiputra',
            'alamat' => 'JL.P.YONI NO.75 ABC, KEL. PEMOGAN, KEC. DENPASAR SELATAN',
            'negara' => 'Indonesia',
            'whatsapp' => '+62 819-0717-1108',
            'email' => 'anggaraditya@gmail.com',
            'instagram' => '@anggardtya_',
            'birthday' => 'DENPASAR, 28 MARET 2004',
            'gender' => 'Male',

            // education
            'sdn' => 'SDN 11 Denpasar',
            'smpn' => 'SMP DHARMA WIWEKA',
            'smkn' => 'SMKN 1 Denpasar',
            'universitas' => 'Institut Teknologi Bandung(ITB)',

            // skills
            'html' => 'HTML',
            'css' => 'CSS',
            'php' => 'PHP',
            'js' => 'JavaScript',
            'angular' => 'Angular',
            'ui' => 'UI',

            // other
            'status' => 'Programmer'
        ]);
    }

    public function tirta_profile()
    {
        return view('about_pp', [
            'title' => 'Profile/tirta',

            //personal
            'img' => 'img/profile/BagusTirta.jpg',
            'nama' => 'PUTU BAGUS TIRTA MERTA SEDANA',
            'alamat' => 'JL. RAYA KAPAL NO.17, KEL. KAPAL, KEC. MENGWI, KAB. BADUNG',
            'negara' => 'Indonesia',
            'whatsapp' => '+62 819-1384-2931',
            'email' => 'bagustirta68@gmail.com',
            'instagram' => '@bagustirta_',
            'birthday' => 'DENPASAR, 04 OKTOBER 2004',
            'gender' => 'Male',

            // education
            'sdn' => 'SDN 4 Kapal',
            'smpn' => 'SMP NEGERI 2 KUTA UTARA',
            'smkn' => 'SMKN 1 Denpasar',
            'universitas' => 'Institut Teknologi Bandung(ITB)',

            // skills
            'html' => 'HTML',
            'css' => 'CSS',
            'php' => 'PHP',
            'js' => 'JavaScript',
            'angular' => 'Angular',
            'ui' => 'UI',

            // other
            'status' => 'Programmer'
        ]);
    }
}
