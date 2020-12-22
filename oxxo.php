<div class="container">
    <div class="titulo">
        <h5 id="detalles">Detalles Finales de Pago</h4>
    </div>
    <div class="logo">
        <div class="nomPago">
            <h4 id="nom">PAGO</h4>
        </div>
        <div class="imagenLogo">
            <img src="images/oxxoLogo.png" alt="Logo OXXO" id="logOXXO">
        </div>
        
    </div>
    <div class="indicacion">
        <h4><span style="color: red;font-weight:bold">ONCE:ONCE Sports Bar</span> agradece tu preferencia.</h4><br>
        <h4>Pulsando el siguiente botón, podrás encontrar tu Boleta de Pago. 
            Una vez consultada, puedes acudir a cualquier sucursal OXXO para concretar tu pedido.</h4>
    </div>
    <div class="botonesCons">
        <?php $_SESSION['FORMAPAGO']="OXXX"; ?>
        <a href="notaBase.php" class="btn btn-warning" target="_blank" id="boleta">Boleta de Pago</a> <br> <br>
        <a href="index.php" id="regreso">Regresar a Inicio</a>
    </div>
</div>