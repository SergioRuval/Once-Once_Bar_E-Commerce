<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ONCE:ONCE</title>
    
    <link rel="stylesheet" href="css/aboutus.css">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="https://kit.fontawesome.com/25f85f35ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <style>
    
</style>

    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>
<body>
    
    <div class="navbar">
        <?php
            require("./php/navbarCliente.php");
        ?>
    </div>

    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }
        
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('#usuario')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
    </script>
    
    <div class="maindiv">
        <div class="div1"></div>
        <div class="div2"></div>
        <div class="div3">
            <div class="vision1 zoom">
                <p>En ONCE:ONCE deseamos proporcionarle a nuestros consumidores alimentos con altos
                valores de calidad, ricos y saludables, hechos por un equipo humano idóneo.</p>
            </div>
        </div>
        <div class="div4">
            <div class="vision2 zoom">
                ONCE:ONCE
                ONCE:ONCE
                ONCE:ONCE
            </div>
        </div>
        <div class="div5"></div>
        <div class="div6"></div>
        <div class="div7"></div>
        <div class="div8">
            <div class="vision3 zoom">
                <p>Queremos para dentro de 5 años revolucionar el concepto de un sports bar y convertirnos
                en un referente a nivel nacional, transmitiendo nuestra pasión por ofrecer una cálida experiencia. </p>
            </div>
        </div>
        <div class="div9"></div>
        <div class="div10"></div>
    </div>
    
    <footer>
        <br>
        <div class="piedepagina blink_me">
            <a class="textbottom"><strong>Aviso de Privacidad - Términos y Condiciones - ONCE:ONCE Copyright 2020</strong></a>
        </div>
    </footer>
</body>
</html>