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
});

clickregister.addEventListener("click", function(){
    itemclickregister.style.backgroundColor = 'white';
    itemclicklogin.style.backgroundColor = '#E0E0E0';
    formbody.style.marginLeft = '-109%';
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