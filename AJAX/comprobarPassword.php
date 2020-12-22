<?php
   $servidor = 'localhost';
   $cuenta = 'root';
   $password = '';
   $bd = 'tienda';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if($conexion->connect_errno){
        die('Error en la conexión');
    }else{
        $password;
        $cuenta;

        if(isset($_POST["cuenta"]) && isset($_POST["contra"])){
            $password = $_POST["contra"];
            $cuenta = $_POST["cuenta"];

            $sql = "SELECT * FROM usuario WHERE Cuenta = '$cuenta' AND Password = '$password'";
            $resultado = $conexion ->query($sql);

            if($resultado->num_rows){
                echo "correcta";
                exit();
            }else{
                echo "incorrecta";
                exit();
            }
            
        }else{
            echo "no llega nada";
            exit();
        }
    }

?>