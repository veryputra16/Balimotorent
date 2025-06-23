const clicklogin = document.getElementById("click-login");
const clickregister = document.getElementById("click-register");
const slideclick = document.getElementById('slide-click');
const itemclicklogin = document.getElementById("item-click-login");
const itemclickregister = document.getElementById("item-click-register");
const formbody = document.getElementById("form-body");
const formlogin = document.getElementById("login");
const formregister  = document.getElementById("register");
const buttonregister = document.getElementById("button-register");


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

buttonregister.addEventListener('click', function(){
    formbody.style.marginLeft = '0%';
    itemclickregister.style.backgroundColor = '#E0E0E0';
    itemclicklogin.style.backgroundColor = 'white';
})