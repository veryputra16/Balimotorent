@extends('layouts.admin-main')

@section('page-admin')

<!-- Font dan CSS -->
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link href="../admin.css/sb-admin-2.min.css" rel="stylesheet">

<div class="container-fluid"> 
    <h1 class="h3 mb-4 text-gray-800">Data Rented</h1>

    {{-- 🔍 FILTER DAN SEARCH --}}
    <div class="row mb-4">
        <div class="col-md-9">
            <form action="{{ url('/admin/motors/rented') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Search tenant or motorcycle..." name="search" value="{{ request('search') }}">
                </div>

                <div class="col-md-3">
                    <label for="delivery_date" class="mb-0">Delivery Date (From)</label>
                    <input type="date" class="form-control" name="delivery_date" id="delivery_date" value="{{ request('delivery_date') }}">
                </div>

                <div class="col-md-3">
                    <label for="return_date" class="mb-0">Return Date (To)</label>
                    <input type="date" class="form-control" name="return_date" id="return_date" value="{{ request('return_date') }}">
                </div>

                <div class="col-md-3">
                    <button class="btn btn-primary w-100" type="submit">Filter</button>
                </div>
            </form>
        </div>

        {{-- 🔁 Reset dan Export --}}
        <div class="col-md-3 text-right">
            <a href="{{ url('/admin/motors/rented') }}" class="btn btn-secondary mb-2">Reset</a>
            <a href="{{ route('admin.motors.rented.pdf', request()->query()) }}" class="btn btn-success mb-2">
                Export Data
            </a>
        </div>
    </div>

    {{-- 📋 TABLE DATA --}}
    <table class="table table-hover">
        <thead class="bg-dark text-light text-center">
            <tr>
                <th>No</th>
                <th>Tenant</th>
                <th>Number Phone</th>
                <th>Name Motorcycle</th>
                <th>Delivery Date</th>
                <th>Return Date</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @php $i = ($loan->currentPage() - 1) * $loan->perPage() + 1; @endphp
            @forelse ($loan as $l)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $l->user->name }}</td>
                    <td>{{ $l->user->telpon }}</td>
                    <td>{{ $l->motor->name }}</td>
                    <td>{{ $l->delivery_date }}</td>
                    <td>{{ $l->return_date }}</td>
                    <td>{{ number_format($l->total_price, 0, ',', '.') }}</td>
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

                {{-- MODAL VIEW DETAIL --}}
                <div class="modal fade" id="view{{ $l->id }}" tabindex="-1" aria-labelledby="viewLabel{{ $l->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="viewLabel{{ $l->id }}">Rental Detail - {{ $l->user->name }}</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                {{-- Rental Detail Section --}}
                                <h5 class="mb-3 font-weight-bold text-primary">Rental Detail</h5>
                                <div class="row mb-4">
                                    <div class="col-lg-5 text-center">
                                        @if ($l->bukti_tr)
                                            <img src="{{ asset('storage/' . $l->bukti_tr) }}" alt="Bukti Transfer" class="img-fluid rounded shadow-sm" style="max-height: 230px;">
                                        @else
                                            <p class="text-muted mt-5">No payment proof uploaded.</p>
                                        @endif
                                    </div>

                                    <div class="col-lg-7">
                                        <p><strong>Tenant Name:</strong> {{ $l->user->name ?? '-' }}</p>
                                        <p><strong>Username:</strong> {{ $l->user->username ?? '-' }}</p>
                                        <p><strong>Email:</strong> {{ $l->user->email ?? '-' }}</p>
                                        <p><strong>Phone:</strong> {{ $l->user->telpon ?? '-' }}</p>
                                        <p><strong>Gender:</strong> {{ $l->user->j_kelamin ?? '-' }}</p>

                                        <hr>

                                        <p><strong>Delivery Date:</strong> {{ $l->delivery_date }}</p>
                                        <p><strong>Delivery Time:</strong> {{ $l->delivery_time }}</p>
                                        <p><strong>Return Date:</strong> {{ $l->return_date }}</p>
                                        <p><strong>Return Time:</strong> {{ $l->return_time }}</p>

                                        <p><strong>Total Price:</strong> Rp {{ number_format($l->total_price, 0, ',', '.') }}</p>

                                        @php
                                            $returnDateTime = \Carbon\Carbon::parse($l->return_date . ' ' . $l->return_time);
                                            $hoursPassed = now()->diffInHours($returnDateTime, false);
                                            $status = $hoursPassed <= -12 ? 'completed' : 'rented';
                                        @endphp

                                        <p><strong>Status:</strong>
                                            @if ($status === 'completed')
                                                <span class="badge badge-success">Completed</span>
                                            @else
                                                <span class="badge badge-danger">Rented</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                {{-- Motorcycle Information Section --}}
                                <h5 class="mb-3 font-weight-bold text-primary">Motorcycle Information</h5>
                                <div class="row align-items-center">
                                    <div class="col-lg-4 text-center">
                                        <img src="{{ asset('storage/' . $l->motor->image) }}" alt="Motor Image" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                                    </div>
                                    <div class="col-lg-8">
                                        <p><strong>Motor Name:</strong> {{ $l->motor->name }}</p>
                                        <p><strong>Brand:</strong> {{ $l->motor->merk ?? '-' }}</p>
                                        <p><strong>Year:</strong> {{ $l->motor->year }}</p>
                                        <p><strong>Engine:</strong> {{ $l->motor->engine }} CC</p>
                                        <p><strong>Fuel:</strong> {{ $l->motor->fuel }} L</p>
                                        <p><strong>Transmition:</strong> {{ $l->motor->transmition }}</p>
                                        <p><strong>Price per Day:</strong> Rp {{ number_format($l->motor->price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">No rented data found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- PAGINATION --}}
    <div class="d-flex justify-content-center">
        {{ $loan->links() }}
    </div>
</div>

@endsection
