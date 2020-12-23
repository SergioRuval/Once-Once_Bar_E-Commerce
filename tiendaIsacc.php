<?php
    include 'global/config.php';
    include 'global/conexion.php';
    include 'carrito.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>

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
            <p><a href="tienda.php" class="buttonp1 blink_me"><strong><i class="fas fa-store fa-lg"></i></strong></a></p>
            <p><a href="showCarrito.php" class="buttonp1 blink_me"><strong><i class="fas fa-shopping-basket"></i> (<?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);?>)</strong></a></p>
        </div>
    </div>

    <div class="container">
        <br>
        <?php if($mensaje!=""){?>
        <div class="alert alert-success">
            <?php echo $mensaje; ?>
            <a href="showCarrito.php" class="badge badge-pill badge-dark" style="background-color:green;border-radius:4px;text-decoration: none;">Ver carrito</a>
        </div>
        <?php }?>

        <div class="row">
            <?php
                $sentencia=$pdo->prepare("SELECT * FROM `bebidas`");
                $sentencia->execute();
                $listaBebidas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                //print_r($listaBebidas);
            ?>

            <?php foreach($listaBebidas as $bebida){ ?>
                <div class="col-4">
                    <div class="card">
                        <img 
                        title="<?php echo $bebida['Descripcion'];?>" 
                        alt="<?php echo $bebida['Nombre'];?>" 
                        class="card-img-top" 
                        src="<?php echo $bebida['Img'];?>" 
                        data-toggle="popover"
                        data-content="<?php echo $bebida['Descripcion'];?>" 
                        height="350px"
                        >
                        <div class="card-body">
                            <span><?php echo $bebida['Nombre']; ?></span>
                            <h5 class="card-title">$<?php echo $bebida['Precio']; ?></h5>
                            <p class="card-text">Existencia: <?php echo $bebida['Existencia']; ?></p>
                            
                            <!-- Enviar la información del producto -->
                            <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($bebida['IDBebida'],COD,KEY); ?>">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($bebida['Nombre'],COD,KEY); ?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($bebida['Precio'],COD,KEY); ?>">
                                <!--<input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY); ?>">-->
                                <label for="cantidad">Cantidad</label>
                                <input type="number" name="cantidad" id="cantidad" min="1" max="<?php echo $bebida['Existencia'];?>" value="1"> <br><br>

                                <button class="btn btn-primary" 
                                name="btnAccion" 
                                value="Agregar" 
                                type="submit"
                                >
                                    Agregar al carrito
                                </button>

                            </form>

                            
                        </div>
                    </div>
                </div>

            

        </div>

    </div>

    <script>
        $(function () {
            $('[data-toggle="popover"]').popover({
                trigger:"hover"
                })
        });
    </script>
    
</body>
</html>