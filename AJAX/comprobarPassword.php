<?php
   $servidor = 'sql206.byethost13.com';
   $cuenta = 'b13_27521143';
   $password = '5p1d3rm4n_G';
   $bd = 'b13_27521143_tienda';

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