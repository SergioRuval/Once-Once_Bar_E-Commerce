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
    $codPos=$_POST['codPostal'];
    $numTel=$_POST['phone'];
    $formaPago=$_POST['formaPago'];
    //$total=$_POST['total'];
    if(!isset($_SESSION['CUPON'])){
        $total=$_SESSION['TOTAL'];
    }else{
        $total=$_SESSION['TOTAL_DESC'];
    }

    //Guardando los datos en la BD de Pago
    
    $sentencia = $pdo->prepare("INSERT INTO `pago` 
       (`IDPago`, `ClvTranscc`, `IDUsuario`, `Direccion`, `Ciudad`, `Estado`, `CP`, `NumTel`, `FormaPago`, `Total`) 
    VALUES (NULL, :ClvTranscc, '5', :Direccion, :Ciudad, :Estado, :CP, :NumTel, :FormaPago, :Total);");

    $sentencia->bindParam(":ClvTranscc",$SID);
    $sentencia->bindParam(":Direccion",$dir);
    $sentencia->bindParam(":Ciudad",$ciudad);
    $sentencia->bindParam(":Estado",$edo);
    $sentencia->bindParam(":CP",$codPos);
    $sentencia->bindParam(":NumTel",$numTel);
    $sentencia->bindParam(":FormaPago",$formaPago);
    $sentencia->bindParam(":Total",$total);
    $sentencia->execute();
    echo "llegue";
?>