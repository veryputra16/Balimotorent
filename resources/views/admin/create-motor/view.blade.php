@extends('layouts.admin-main')

@section('page-admin')
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../admin.css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Page Heading -->


    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInRightBig" role="alert">
                <strong>{{ session('status') }}</strong> check on the <a href="/admin/motor"> vehicles data page</a>
            </div>
        @endif

        @if (session('update'))
            <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInRightBig" role="alert">
                <strong>{{ session('update') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('delete'))
            <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInRightBig" role="alert">
                <strong>{{ session('delete') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow mb-4">
            <a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse" role="button"
                data-expands="true">
                <h6 class="m-0 font-weight-bold primary-text"> ADD Motor - Vehicles</h6>
            </a>

            
            <div class="collapse show" id="collapseCard">
                <div class="card-body ">

                    {{-- Filter Section --}}
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <select id="filterStock" class="form-control">
                                <option value="all">All Stock</option>
                                <option value="available">Available Only</option>
                                <option value="unavailable">Unavailable Only</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select id="filterTransmisi" class="form-control">
                                <option value="all">All Transmisi</option>
                                <option value="Manual">Manual</option>
                                <option value="Automatic">Automatic</option>
                            </select>
                        </div>
                    </div>
                    {{-- End Filter Section --}}

                    <div class="row">
                        <div class="col-12">
                            <form action="/admin/motor">
                                <div class="input-group mb-3 mt-3">
                                    <input type="text" class="form-control" placeholder="Search.." name="search"
                                        value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if ($motor->Count())

                        <div class="row">
                            @foreach ($motor as $m)
                                <div class="col-lg-3 mb-4">
                                    <div class="card shadow motor-card" style="width: 18rem;" 
                                    data-stock="{{ $m->stok > 0 ? 'available' : 'unavailable' }}"
                                    data-transmisi="{{ $m->transmition }}">

                                        <div class="position-relative">
                                            <img src="../storage/{{ $m->image }}" class="card-img-top" alt="">

                                            @if ($m->stok == 0)
                                                <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center"
                                                    style="top:0; left:0; background:rgba(0,0,0,0.6); z-index:10;">
                                                    <h6 class="text-white font-weight-bold">UNAVAILABLE</h6>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">{{ $m->name }}</h5>
                                            <span class="badge bg-primary text-white">{{ $m->year }}</span>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Rp. {{ $m->price }}</li>
                                        </ul>
                                        <div class="card-body">
                                            <a href="/admin/motor/{{ $m->id }}/edit" class=" btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="/admin/motor/{{$m->id}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <input type="hidden" value="{{ $m->id }}" name="id">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure Wanna Delete This One ?')" >
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                            <a href="#" class=" btn btn-secondary btn-sm" title="view detail"
                                                data-toggle="modal" data-target="#view{{ $m->id }}"><i
                                                    class="fas fa-eye"></i></a>

                                            <!-- Modal view-->
                                            <div class="modal fade" id="view{{ $m->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">View Detail
                                                                Motorcycle</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row align-items-center">
                                                                <div class="col-lg-4">
                                                                    <div class="image-modal">
                                                                        <img src="../storage/{{ $m->image }}"
                                                                            class="card-img-top" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-8 mt-4">
                                                                    <h5 class="font-weight-bold">{{ $m->name }}</h5>
                                                                    <span
                                                                        class="badge bg-primary text-white">{{ $m->year }}</span>
                                                                    <h6 class="font-weight-bold mt-4">Details</h6>
                                                                    <div class="group1 d-flex">
                                                                        <div class="one">
                                                                            <p>Transmition :
                                                                                <span>{{ $m->transmition }}</span>
                                                                            </p>
                                                                            <p>Engine Displacement :
                                                                                <span>{{ $m->engine }}
                                                                                    CC</span>
                                                                            </p>
                                                                            <p>Fuel : <span>{{ $m->fuel }}
                                                                                    Litter</span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="two ml-5">
                                                                            <p>Raincoat : <span>{{ $m->coat }}
                                                                                    pcs</span>
                                                                            </p>
                                                                            <p>Helmet : <span>{{ $m->helm }}
                                                                                    pcs</span>
                                                                            </p>
                                                                            <p>Motorcycle Stock : <span>{{ $m->stok }}
                                                                                    Units</span> </p>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="price-input d-flex align-items-center">
                                                                        <p>Price :</p>
                                                                        <div class="input-group ml-2 mb-3 mr-sm-2"
                                                                            style="width: 180px">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">Rp</div>
                                                                            </div>
                                                                            <input type="text" class="form-control"
                                                                                id="inlineFormInputGroupUsername2"
                                                                                placeholder="{{ $m->price }}/Day"
                                                                                readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end modal view --}}

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    @else
                        <h3 class="text-center fs-4 mt-4 mb-4 ">No Posts Found.</>
                    @endif

                </div>
            </div>
        </div>
        {{ $motor->links() }}
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const filterStock = document.getElementById("filterStock");
        const filterTransmisi = document.getElementById("filterTransmisi");
        const cards = document.querySelectorAll(".motor-card");

        function applyFilter() {
            const stockValue = filterStock.value;
            const transmisiValue = filterTransmisi.value;

            cards.forEach(card => {
                const stock = card.getAttribute("data-stock");
                const transmisi = card.getAttribute("data-transmisi");

                let stockMatch = (stockValue === "all" || stock === stockValue);
                let transmisiMatch = (transmisiValue === "all" || transmisi === transmisiValue);

                if (stockMatch && transmisiMatch) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        }

        filterStock.addEventListener("change", applyFilter);
        filterTransmisi.addEventListener("change", applyFilter);
    });
    </script>


@endsection
