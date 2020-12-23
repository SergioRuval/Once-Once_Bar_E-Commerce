<?php
    $servidor = 'localhost';
    $cuenta = 'root';
    $password = '';
    $bd = 'tienda';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if($conexion->connect_errno){
        die('Error en la conexión');
    }else{
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST["id_prod"];

            $sql = "DELETE FROM productos WHERE productos.IDProducto = $id";
            $conexion->query($sql);

            if($conexion->affected_rows >= 1){
                echo "Se ha guardado";
            }else{
                echo "no se ha guardado";
            }

            
        }
    }
?>