<?php
    $servidor = 'db5001359255.hosting-data.io';
    $cuenta = 'dbu1107284';
    $password = '5p1d3rm4n_G';
    $bd = 'dbs1152604';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if($conexion->connect_errno){
        die('Error en la conexión');
    }else{
        $correo;

        if(isset($_POST["correo"])){
            $correo = $_POST["correo"];

            $sql = "SELECT Correo FROM usuario WHERE Correo = '$correo'";
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