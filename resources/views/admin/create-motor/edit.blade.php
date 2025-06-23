@extends('layouts.admin-main')

@section('page-admin')
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Custom styles for this template-->
    <link href="../../../../admin.css/sb-admin-2.min.css" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <div class="container-fluid">

        <!-- Page Heading -->


        <div class="card shadow mb-4">
            <a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse" role="button"
                data-expands="true">
                <h6 class="m-0 font-weight-bold primary-text"> Edit Motor - Vehicles</h6>
            </a>


            <div class="collapse show" id="collapseCard">
                <div class="card-body ">

                    <form class="" method="POST" action="/admin/motor/{{ $motor->id }}"
                        enctype="multipart/form-data">
                        @method('put')

                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="">
                                    <label for="exampleFormControlFile1">Input Image</label>
                                    <input type="hidden" value="{{ $motor->image }}" name="oldImage">
                                    @if ($motor->image)
                                        <img src="{{ asset('storage/' . $motor->image) }}"
                                            class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                    @endif
                                    <input name="image" type="file" class="form-control-file " id="imageId"
                                        onchange="previewImage()">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="inputAddress" class="form-label">Name</label>
                                        <input value="{{ $motor->name }}" type="text"
                                            class="form-control  @error('name') is-invalid @enderror" id="inputAddress"
                                            placeholder="Name Of Vehicle..." name="name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="inputAddress2" class="form-label">Merk</label>
                                        <input value="{{ $motor->merk }}" type="text"
                                            class="form-control  @error('merk') is-invalid @enderror" id="inputAddress2"
                                            placeholder="Merk Of Vehicle..." name="merk">
                                        @error('merk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="inputEmail4" class="form-label">Year</label>
                                        <input value="{{ $motor->year }}" type="text"
                                            class="form-control  @error('year') is-invalid @enderror" id="inputEmail4"
                                            name="year">
                                        @error('year')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="mr-sm-2" for="text3">Transmition</label>
                                        <select class="custom-select mr-sm-2  @error('transmition') is-invalid @enderror"
                                            id="text3" name="transmition">
                                            <option value="{{ $motor->transmition }}"></option>
                                            <option selected>Autometic</option>
                                            <option>Manual</option>
                                        </select>
                                        @error('transmition')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="inputEmail4" class="form-label">Engine</label>
                                        <input value="{{ $motor->engine }}" type="text"
                                            class="form-control  @error('engine') is-invalid @enderror" id="inputEmail4"
                                            name="engine">
                                        @error('engine')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="inputPassword4" class="form-label">Fuel</label>
                                        <input value="{{ $motor->fuel }}" type="text"
                                            class="form-control  @error('fuel') is-invalid @enderror" d="inputPassword4"
                                            name="fuel">
                                        @error('fuel')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="inputCity" class="form-label">Helm</label>
                                        <input value="{{ $motor->helm }}" type="text" class="form-control"
                                            id="inputCity" name="helm">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="inputCity" class="form-label">Coat</label>
                                        <input value="{{ $motor->coat }}" type="text" class="form-control"
                                            id="inputCity" name="coat">
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="inputCity" class="form-label">Stok</label>
                                        <input value="{{ $motor->stok }}" type="text"
                                            class="form-control  @error('stok') is-invalid @enderror" id="inputCity"
                                            name="stok">
                                        @error('stok')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input value="{{ $motor->price }}" type="text"
                                        class="form-control  @error('price') is-invalid @enderror" id="inputAddress"
                                        placeholder="Price of Loan/Rent..." name="price">
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary btn-sm">SUBMIT</button>
                                </div>
                            </div>
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

    <script>
        function previewImage() {
            const image = document.querySelector('#imageId');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
