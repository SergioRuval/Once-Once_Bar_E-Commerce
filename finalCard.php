<?php
    include 'global/config.php';
    include 'global/conexion.php';
    include 'carrito.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fin</title>

    <!--CSS-->
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/saveDatos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

<?php 
    if($_POST){
        $digitos=$_POST['partCard4'];
        echo $digitos;
        //Añadiendp los últimos 3 dígitos para nota
        $sentencia = $pdo->prepare("UPDATE `pago` SET `Digitos`=$digitos, WHERE IDUsuario=21");
        $sentencia->execute();
?>

<div class="container">
    <div class="titulo">
        <h5 id="detalles">Detalles Finales de Pago</h4>
    </div>
    <div class="logo">
        <div class="nomPago">
            <h4 id="nom">PAGO</h4>
        </div>
        <div class="imagenLogo">
            <?php if($_POST['formaPago']=="Santander") {?>
                <img src="images/santanderLogo.png" alt="Logo BBVA" id="logSan">
            <?php } else{?>
                <img src="images/bbvaLogo.png" alt="Logo Santander" id="logBBVA">
            <?php }?>
        </div>
        
    </div>
    <div class="indicacion">
        <h4><span style="color: red;font-weight:bold">ONCE:ONCE Sports Bar</span> agradece tu preferencia.</h4><br>
        <h4>Pulsando el siguiente botón, podrás encontrar tu Recibo de Pago. 
            Asimismo, hemos enviado a tu correo este recibo.</h4>
    </div>
    <div class="botonesCons">
        <a href="notaBase.php" class="btn btn-warning" target="_blank" id="boleta">Recibo de Pago</a> <br> <br>
        <a href="index.php" id="regreso">Regresar a Inicio</a>
    </div>
</div>

<?php }?>

</body>
</html>