@extends('layouts.admin-main')

@section('page-admin')

<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
<!-- Custom styles for this template-->
<link href="../admin.css/sb-admin-2.min.css" rel="stylesheet">

<!-- Page Heading -->

@if(session('status'))
    <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInRightBig" role="alert">
        <strong>{{ session('status')}}</strong> check on the <a href="/admin/user"> User data page</a>           
    </div>
@endif

<div class="container-fluid">
<!-- Content Row -->
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data User</h1>
<!-- <h3 class="h3 mb-4 text-gray-800 "><span><?php  ?></span></h3> -->

    <div class="row">
        <div class="col-12">
            <form action="/admin/motor">
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search_user"
                        value="{{ request('search_user') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table  table-hover">
        <thead class="table bg-dark text-light">
        <tr style="text-align: center">
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Telphone</th>
            <th scope="col">Created at</th>
            <th scope="col">Update at</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody style="text-align: center" >
        @foreach ($user as $u)    
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->tgl_lahir }}</td>
                <td>{{ $u->j_kelamin }}</td>
                <td>{{ $u->telpon }}</td>
                <td>{{ $u->created_at }}</td>
                <td>{{ $u->updated_at }}</td>
                <td class="col-2">
                <a href="/admin/user/{{ $u->username }}/edit" class=" btn btn-primary"><i class='bx bxs-edit'></i></a>
                    <form action="/admin/user/{{$u->username}}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <input type="hidden" value="{{ $u->id }}" name="id">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure Wanna Delete This One ?')" >
                            <i class='bx bxs-trash'></i>
                        </button>
                    </form>
                </td>
                
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

@endsection

