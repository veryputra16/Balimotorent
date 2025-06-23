@extends('layouts.main')

@section('body')

<link rel="stylesheet" href="../../css/user/profile.css">
<link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
<div class="container">
    <div class="wrapper">
        <h5 class="fw-bold animate__animated animate__fadeInLeft" style="color: #AAAAAA"><i class="fas fa-user"></i> {{ $user->username }}</h5>
        <div class="background">
            <form action="/user/{{ $user->username }}" method="POST" enctype="multipart/form-data" class=" d-flex justify-content-between animate_animated">
            @method('put')
            @csrf
            <input type="hidden" name="oldImage" value="{{ $user->image }}">
            <div class="row d-flex justify-content-between">
            <div class="col-lg-4">
                <div class="card" id="imageView" style="margin:auto; width: 18rem; padding:5px; color: #AAAAAA; border:none; box-shadow: 0 2px 5px">
                    <img src="{{ ($user->image == "") ? '../../img/user/UserProfile.png' : '../../storage/'.$user->image }}" class="card-img-top image-view" alt="..." height="250">
                    @error('image')
                        <span style="color: #f00; text-align:center;">{{ $message }}</span> 
                    @enderror
                    <div class="card-body">
                        <input type="file" id="inputImage" name="image" style="display: none" accept=".png, .jpeg, .jpg">
                        <label for="inputImage" class="label-image">
                            SELECT FOTO
                        </label>
                        <p class="mt-3" style="font-size: 13px">File Size: maksimum 10 MB(MegaByte). Ekstensi file allowed: .JPG .JPEG .PNG</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="main mt-5">
                    {{-- <form action="/user/{{ $user->username }}" method="POST"> --}}
                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" value="{{ old('name', $user->name) }}" name="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror " id="username" value="{{ old('username', $user->username) }}" name="username">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-4">
                                <label for="emaliaddress" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="emaliaddress" value="{{ old('email', $user->email) }}" name="email" disabled>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label for="tanggal lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tanggal lahir"  value="{{ old('tgl_lahir', $user->tgl_lahir) }}" name="tgl_lahir">
                                @error('tgl_lahir')
                                    <div class="invalid-feedback">
                                        The date of birth field is required
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select @error('j_kelamin') is-invalid @enderror" aria-label="Default select example" name="j_kelamin">
                                    <option {{ ($user->j_kelamin == "")?'selected' : '' }} value="">Pilih Jenis Kelamin</option>
                                    <option {{ ($user->j_kelamin == "Laki-Laki")?'selected' : '' }} value="Laki-Laki">Laki-Laki</option>
                                    <option {{ ($user->j_kelamin == "Perempuan")?'selected' : '' }} value="Perempuan">Perempuan</option>
                                </select>
                                @error('j_kelamin')
                                    <div class="invalid-feedback">
                                        The gender field is required
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                                <label for="telpon" class="form-label">Telepon</label>
                                <input type="text" class="form-control @error('telpon') is-invalid @enderror" id="telpon"  value="{{ old('telpon', $user->telpon) }}" name="telpon">
                                @error('telpon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password"  value="{{ $user->password }}" name="password">
                            </div> --}}
                            <a href="/user/{{ auth()->user()->username }}" class="btn btn-danger btn-sm me-2"><i class="fas fa-arrow-left"></i> BACK</a>
                            <button type="submit" class="btn btn-primary btn-sm">CHANGE DATA</button>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="../../js/user/edit.js"></script>

@endsection