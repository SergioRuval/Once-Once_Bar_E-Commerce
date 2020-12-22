<?php
    $servidor = 'sql206.byethost13.com';
    $cuenta = 'b13_27521143';
    $password = '5p1d3rm4n_G';
    $bd = 'b13_27521143_tienda';

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