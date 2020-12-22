<p><a href="index.php" class="buttonp1 blink_me"><strong><i class="fas fa-home fa-lg"></i></strong></a></p>
<p><a href="aboutus.php" class="buttonp1 blink_me"><strong>Acerca de Nosotros</strong></a></p>
<p><a href="formulario.php" class="buttonp1 blink_me"><strong>Contacto</strong></a></p>
<p><a href="ayuda.php" class="buttonp1 blink_me"><strong>Ayuda</strong></a></p>
<p><a href="tienda.php" class="buttonp1 blink_me"><strong>Tienda</strong></a></p>
<!--
    <?php
        session_start();

        if(empty($_SESSION["CUENTA"])){
    ?>
            <p><a href="login.php" class="noLogeado buttonp1 blink_me "><strong><i class="fa fa-user-circle-o" aria-hidden="true"></i></strong></a></p>
    <?php
        }else{?>
            <p><a href="login.php" class="logeado buttonp1 blink_me "><strong><i class="fa fa-user-circle-o" aria-hidden="true"></i></strong></a></p>
    <?php }
    ?> -->

<div class="dropdown">
    <span class="dropbtn"><strong><i class="fa fa-user-circle-o fa-lg" onclick="myFunction()" id="usuario"></i></strong></span>
    <div id="myDropdown" class="dropdown-content">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
    </div>
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