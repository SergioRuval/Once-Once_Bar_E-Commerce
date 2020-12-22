<?php
    $servidor = 'localhost';
    $cuenta = 'root';
    $password = '';
    $bd = 'tienda';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if($conexion->connect_errno){
        die('Error en la conexión');
    }else{
        $cuenta = $password = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $cuenta = $_POST["cuenta"];
            $password = $_POST["nueva"];

            // Cifrado de la contraseña para guardarla
            $passCifrada = sha1($password);

            // Cambiamos el estado de bloqueo de la cuenta
            $sql = "UPDATE usuario SET Bloqueo = 0 WHERE usuario.Cuenta = '$cuenta'";
            $conexion -> query($sql);
            
            $sql = "UPDATE usuario SET Password = '$passCifrada' WHERE usuario.Cuenta = '$cuenta'";
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