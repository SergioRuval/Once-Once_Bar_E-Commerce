<?php
    $servidor = 'db5001359255.hosting-data.io';
    $cuenta = 'dbu1107284';
    $password = '5p1d3rm4n_G';
    $bd = 'dbs1152604';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if($conexion->connect_errno){
        die('Error en la conexión');
    }else{
        $cuenta;

        if(isset($_POST["cuenta"])){
            $cuenta = $_POST["cuenta"];

            $sql = "SELECT Cuenta FROM usuario WHERE Cuenta = '$cuenta'";
            $resultado = $conexion ->query($sql);

            if($resultado->num_rows){
                echo "existe";
                exit();
            }else{
                echo "nuevo";
                exit();
            }
            
        }else{
            echo "no llega nada";
            exit();
        }
    }

?>