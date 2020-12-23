<?php
    $servidor = 'localhost';
    $cuenta = 'root';
    $password = '';
    $bd = 'tienda';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if($conexion->connect_errno){
        die('Error en la conexión');
    }else{
        $sql = "SELECT * FROM productos ORDER BY IDProducto ASC";
        $resultado = $conexion->query($sql);

        if($resultado->num_rows > 0){
            while( $fila = $resultado->fetch_assoc()){
                echo "
                    <tr>
                        <td>". $fila["IDProducto"] ."</td>
                        <td>". $fila["Nombre"] ."</td>
                        <td>". $fila["Categoria"] ."</td>
                        <td>". $fila["Precio"] ."</td>
                        <td>". $fila["Descripcion"] ."</td>
                        <td>". $fila["Existencia"] ."</td>
                    </tr>
                ";
            }
        }else{
            echo "
                <tr>
                    <td colspan='6'> No hay productos en la base de datos </td>
                </tr>
            ";
        }
    }
?>