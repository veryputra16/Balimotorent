
const valueName = document.getElementById('valueName');
const valuePhone = document.getElementById('valuePhone') 
const valueEmail = document.getElementById('valueEmail') 
const valueDDate = document.getElementById('valueDDate') 
const valueRDate = document.getElementById('valueRDate') 
const valueDTime = document.getElementById('valueDTime') 
const valueRTime = document.getElementById('valueRTime')
const valueDBike = document.getElementById('valueDBike') 
const valueRBike = document.getElementById('valueRBike')

const deliverBike = document.getElementById('deliverBike');


const buttonModal = document.getElementById('buttonModal');

buttonModal.addEventListener('click', function(){
    const inputName = document.getElementById('inputName').value;
    const inputPhone = document.getElementById('inputPhone').value;
    const inputEmail = document.getElementById('inputEmail').value;
    const deliveryDate = document.getElementById('deliveryDate').value;
    const returnDate = document.getElementById('returnDate').value;
    const deliveryTime = document.getElementById('deliveryTime').value;
    const returnTime = document.getElementById('returnTime').value;
    const deliverBike = document.getElementById('deliverBike').value;
    const returnBike = document.getElementById('deliverBike').value; // lokasi kirim = dengan lokasi kembali
    const inputPrice = document.getElementById('inputPrice').value;
    const valueHarga = document.getElementById('valueHarga')
    const invalid = document.getElementById('invalid')
    const label = document.getElementById('basic-addon1')
    
    if (inputName == ""){
        valueName.innerHTML = "None";
    }else{
        valueName.innerHTML = inputName;
    }
    if (inputPhone == ""){
        valuePhone.innerHTML = "None";
    }else{
        valuePhone.innerHTML = inputPhone;
    }
    if (inputEmail == ""){
        valueEmail.innerHTML = "None";
    }else{
        valueEmail.innerHTML = inputEmail;
    }
    if (deliveryDate == ""){
        valueDDate.innerHTML = "None";
    }else{
        valueDDate.innerHTML = deliveryDate;
    }
    if (returnDate == ""){
        valueRDate.innerHTML = "None";
    }else{
        valueRDate.innerHTML = returnDate;
    }
    if (deliveryTime == ""){
        valueDTime.innerHTML = "None";
    }else{
        valueDTime.innerHTML = deliveryTime;
    }
    if (returnTime == ""){
        valueRTime.innerHTML = "None";
    }else{
        valueRTime.innerHTML = returnTime;
    }

    const millionday = 24 * 60 * 60 * 1000;
    const dateNow = new Date(deliveryDate);
    const dateSet = new Date(returnDate);
    const dates = new Date();
    dates.setDate(dates.getDate() - 1);

    if(returnDate == ""){
        valueHarga.value = "0";
        valueHarga.style.border = "1px solid #FF0000";
        label.style.border = "1px solid #FF0000";
        invalid.innerHTML = "Please, return date";
    }else if(dateNow <= dates){
        valueHarga.value = "0";
        valueHarga.style.border = "1px solid #FF0000";
        label.style.border = "1px solid #FF0000";
        invalid.innerHTML = "Please, delivery date after date now";
    }else if(dateSet <= dateNow){
        valueHarga.value = "0";
        valueHarga.style.border = "1px solid #FF0000";
        label.style.border = "1px solid #FF0000";
        invalid.innerHTML = "Please, return date after delevery date";
    } else{
        const totalHarga = ((dateSet - dateNow) / millionday) * inputPrice;
        const harga = totalHarga.toLocaleString('id-ID');  
        valueHarga.value = harga;
        document.querySelector('.value-harga').setAttribute('value', totalHarga);
        valueHarga.style.border = "1px solid #000";
        label.style.border = "1px solid #000";
        invalid.innerHTML = "";
    }

    if (deliverBike == ""){
        valueDBike.innerHTML = "None";
    }else{
        valueDBike.innerHTML = deliverBike;
    }   

    if (returnBike == ""){
        valueRBike.innerHTML = "None";
    }else{
        valueRBike.innerHTML = returnBike;
    }

    if(inputName != "" &&
        inputEmail != "" &&
        inputPhone != "" &&
        deliveryDate != "" &&
        returnDate != "" &&
        deliveryTime != "" &&
        returnTime != "" &&
        deliverBike != "" &&
        returnBike != ""){
            document.getElementById('invalid-form-message').style.display = "none"
            document.querySelector('.modal-button-booking').removeAttribute('disabled')
            if(dateNow <= dates){
                document.querySelector('.modal-button-booking').setAttribute('disabled', true)
            }else if(dateSet <= dateNow){
                document.querySelector('.modal-button-booking').setAttribute('disabled', true)
            } else{
                document.querySelector('.modal-button-booking').removeAttribute('disabled')
            }
        } else{
            document.querySelector('.modal-button-booking').setAttribute('disabled', true)
            document.getElementById('invalid-form-message').style.display = "block"
        }
});


function deliver(val){
    if(val == 'Custome'){
        document.getElementById('specificDeliver').style.display = 'block'
        document.getElementById('deliverBike').removeAttribute("name");
        document.getElementById('deliverBike').removeAttribute("id");
        document.querySelector('.bike-deliver').setAttribute("value", "");
    } else{
        document.getElementById('specificDeliver').style.display = 'none'
        document.querySelector('.deliver-bike').setAttribute("name", "delivery_bike");
        document.querySelector('.deliver-bike').setAttribute("id", "deliverBike");
        document.querySelector('.bike-deliver').setAttribute("value", val);
    }
}

// function bikeReturn(val){
//     if(val == 'Custome'){
//         document.getElementById('specificReturn').style.display = 'block';
//         document.getElementById('returnBike').removeAttribute("name");
//         document.getElementById('returnBike').removeAttribute("id");
//         document.querySelector('.bike-return').setAttribute("value", "");
//     } else{
//         document.getElementById('specificReturn').style.display = 'none';
//         document.querySelector('.return-bike').setAttribute("name", "return_bike");
//         document.querySelector('.return-bike').setAttribute("id", "returnBike");
//         document.querySelector('.bike-return').setAttribute("value", val);
//     }
// }

// Validate minimum rent 2 days with SweetAlert2
document.addEventListener("DOMContentLoaded", function () {
    const deliveryDate = document.getElementById("deliveryDate");
    const returnDate = document.getElementById("returnDate");
    const bookButton = document.getElementById("buttonModal");
    const invalidMessage = document.getElementById("invalid");
    const invalidFormMessage = document.getElementById("invalid-form-message");

    function checkDateDifference() {
        const dDate = new Date(deliveryDate.value);
        const rDate = new Date(returnDate.value);

        if (!deliveryDate.value || !returnDate.value) {
            return;
        }

        const diffTime = rDate - dDate;
        const diffDays = diffTime / (1000 * 60 * 60 * 24);

        if (diffDays < 2) {
            // tampilkan notifikasi popup
            Swal.fire({
                icon: "warning",
                title: "Durasi sewa terlalu pendek!",
                text: "Minimal lama sewa adalah 2 hari.",
                confirmButtonText: "Oke, ubah tanggal",
            }).then(() => {
                returnDate.value = ""; // reset input return date
                invalidMessage.textContent = "Minimal sewa adalah 2 hari!";
                invalidFormMessage.style.display = "block";
                invalidFormMessage.textContent = "⚠️ Lama sewa minimal 2 hari!";
                bookButton.disabled = true;
            });
        } else {
            invalidMessage.textContent = "";
            invalidFormMessage.style.display = "none";
            bookButton.disabled = false;
        }
    }

    returnDate.addEventListener("change", checkDateDifference);
});

// function invalidMessage(){
//     const valueDeliverBike = document.querySelector('.bike-deliver').value;
//     const valueReturnBike = document.querySelector('.bike-return').value;
    
//     if(valueDeliverBike == ""){
//         document.getElementById('invalidDelivery').style.display = 'block'
//     }
// }

document.getElementById('closeButton').addEventListener("click", function(){
    modal.style.display = 'none';
    document.getElementById('body').removeAttribute('class');
    document.getElementById('body').removeAttribute('style');
    document.querySelector('.modal').removeAttribute('tabindex');
    document.querySelector('.modal').removeAttribute('style');
    document.querySelector('.modal').removeAttribute('aria-modal');
    document.querySelector('.modal').removeAttribute('role');
    document.getElementById('modal-backdrop').removeAttribute('class');
});