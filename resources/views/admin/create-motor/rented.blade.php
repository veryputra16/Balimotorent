@extends('layouts.admin-main')

@section('page-admin')

<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<!-- Custom styles for this template-->
<link href="../admin.css/sb-admin-2.min.css" rel="stylesheet">
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
<div class="container-fluid"> 
    <h1 class="h3 mb-4 text-gray-800">Data Rented</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="/admin/motor" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
        {{-- Untuk export pdf --}}
        <div class="col-md-3 text-right">
            <a href="/admin/motors/rented/pdf" class="btn btn-success">Export Data</a>
        </div>
    </div>

    <table class="table table-hover">
        <thead class="bg-dark text-light text-center">
            <tr>
                <th>No</th>
                <th>Tenant</th>
                <th>Number Phone</th>
                <th>Name Motorcycle</th>
                <th>Delivery Date</th>
                <th>Return Date</th>
                <th>Rent at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @php $i = 1; @endphp
            @foreach ($loan as $l)
                <tr>
                    <th>{{ $i++ }}</th>
                    <td>{{ $l->user->name }}</td>
                    <td>{{ $l->user->telpon }}</td>
                    <td>{{ $l->motor->name }}</td>
                    <td>{{ $l->delivery_date }}</td>
                    <td>{{ $l->return_date }}</td>
                    <td>{{ $l->created_at }}</td>
                    <td>
                        <form action="/admin/motors/rented/" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="hidden" value="{{ $l->id }}" name="id">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure Wanna Delete This One ?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#view{{ $l->id }}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $loan->links() }}
</div>

@endsection

{{-- <style>
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(0 , 0 , 0 , .8);
        z-index: 100;
        text-align: center;
        padding: 130px 0;
        width: 0;
        height: 0;
    }

    /* .overlay img {
        width: 30%;
        margin: auto 0;
    } */

    .overlay:target{
        bottom: 0;
        right: 0;
        width: auto;
        height: auto;
    } --}}
</style>
