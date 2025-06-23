@extends('layouts.admin-main')

@section('page-admin')
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../admin.css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Page Heading -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInRightBig" role="alert">
            <strong>{{ session('status') }}</strong> check on the <a href="/admin/admin"> admin data page</a>
        </div>
    @endif

    <!-- Content Row -->
    <!-- Page Heading -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Admin</h1>
        <!-- <h3 class="h3 mb-4 text-gray-800 "><span><?php ?></span></h3> -->
        <table class="table table-hover">
            <thead class="bg-dark text-light" style="text-align: center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Status</th>
                    <th scope="col">Country</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody style="text-align: center">
                <?php $i = 1; ?>
                @foreach ($admin as $a)
                    <tr>
                        <td><?= $i ?></td>
                        <td>{{ $a->name }}</td>
                        <td>{{ $a->username }}</td>
                        <td>{{ $a->password }}</td>
                        <td>{{ $a->status }}</td>
                        <td>{{ $a->country }}</td>
                        <td>{{ $a->image }}</td>
                        <td class="col-2">
                            <a href="" class=" btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#edit{{ $a->id }}"><i class='fas fa-pencil-alt'></i></a>
                            <!-- Modal -->
                            <div class="modal fade" id="edit{{ $a->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body ">

                                            @if ($a->information_id == '')
                                                <form class="" method="POST"
                                                    action="/admin/admin/{{ $a->id }}">
                                                    @method('put')
                                                    @csrf
                                                    <div>
                                                        <input type="text" class="form-control" id="inputname"
                                                            placeholder="Name Of Admin..." name="information_id"
                                                            value="{{ $a->id }}">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label for="inputAddress" class="form-label">Address</label>
                                                            <input type="text" class="form-control" id="inputname"
                                                                placeholder="Address Of Admin..." name="address">
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label for="inputAddress2" class="form-label">No
                                                                Telepon</label>
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
                                                            <label for="inputAddress"
                                                                class="form-label">Instagram</label>
                                                            <input type="text" class="form-control" id="inputname"
                                                                placeholder="Instagram Of Admin..." name="instagram">
                                                        </div>


                                                        <div class="mb1 col-lg-4">
                                                            <label for="deliveryDate"
                                                                class="form-label">BirthDay</label>
                                                            <input type="date" id="birthday"
                                                                class="form-control @error('birthday') is-invalid @enderror"
                                                                name="birthday">
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

                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label for="inputAddress"
                                                                    class="form-label">Skill</label>
                                                            </div>
                                                            <div>
                                                                <input type="hidden" class="form-control" id="inputname"
                                                                    placeholder="Name Of Admin..." name="admin_id"
                                                                    value="{{ $a->id }}">
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox1" value="HTML" name="skill[]">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">HTML</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox2" value="CSS" name="skill[]">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox2">CSS</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox3" value="PHP" name="skill[]">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox3">PHP</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox4" value="JavaScript"
                                                                        name="skill[]">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox4">JavaScript</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox5" value="Angular" name="skill[]">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox5">Angular</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox6" value="UI" name="skill[]">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox6">UI</label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label for="inputAddress" class="form-label">SD</label>
                                                                <input type="text" class="form-control" id="inputname"
                                                                    placeholder="SD Of Admin..." name="education[]">
                                                            </div>

                                                            <div class="col-lg-3">
                                                                <label for="inputAddress2"
                                                                    class="form-label">SMP</label>
                                                                <input type="text" class="form-control" id="inputusername"
                                                                    placeholder="SMP Of Admin..." name="education[]">
                                                            </div>

                                                            <div class="col-lg-3">
                                                                <label for="inputEmail4" class="form-label">SMK</label>
                                                                <input type="text" class="form-control" id="inputpassword"
                                                                    placeholder="SMK Of Admin..." name="education[]">
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label for="inputEmail4"
                                                                    class="form-label">Universitas</label>
                                                                <input type="text" class="form-control" id="inputpassword"
                                                                    placeholder="Universitas Of Admin..."
                                                                    name="education[]">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            @else
                                                <form class="" method="POST"
                                                    action="/admin/admin/{{ $a->id }}">
                                                    @method('put')

                                                    @csrf
                                                    <div>
                                                        <input type="hidden" class="form-control" id="inputname"
                                                            placeholder="Name Of Admin..." name="information_id"
                                                            value="{{ $a->id }}">
                                                    </div>
                                                    @foreach ($a->information as $ai)
                                                        <input type="hidden" name="id_information"
                                                            value="{{ $ai->id }}">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <label for="inputAddress"
                                                                    class="form-label">Address</label>
                                                                <input type="text" class="form-control" id="inputname"
                                                                    placeholder="Address Of Admin..." name="address"
                                                                    value="{{ $ai->address }}">
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <label for="inputAddress2" class="form-label">No
                                                                    Telepon</label>
                                                                <input type="text" class="form-control" id="inputusername"
                                                                    placeholder="No Telepon Of Admin..." name="telpon"
                                                                    value="{{ $ai->telpon }}">
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <label for="inputEmail4"
                                                                    class="form-label">Email</label>
                                                                <input type="email" class="form-control"
                                                                    id="inputpassword" placeholder="Email Of Admin..."
                                                                    name="email" value="{{ $ai->email }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <label for="inputAddress"
                                                                    class="form-label">Instagram</label>
                                                                <input type="text" class="form-control" id="inputname"
                                                                    placeholder="Instagram Of Admin..." name="instagram"
                                                                    value="{{ $ai->instagram }}">
                                                            </div>


                                                            <div class="mb1 col-lg-4">
                                                                <label for="deliveryDate"
                                                                    class="form-label">BirthDay</label>
                                                                <input type="date" id="birthday"
                                                                    class="form-control @error('birthday') is-invalid @enderror"
                                                                    name="birthday" value="{{ $ai->birthday }}">
                                                                @error('birthdat')
                                                                    <span style="color: #FF0000">{{ $message }}</span>
                                                                @enderror
                                                            </div>


                                                            <div class="col-lg-4">
                                                                <label class="mr-sm-2" for="gender">Gender</label>
                                                                <select class="custom-select mr-sm-2" id="gender"
                                                                    name="gender" value="{{ $ai->gender }}">
                                                                    <option selected>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label for="inputAddress"
                                                                        class="form-label">Skill</label>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            id="inlineCheckbox1" value="HTML"
                                                                            name="skill[]">
                                                                        <label class="form-check-label"
                                                                            for="inlineCheckbox1">HTML</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            id="inlineCheckbox2" value="CSS" name="skill[]">
                                                                        <label class="form-check-label"
                                                                            for="inlineCheckbox2">CSS</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            id="inlineCheckbox3" value="PHP" name="skill[]">
                                                                        <label class="form-check-label"
                                                                            for="inlineCheckbox3">PHP</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            id="inlineCheckbox4" value="JavaScript"
                                                                            name="skill[]">
                                                                        <label class="form-check-label"
                                                                            for="inlineCheckbox4">JavaScript</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            id="inlineCheckbox5" value="Angular"
                                                                            name="skill[]">
                                                                        <label class="form-check-label"
                                                                            for="inlineCheckbox5">Angular</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            id="inlineCheckbox6" value="UI" name="skill[]">
                                                                        <label class="form-check-label"
                                                                            for="inlineCheckbox6">UI</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label for="inputAddress"
                                                                        class="form-label">SD</label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputname" placeholder="SD Of Admin..."
                                                                        name="education[]">
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label for="inputAddress2"
                                                                        class="form-label">SMP</label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputusername" placeholder="SMP Of Admin..."
                                                                        name="education[]">
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label for="inputEmail4"
                                                                        class="form-label">SMK</label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputpassword" placeholder="SMK Of Admin..."
                                                                        name="education[]">
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <label for="inputEmail4"
                                                                        class="form-label">Universitas</label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputpassword"
                                                                        placeholder="Universitas Of Admin..."
                                                                        name="education[]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="/admin/admin/{{ $a->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <input type="hidden" value="{{ $a->id }}" name="id">
                                <button class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('Are U Sure Wanna Delete This One?')"><i
                                        class='bx bxs-trash'></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
