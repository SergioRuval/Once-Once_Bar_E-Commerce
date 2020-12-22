<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONCE:ONCE</title>
    
    <!-- Links -->
    <link rel="stylesheet" href="css/indexcss.css">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="https://kit.fontawesome.com/25f85f35ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel='icon' href='../images/favicon.ico' type='image/x-icon'>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
</head>
<body>
<div class="navbar">
    <?php
        require("./php/navbarCliente.php");
    ?>
</div>


<?php
    if(empty($_SESSION["CUENTA"])){
?>
    <div class="login">
        <a href="login.php" class="loginbutton blink_me">Iniciar sesión</a>
        <a href="signup.php" class="loginbutton blink_me">Regístrate</a>
        <a href=""></a>
    </div>
<?php
    }else{ ?>
        <div class="login">
            <a href="php/logout.php" class="loginbutton blink_me">Cerrar sesión</a>
        </div>
   <?php }
?>
    
    <div class="socialicons">
        <a href="https://www.facebook.com/onceoncesportbar" class="icons blink_me" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="https://www.instagram.com/once.onc/?hl=es-la" class="icons blink_me" target="_blank"><i class="fab fa-instagram"></i></a>
    </div>
    
    <p></p>
    <script src="js/fadeaway.js"></script>
    <div class="onscroll">
        <div class="XD1 zum">ONCE:ONCE</div>
        <div class="XD2 zum">SPORTS - BAR</div>
        <div class="XD3 zum">LUNES A DOMINGO 3 PM - 12 AM</div>
    </div>
    
    
    <div class="gallery">
        <p>GALERÍA</p>
        <main class="aportacion1">
            <img src="images/gallery1.jpg" width="30%">
            <img src="images/gallery2.jpg" width="30%">
            <img src="images/gallery3.jpg" width="30%">
            <img src="images/gallery4.jpg" width="30%">
            <img src="images/gallery5.jpg" width="30%">
            <img src="images/gallery6.jpg" width="30%">
        </main>
    </div>
    
    <div class="ancla">
        <a href="#BackHome">Regresar a inicio</a>
    </div>
    
    <footer>
      <br>
       <div class="piedepagina blink_me">
           <a class="textbottom"><strong>Aviso de Privacidad - Términos y Condiciones - ONCE:ONCE Copyright 2020</strong></a>
       </div>
    </footer>

</body>
</html>