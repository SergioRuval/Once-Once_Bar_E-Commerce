<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='icon' href='images/favicon.ico' type='image/x-icon'>
    <title>Cambiar Contraseña</title>
    
    <link rel="stylesheet" href="css/cambiarcontra.css">
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
        <h1>Cambiar la contraseña:</h1>
        <h2>¡¡Hecho demasiados intentos!!</h2>
        <form action="php/changePass.php" autocomplete="off" method="POST">
            <label for="cuenta">Nombre de cuenta</label><br>
            <input type="text" name="cuenta" id="cuenta" required>
            <p class="msg-error ">
                <small class="msg-error-p mb-5">Este es un error</small>
            </p>
            <label for="nueva">Nueva contraseña</label><br>
            <input type="password" name="nueva" id="nueva" required>
            <p class="msg-error ">
                <small class="msg-error-p mb-5">Este es un error</small>
            </p>
            <label for="confNueva">Confirmar contraseña</label><br>
            <input type="password" name="confNueva" id="confNueva" required>
            <p class="msg-error ">
                <small class="msg-error-p mb-5">Este es un error</small>
            </p>
             <input type="submit" value="Confirmar" id="submit">
        </form>
        <a href="index.php">Volver a inicio</a>
    </div>

    <script src="js/validaCambioPass.js"></script>
</body>
</html>