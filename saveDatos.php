<?php
    include 'global/config.php';
    include 'global/conexion.php';
    include 'carrito.php';
?>

<?php 
    $SID = session_id(); //Para no confundir con otra sesión

    $dir=$_POST['direccion'];
    $ciudad=$_POST['city'];
    $edo=$_POST['estado'];
    $pais=$_POST['pais'];
    $codPos=$_POST['codPostal'];
    $numTel=$_POST['phone'];
    $formaPago=$_POST['formaPago'];
    //$totalOrigin=$_POST['totalOriginal']; 
    $totalOrigin=$_SESSION['TOTALORIGINAL'];
    $totalFinal=$_SESSION['TOTALFINAL'];
    $iva=$_SESSION['IVA'];
    $cupones=$_SESSION['CUPONES'];

    //Guardando los datos en la BD de Pago
    //Falta comparar con el valor del usuario en sesión
    
    $sentencia = $pdo->prepare("INSERT INTO `pago` 
       (`IDPago`, `ClvTranscc`, `IDUsuario`, `Direccion`, `Ciudad`, `Estado`, `Pais`, `CP`, `NumTel`, `FormaPago`,  `TotalOriginal`, `TotalFinal`, `Impuesto`, `Cupones`) 
    VALUES (NULL, :ClvTranscc, '21', :Direccion, :Ciudad, :Estado, :Pais, :CP, :NumTel, :FormaPago,:TotalOriginal, :TotalFinal, :Impuesto,     :Cupones);");

    $sentencia->bindParam(":ClvTranscc",$SID);
    $sentencia->bindParam(":Direccion",$dir);
    $sentencia->bindParam(":Ciudad",$ciudad);
    $sentencia->bindParam(":Estado",$edo);
    $sentencia->bindParam(":Pais",$pais);
    $sentencia->bindParam(":CP",$codPos);
    $sentencia->bindParam(":NumTel",$numTel);
    $sentencia->bindParam(":FormaPago",$formaPago);
    $sentencia->bindParam(":TotalOriginal",$totalOrigin);
    $sentencia->bindParam(":TotalFinal",$totalFinal);
    $sentencia->bindParam(":Impuesto",$iva);
    $sentencia->bindParam(":Cupones",$cupones);
    $sentencia->execute();

    //Se obtiene para establecer los detalles de la venta realizada por el pago
    //$idVenta=$pdo->lastInsertId();

    echo "llegue";
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
    
    //require('navbarCliente.php');
    
        switch($formaPago){
            case 'OXXO':
                include 'oxxo.php';
            break;

            case 'BBVA Bancomer':
                include 'bbva.php';
            break;

            case 'Santander':
                include 'santander.php';
            break;
        }
    
    ?>

<!-- Iría el pie -->

</body>
</html>

