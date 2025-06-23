
const inputImage = document.getElementById('inputImage');
const imageView = document.getElementById('imageView');
const setImage = imageView.querySelector('.image-view');

inputImage.addEventListener("change", function(){
    const file = this.files[0];

    if(file){
        const reader = new FileReader()
        
        reader.addEventListener("load", function(){
            setImage.setAttribute("src", this.result);
        });

        reader.readAsDataURL(file);
    }else{
        setImage.setAttribute("src", "../../img/user/UserProfile.png");
    }
})