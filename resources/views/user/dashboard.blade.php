@extends('layouts.main')

@section('body')

    <link rel="stylesheet" href="../../css/user/dashboard.css"/>
    
    @if(session()->has('graceLoan'))
    <div class="modal fade show" tabindex="-1" style="display: block" aria-modal="true" role="dialog">
        <div id="modal" class="modal-dialog animate__animated animate__fadeInDownBig" style="width: 25%;">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white">Failed</h5>
                    <button type="button" id="closeGraceLoan" class="btn-close btn-close-white" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="space-icon" style="width:70px;height:70px;margin:auto;">
                        <lord-icon
                            src="https://cdn.lordicon.com/otyynlki.json"
                            trigger="loop"
                            colors="primary:#e83a30"
                            state="hover-1"
                            style="width:70px;height:70px; border-radius:50%;">
                        </lord-icon>
                    </div>
                    <p class="mt-3" style="text-align: center"><strong>{{ session('graceLoan') }}</strong></p>
                </div>
            </div>
        </div>
    </div>
    @endif


    <div id="ulasanSuccess" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div id="modal" class="modal-dialog animate__animated animate__fadeInDownBig">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white">Success</h5>
                    <button type="button" id="closeButton" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="space-icon" style="width:70px;height:70px;margin:auto;">
                        <lord-icon
                            src="https://cdn.lordicon.com/jvihlqtw.json"
                            trigger="loop"
                            colors="primary:#16c72e,secondary:#08a88a"
                            style="width:70px;height:70px; border:3px solid #16c72e; border-radius:50%;">
                        </lord-icon>
                    </div>
                    <p class="mt-3" style="text-align: center"><strong>Thank Youuu!!!</strong></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="wrapper">
            <div class="background ">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4 mt-4">
                        <div class="card" style="width: 18rem; padding:5px; color: #AAAAAA; border:none; box-shadow: 0px 0px 40px -30px #333333; margin:auto;">
                            <img src="{{ ($user->image == "")?'../../img/user/UserProfile.png':'../../storage/'.$user->image }}" class="card-img-top" alt="..." height="250">
                            <div class="card-body">
                                <h5 class="card-title text-center fw-bold" style="font-size: 15px"><i class='bx bxs-user'></i> {{ $user->name }}</h5>
                                <hr class="mb-4">
                                <p><i class='bx bxs-envelope'></i> {{ $user->email }}</p>
                                <p class="mb-4"><i class='bx bxs-phone-call'></i> {{ $user->telpon }}</p>
                                <a href="/user/{{ $user->username }}/edit" class="btn d-block fw-bold" style="border: 1px solid #BECBD5">EDIT PROFILE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mt-4">
                        <div class="list mt-1">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Ongoing Rent</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Rent List</button>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                @if (count($data) == 0)
                                    <div class="card mt-4" style="padding: 70px">
                                        <div class="card-body">
                                            <p class="card-text text-center fw-bold">No Loans Transaction</p>
                                        </div>
                                    </div>
                                @else
                                    @foreach ($data as $d)
                                    <div class="list-loan d-flex align-items-center {{ ($dateNow >= $d->return_date) ? 'coba' : '' }}">
                                        <div class="motor-image text-center float-start">
                                            @if ($d->motor->transmition == "Autometic")
                                            <img src="../../storage/{{ $d->motor->image }}" alt="" width="150" height="150">
                                            @else
                                            <img src="../../storage/{{ $d->motor->image }}" alt="" width="150" height="150">
                                            @endif
                                            <p class="mt-2 fw-bold"></p>
                                        </div>
                                        <div class="content">
                                            <div class="data-first d-flex">
                                                <div class="delivery">
                                                    <ul class="d-flex">
                                                        <div class="one">
                                                            <li>Delivery Date</li>
                                                            <li>Return Date</li>
                                                        </div>
                                                        <div class="two ms-4">
                                                            <li><span class="fw-bold" style="color: #A5A2F6">{{ $d->delivery_date }}</span></li>
                                                            <li><span class="fw-bold" style="color: #A5A2F6">{{ $d->return_date }}</span></li>
                                                        </div>
                                                    </ul>
                                                </div>
                                                <div class="return ms-3">
                                                    <ul class="d-flex">
                                                        <div class="one">
                                                            <li>Delevery Time</li>
                                                            <li>Return Time</li>
                                                        </div>
                                                        <div class="two ms-4">
                                                            <li><span class="fw-bold" style="color: #A5A2F6">{{ $d->delivery_time }}</span></li>
                                                            <li><span class="fw-bold" style="color: #A5A2F6">{{ $d->return_time }}</span></li>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="data-second">
                                                <ul class="d-flex">
                                                    <div class="one">
                                                    <li>Deliver to</li>
                                                    <li>Return Location</li>
                                                    </div>
                                                    <div class="two ms-3">
                                                        <li><span class="fw-bold" style="color: #A5A2F6">{{ $d->delivery_bike }}</span></li>
                                                        <li><span class="fw-bold" style="color: #A5A2F6">{{ $d->return_bike }}</span></li>
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        @if ($dateNow >= $d->return_date)
                                            <div class="disabled"> 
                                                <h6 class="title-disabled">TIMES UP</h6>
                                            </div>
                                        @endif
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                @if (count($loanFinish) == 0)
                                    <div class="card mt-4" style="padding: 70px">
                                        <div class="card-body">
                                            <p class="card-text text-center fw-bold">No Loans Time Up</p>
                                        </div>
                                    </div>
                                @else
                                    @foreach ($loanFinish as $loan)
                                    <div id="ulasanModal{{ $loan->motor->id }}" class="modal fade" tabindex="-1" aria-labelledby="ex" aria-hidden="true">
                                        <div class="modal-dialog modal-lg animate__animated">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Your Review</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form name="ulasan-peminjaman">
                                                    <div class="modal-body" style="width: 100%;">
                                                        <div class="title_body mb-4">
                                                            <img src="../../storage/{{ $loan->motor->image }}" alt="" width="180" height="180" class="mx-auto d-block">
                                                            <h4 class="text-center fw-bold">{{ $loan->motor->name }}</h4>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username" value="{{ $user->username }}" disabled>
                                                                    <input type="hidden" name="username" value="{{ $user->username }}">
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="name" value="{{ $user->name }}">
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="input-group mb-3">
                                                                    <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name="email" value="{{ $user->email }}" disabled>
                                                                    <input type="hidden" name="email" value="{{ $user->email }}">
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="image" value="{{ $user->image }}">
                                                            <div class="mb-3 col-lg-12">
                                                                <textarea  class="form-control" placeholder="Message" id="exampleFormControlTextarea1" rows="7" name="massage" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn modal-button-close" data-bs-dismiss="modal"><b><i class="fas fa-window-close"></i> Close</b></button>
                                                        <button type="submit" class="btn modal-button-send"><b><i class="fas fa-paper-plane"></i> Send</b></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="ulasanDelete{{ $loan->motor->id }}" class="modal fade" tabindex="-1" aria-labelledby="ulasanDelete" aria-hidden="true">
                                        <div id="modal" class="modal-dialog animate__animated animate__fadeInDownBig">
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning">
                                                    <h5 class="modal-title text-white">Warning</h5>
                                                    <button type="button" id="closeButton" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="space-icon" style="width:70px;height:70px;margin:auto;">
                                                        <lord-icon
                                                            src="https://cdn.lordicon.com/keogyrep.json"
                                                            trigger="loop"
                                                            colors="primary:#e8e230"
                                                            state="hover-1"
                                                            style="width:70px;height:70px; border-radius:50%;">
                                                        </lord-icon>
                                                    </div>
                                                    <p class="mt-3" style="text-align: center"><strong>Are you sure wanna delete your rent history ???</strong></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn modal-button-close" data-bs-dismiss="modal"><b><i class="fas fa-window-close"></i> No</b></button>
                                                    <form action="/user/{{ auth()->user()->username }}/dashboard/{{ $loan->id }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <input type="hidden" name="image" value="{{ $loan->motor->image }}">
                                                        <input type="hidden" name="id" value="{{ $loan->id }}">
                                                        <button type="submit" class="btn modal-button-yes"><b><i class="fas fa-check"></i> Yes</b></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-loan d-flex align-items-center justify-content-between">
                                        <div class="col-md-2">
                                            <div class="motor-image text-center">
                                                {{-- <img src="img/matic-bike/HondaBeat.png" alt="" width="150" height="150"> --}}
                                                <img src="../../storage/{{ $d->motor->image }}" alt="" width="150" height="150">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="data-first mt-3">
                                                <ul>
                                                    <li style="font-size: 18px; font-weight:bold"> {{ $loan->motor->name }} <p style="font-size: 13px; font-weight:normal;">Rp. {{ number_format($loan->motor->price, 2, ",", ".") }}</p></li>
                                                    <li>Rented Time : <span style="color:#A5A2F6; font-weight:bold; font-size:13px;">{{ date_format(date_create($loan->delivery_date), "d M Y") }} - {{ date_format(date_create($loan->return_date), "d M Y") }}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-3 me-5">
                                            <div class="data-second mt-3">
                                                <ul>
                                                    <li style="font-weight:bold; text-align: center">Price <p style="font-size: 13px; color:#A5A2F6;">Rp. {{  number_format($loan->total_price, 2, ",", ".") }}</p><hr></li>
                                                    <li>
                                                        <div class="d-flex" style="margin-top:-10px">
                                                        <button type="button" class="btn text-white btn-sm fw-bold" style="background:#A5A2F6; width:110px;" id="buttonModal" data-bs-toggle="modal" data-bs-target="#ulasanModal{{ $loan->motor->id }}">
                                                            Give Any Review
                                                        </button>
                                                        <button type="submit" class="btn btn-danger text-white btn-sm ms-2"  data-bs-toggle="modal" data-bs-target="#ulasanDelete{{ $loan->motor->id }}" >
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbw8TSWH7_9fOZcprYfsSrWrClHNwyS2JlCtLroPkv2nnTiU6arnELkdrq6bjIydXjg/exec';
        // const scriptURL = 'https://script.google.com/macros/s/AKfycbwhRpzjkEFVQ4hYolX9kChw4Xn0fZ7L4o8NwPyhIoDZq5ADVY5hY_Ly6xnCDSMS3BgF/exec'
        const form = document.forms['ulasan-peminjaman'];

        document.getElementById('buttonModal').addEventListener('click', function(){
            document.querySelector('.modal-backdrop').setAttribute('id', 'modal-backdrop');
        })


        form.addEventListener('submit', e => {
            e.preventDefault()
            fetch(scriptURL, { method: 'POST', body: new FormData(form)})
                .then(response => {
                    
                    // document.getElementById('ulasanModal').style.display = 'none';
                    // document.querySelector('.modal-dialog').classList.add('animate__fadeOutUpBig');
                    
                    const ulasanModal = document.getElementById('ulasanModal');
                    const modal = bootstrap.Modal.getInstance(ulasanModal);
                    const myModal = new bootstrap.Modal(document.getElementById('ulasanSuccess'))

                    form.reset();
                    modal.hide();
                    myModal.show();

                    console.log('Success!', response)
                })
                .catch(error => console.error('Error!', error.message))
        })

        document.getElementById('closeGraceLoan').addEventListener("click", function(){
            document.getElementById('body').removeAttribute('class');
            document.getElementById('body').removeAttribute('style');
            document.querySelector('.modal').removeAttribute('tabindex');
            document.querySelector('.modal').removeAttribute('style');
            document.querySelector('.modal').removeAttribute('aria-modal');
            document.querySelector('.modal').removeAttribute('role');
            document.getElementById('modal-backdrop').removeAttribute('class');
        });
    </script>

@endsection