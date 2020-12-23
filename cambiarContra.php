<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='icon' href='images/favicon.ico' type='image/x-icon'>
    <title>Cambiar Contraseña</title>
    
<<<<<<< HEAD
    <link rel="stylesheet" href="cambiarcontra.css">
=======
    <link rel="stylesheet" href="css/cambiarcontra.css">
>>>>>>> 7529ccf25e21034d7dd455c5be856c6058c2c372
    <script src="https://kit.fontawesome.com/25f85f35ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel='icon' href='../images/favicon.ico' type='image/x-icon'>

</head>
<body>

    <div class="password">
        <div class="header">
            <h1>Cambio de contraseña</h1>
            <h2>Has sobrepasado el límite de intentos</h2>
        </div>
        <div class="form">
            <form action="php/changePass.php" autocomplete="off" method="POST">
                <p><label for="cuenta">Nombre de cuenta</label><br>
                    <input type="text" name="cuenta" id="cuenta"  class="mytext" required></p>
                <p class="msg-error">
                    <small class="msg-error-p mb-5">Este es un error</small>
                </p>
                <p><label for="nueva">Nueva contraseña</label><br>
                    <input type="password" name="nueva" id="nueva" required class="mytext"></p>
                <p class="msg-error ">
                    <small class="msg-error-p mb-5">Este es un error</small>
                </p>
                <p><label for="confNueva">Confirmar contraseña</label><br>
                    <input type="password" name="confNueva" id="confNueva" required class="mytext"></p>
                <p class="msg-error ">
                    <small class="msg-error-p mb-5">Este es un error</small>
                </p>
                 <input type="submit" value="Confirmar" id="submit" class="confirm">
            </form>
            <br>
            <a href="index.php">Volver a inicio</a>
        </div>
        </div>

    <script src="js/validaCambioPass.js"></script>
</body>
</html>