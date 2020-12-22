<!DOCTYPE html>
<html>
<title>Iniciar Sesión</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link rel="preconnect" href="https://fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="shortcut icon" href="favicon.ico">

<style>
    body{
        background-color: black!important;
        color: white;
        font-family: 'Poppins', sans-serif;
    }
    
    .div1{
        display: flex;
        justify-content: center;
        margin-top: 80px;    
    }
    
    .div1-1{
        font-size: 150px;
    }

    .msg-error{
        display: none;
        text-align: center;
    }

    .msg-error small {
        color: red;
    }
</style>

<body class="text-center">
    
    <!----------------------------------- SIDEBAR ------------------------------------->
    
       
    <div class="div1-1">
       Inicia Sesión
   </div>
<div class="div1">
    <form action="php/login.php" method="post" style=" text-align:center; width: 450px;" autocomplete="off">
		<p>
			Usuario: <input name="cuenta" id="inpCuenta" class="form-control form-control-sm" type="text" required value="<?php if(isset($_COOKIE["recordarContra"])){ echo $_COOKIE["recordUsuario"]; } ?>">
        </p>
        <p class="msg-error ">
            <small class="msg-error-p mb-5">Este es un error jajajaja</small>
        </p>
		<p class="mt-2">
			Contraseña: <input name="password" id="inpPass" class="form-control form-control-sm" type="password" required value="<?php if(isset($_COOKIE["recordarContra"])){ echo $_COOKIE["recordContra"]; } ?>">
        </p>
        <p class="msg-error">
            <small class="msg-error-p">Este es un error jajajaja</small><br>
        </p>
        <p class="mt-2">
            <input type="checkbox" id="check" name="cookie" class="form-control form-control-sm mb-3"> <small>Recordar contraseña</small>
        </p>
		<div class="form-group mt-2">
		  <button type="submit" class="btn btn-primary btn-block" id="submit">Iniciar Sesión</button>
		 </div>
    </form>
</div>
<div>
    <a href="javascript:history.go(-1)">Regresar</a>
</div>

<!-- Script de validación para login -->
<script src="./js/validaLogin.js"></script>

</body>
</html>