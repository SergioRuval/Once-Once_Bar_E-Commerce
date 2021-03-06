const inputCuenta = document.getElementById("inpCuenta");
const inputPass = document.getElementById("inpPass");
const inputIntentos = document.getElementById("intentos");
const btnSumbit = document.getElementById("submit");

var cuentaCorrecta = false;
var passCorrecta = false;
var cuentaBloqueada = false;

var intentos = 1;

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

inputCuenta.addEventListener('blur', function(){

    let cuenta = inputCuenta.value;

    const url = 'AJAX/comprobarCuenta.php';
    let http =  new XMLHttpRequest();
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(`cuenta=${cuenta}`);

    http.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "existe"){
                cuentaCorrecta = true;
            }else if(this.responseText == "bloqueada"){
                cuentaCorrecta = false;
                cuentaBloqueada = true;
                inputCuenta.style.color = "red";
                document.getElementsByClassName("msg-error")[0].style.display = "contents";
                document.getElementsByClassName("msg-error-p")[0].innerText = "Su cuenta está bloqueada, cambie su contraseña para recuperarla";
                inputCuenta.setCustomValidity("Cuenta bloqueada");
            }else{
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
                passCorrecta = true;
            }else if(this.responseText == "incorrecta"){
                passCorrecta = false;
            }else{
                passCorrecta = false;
            }
        }
    }

    console.log(inputPass.value);
});



btnSumbit.addEventListener('click', function (event){
    if(!cuentaCorrecta || !passCorrecta && intentos <= 3){
        event.preventDefault();
        if(!cuentaCorrecta){
            if(!cuentaBloqueada){
                inputCuenta.style.color = "red";
                document.getElementsByClassName("msg-error")[0].style.display = "contents";
                document.getElementsByClassName("msg-error-p")[0].innerText = "La cuenta no está registrada";
                inputCuenta.setCustomValidity("Cuenta no registrada");
            }else{
                inputCuenta.style.color = "red";
                document.getElementsByClassName("msg-error-p")[0].style.fontSize = "x-large";
                document.getElementsByClassName("msg-error")[0].style.display = "contents";
                document.getElementsByClassName("msg-error-p")[0].innerText = "¡Su cuenta está bloqueada, cambie su contraseña para recuperarla!";
                inputCuenta.setCustomValidity("Cuenta bloqueada");
            }
        }else{
            inputCuenta.style.color = "black";
            document.getElementsByClassName("msg-error")[0].style.display = "none";
            inputCuenta.setCustomValidity("");
        }
        if(!passCorrecta){
            console.log("Debería entrar aquí");
            inputPass.style.color = "red";
            document.getElementsByClassName("msg-error")[1].style.display = "contents";
            document.getElementsByClassName("msg-error-p")[1].innerText = "La contraseña es incorrecta";
            inputPass.setCustomValidity('Contraseña incorrecta');
            intentos++;
        }else{
            inputPass.style.color = "black";
            document.getElementsByClassName("msg-error")[1].style.display = "none";
            inputPass.setCustomValidity('');
        }
    }else if(intentos > 3){
        inputIntentos.value = "bloquear";
        inputPass.setCustomValidity("");
        console.log("Bloqueada");
    }
});