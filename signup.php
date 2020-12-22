<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel='icon' href='../images/favicon.ico' type='image/x-icon'>
    <title>Regístrarse</title>

    <style>
        body {
            background-color: black !important;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .div1 {
            display: flex;
            justify-content: center;
            margin-top: 100px;
        }

        .button1 {
            margin-right: 190px;
        }

        .header {
            text-align: center;
            font-size: 150px;
        }

        .msg-error {
            display: none;
            text-align: center;
        }

        .msg-error small {
            color: red;
        }
    </style>

</head>

<body>

    <div class="header">
        Regístrate
    </div>

    <div class="div1">
        <form class="form" role="form" action="./php/signup.php" method="post" autocomplete="off">
            <div class="modal-body">
                <table width=450>
                    <tr>
                        <td>
                            <p>Nombre completo: </p>
                        </td>
                        <td><input type="text" name="nombre" size="30" id="inpNombre" required></td>
                    </tr>
                    <tr class="msg-error">
                        <td></td>
                        <td><small class="msg-error-p"></small></td>
                    </tr>
                    <tr>
                        <td>
                            <p>Correo Electrónico: </p>
                        </td>
                        <td><input type="email" name="correo" size="30" id="inpEmail" required></td>
                    </tr>
                    <tr class="msg-error">
                        <td></td>
                        <td><small class="msg-error-p"></small></td>
                    </tr>
                    <tr>
                        <td>
                            <p>Cuenta: </p>
                        </td>
                        <td><input type="text" name="login" size="30" id="inpCuenta" required></td>
                    </tr>
                    <tr class="msg-error">
                        <td></td>
                        <td><small class="msg-error-p"></small></td>
                    </tr>
                    <tr>
                        <td>
                            <p>Contraseña: </p>
                        </td>
                        <td><input type="password" name="contra" size="30" id="inpPass" required></td>
                    </tr>
                    <tr class="msg-error">
                        <td></td>
                        <td><small class="msg-error-p"></small></td>
                    </tr>
                    <tr>
                        <td>
                            <p>Confirmar contraseña: </p>
                        </td>
                        <td><input type="password" name="confContra" size="30" id="inpConfPass" required></td>
                    </tr>
                    <tr class="msg-error">
                        <td></td>
                        <td><small class="msg-error-p"></small></td>
                    </tr>
                </table>

            </div>
            <div class="modal-footer">
                <div class="form-group button1">
                    <button type="submit" class="btn btn-primary btn-block" id="submit">Enviar</button>
                    <br>
                    <a href="index.php">Regresar</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Scripts de JavaScript para validar los formularios -->
    <script src="js/validaSignup.js"></script>

</body>

</html>