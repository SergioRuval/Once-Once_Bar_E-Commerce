<?php
    include 'global/config.php';
    include 'carrito.php';
?>

<!-- Iría la cabecera -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>

    <!-- Links -->
    <link rel="stylesheet" href="css/tienda.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    <!-- Links -->
    <link rel="stylesheet" href="css/tienda.css">
    <script src="https://kit.fontawesome.com/25f85f35ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">

</head>
<body>

    <div class="part1" id="BackHome">
        <div class="part1-1">
            <p><a href="index.php" class="buttonp1 blink_me"><strong><i class="fas fa-home fa-lg"></i></strong></a></p>
            <p><a href="aboutus.php" class="buttonp1 blink_me"><strong>Acerca de Nosotros</strong></a></p>
            <p><a href="formulario.php" class="buttonp1 blink_me"><strong>Contacto</strong></a></p>
            <p><a href="ayuda.php" class="buttonp1 blink_me"><strong>Ayuda</strong></a></p>
            <p><a href="tiendaIsacc.php" class="buttonp1 blink_me"><strong><i class="fas fa-store fa-lg"></i></strong></a></p>
            <p><a href="showCarrito.php" class="buttonp1 blink_me"><strong><i class="fas fa-shopping-basket"></i> (<?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);?>)</strong></a></p>
        </div>
    </div>

    <br>

    <div class="container">
    <h3>Lista de compras</h3>

    <?php if(!empty($_SESSION['CARRITO'])){ ?>

    <table class="table table-light table-bordered">
        <tbody>
            <tr>
                <th width="40%">Producto</th>
                <th width="20%" class="text-center">Cantidad</th>
                <th width="20%" class="text-center">Precio</th>
                <th width="15%" class="text-center">Total</th>
                <th width="5%" >--</th>
            </tr>
            <?php $total=0;?>
            <?php foreach($_SESSION['CARRITO'] as $i=>$producto){?>
            <tr>
                <td width="40%"><?php echo $producto['NOMBRE'];?></td>
                <td width="15%" class="text-center"><?php echo $producto['CANTIDAD'];?></td>
                <td width="20%" class="text-center">$<?php echo $producto['PRECIO'];?></td>
                <td width="20%" class="text-center">$<?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2);?></td>
                <td width="5%">

                <!-- ELIMINAR PRODUCTO -->
                    <form action="" method="post">

                        <input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY); ?>">
                        <input type="hidden" name="cantidad" value="<?php echo openssl_encrypt($producto['CANTIDAD'],COD,KEY); ?>">

                        <button 
                        class="btn btn-warning" type="submit"
                        name="btnAccion"
                        value="Eliminar"
                        >Eliminar</button>
                    </form>
                    
                </td>
            </tr>
            <?php $total+=$producto['PRECIO']*$producto['CANTIDAD'];?>
            <?php }?>
            <tr>
                <td colspan="3" align="right"><h3>TOTAL</h3></td>
                <td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5">
                    <form action="<?php //para saber si le deja continuar el pago o lo manda a iniciar sesión
                        if($_SESSION['DENTRO']==1)
                            echo "pagar.php";
                        else
                            echo "login.html";
                    ?>" method="post">
                        <!--<div class="alert alert-success">
                            <div class="form-group">
                                <label for="correo">Correo de contacto:</label>
                                <input type="email" id="correo" name="correo" class="form-control" placeholder="Ingresa tu correo" required>
                            </div>
                            <small id="emailHelp" class="form-text text-muted">
                                Los productos se van a enviar.
                            </small>
                        </div>-->
                        <button class="btn btn-dark btn-lg btn-block" id="aPagar" type="submit"  name="btnAccion" value="proceder" style="width: 100%;">Proceder a pagar >></button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

    <?php } else{ ?>
        <div class="alert alert-warning text-center">
            Carrito vacío.
        </div>
    <?php } ?>

    </div>

</body>
</html>

<!-- Iría el pie -->