@extends('layouts.main')

<link rel="stylesheet" href="css/how-to-rent.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


@section('body')

<div class="wrap-content mt-5">
    <div class="content ">
        <div class="title-content text-center">
            <h4 class="fw-bold">GALANG KAUH RENTAL</h4>
            <h6>Motorbike rental in Bali</h6>
        </div>
        <div class="body-content">
            <div class="requirements">
                <ul>
                    <h5>Rental Requirements</h5>
                    <li>1. ID Photo (KTP/Passport).</li>
                    <li>2. SIM C Photo.</li>
                    <li>3. Flights Ticket Photo or Format.</li>
                    <li>4. Hotel Reservation Photo or Format.</li>
                    <li>5. 2 Days Rent Durations Minimal.</li>
                </ul>
                
            </div>
            <div class="how-to-rent">
                <ul>
                    <h5>How To Rent</h5>
                    <li>1. The payment method is using transfer to our bank account</li>
                    <li>2. Fill in the rental form that we provide on the booking page.</li>
                    <li>3. Send your photos of ID Cards, Sim C, Hotel reservation and Airline Tickets as a rental condition.</li>
                    <li>4. The scooters can be used around Bali island.</li>
                    <li>5. Guests get facilities for like a helmets and a raincoat.</li>
                    <li>6. Free delivery to badung regency area.</li>
                    <li>7. Better to make a reservation before the day, so there are no delays on scooter delivery.</li>
                    <li>8. We accept customer criticism and suggestions as better improvements in the future.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="contact animate__animated animate__zoomIn">
    <div class="content text-center text-white">
        <h5>Have another questions about us?</h5>
        <h4 class="fw-bold pt-2 pb-2">MESSAGE US ON WHATSAPP</h4>
        <div class="button" id="button-5">
            <div id="translate"></div>
            <a href="https://wa.me/+6285953929150"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/5161569612.js" crossorigin="anonymous"></script>

@endsection