<?php
    session_start();

    $_SESSION["CUENTA"] = "";
    $_SESSION["CARRITO"] = "";
    $_SESSION["EMAIL"] = "";

    header("Location: ../index.php");
?>