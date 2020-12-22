<?php
    $nombre = $cuenta = $password = $email = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST["nombre"];
        $cuenta = $_POST["correo"];
        $password = $_POST["login"];
        $email = $_POST["contra"];

        session_start();

        $_SESSION["CUENTA"] = $cuenta;
        $_SESSION["CARRITO"] = "";
        $_SESSION["EMAIL"] = $email;

        header("Location: ../index.php");
    }
    

?>