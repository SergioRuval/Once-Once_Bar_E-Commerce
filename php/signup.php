<?php
    $servidor = 'localhost';
    $cuenta = 'root';
    $password = '';
    $bd = 'tienda';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if($conexion->connect_errno){
        die('Error en la conexión');
    }else{
        $nombre = $cuenta = $password = $email = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = $_POST["nombre"];
            $email = $_POST["correo"];
            $cuenta = $_POST["login"];
            $password = $_POST["contra"];

            // Cifrado de la contraseña para guardarla
            $passCifrada = sha1($password);

            // Consulta del último id para asignarle el siguiente al nuevo usuario
            $sql = "SELECT ID_Usuario FROM usuario ORDER BY ID_Usuario DESC LIMIT 1";
            $resultado = $conexion -> query($sql) -> fetch_assoc();
            $lastID = $resultado["ID_Usuario"];

            $lastID += 1;

            $sql = "INSERT INTO usuario (ID_Usuario,Nombre,Cuenta,Password,Correo,Bloqueo) VALUES ('$lastID','$nombre','$cuenta','$passCifrada','$email','0')";
            $conexion->query($sql);

            if($conexion->affected_rows >= 1){
                session_start();

                $_SESSION["CUENTA"] = $cuenta;
                $_SESSION["CARRITO"] = "";
                $_SESSION["EMAIL"] = $email;

                header("Location: ../index.php");
            }else{?>
                <script>alert("Error en la inserción")</script>
            <?php 
                header("Location: ../index.php");
            }


        }
    }
    
    
    
    
?>