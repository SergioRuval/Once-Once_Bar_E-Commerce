<p><a href="index.php" class="buttonp1 blink_me"><strong><i class="fas fa-home fa-lg"></i></strong></a></p>
<p><a href="aboutus.php" class="buttonp1 blink_me"><strong>Acerca de Nosotros</strong></a></p>
<p><a href="formulario.php" class="buttonp1 blink_me"><strong>Contacto</strong></a></p>
<p><a href="ayuda.php" class="buttonp1 blink_me"><strong>Ayuda</strong></a></p>
<p><a href="tienda.php" class="buttonp1 blink_me"><strong>Tienda</strong></a></p>

<div class="dropdown">
  <?php
      session_start();

      if(empty($_SESSION["CUENTA"])){
  ?>
        <a href="login.php" class="noLogeado blink_me buttonp1"><strong><i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i></strong></a>
  <?php
      }else{?>
        <span class="dropbtn logeado"><strong><i class="fa fa-user-circle-o fa-lg" onclick="myFunction()" id="usuario"></i></strong></span>
        <div id="myDropdown" class="dropdown-content">
            <a href="#home">
              <?php
                echo $_SESSION["CUENTA"];
              ?>
            </a>
            <a href="#about">Carrito</a>
            <a href="php/logout.php">Salir</a>
        </div>
  <?php } ?>
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