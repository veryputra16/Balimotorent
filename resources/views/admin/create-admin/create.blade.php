@extends('layouts.admin-main')

@section('page-admin')
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Custom styles for this template-->
    <link href="../admin.css/sb-admin-2.min.css" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <div class="container-fluid">

        <!-- Page Heading -->

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInRightBig"
                role="alert">
                <strong>{{ session('status') }}</strong> check on the <a href="/admin/admin"> admin data page</a>
            </div>
        @endif

        <div class="card shadow mb-4">
            <a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse" role="button"
                data-expands="true">
                <h6 class="m-0 font-weight-bold primary-text"> ADD Data - Admin</h6>
            </a>


            <div class="collapse show" id="collapseCard">
                <div class="card-body ">

                    <form class="pt-2" method="POST" action="/admin/admin" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="exampleFormControlFile1">Input Image</label>
                                <div class="form-group pt-2">
                                    <img src="../../img/brand/motor.png" class="img-preview img-fluid mb-3 col-sm-5 ">
                                    <input name="image" type="file" class="form-control-file" id="imageId"
                                        onchange="previewImage()">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    {{-- <input type="text" class="form-control" id="inputname"
                                            placeholder="Name Of Admin..." name="name"> --}}
                                    <div class="col-lg-4">
                                        <label for="inputAddress" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="inputname"
                                            placeholder="Name Of Admin..." name="name">
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="inputAddress2" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="inputusername"
                                            placeholder="Username Of Admin..." name="username">
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="inputEmail4" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="inputpassword"
                                            placeholder="Password Of Admin..." name="password">
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-lg-4">
                                        <label for="inputAddress" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="inputname"
                                            placeholder="Address Of Admin..." name="address">
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="inputAddress2" class="form-label">No Telepon</label>
                                        <input type="text" class="form-control" id="inputusername"
                                            placeholder="No Telepon Of Admin..." name="telpon">
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="inputpassword"
                                            placeholder="Email Of Admin..." name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="inputAddress" class="form-label">Instagram</label>
                                        <input type="text" class="form-control" id="inputname"
                                            placeholder="Instagram Of Admin..." name="instagram">
                                    </div>


                                    <div class="mb1 col-lg-4">
                                        <label for="deliveryDate" class="form-label">BirthDay</label>
                                        <input type="date" id="birthday"
                                            class="form-control @error('birthday') is-invalid @enderror" name="birthday">
                                        @error('birthdat')
                                            <span style="color: #FF0000">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="col-lg-4">
                                        <label class="mr-sm-2" for="gender">Gender</label>
                                        <select class="custom-select mr-sm-2" id="gender" name="gender">
                                            <option selected>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col-lg-3">
                                        <label for="inputAddress" class="form-label">SD</label>
                                        <input type="text" class="form-control" id="inputname"
                                            placeholder="SD Of Admin..." name="education">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputAddress2" class="form-label">SMP</label>
                                        <input type="text" class="form-control" id="inputusername"
                                            placeholder="SMP Of Admin..." name="education">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputEmail4" class="form-label">SMK</label>
                                        <input type="text" class="form-control" id="inputpassword"
                                            placeholder="SMK Of Admin..." name="education">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="inputEmail4" class="form-label">Universitas</label>
                                        <input type="text" class="form-control" id="inputpassword"
                                            placeholder="Universitas Of Admin..." name="education">
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col-lg-3">
                                        <label for="inputAddress" class="form-label">Skill</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="option1" name="skill">
                                            <label class="form-check-label" for="inlineCheckbox1">HTML</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="option2" name="skill">
                                            <label class="form-check-label" for="inlineCheckbox2">CSS</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                value="option1" name="skill">
                                            <label class="form-check-label" for="inlineCheckbox3">PHP</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox4"
                                                value="option2" name="skill">
                                            <label class="form-check-label" for="inlineCheckbox4">JavaScript</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox5"
                                                value="option1" name="skill">
                                            <label class="form-check-label" for="inlineCheckbox5">Angular</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox6"
                                                value="option2" name="skill">
                                            <label class="form-check-label" for="inlineCheckbox6">UI</label>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="inputPassword4" class="form-label">Status</label>
                                        <input type="text" class="form-control" id="inputstatus"
                                            placeholder="Status Of Admin..." name="status">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="inputCity" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="inputCountry"
                                            placeholder="Country Of Admin..." name="country">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="inputPassword4" class="form-label">Information</label>
                                        <input type="text" class="form-control" id="inputstatus"
                                            placeholder="Information of Admin...">

                                        <input type="hidden" name="information_id" value="1">  {{-- Hidden Value --}}
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="inputCity" class="form-label">Skill</label>
                                        <input type="text" class="form-control" id="inputCountry"
                                            placeholder="Skill Of Admin...">
                                        <input type="hidden" name="skill_id" value="1">  {{-- Hidden Value --}}
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="inputCity" class="form-label">Education</label>
                                        <input type="text" class="form-control" id="inputCountry"
                                            placeholder="Education Of Admin...">
                                        <input type="hidden" name="education_id" value="1">  {{-- Hidden Value --}}
                                    </div>
                                </div>

                                {{-- <div class="row"> 
                                    <div class="col-lg-6">
                                        <label for="skill_id" class="form-label">Skill</label>
                                        <select id="skill_id"
                                            class="form-control deliver-bike" required
                                            id="skill_id" name="skill_id" aria-label="Default select example"
                                            onchange="deliver(this.value)">
                                            <option value="">Select Option</option>
                                            <option value="Galkarent Pemogan">Galkarent Pemogan</option>
                                            <option value="Galkarent Dalung">Galkarent Dalung</option>
                                            <option value="Galkarent Kerobokan">Galkarent Kerobokan</option>
                                            <option value="Galkarent Kapal">Galkarent Kapal</option>
                                            <option value="Galkarent Mambal">Galkarent Mambal</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        @foreach ($admin as $i)
                                            <label for="information_id" class="form-label">Information</label>
                                            <select id="information_id"
                                                class="form-control deliver-bike" required
                                                id="information_id" name="information_id" aria-label="Default select example"
                                                onchange="deliver(this.value)">
                                                <option value="">Select Option</option>
                                                <option value="">{{ $i->information->information_id }}</option>
                                            </select>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row"> 
                                    <div class="col-lg-6">
                                        <label for="education_id" class="form-label">Education</label>
                                        <select id="education_id"
                                            class="form-control deliver-bike" required
                                            id="education_id" name="education_id" aria-label="Default select example"
                                            onchange="deliver(this.value)">
                                            <option value="">Select Option</option>
                                            <option value="Galkarent Pemogan">Galkarent Pemogan</option>
                                            <option value="Galkarent Dalung">Galkarent Dalung</option>
                                            <option value="Galkarent Kerobokan">Galkarent Kerobokan</option>
                                            <option value="Galkarent Kapal">Galkarent Kapal</option>
                                            <option value="Galkarent Mambal">Galkarent Mambal</option>
                                        </select>
                                    </div>
                                </div> --}}


                                <div class="pt-3">
                                    <button type="submit" class="btn btn-primary btn-sm">SUBMIT</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

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
        };

        src = "../js/booking.js"
    </script>
@endsection
