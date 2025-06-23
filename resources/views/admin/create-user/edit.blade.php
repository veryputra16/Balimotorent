@extends('layouts.admin-main')

@section('page-admin')

<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<!-- Custom styles for this template-->
<link href="../../../../admin.css/sb-admin-2.min.css" rel="stylesheet">
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

<div class="container-fluid"> 

<!-- Page Heading -->

    {{-- @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInRightBig" role="alert">
            <strong>{{ session('status')}}</strong> check on the <a href="/admin/user"> vehicles data page</a>           
        </div>
    @endif --}}

<div class="card shadow mb-4">
    <a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse" 
    role="button" data-expands="true">
    <h6 class="m-0 font-weight-bold primary-text"> Edit User </h6>
    </a>


    <div class="collapse show" id="collapseCard">
        <div class="card-body ">
            
            <form class="row g-3 pt-2" method="POST" action="/admin/user/{{ $user->username }}">
                @method('put')
                @csrf
                <div class="col-md-6 pt-2">
                    <label for="inputAddress" class="form-label">Name</label>
                    <input value="{{ $user->name }}" type="text" class="form-control" id="inputAddress" placeholder="Name Of User..." name="name">
                </div>

                <div class="col-md-6 pt-2">
                    <label for="inputAddress2" class="form-label">Username</label>
                    <input value="{{ old('username', $user->username) }}" type="text" class="form-control @error('username') is-invalid @enderror" id="inputAddress2" placeholder="Username Of User..." name="username">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4 pt-2">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input value="{{ $user->email }}" type="text" class="form-control" id="inputEmail4" name="email">
                </div>

                <div class="col-md-4 pt-2">
                    <label for="inputEmail4" class="form-label">Tanggal Lahir</label>
                    <input value="{{ $user->tgl_lahir }}" type="date" class="form-control" id="inputEmail4" name="tgl_lahir"> 
                </div>

                <div class="col-md-4 pt-2">
                    <label for="inputPassword4" class="form-label">Jenis Kelamin</label>
                    <select  value="{{ $user->j_kelamin }}" class="custom-select mr-sm-2 " id="text3" name="j_kelamin">
                        {{-- <option hidden></option> --}}
                        <option >Laki-Laki</option>
                        <option >Perempuan</option>
                    </select>
                </div>

                <div class="col-md-4 pt-2">
                    <label for="inputCity" class="form-label">Telp</label>
                    <input value="{{ $user->telpon }}" type="text" class="form-control" id="inputCity" name="telpon">
                </div>

                <div class="col-12 pt-3">
                    <button type="submit" class="btn btn-primary">Submit Editing</button>
                </div>
            </form>

        </div>
    </div>
</div>
</div>

 <!-- Bootstrap core JavaScript-->
 <script src="../../../../js/jquery/jquery.min.js"></script>
 <script src="../../../../js/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="../../../../js/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../../../js/sb-admin-2.min.js"></script>

@endsection

