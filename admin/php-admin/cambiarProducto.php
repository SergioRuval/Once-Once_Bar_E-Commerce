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
            $nombre = $_POST["nombre"];
            $categoria = $_POST["cat"];
            $precio = $_POST["precio"];
            $descripcion = $_POST["desc"];
            $existencia = $_POST["exist"];
            $id = $_POST["id"];

            if(!empty($nombre)){
                $sql = "UPDATE productos SET Nombre = $nombre WHERE productos.IDProducto = $id";
                $conexion->query($sql);
            }
            if(!empty($categoria)){
                $sql = "UPDATE productos SET Categoria = $categoria WHERE productos.IDProducto = $id";
                $conexion->query($sql);
            }
            if(!empty($precio)){
                $sql = "UPDATE productos SET Precio = $precio WHERE productos.IDProducto = $id";
                $conexion->query($sql);
            }
            if(!empty($descripcion)){
                $sql = "UPDATE productos SET Descripcion = $descripcion WHERE productos.IDProducto = $id";
                $conexion->query($sql);
            }
            if(!empty($existencia)){
                $sql = "UPDATE productos SET Existencia = $existencia WHERE productos.IDProducto = $id";
                $conexion->query($sql);
            }

            

            if($conexion->affected_rows >= 1){
                echo "Se ha guardado";
            }else{
                echo "no se ha guardado";
            }

            
        }
    }
?>