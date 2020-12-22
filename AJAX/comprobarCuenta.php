<?php
    $servidor = 'localhost';
    $cuenta = 'root';
    $password = '';
    $bd = 'tienda';

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