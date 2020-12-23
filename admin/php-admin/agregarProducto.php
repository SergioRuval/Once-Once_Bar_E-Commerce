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
            // $imagen = $_FILES["imagen"];
            // $nombreImagen = $imagen["name"];
            // $ficheroOrigen = $_FILES["imagen"]["tmp_name"];
            // $ficheroDestino = "../images/menu/" . $_FILES["imagen"]["name"];

            $sql = "INSERT INTO productos (Nombre,Categoria,Descripcion,Precio,Existencia) VALUES ('$nombre','$categoria','$descripcion','$precio','$existencia')";
            $conexion->query($sql);

            if($conexion->affected_rows >= 1){
                echo "Se ha guardado";
            }else{
                echo "no se ha guardado";
            }

            
        }
    }
?>