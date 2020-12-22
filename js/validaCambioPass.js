const inputCuenta = document.getElementById("cuenta");
const inputPass = document.getElementById("nueva");
const inputConfPass = document.getElementById("confNueva");
const btnSumbit = document.getElementById("submit");

var cuentaCorrecta = false;
var passCorrecta = true;

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
    let regExp = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$/; // Expresión regular para la contraseña

    if( inputPass.value.length < 6 || inputPass.value.length > 16 ){
        inputPass.style.color = "red";
        document.getElementsByClassName("msg-error")[1].style.display = "contents";
        document.getElementsByClassName("msg-error-p")[1].innerText = "Mínimo 6 y máximo 16 caracteres";
        inputPass.setCustomValidity('Contraseña corta');
    }else if(!regExp.test(inputPass.value)){
        inputPass.style.color = "red";
        document.getElementsByClassName("msg-error")[1].style.display = "contents";
        document.getElementsByClassName("msg-error-p")[1].innerText = "Debe haber al menos: un dígito, una minúscula y una mayúscula.";
        inputPass.setCustomValidity('Caracteres no permitidos');
    }else{
        inputPass.style.color = "black";
        document.getElementsByClassName("msg-error")[1].style.display = "none";
        inputPass.setCustomValidity('');
    }
});

inputConfPass.addEventListener('input', function (event){
    if( inputConfPass.value != inputPass.value ){
        inputConfPass.style.color = "red";
        document.getElementsByClassName("msg-error")[2].style.display = "contents";
        document.getElementsByClassName("msg-error-p")[2].innerText = "Las contraseñas no coinciden";
        inputConfPass.setCustomValidity("Contraseña no es igual a la original");
    }else{
        inputConfPass.style.color = "black";
        document.getElementsByClassName("msg-error")[2].style.display = "none";
        inputConfPass.setCustomValidity("");
    }
});

inputCuenta.addEventListener('blur', function(){

    let cuenta = inputCuenta.value;

    const url = 'AJAX/comprobarCuenta.php';
    let http =  new XMLHttpRequest();
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(`cuenta=${cuenta}`);

    http.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "existe" || this.responseText == "bloqueada"){
                cuentaCorrecta = true;
                console.log("La cuenta existe");
            }else {
                cuentaCorrecta = false;
            }
        }
    }
});

inputPass.addEventListener('blur', function(event){
    let pass = inputPass.value;
    let cuenta = inputCuenta.value;

    const url = 'AJAX/comprobarPassword.php';
    let http = new XMLHttpRequest();
    http.open("POST", url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(`cuenta=${cuenta}&pass=${pass}`);

    http.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "correcta"){
                passCorrecta = false;
            }else if(this.responseText == "incorrecta"){
                passCorrecta = true;
            }else{
                passCorrecta = false;
            }
        }
    }

    console.log(inputPass.value);
});

btnSumbit.addEventListener('click', function (event){
    if(!cuentaCorrecta || !passCorrecta){
        event.preventDefault();
        if(!cuentaCorrecta){
            inputCuenta.style.color = "red";
                document.getElementsByClassName("msg-error")[0].style.display = "contents";
                document.getElementsByClassName("msg-error-p")[0].innerText = "La cuenta no está registrada";
                inputCuenta.setCustomValidity("Cuenta no registrada");
        }else{
            inputCuenta.style.color = "black";
            document.getElementsByClassName("msg-error")[0].style.display = "none";
            inputCuenta.setCustomValidity("");
        }
        if(!passCorrecta){
            console.log("Debería entrar aquí");
            inputPass.style.color = "red";
            document.getElementsByClassName("msg-error")[1].style.display = "contents";
            document.getElementsByClassName("msg-error-p")[1].innerText = "No se puede ingresar una contraseña anterior";
            inputPass.setCustomValidity('Contraseña incorrecta');
        }else{
            inputPass.style.color = "black";
            document.getElementsByClassName("msg-error")[1].style.display = "none";
            inputPass.setCustomValidity('');
        }
    }
});