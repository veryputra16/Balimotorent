const clicklogin = document.getElementById("click-login");
const clickregister = document.getElementById("click-register");
const slideclick = document.getElementById('slide-click');
const itemclicklogin = document.getElementById("item-click-login");
const itemclickregister = document.getElementById("item-click-register");
const formbody = document.getElementById("form-body");
const formlogin = document.getElementById("login");
const formregister  = document.getElementById("register");
const buttonregister = document.getElementById("button-register");
const register = document.getElementById('register-body');
const login = document.getElementById('login-body');
const animateDisbaled = document.querySelector('.wrapper');
const animateDisbaled2 = document.getElementById('title-form');
const loginHref = document.getElementById('loginHref');

const closeButton = document.getElementById('closeButton');
const modal = document.getElementById('modal');

const buttonError = document.getElementById('closeButtonError');
const error = document.getElementById('error');

clicklogin.addEventListener("click", function(){
    itemclicklogin.style.backgroundColor = 'white';
    itemclickregister.style.backgroundColor = '#E0E0E0';
    formbody.style.marginLeft = '0%';
    history.pushState(null, "", "?mode=login"); // Update URL without reloading
});

clickregister.addEventListener("click", function(){
    itemclickregister.style.backgroundColor = 'white';
    itemclicklogin.style.backgroundColor = '#E0E0E0';
    formbody.style.marginLeft = '-109%';
    history.pushState(null, "", "?mode=register"); // Update URL without reloading
});

loginHref.addEventListener("click", function(){
    itemclicklogin.style.backgroundColor = 'white';
    itemclickregister.style.backgroundColor = '#E0E0E0';
    formbody.style.marginLeft = '0%';
});

// register.addEventListener('load', function() {
//     animateDisbaled.classList.remove('animate__animated')
// })

closeButton.addEventListener("click", function(){
    modal.style.display = 'none';
});

// === BACA MODE DARI URL SAAT PAGE LOAD ===
document.addEventListener("DOMContentLoaded", function() {
    const params = new URLSearchParams(window.location.search);
    const mode = params.get("mode");

    if (mode === "register") {
        // tampilkan form register
        itemclickregister.style.backgroundColor = 'white';
        itemclicklogin.style.backgroundColor = '#E0E0E0';
        formbody.style.marginLeft = '-109%';
    } else {
        // tampilkan form login
        itemclicklogin.style.backgroundColor = 'white';
        itemclickregister.style.backgroundColor = '#E0E0E0';
        formbody.style.marginLeft = '0%';
    }
});