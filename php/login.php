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
            $password = $_POST["password"];
            $recordar = $_POST["recordar"];

            // Cifrado de la contraseña para guardarla
            $passCifrada = sha1($password);

            // Consulta del último id para asignarle el siguiente al nuevo usuario
            $sql = "SELECT * FROM usuario WHERE Password = '$passCifrada' AND Cuenta = '$cuenta' ";
            $resultado = $conexion -> query($sql);
            
            if($resultado -> num_rows){
                //Ambos están correctos
                session_start();

                $email = $resultado->fetch_assoc()["Correo"];

                $_SESSION["CUENTA"] = $cuenta;
                $_SESSION["CARRITO"] = [];
                $_SESSION["EMAIL"] = $email;

                if(!empty($_POST["cookie"])){
                    setcookie("recordar", "hola", time() + 7200);
                    setcookie("recordUsuario", $cuenta, time() + 7200);
                    setcookie("recordContra", $password, time() + 7200);
                }else{
                    setcookie("recordar", "");
                    setcookie("recordUsuario", "");
                    setcookie("recordContra", "");
                }

                header("Location: ../index.php");
            }else{

                header("Location: ../login.php");
            }

        }
    }    
?>