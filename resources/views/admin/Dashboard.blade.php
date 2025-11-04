@extends('layouts.admin-main')

@section('page-admin')

<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
<!-- Custom styles for this template-->
<link href="../admin.css/sb-admin-2.min.css" rel="stylesheet">

<link href="../admin.css/external.css/Dashboard.css" rel="stylesheet">

<!--
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
-->
<div class="container mt-4" style="max-width: 1200px;">
    {{-- 🔽 FILTER TAHUN UNTUK LINE CHART --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="font-weight-bold text-dark">Dashboard Statistik</h4>
        <form method="GET" action="{{ route('admin.dashboard') }}" class="form-inline">
            <label for="year" class="mr-2">Pilih Tahun:</label>
            <select name="year" id="year" class="form-control form-control-sm" onchange="this.form.submit()">
                @foreach ($availableYears as $year)
                    <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    {{-- 🟦 LINE CHART (Per Bulan) --}}
    <div class="card shadow mb-5" style="border-radius: 16px; overflow: hidden;">
        <div class="card-header text-white" style="background: linear-gradient(90deg, #4e73df, #1cc88a);">
            <h6 class="m-0 font-weight-bold">Monthly Rentals ({{ $selectedYear }})</h6>
        </div>
        <div class="card-body" style="height: 380px;">
            <canvas id="lineChart"></canvas>
        </div>
    </div>

    {{-- 🟨 BAR CHART (Per Tahun) --}}
    <div class="card shadow mb-5" style="border-radius: 16px; overflow: hidden;">
        <div class="card-header text-white" style="background: linear-gradient(90deg, #f6c23e, #f4b400);">
            <h6 class="m-0 font-weight-bold">Yearly Rentals Overview</h6>
        </div>
        <div class="card-body" style="height: 380px;">
            <canvas id="barChart"></canvas>
        </div>
    </div>

    {{-- 🟩 TOP 5 MOST RENTED MOTORS --}}
    <div class="card shadow mb-5" style="border-radius: 16px; overflow: hidden;">
        <div class="card-header text-white" style="background: linear-gradient(90deg, #36b9cc, #1cc88a);">
            <h6 class="m-0 font-weight-bold">Top 5 Most Rented Motors</h6>
        </div>
        <div class="card-body" style="height: 400px;">
            <canvas id="topMotorChart"></canvas>
        </div>
    </div>
</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const lineCtx = document.getElementById('lineChart').getContext('2d');
    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: 'Total Rentals',
                data: @json($monthlyChartData),
                borderColor: '#4e73df',
                backgroundColor: 'rgba(78,115,223,0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#4e73df'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'top' },
            },
            scales: {
                y: { beginAtZero: true, ticks: { precision: 0 } }
            }
        }
    });

    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: @json(array_keys($yearlyData)),
            datasets: [{
                label: 'Total Rentals per Year',
                data: @json(array_values($yearlyData)),
                backgroundColor: 'rgba(246, 194, 62, 0.6)',
                borderColor: 'rgba(246, 194, 62, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'top' },
            },
            scales: {
                y: { beginAtZero: true, ticks: { precision: 0 } }
            }
        }
    });

    const topMotorCtx = document.getElementById('topMotorChart').getContext('2d');
    new Chart(topMotorCtx, {
        type: 'bar',
        data: {
            labels: @json($topMotors->pluck('motor.name')), // pastikan field motor adalah "name"
            datasets: [{
                label: 'Total Rentals',
                data: @json($topMotors->pluck('total')),
                backgroundColor: [
                    '#36b9cc',
                    '#1cc88a',
                    '#4e73df',
                    '#f6c23e',
                    '#e74a3b'
                ],
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y', // menjadikannya horizontal bar chart
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: (context) => `${context.parsed.x} kali disewa`
                    }
                }
            },
            scales: {
                x: { beginAtZero: true, ticks: { precision: 0 } },
                y: { ticks: { color: '#333' } }
            }
        }
    });

</script>

@endsection
