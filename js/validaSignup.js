const inputNombre = document.getElementById("inpNombre");
const inputEmail = document.getElementById("inpEmail");
const inputCuenta = document.getElementById("inpCuenta");
const inputPass = document.getElementById("inpPass");
const inputConfPass = document.getElementById("inpConfPass");

const botonSubmit = document.getElementById("submit");

inputNombre.addEventListener('input', function (event){
    let regExp = /^[a-zA-ZÁ-ÿ\s]{3,50}$/;

    console.log(regExp.test(inputNombre.value));
    console.log(inputNombre.value);

    if(inputNombre.value.length <= 3){
        inputNombre.style.color = "red";
        document.getElementsByClassName("msg-error")[0].style.display = "contents";
        document.getElementsByClassName("msg-error-p")[0].innerText = "El nombre debe tener más de 3 caracteres";
        inputNombre.setCustomValidity("Tamaño inválido para nombre");
    }else if(!regExp.test(inputNombre.value)){
        inputNombre.style.color = "red";
        document.getElementsByClassName("msg-error")[0].style.display = "contents";
        document.getElementsByClassName("msg-error-p")[0].innerText = "No se permiten caracteres especiales ni números";
        inputNombre.setCustomValidity("Caracteres no validos en nombre");
    }else{
        inputNombre.style.color = "black";
        document.getElementsByClassName("msg-error")[0].style.display = "none";
        inputNombre.setCustomValidity("");
    }
});

inputEmail.addEventListener('input', function (event){
    let regExp = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;

    if(!regExp.test(inputEmail.value)){
        inputEmail.style.color = "red";
        document.getElementsByClassName("msg-error")[1].style.display = "contents";
        document.getElementsByClassName("msg-error-p")[1].innerText = "Correo electrónico no válido";
        inputEmail.setCustomValidity("Formato no correspondiente a email");
    }else{
        inputEmail.style.color = "black";
        document.getElementsByClassName("msg-error")[1].style.display = "none";
        inputEmail.setCustomValidity("");
    }
});

inputCuenta.addEventListener('input', function (event){
    let regExp = /^[a-zA-ZÁ-ÿ0-9]{6,20}$/;


    if(/^[\s]$/.test(inputCuenta.value)){
        inputCuenta.style.color = "red";
        document.getElementsByClassName("msg-error")[2].style.display = "contents";
        document.getElementsByClassName("msg-error-p")[2].innerText = "Espacios no permitidos en nombre de cuenta";
        inputCuenta.setCustomValidity("No se pueden incluir espacios en blanco");
    }else if(inputCuenta.value.length < 6 || inputCuenta.value.length > 20){
        inputCuenta.style.color = "red";
        document.getElementsByClassName("msg-error")[2].style.display = "contents";
        document.getElementsByClassName("msg-error-p")[2].innerText = "Mínimo 6 y máximo 20 caracteres";
        inputCuenta.setCustomValidity("Tamaño de cuenta no valido");
    }else if(!regExp.test(inputCuenta.value)){
        inputCuenta.style.color = "red";
        document.getElementsByClassName("msg-error")[2].style.display = "contents";
        document.getElementsByClassName("msg-error-p")[2].innerText = "Caracteres no válidos en el nombre de cuenta";
        inputCuenta.setCustomValidity("Caracteres no validos en la cuenta");
    }else{
        inputCuenta.style.color = "black";
        document.getElementsByClassName("msg-error")[2].style.display = "none";
        inputCuenta.setCustomValidity("");
    }
});

inputPass.addEventListener('input', function (event){
    let regExp = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$/; // Expresión regular para la contraseña

    if( inputPass.value.length < 6 || inputPass.value.length > 16 ){
        inputPass.style.color = "red";
        document.getElementsByClassName("msg-error")[3].style.display = "contents";
        document.getElementsByClassName("msg-error-p")[3].innerText = "Mínimo 6 y máximo 16 caracteres";
        inputPass.setCustomValidity('Contraseña corta');
    }else if(!regExp.test(inputPass.value)){
        inputPass.style.color = "red";
        document.getElementsByClassName("msg-error")[3].style.display = "contents";
        document.getElementsByClassName("msg-error-p")[3].innerText = "Debe haber al menos: un dígito, una minúscula y una mayúscula.";
        inputPass.setCustomValidity('Caracteres no permitidos');
    }else{
        inputPass.style.color = "black";
        document.getElementsByClassName("msg-error")[3].style.display = "none";
        inputPass.setCustomValidity('');
    }
});

inputConfPass.addEventListener('input', function (event){
    if( inputConfPass.value != inputPass.value ){
        inputConfPass.style.color = "red";
        document.getElementsByClassName("msg-error")[4].style.display = "contents";
        document.getElementsByClassName("msg-error-p")[4].innerText = "Las contraseñas no coinciden";
        inputConfPass.setCustomValidity("Contraseña no es igual a la original");
    }else{
        inputConfPass.style.color = "black";
        document.getElementsByClassName("msg-error")[4].style.display = "none";
        inputConfPass.setCustomValidity("");
    }
});