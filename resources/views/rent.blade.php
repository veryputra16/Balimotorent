@extends('layouts.main')

@section('body')

<link rel="stylesheet" href="css/rent.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


<div class="container">
    <div class="tabs-content">
        <nav>
            <div class="title">
                <a class="navbar-brand mt-1" href="">OUR SCOOTER</a>
            </div>
            <div class="nav nav-tabs justify-content-end" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Customer Favorites</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Scooter Matic</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Scooter Manual</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="motorbike-content-cover d-flex justify-content-center animate__animated animate__fadeInUp animate__faster">
                    {{-- CUSTOMER FAVORITES --}}
                    <div class="row ">
                        {{-- content-produc-BARIS 1 --}}
                        @if (count($topPick) < 4)
                            @foreach ($klx as $k)   
                            <div class="col-lg-3 col-md-6 d-flex justify-content-center {{ ($k->stok == 0) ? 'coba':'' }}">
                                <div class="card">
                                    <div class="container">
                                        <img src="img/manual-bike/KLXHijau.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text fs-5"><strong>KLX</strong></p>
                                            <p class="card-text text-secondary" style="margin-top: -15px">2015 Year</p>
                                            <p class="card-text text-secondary">From Rp. 150.000,00 / Day</p>
                                            <a type="button" class="text-center {{ ($k->stok == 0) ? 'anchor-disabled':'' }}" href="/rent/{{ $k->name }}">RENT NOW</a>
                                        </div>
                                    </div>
                                    @if ($k->stok == 0)
                                        <div class="disabled">
                                            <h6 class="title-disabled">UNAVAIBLE</h6>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            @foreach ($nmax as $n)
                            <div class="col-lg-3 col-md-6 d-flex justify-content-center {{ ($n->stok == 0) ? 'coba':'' }}">
                                <div class="card">
                                    <div class="container">
                                        <img src="img/matic-bike/N-MAX.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text fs-5"><strong>N-MAX 2016</strong></p>
                                            <p class="card-text text-secondary" style="margin-top: -15px">2016 Year</p>
                                            <p class="card-text text-secondary">From Rp. 150.000,00 / Day</p>
                                            <a type="button" class="text-center {{ ($n->stok == 0) ? 'anchor-disabled':'' }}" href="/rent/{{ $n->name }}">RENT NOW</a>
                                        </div>
                                    </div>
                                    @if ($n->stok == 0)
                                        <div class="disabled">
                                            <h6 class="title-disabled">UNAVAIBLE</h6>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            @foreach ($vespa as $v)
                            <div class="col-lg-3 col-md-6 d-flex justify-content-center {{ ($v->stok == 0) ? 'coba':'' }}">
                                <div class="card">
                                    <div class="container">
                                        <img src="img/matic-bike/PiaggioVespa125Primavera.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text fs-5"><strong>Piaggio Vespa 125</strong></p>
                                            <p class="card-text text-secondary" style="margin-top: -15px">2019 year</p>
                                            <p class="card-text text-secondary">From Rp. 150.000,00 / Day</p>
                                            <a type="button" class="text-center {{ ($v->stok == 0) ? 'anchor-disabled':'' }}" href="/rent/{{ $v->name }}">RENT NOW</a>
                                        </div>
                                    </div>
                                    @if ($v->stok == 0)
                                        <div class="disabled">
                                            <h6 class="title-disabled">UNAVAIBLE</h6>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            @foreach ($vixion as $x)
                            <div class="col-lg-3 col-md-6 d-flex justify-content-center {{ ($x->stok == 0) ? 'coba':'' }}">
                                <div class="card">
                                    <div class="container">
                                        <img src="img/manual-bike/YamahaVixion.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text fs-5"><strong>Yamaha Vixion</strong></p>
                                            <p class="card-text text-secondary" style="margin-top: -15px">2015 year</p>
                                            <p class="card-text text-secondary">From Rp. 120.000,00 / Day</p>
                                            <a type="button" class="text-center {{ ($x->stok == 0) ? 'anchor-disabled':'' }}" href="/rent/{{ $x->name }}">RENT NOW</a>
                                        </div>
                                    </div>
                                    @if ($x->stok == 0)
                                        <div class="disabled">
                                            <h6 class="title-disabled">UNAVAIBLE</h6>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        @else
                            @foreach ($topPick as $pick)
                            <div class="col-lg-3 col-md-6 d-flex justify-content-center {{ ($pick->motor->stok == 0) ? 'coba':'' }}">
                                <div class="card">
                                    <div class="container">
                                        @if ($pick->motor->transmition == "Autometic")
                                            <img src="/storage/{{ $pick->motor->image }}" class="card-img-top" alt="...">             
                                        @else
                                            <img src="/storage/{{ $pick->motor->image }}" class="card-img-top" alt="...">
                                        @endif
                                        <div class="card-body">
                                            <p class="card-text fs-5"><strong>{{ $pick->motor->name }}</strong></p>
                                            <p class="card-text text-secondary" style="margin-top: -15px">{{ $pick->motor->year }}</p>
                                            <p class="card-text text-secondary">From Rp. {{ number_format($pick->motor->price, 2, ",", ".") }} / Day</p>
                                            <a type="button" class="text-center {{ ($pick->motor->stok == 0) ? 'anchor-disabled':'' }}" href="/rent/{{ $pick->motor->name }}">RENT NOW</a>
                                        </div>
                                    </div>
                                    @if ($pick->motor->stok == 0)
                                        <div class="disabled">
                                            <h6 class="title-disabled">UNAVAIBLE</h6>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        @endif
                        {{-- END --}}
                    </div>
                    {{-- END CUSTOMER FAVORITES --}}
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="motorbike-content-cover d-flex justify-content-center animate__animated animate__fadeInUp animate__faster">
                {{-- SCOOTER MATIC --}}
                    <div class="row">
                    {{-- content-produc-BARIS 1 --}}
                    @foreach ($dataAutometic as $autometic)
                    <div class="col-lg-3 col-md-6 d-flex justify-content-center {{ ($autometic->stok == 0) ? 'coba':'' }}">
                        <div class="card">
                            <div class="container">
                                <img src="/storage/{{ $autometic->image }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text fs-5"><strong>{{ $autometic->name }}</strong></p>
                                    <p class="card-text text-secondary" style="margin-top: -15px">{{ $autometic->year }}</p>
                                    <p class="card-text text-secondary">From Rp. {{ number_format($autometic->price, 2, ",", ".") }} / Day</p>
                                    <a type="button" class="text-center {{ ($autometic->stok == 0) ? 'anchor-disabled':'' }}" href="/rent/{{ $autometic->name }}">RENT NOW</a>
                                </div>
                            </div>
                            @if ($autometic->stok == 0)
                                <div class="disabled">
                                    <h6 class="title-disabled">UNAVAIBLE</h6>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                        {{-- END --}}
                    </div>
                    {{-- END --}}
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="motorbike-content-cover d-flex justify-content-center animate__animated animate__fadeInUp animate__faster">
                    {{-- SCOOTER MANUAL --}}
                    <div class="row">
                        {{-- content-produc-BARIS 1 --}}
                        @foreach ($dataManually as $manually)
                        <div class="col-lg-3 col-md-6 d-flex justify-content-center {{ ($manually->stok == 0) ? 'coba':'' }}">
                            <div class="card">
                                <div class="container">
                                    <img src="/storage/{{ $manually->image }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text fs-5"><strong>{{ $manually->name }}</strong></p>
                                        <p class="card-text text-secondary" style="margin-top: -15px">{{ $manually->year }}</p>
                                        <p class="card-text text-secondary">From Rp. {{ number_format($manually->price, 2, ",", ".") }} / Day</p>
                                        <a type="button" class="text-center {{ ($manually->stok == 0) ? 'anchor-disabled':'' }}" href="/rent/{{ $manually->name }}">RENT NOW</a>
                                    </div>
                                </div>
                                @if ($manually->stok == 0)
                                    <div class="disabled">
                                        <h6 class="title-disabled">UNAVAIBLE</h6>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        {{-- END --}}
                    </div>
                    {{-- END --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact animate__animated animate__zoomIn">
    <div class="content text-center text-white">
        <h5>Need More Information?</h5>
        <h4 class="fw-bold pt-2 pb-2">MESSAGE US ON WHATSAPP</h4>
        <div class="button" id="button-5">
            <div id="translate"></div>
            <a href="https://wa.me/+6285953929150"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/5161569612.js" crossorigin="anonymous"></script>


@endsection

{{-- Motor::create([
    'name' => 'Honda CD150 Verza',
    'merk' => 'honda.png',
    'year' => '2017 year',
    'image' => 'HondaCB150Verza.png',
    'transmition' => 'Manually',
    'engine' => 149.2,
    'fuel' => '10,5',
    'helm' => 2,
    'coat' => 1,
    'stok' => 10,
    'price' => 100000,
]);

Motor::create([
    'name' => 'Honda Revo X',
    'merk' => 'honda.png',
    'year' => '2016 year',
    'image' => 'HondaRevoX.png',
    'transmition' => 'Manually',
    'engine' => 109.17,
    'fuel' => '9,5',
    'helm' => 2,
    'coat' => 1,
    'stok' => 5,
    'price' => 70000,
]);

Motor::create([
    'name' => 'KLX',
    'merk' => 'kawasaki.png',
    'year' => '2015 year',
    'image' => 'KLXHijau.png',
    'transmition' => 'Manually',
    'engine' => 150,
    'fuel' => '12,5',
    'helm' => 2,
    'coat' => 1,
    'stok' => 10,
    'price' => 150000,
]);

Motor::create([
    'name' => 'Yamaha Vixion',
    'merk' => 'yamaha.png',
    'year' => '2015 year',
    'image' => 'YamahaVixion.png',
    'transmition' => 'Manually',
    'engine' => 155,
    'fuel' => '12,5',
    'helm' => 2,
    'coat' => 1,
    'stok' => 8,
    'price' => 120000,
]); --}}

{{-- 
Motor::create([
    'name' => 'Honda Beat',
    'merk' => 'honda.png',
    'year' => '2016 year',
    'image' => 'HondaBeat.png',
    'transmition' => 'Autometic',
    'engine' => 125,
    'fuel' => '8,5',
    'helm' => 2,
    'coat' => 1,
    'stok' => 15,
    'price' => 90000,
]);

Motor::create([
    'name' => 'Piaggio Vespa 125 Primavera',
    'merk' => 'vespa.png',
    'year' => '2019 year',
    'image' => 'PiaggioVespa125Primavera.png',
    'transmition' => 'Autometic',
    'engine' => 125,
    'fuel' => '11,5',
    'helm' => 2,
    'coat' => 1,
    'stok' => 6,
    'price' => 150000,
]);

Motor::create([
    'name' => 'N-MAX 2016',
    'merk' => 'yamaha.png',
    'year' => '2016 year',
    'image' => 'N-MAX.png',
    'transmition' => 'Autometic',
    'engine' => 155,
    'fuel' => '12,5',
    'helm' => 2,
    'coat' => 1,
    'stok' => 11,
    'price' => 150000,
]);

Motor::create([
    'name' => 'Honda Scoopy 125',
    'merk' => 'honda.png',
    'year' => '2016 year',
    'image' => 'HondaScoopy125.png',
    'transmition' => 'Autometic',
    'engine' => 125,
    'fuel' => '8,5',
    'helm' => 2,
    'coat' => 1,
    'stok' => 12,
    'price' => 100000,
]); 
Motor::create([
    'name' => 'Honda X Adv',
    'merk' => 'honda.png',
    'year' => '2016 year',
    'image' => 'HondaXAdv.png',
    'transmition' => 'Autometic',
    'engine' => 110,
    'fuel' => '8,5',
    'helm' => 2,
    'coat' => 1,
    'stok' => 12,
    'price' => 110000,
]);

--}}
