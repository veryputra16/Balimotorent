@extends('layouts.main')

<link rel="stylesheet" href="../css/booking.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('body')

    @if (session()->has('success'))
        <div class="modal fade show" tabindex="-1" style="display: block" aria-modal="true" role="dialog">
            <div id="modal" class="modal-dialog animate__animated animate__fadeInDownBig modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white">Success</h5>
                        <button type="button" id="closeButton" class="btn-close btn-close-white" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="space-icon" style="width:70px;height:70px;margin:auto;">
                            <lord-icon src="https://cdn.lordicon.com/jvihlqtw.json" trigger="loop"
                                colors="primary:#16c72e,secondary:#08a88a"
                                style="width:70px;height:70px; border:3px solid #16c72e; border-radius:50%;">
                            </lord-icon>
                        </div>
                        <p class="mt-3" style="text-align: center"><strong>{{ session('success') }}</strong></p>
                        <hr style="width: 80%; margin: auto;">
                        <div class="final text-center">
                            <div class="badge bg-warning text-dark mb-2 mt-4">
                                IMPORTANT!
                            </div>
                            <p>Thankyou for your rent. your transaction will be process ASAP, our team will contact when the payment is already checked</p>
                            <strong>Thankyou!</strong><br>
                            <strong>Contact WhatsApp below!</strong><br>
                            <div class="button mt-3" id="button-5">
                                <div id="translate"></div>
                                <a
                                    href="https://wa.me/+6285953929150?text=Hello%20GalkaRental%20Bali,%20Transaction%20Request!"><i
                                        class="fab fa-whatsapp"></i> WhatsApp</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (session()->has('failed'))
        <div class="modal fade show" tabindex="-1" style="display: block" aria-modal="true" role="dialog">
            <div id="modal" class="modal-dialog fade show animate__animated animate__fadeInDownBig" style="width: 25%;">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title text-white">Failed</h5>
                        <button type="button" id="closeButton" class="btn-close btn-close-white"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="space-icon" style="width:70px;height:70px;margin:auto;">
                            <lord-icon src="https://cdn.lordicon.com/hrqwmuhr.json" trigger="loop"
                                colors="primary:#e83a30,secondary:#e83a30"
                                style="width:70px;height:70px; border:3px solid #e83a30; border-radius:50%;">
                            </lord-icon>
                        </div>
                        <p class="mt-3" style="text-align: center"><strong>{{ session('failed') }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="tabs-content">
            <div class="content">
                <div class="row justify-content-center">
                    <div class="motorbike-details col-lg-5">
                        <div class="motorbike-name text-center mb-5 mt-5">
                            <h4><strong>{{ $data->name }}</strong></h4>
                        </div>
                        <div class="card">
                            <div class="container">
                                <div class="card-title pt-4">
                                    <h5><u>Motorbike Details</u></h5>
                                </div>
                                <div class="img d-flex justify-content-center">
                                    @if ($data->transmition == 'Autometic')
                                        <img src="/storage/{{ $data->image }}" alt="bike" class="img-fluid"
                                            width="400">
                                    @else
                                        <img src="/storage/{{ $data->image }}" alt="bike" class="img-fluid"
                                            width="400">
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="content-details">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <ul>
                                                <h6><strong>Details :</strong></h6>
                                                <li>- Transmition : {{ $data->transmition }}</li>
                                                <li>- Engine Displacement : {{ $data->engine }} CC</li>
                                                <li>- Fuel Capacity : {{ $data->fuel }} Liter</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-5">
                                            <ul>
                                                <h6><strong>Facility :</strong></h6>
                                                <li>- {{ $data->helm }} Helmet</li>
                                                <li>- {{ $data->coat }} Rain Coat</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="price-list">
                                <div class="container">
                                    <ul>
                                        <h6><strong>Price List :</strong></h6>
                                        <li>- <i class="fas fa-motorcycle"></i> 1 DAY :
                                            {{ number_format($data->price, 2, ',', '.') }}/DAY (MINIMUM 2 DAYS)</li>
                                        <li>- <i class="fas fa-motorcycle"></i> 7 DAYS :
                                            {{ number_format($data->price * 7, 2, ',', '.') }}/DAY</li>
                                        <li>- <i class="fas fa-motorcycle"></i> 14 DAYS :
                                            {{ number_format($data->price * 14, 2, ',', '.') }}/DAY</li>
                                        <li>- <i class="fas fa-motorcycle"></i> 21 DAYS :
                                            {{ number_format($data->price * 21, 2, ',', '.') }}/DAY</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="go-back mt-5">
                            <a href="/rent">View Other Scooters</a>
                        </div>
                    </div>

                    <div class="form-booking col-lg-4">
                        <div class="booking-forms">
                            <div class="forms-title">
                                <h5><u>Booking Forms</u></h5>
                            </div>
                            <div class="content-forms">
                                <form action="/rent" method="POST" id="form" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Modal -->
                                    <input type="hidden" name="motor_id" value="{{ $data->id }}">
                                    <div class="modal fade" id="bookingModal{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Booking Motor
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row d-flex justify-content-between align-items-center">
                                                        <div class="col-lg-3">
                                                            <div class="image-modal" style="width: 100%; margin:auto;">
                                                                @if ($data->transmition == 'Autometic')
                                                                    <img src="/storage/{{ $data->image }}" alt="bike"
                                                                        width="250" height="250" class="mx-auto d-block">
                                                                @else
                                                                    <img src="/storage/{{ $data->image }}" alt="bike"
                                                                        width="250" height="250" class="mx-auto d-block">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7 me-5">
                                                            <div class="main-modal">
                                                                <h5 class="fw-bold text-center">{{ $data->name }}</h5>
                                                                <div class="borrower mt-3">
                                                                    <h6 class="fw-bold text-center mt-3 mb-4">Tenant</h6>
                                                                    <div class="name-phone d-flex mt-3">
                                                                        <div class="one">
                                                                            <ul class="d-flex">
                                                                                <li>Name</li>
                                                                                <li id="valueName" class="ms-3 fw-bold none"
                                                                                    style="color: #A5A2F6">None</li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="two ms-5">
                                                                            <ul class="d-flex">
                                                                                <li>Phone</li>
                                                                                <li id="valuePhone"
                                                                                    class="ms-3 fw-bold none"
                                                                                    style="color: #A5A2F6">None</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="email mb-3" style="margin-top: -18px">
                                                                        <ul class="d-flex">
                                                                            <li>Email</li>
                                                                            <li id="valueEmail" class="ms-3 fw-bold none"
                                                                                style="color: #A5A2F6">None</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="loan" style="margin-top: -10px">
                                                                    <h6 class="fw-bold text-center mb-4">Rental Time
                                                                    </h6>
                                                                    <div class="date-time d-flex mt-3">
                                                                        <ul class="d-flex">
                                                                            <div class="one">
                                                                                <li>Delivery Date</li>
                                                                                <li>Return Date</li>
                                                                            </div>
                                                                            <div class="two">
                                                                                <li class="ms-3 fw-bold none"
                                                                                    style="color: #A5A2F6" id="valueDDate">
                                                                                    None</li>
                                                                                <li class="ms-3 fw-bold none"
                                                                                    style="color: #A5A2F6" id="valueRDate">
                                                                                    None</li>
                                                                            </div>
                                                                        </ul>
                                                                        <ul class="d-flex mb-3 ">
                                                                            <div class="one">
                                                                                <li>Delivery Time</li>
                                                                                <li>Return Time</li>
                                                                            </div>
                                                                            <div class="two">
                                                                                <li class="ms-3 fw-bold none"
                                                                                    style="color: #A5A2F6" id="valueDTime">
                                                                                    None</li>
                                                                                <li class="ms-3 fw-bold none"
                                                                                    style="color: #A5A2F6" id="valueRTime">
                                                                                    None</li>
                                                                            </div>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="location-at-to d-flex"
                                                                        style="margin-top: -18px">
                                                                        <ul>
                                                                            <li>Delivery Bike to</li>
                                                                            <li>Return Location</li>
                                                                        </ul>
                                                                        <ul>
                                                                            <li class="fw-bold none"
                                                                                style="color: #A5A2F6" id="valueDBike">None
                                                                            </li>
                                                                            <li class="fw-bold none"
                                                                                style="color: #A5A2F6" id="valueRBike">None
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <label class="form-label" for="myFile">Payment check - Bank Account - xxxxxxx</label>
                                                                    <div class="d-flex mb-3">
                                                                        {{-- <label class="form-label" for="myFile">Bukti Pembayaran</label> --}}
                                                                        <input type="file" id="myFile" name="bukti_tr" required>
                                                                    </div>

                                                                    {{-- <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                                                        </div>
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" name="bukti_tr" style="display: none" accept=".png, .jpeg, .jpg" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                                            <label class="custom-file-label" for="inputGroupFile01">Upload Bukti Pembayaran</label>
                                                                        </div>
                                                                    </div> --}}
                                                               
                                                                </div>
                                                                <hr style="margin-top: -5px">
                                                                <div
                                                                    class="buying d-flex align-items-center justify-content-end mb-3">
                                                                    <p style="margin:4px 10px 0 0; font-size:15px"
                                                                        class="fw-bold">Total Bayar</p>
                                                                    <div class="input-group" style="width: 40%">
                                                                        <span class="input-group-text" id="basic-addon1">Rp.
                                                                        </span>
                                                                        <input type="text" class="form-control"
                                                                            aria-label="Price" id="valueHarga"
                                                                            aria-describedby="basic-addon1" disabled>
                                                                        <input type="hidden" name="total_price"
                                                                            class="value-harga">
                                                                        <span style="color: #FF0000;" id="invalid"
                                                                            class="d-block"></span>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="text-center fw-bold mt-2" id="invalid-form-message"
                                                        style="color: #FF0000;">TOLONG LENGKAPI PENGISIAN FORM PEMINJAMAN
                                                        TERLEBIH DAHULU</p>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn modal-button-close"
                                                            data-bs-dismiss="modal"><b><i class="fas fa-window-close"></i>
                                                                Close</b></button>
                                                        <button type="submit" class="btn modal-button-booking"><b><i
                                                                    class="fas fa-tags"></i> Booking koknya</b></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-lg-6">
                                            <label for="inputName" class="form-label">Name</label>
                                            @if (!isset(auth()->user()->username))
                                                <input type="text" id="inputName" class="form-control" name="name">
                                            @else
                                                @if (auth()->user()->name == '')
                                                    <input type="text" id="inputName"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name">
                                                    @error('name')
                                                        <span style="color: #FF0000">{{ $message }}</span>
                                                    @enderror
                                                @else
                                                    <input type="text" id="inputName" value="{{ auth()->user()->name }}"
                                                        class="form-control" name="name" disabled>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="mb-1 col-lg-6">
                                            <label for="inputPhone" class="form-label">Phone Number</label>
                                            @if (!isset(auth()->user()->username))
                                                <input type="text" id="inputPhone" class="form-control" name="telpon">
                                            @else
                                                @if (auth()->user()->telpon == '')
                                                    <input type="text" id="inputPhone"
                                                        class="form-control @error('telpon') is-invalid @enderror"
                                                        name="telpon">
                                                    @error('telpon')
                                                        <span style="color: #FF0000">{{ $message }}</span>
                                                    @enderror
                                                @else
                                                    <input type="text" id="inputPhone"
                                                        value="{{ auth()->user()->telpon }}" class="form-control"
                                                        name="telpon" disabled>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <label for="inputEmail" class="form-label">Email Address</label>
                                        @if (!isset(auth()->user()->username))
                                            <input type="email" id="inputEmail" class="form-control" name="email">
                                        @else
                                            <input type="email" id="inputEmail" value="{{ auth()->user()->email }}"
                                                class="form-control" name="email" disabled>
                                        @endif
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Motorbike</label>
                                        <input type="text" id="inputMotor" class="form-control"
                                            value="{{ $data->name }}" disabled name="motor_name">
                                    </div>
                                    <div class="row mb-1">
                                        <div class="mb1 col-lg-6">
                                            <label for="deliveryDate" class="form-label">Delivery Date</label>
                                            <input type="date" id="deliveryDate"
                                                class="form-control @error('delivery_date') is-invalid @enderror"
                                                name="delivery_date">
                                            @error('delivery_date')
                                                <span style="color: #FF0000">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb1 col-lg-6">
                                            <label for="returnDate" class="form-label">Return Date</label>
                                            <input type="date" id="returnDate"
                                                class="form-control @error('return_date') is-invalid @enderror"
                                                name="return_date">
                                            @error('return_date')
                                                <span style="color: #FF0000">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb1 col-lg-6">
                                            <label for="deliveryTime" class="form-label">Delivery Time</label>
                                            <input type="time" id="deliveryTime" class="form-control "
                                                value="{{ $timeNow }}" disabled>
                                            <input type="hidden" name="delivery_time" class="form-control "
                                                value="{{ $timeNow }}">
                                        </div>
                                        <div class="mb1 col-lg-6">
                                            <label for="returnTime" class="form-label">Return Time</label>
                                            <input type="time" id="returnTime" class="form-control"
                                                value="{{ $timeNow }}" disabled>
                                            <input type="hidden" name="return_time" class="form-control "
                                                value="{{ $timeNow }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="deliverBike" class="form-label">Deliver Bikes to</label>
                                            <select id="deliverBike"
                                                class="form-control deliver-bike @error('delivery_bike') is-invalid @enderror"
                                                id="deliverBike" name="deliverBike" aria-label="Default select example"
                                                onchange="deliver(this.value)">
                                                <option value="">Select Location...</option>
                                                {{-- <option value="Galkarent Pemogan">Galkarent Pemogan</option>
                                                <option value="Galkarent Dalung">Galkarent Dalung</option> --}}
                                                <option value="Galkarent Kerobokan">Bali_motorent Kerobokan</option>
                                                {{-- <option value="Galkarent Kapal">Galkarent Kapal</option>
                                                <option value="Galkarent Mambal">Galkarent Mambal</option> --}}
                                                <option value="Custome">Custom</option>
                                            </select>
                                            @error('delivery_bike')
                                                <span id="invalidDelivery" style="color: #FF0000;">The delivery bike field is
                                                    required.</span>
                                            @enderror
                                        </div>

                                        {{-- <div class="col-lg-6" hidden>
                                            <label for="returnBike" class="form-label">Return Location</label>
                                            <select id="returnBike"
                                                class="form-control return-bike @error('return_bike') is-invalid @enderror"
                                                id="returnBike" name="returnBike" aria-label="Default select example"
                                                onchange="bikeReturn(this.value)">
                                                <option value="">Select Location...</option>
                                                <option value="Galkarent Pemogan">Galkarent Pemogan</option>
                                                <option value="Galkarent Dalung">Galkarent Dalung</option>
                                                <option value="Galkarent Kerobokan">Galkarent Kerobokan</option>
                                                <option value="Galkarent Kapal">Galkarent Kapal</option>
                                                <option value="Galkarent Mambal">Galkarent Mambal</option>
                                                <option value="Custome">Custom</option>
                                            </select>
                                            @error('return_bike')
                                                <span id="invalidReturn" style="color: #FF0000;">The return bike field is
                                                    required.</span>
                                            @enderror
                                        </div> --}}

                                        {{-- Hidden return_bike input (otomatis ikut delivery) --}}
                                        <input type="hidden" name="return_bike" id="hiddenReturnBike" value="">


                                    </div>
                                    <div class="mb-1" id="specificDeliver" style="display: none">
                                        <label for="deliverBike" class="form-label">Specific Location Deliver</label>
                                        <input type="text" id="deliverBike" class="form-control bike-deliver"
                                            name="delivery_bike" placeholder="Enter Location..." value="">
                                        {{-- @error('delivery_bike')
                                        <span id="invalidDelivery" style="color: #FF0000;">The delivery bike field is required.</span>
                                    @enderror --}}
                                    </div>
                                    <div class="mb-1" id="specificReturn" style="display: none;">
                                        <label for="returnBike" class="form-label">Specific Location Return</label>
                                        <input type="text" id="returnBike" class="form-control bike-return"
                                            name="return_bike" placeholder="Enter Location..." value="">
                                        {{-- @error('return_bike')
                                        <span id="invalidReturn" style="color: #FF0000;">The return bike  field is required.</span>
                                    @enderror --}}
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label class="form-label"><strong>Payment Method</strong></label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment_method" id="paymentCard" value="Card / QR / Wallet" required>
                                            <label class="form-check-label" for="paymentCard">
                                                <strong>Card / QR / Wallet</strong><br>
                                                <small class="text-muted">Pay securely using Credit/Debit Card, QRIS, or E-Wallet.<br>
                                                (Visa, MasterCard, GoPay, OVO, DANA, ShopeePay)</small>
                                            </label>
                                        </div>

                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="payment_method" id="paymentPayPal" value="PayPal">
                                            <label class="form-check-label" for="paymentPayPal">
                                                <strong>PayPal</strong><br>
                                                <small class="text-muted">Pay easily using your PayPal account.</small>
                                            </label>
                                        </div>

                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="payment_method" id="paymentPayPal" value="Manual Transfer">
                                            <label class="form-check-label" for="paymentManualTransfer">
                                                <strong>Manual Transfer</strong><br>
                                                <small class="text-muted">Manual transfer to our bank account</small>
                                            </label>
                                        </div>

                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="payment_method" id="paymentCash" value="Pay on Location (Cash)">
                                            <label class="form-check-label" for="paymentCash">
                                                <strong>Pay on Location (Cash)</strong><br>
                                                <small class="text-muted">Pay directly at our rental office upon pickup.</small>
                                            </label>
                                        </div>
                                    </div>

                                    <input type="text" hidden value="{{ $data->price }}" id="inputPrice">
                                    @if (!isset(auth()->user()->username))
                                        <a href="/signin" class="btn booking-button mt-2">
                                            Booking Now
                                        </a>
                                    @else
                                        <button type="button" id="buttonModal" class="btn booking-button mt-2"
                                            data-bs-toggle="modal" data-bs-target="#bookingModal{{ $data->id }}">
                                            Booking Now
                                        </button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal final booking-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>

    {{-- JS otomatis set return_bike sama dengan delivery_bike --}}
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const deliverSelect = document.getElementById('deliverBike');
        const deliverInput = document.querySelector('.bike-deliver'); // input teks custom
        const returnSelect = document.getElementById('returnBike');
        const returnInput = document.querySelector('.bike-return');

        // Sinkronisasi lokasi return dengan delivery
        if (deliverSelect) {
            deliverSelect.addEventListener('change', function () {
                if (this.value !== 'Custome') {
                    returnSelect.value = this.value;
                    if (returnInput) returnInput.value = this.value;
                }
            });
        }

        // Kalau user pilih custom dan mulai ketik lokasi
        if (deliverInput) {
            deliverInput.addEventListener('input', function() {
                // Update isi dropdown aslinya (agar modal ambil dari sini)
                const deliverDropdown = document.querySelector('.deliver-bike');
                if (deliverDropdown) deliverDropdown.setAttribute('value', this.value);
                
                // Sekaligus samakan lokasi return
                if (returnInput) returnInput.value = this.value;
                if (returnSelect) returnSelect.value = 'Custome';
            });
        }
    });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
        const buktiSection = document.querySelector('#myFile')?.closest('div.mb-3, div.d-flex.mb-3, label.form-label') 
            ? document.querySelector('#myFile').parentElement.parentElement 
            : null;

        const labelBukti = document.querySelector('label[for="myFile"]');
        const inputBukti = document.querySelector('#myFile');

        // Awal: sembunyikan section bukti transfer
        if (labelBukti && inputBukti) {
            labelBukti.style.display = 'none';
            inputBukti.style.display = 'none';
            inputBukti.removeAttribute('required');
        }

        paymentMethods.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.value === 'Manual Transfer') {
                    // Jika user pilih Manual Transfer, tampilkan input bukti
                    labelBukti.style.display = 'block';
                    inputBukti.style.display = 'block';
                    inputBukti.setAttribute('required', true);
                } else {
                    // Kalau bukan Manual Transfer, sembunyikan input bukti
                    labelBukti.style.display = 'none';
                    inputBukti.style.display = 'none';
                    inputBukti.removeAttribute('required');
                }
            });
        });
    });
    </script>

    <script src="../js/booking.js"></script>
@endsection
