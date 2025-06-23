@extends('layouts.main')

@section('body')
    <link rel="stylesheet" href="../css/about_pp.css">
    <title>{{ $title }}</title>

    <div class="tabs-content">
        <div class="container">
            <div class="row justify-content-center">
                {{-- card profile (div kiri) --}}
                <div class="col-lg-3 card-profile">
                    <div class="row justify-content-center">
                        <div class="head-card col-lg-8">
                            <div class="title">
                                <h6 style="color:#908E9B">Profile Details</h6>
                            </div>
                            <div class="img d-flex justify-content-center">
                                <img class="img-fluid" src="../storage/{{ $data->image }}" alt="">
                            </div>
                            <div class="card-skills mt-4">
                                <div class="title d-flex">
                                    <h6 style="color:#908E9B">Skills</h6>
                                    <div class="hr">
                                        <hr>
                                    </div>
                                </div>
                                <div class="skills">
                                    @foreach ($skill as $s)
                                        <p class="badge">{{ $s->skill }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-education mt-3">
                                <div class="title d-flex">
                                    <h6 style="color:#908E9B">Education</h6>
                                    <div class="hr">
                                        <hr>
                                    </div>
                                </div>
                                <div class="education">
                                    @foreach ($education as $e)
                                        <p>- {{ $e->education }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- statistik (div kanan) --}}
                <div class="col-lg-8 statistik-profile">
                    <div class="name-profile">
                        <span><strong>{{ $data->name }}</strong></span> <span><i style="color: #A5A2F6"
                                class='ps-3 fas fa-map-marker-alt'></i>From </span><span
                            style="color: #A5A2F6">{{ $data->country }}</span>
                        <p style="font-size: 14px;" class="mt-1">{{ $data->status }}</p>
                    </div>
                    <div class="about-me">
                        <span><i class='fas fa-user'></i> About Me</span>
                        <hr style="border: 0.1px solid;">

                        <div class="contact-information">
                            <h6 class="my-4 fw-bold">CONTACT INFORMATION</h6>
                            @foreach ($data->information as $i)
                                <p style="color:#908E9B;">Address <span class="ms-5"
                                        style="color:#A5A2F6;">{{ $i->address }}</span></p>
                                <p style="color:#908E9B;">WhatsApp <span
                                        style="color:#A5A2F6; padding-left:34px;">{{ $i->telpon }}</span>
                                </p>
                                <p style="color:#908E9B;">Email <span
                                        style="color:#A5A2F6; padding-left:63px;">{{ $i->email }}</span>
                                </p>
                                <p style="color:#908E9B;">Instagram <span style="padding-left:35px;"><a
                                            href="https://www.instagram.com/{{ $i->instagram }}/" style="color:#A5A2F6;">
                                            {{ $i->instagram }}</a></span></p>
                        </div>

                        <div class="basic-information">
                            <h6 class="my-4 fw-bold">BASIC INFORMATION</h6>
                            <p style="color:#908E9B;">Birthday <span class="ms-5"
                                    style="color:#A5A2F6;">{{ $i->birthday }}</span></p>
                            <p style="color:#908E9B;">Gender <span
                                    style="color:#A5A2F6; padding-left:52px;">{{ $i->gender }}</span></p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
