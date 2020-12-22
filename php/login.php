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
            $intentos = $_POST["intentos"];

            if($intentos == "bloquear"){
                $sql = "UPDATE usuario SET Bloqueo = 1 WHERE usuario.Cuenta = '$cuenta'";
                $conexion->query($sql);
                
                header("Location: ../cambiarContra.php");
            }else{
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

                    if(!empty($_POST["remember"])){
                        setcookie("recordar", "jajaja ayuda me quiero morir");
                        setcookie("recordUsuario", $_POST["cuenta"], time() + 3600);
                        setcookie("recordContra", $_POST["password"], time() + 3600);
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
    }
