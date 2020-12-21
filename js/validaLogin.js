const inputCuenta = document.getElementById("inpCuenta");
const inputPass = document.getElementById("inpPass");

inputCuenta.addEventListener('input', function (event){
    let regExp = /^[a-zA-ZÁ-ÿ0-9]{6,20}$/;

    if(inputCuenta.value.length < 6 || inputCuenta.value.length > 20){
        inputCuenta.style.color = "red";
        document.getElementsByClassName("msg-error")[0].style.display = "contents";
        document.getElementsByClassName("msg-error-p")[0].innerText = "Mínimo 6 y máximo 20 caracteres";
        inputCuenta.setCustomValidity("Tamaño de cuenta no valido");
    }else{
        inputCuenta.style.color = "black";
        document.getElementsByClassName("msg-error")[0].style.display = "none";
        inputCuenta.setCustomValidity("");
    }
});

inputPass.addEventListener('input', function (event){
    

    if( inputPass.value.length < 6 || inputPass.value.length > 16 ){
        inputPass.style.color = "red";
        document.getElementsByClassName("msg-error")[1].style.display = "contents";
        document.getElementsByClassName("msg-error-p")[1].innerText = "La contraseña debe estar entre 6 y 16 caracteres";
        inputPass.setCustomValidity('Contraseña corta');
    }else{
        inputPass.style.color = "black";
        document.getElementsByClassName("msg-error")[1].style.display = "none";
        inputPass.setCustomValidity('');
    }
});