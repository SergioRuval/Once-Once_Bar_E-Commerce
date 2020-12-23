<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ONCE:ONCE</title>
 
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="https://kit.fontawesome.com/25f85f35ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel='icon' href='../images/favicon.ico' type='image/x-icon'>

</head>
<body>
    
    <div class="navbar">
        
        <?php
            require("./php/navbarCliente.php");
        ?>
        
    </div>

    <div class="faq1">
        <p class="textfaq1 lupa"><strong><span>C</span><span>o</span><span>n</span><span>t</span><span>á</span><span>c</span><span>t</span><span>a</span><span>n</span><span>o</span><span>s</span></strong></p>
    </div>
    
    <div id="form2">
        <div id="form3">
            <form action="correo.php" method="POST">
                <div class="container">
                    <h2>¿Quieres contarnos algo?</h2>
                    <p align="center">¡Ingresa tu mensaje y nos pondremos en contacto contigo!</p>
                </div>
                <div class="container" style="background-color:white">
                    <label for="namez"> Nombre:</label>
                    <input type="text" name="name" id="namez" required>
                    <label for="mail"> Mail:</label>
                    <input type="text" name="mail" required> 
                    <label for="message">Mensaje:</label>
                    <textarea name="mensaje" id="" cols="30" rows="10" required></textarea>
                    <label>
                        <input type="checkbox" checked="checked" name="subscribe"> Sucribirse a nuestro newsletter
                    </label>
                </div>
                <div class="container">
                    <input type="submit" value="Enviar" class="textok">
                    <input type="reset" class="textok">
                </div>
            </form>
        </div>
    </div>
    
    <div class="faq1">
        <p class="textfaq1"><strong><span>C</span><span>o</span><span>n</span><span>t</span><span>á</span><span>c</span><span>t</span><span>a</span><span>n</span><span>o</span><span>s</span></strong></p>
    </div>

    <script src="js/zoomin.js"></script>
    
    <div class="maps">
        <div class="maps2"><p class="mapstext zoom"><strong>Ven y visítanos a Orozco y Jiménez 560, Alcaldes, 47474 Lagos de Moreno, Jal.</strong></p></div>
        <div class="maps2"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3716.0616369162767!2d-101.94270504936635!3d21.348063882106995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842bd3e3ead65f07%3A0xedf077d64188bd84!2sOn
        ce%3AOnce%20Sport%20Bar!5e0!3m2!1ses-419!2smx!4v1607487335142!5m2!1ses-419!2smx" width="600" height="450" frameborder="0" style="border:0;"
         allowfullscreen="" aria-hidden="false" tabindex="0"> </iframe></div>
    </div>
    <div>
        <div class="piedepagina1">
            <a class="textbottom blink_me"><strong>¡Suscribete y recibe un cupón de compra!</strong></a>
        </div>
        <div>
            <form class="form" action="correo2.php" method="POST">
                <div class="form2">
                <input type="text" class="email" name="email" placeholder="Email:">
                <button type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="piedepagina">
        <a class="textbottom blink_me"><strong>Aviso de Privacidad - Términos y Condiciones - ONCE:ONCE Copyright 2020</strong></a>
    </div>
</body>
</html>