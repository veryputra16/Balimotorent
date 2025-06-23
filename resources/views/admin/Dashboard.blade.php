@extends('layouts.admin-main')

@section('page-admin')

<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
<!-- Custom styles for this template-->
<link href="../admin.css/sb-admin-2.min.css" rel="stylesheet">

<link href="../admin.css/external.css/Dashboard.css" rel="stylesheet">


<div class="banner1 d-flex">
    <div class="tab-content container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="title-content text-center animate__animated animate__fadeInDown">
                    <br>
                    <h5>Penyewaan Motor Terbaik!</h5>
                    <h1 class="fw-bold" >GALANG KAUH RENTAL</h1>
                    <h6>Ingin Meminjam Motor lebih Mudah?</h6>
                    <br>
                    <button class="rent ">COBA SEKARANG</button>
                </div>
            </div>
            <div class="col-lg-6 animate__animated animate__fadeInDown">
                <div class="mt-5 pt-4 banner-image">
                    <img class="img-fluid" src="{{ $image1 }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner2" style="padding-top: 100px">
    <div class="tabs-content">
        <div class="galka-deskp text-center animate__animated animate__slideInLeft">
            {{-- <div class="galka-sosmed container"> --}}
                <div class="row justify-content-center">
                    <div class="col-lg-2 d-flex justify-content-center">
                        <i class='bx bxl-instagram'></i>
                        <p>@Galka_rental</p>
                    </div>
                    <div class="col-lg-2 d-flex justify-content-center">
                        <i class='bx bxl-facebook' ></i>
                        <p>@GalangKauh</p>
                    </div>
                    <div class="col-lg-2 d-flex justify-content-center">
                        <i class='bx bxl-twitter' ></i>
                        <p>@Galka_MotorBike</p>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>

@endsection
