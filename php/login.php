<?php
    $cuenta = $password = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $cuenta = $_POST["cuenta"];
        $password = $_POST["password"];

        session_start();

        $_SESSION["CUENTA"] = $cuenta;
        $_SESSION["CARRITO"] = "";

        header("Location: ../index.php");
    }
    

?>