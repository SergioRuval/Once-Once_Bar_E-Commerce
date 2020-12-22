const inputCuenta = document.getElementById("inpCuenta");
const inputPass = document.getElementById("inpPass");
const btnSumbit = document.getElementById("submit");

var cuentaCorrecta = false;
var passCorrecta = false;

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
    console.log("Entra");

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
                console.log("cuenta incorrecta");
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
    http.send(`contra=${cuenta}&pass=${pass}`);

    http.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "correcto"){
                passCorrecta = true;
            }else{
                passCorrecta = false;
            }
        }
    }

    console.log(inputPass.value);
});



btnSumbit.addEventListener('click', function (event){
    if(!cuentaCorrecta && !passCorrecta){
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
        if(!cuentaCorrecta){
            inputPass.style.color = "red";
            document.getElementsByClassName("msg-error")[1].style.display = "contents";
            document.getElementsByClassName("msg-error-p")[1].innerText = "La contraseña es incorrecta";
            inputPass.setCustomValidity('Contraseña incorrecta');
        }else{
            inputPass.style.color = "black";
            document.getElementsByClassName("msg-error")[1].style.display = "none";
            inputPass.setCustomValidity('');
        }
        if(document.getElementById("check")){
            
        }
    }
});