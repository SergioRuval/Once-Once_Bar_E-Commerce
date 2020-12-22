<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
</head>
<body>
    <h1>Cambiar la contraseña:</h1>
    <h2>¡¡Hecho demasiados intentos!!</h2>
    <form action="php/changePass.php" autocomplete="off" method="POST">
        <label for="cuenta">Nombre de cuenta</label><br>
        <input type="text" name="cuenta" id="cuenta" required>
        <p class="msg-error ">
            <small class="msg-error-p mb-5">Este es un error jajajaja</small>
        </p>
        <label for="nueva">Nueva contraseña</label><br>
        <input type="password" name="nueva" id="nueva" required>
        <p class="msg-error ">
            <small class="msg-error-p mb-5">Este es un error jajajaja</small>
        </p>
        <label for="confNueva">Confirmar contraseña</label><br>
        <input type="password" name="confNueva" id="confNueva" required>
        <p class="msg-error ">
            <small class="msg-error-p mb-5">Este es un error jajajaja</small>
        </p>
        <input type="submit" value="Confirmar" id="submit">
    </form>
    <a href="index.php">Volver a inicio</a>

    <script src="js/validaCambioPass.js"></script>
</body>
</html>