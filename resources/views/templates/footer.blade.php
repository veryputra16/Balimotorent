@if (isset($data->name))
    <link rel="stylesheet" href="../css/footer.css">
@else
    <link rel="stylesheet" href="css/footer.css">
@endif

@if (isset($user->username))
    <link rel="stylesheet" href="../../css/footer.css">
@else
    <link rel="stylesheet" href="css/footer.css">
@endif  

<footer class="footer mt-5">
    <div class="container confooter">
        <div class="row">
            <div class="footer-item1 col-md-7 col-lg-8">
                <div class="footer-list1">
                    <h6 style="color: black;">STAY IN <div style="display: inline-block; color:#5c57f5;">Galka</div><div style="display: inline-block;">Rent</div></h5>
                        <div class="social-links mt-3">
                            <a href="https://www.instagram.com/galangkauhrental_bali/"><i style="color:#908cf7;" class='fab fa-instagram '></i></a>
                            <a href="https://twitter.com/Galkarent"><i style="color:#908cf7;" class='fab fa-twitter ' ></i></a>
                            <a href="https://www.facebook.com/people/Galka-Rental/100078040597072/"><i style="color:#908cf7;" class='fab fa-facebook' ></i></a>
                        </div>
                    <ul style="margin-left: -30px;">
                        <li>Questions? Please write us at : <a href="mailto:veryputra28@gmail.com">infogalka@gmail.com</a></li>
                        <li>Call our customer service : <a href="https://wa.me/+6285953929150?text=Hello%20GalkaRental%20Bali!">(+62)8595-3929-150</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-item2 col-md-5 col-lg-4">
                <div class="footer-list2">
                    <h6 style="color: black;">INFO</h5>
                    <ul>
                        <div class="info1 mt-4 me-5" style="display: inline-block; margin-left:-30px;">
                            <li><a class="strip" href="/how-to-rent" >How To Rent Bike</a></li>
                            <li><a class="strip" href="/about">Galka Rental Bali</a></li>
                        </div>
                        <div class="info2 ms-5" style="display: inline-block">
                            <li><a class="strip" href="/contact">Contact</a></li>
                        </div>
                    </ul>
                </div>
            </div>
            
            <hr class="mt-4">
            <div class="footer-bot mt-3">
                Galang Kangin Rental Bali &copy; 2030 || Design by STIKOMERS
            </div>

        </div>
    </div>
</footer>