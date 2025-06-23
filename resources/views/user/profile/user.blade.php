@extends('layouts.main')

@section('body')

<link rel="stylesheet" href="../css/user/profile.css">
<link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
<div class="container">
    <div class="wrapper">
        <h5 class="fw-bold animate__animated animate__fadeInLeft" style="color: #AAAAAA"><i class="fas fa-user"></i> {{ auth()->user()->username }}</h5>
        <div class="background animate_animated" style="background: #fff; border:1px solid #BECBD5">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-4">
                    <div class="card" style="margin:auto; width: 18rem; padding:5px; color: #AAAAAA; border:none; box-shadow: 0 2px 5px">
                        <img src="{{ ($user->image == "") ? '../../img/user/UserProfile.png' : '../../storage/'.$user->image }}" class="card-img-top" alt="..." height="250">
                        <div class="card-body">
                            <form action="/user/{{ $user->username }}" method="POST">
                                @method('delete')
                                @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel" style="color: #000">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                        <div class="modal-body" style="color: #000">
                                            Are You Sure Wanna Delete This Image?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn button-edit-close" data-bs-dismiss="modal"><b><i class='bx bx-window-close'></i> CLOSE</b></button>
                                            <button type="submit" class="btn button-edit-delete"><b><i class='bx bx-trash'></i> DELETE</b></button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <input type="hidden" name="imageOld" value="{{ $user->image }}">
                                @if ($user->image)
                                    <button type="button" class="btn d-block m-auto button-edit" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 100%; border-radius: 20px;"><b>DELETE FOTO</b></button>
                                @endif
                            </form>
                            <p class="mt-3" style="font-size: 13px">File Size: maksimum 10 MB(MegaByte). Ekstensi file Allowed: .JPG .JPEG .PNG</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main">
                        <ul>
                            <h6 class="mt-5 fw-bold">Profile</h6>
                        </ul>
                        <div class="profile-main mt-4">
                            <ul class="d-flex">
                                <div class="one">
                                    <li>Name</li>
                                    <li>Birtdate</li>
                                    <li>Gender</li>
                                </div>
                                <div class="two ms-5">
                                    <li>{!! ($user->name == "")?'<span style="color: #A5A2F6">Tambah Nama</span>' : $user->name !!}</li>
                                    <li>{!! ($user->tgl_lahir == "")?'<span style="color: #A5A2F6">Tambah Tanggal Lahir</span>' : $user->tgl_lahir !!}</li>
                                    <li>{!! ($user->j_kelamin == "")?'<span style="color: #A5A2F6">Tambah Jenis Kelamin</span>' : $user->j_kelamin !!}</li>
                                </div>
                            </ul>
                        </div>
                        <ul>
                            <h6 class="fw-bold mt-5 mb-5">Change Contact</h6>
                        </ul>
                        <div class="profile-contact mt-4">
                            <ul class="d-flex">
                                <div class="one">
                                    <li>Email</li>
                                    <li>Telp</li>
                                </div>
                                <div class="two ms-5">
                                    <li>{{ $user->email }}</li>
                                    <li>{!! ($user->telpon == "")?'<span style="color: #A5A2F6">Tambah Telepon</span>' : $user->telpon !!}</li>
                                </div>
                            </ul>
                        </div>
                        <ul>
                            <a href="/home" class="btn btn-danger btn-sm me-2"><i class="fas fa-arrow-left"></i> BACK</a>
                            <a href="/user/{{ $user->username }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-user-edit"></i> EDIT DATA</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/5161569612.js" crossorigin="anonymous"></script>


@endsection