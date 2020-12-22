<div class="container">
    <div class="titulo">
        <h5 id="detalles">Detalles Finales de Pago</h4>
    </div>
    <div class="logo">
        <div class="nomPago">
            <h4 id="nom">PAGO</h4>
        </div>
        <div class="imagenLogo">
            <img src="images/bbvaLogo.png" alt="Logo BBVA" id="logBBVA">
        </div>
    </div>
    <div class="indicacion">
        <h4>Ya casi está listo ...</h4><br>
        <h4>Ahora, debes ingresar en los campos siguiente los datos correspondientes a tu tarjeta.
            Una vez completados, pulsa en el botón de terminar para obtener tu recibo de pago.
        </h4>
    </div>
    <div class="datosCard">
        <form action="" method="POST" id="datosCard">
            <div class="soloDatos">
                <div class="numCard">
                    <div>
                        <label for="partCard"><h3>Número de tarjeta:</h3></label>
                    </div>
                    <div class="digitos">
                        <input type="text" id="partCard" size="2" placeholder="XXXX" required>
                        <input type="text" id="partCard" size="2" placeholder="XXXX" required>
                        <input type="text" id="partCard" size="2" placeholder="XXXX" required>
                        <input type="text" id="partCard" size="2" name="partCard4" placeholder="XXXX" required>
                    </div>
                </div>
                <div class="fechaVenc">
                    <label for="fecha"><h3>Fecha de Vencimiento:</h3></label>
                    <input type="date" id="fecha" required>
                </div>
                <div class="securityCode">
                    <label for="seCode"><h3>Código de Seguridad:</h3></label>
                    <input type="tel" id="seCode" pattern="[0-9]{3}" size="2" placeholder="YYY" required>
                </div>
            </div>
            <div class="btnSend">
                <button class="btn btn-outline-danger" type="submit" id="terminar">Terminar</button>
            </div>
        </form>
    </div>
    <div class="botonesCons">
        <!--<a href="nota.php" class="btn btn-warning" target="_blank" id="boleta">Boleta de Pago</a> <br> <br>-->
        <br>
        <a href="index.php" id="regreso">Regresar a Inicio</a>
    </div>
</div>