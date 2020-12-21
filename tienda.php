<?php
    include 'global/config.php';
    include 'global/conexion.php';
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
            <p><a href="index.html" class="buttonp1 blink_me"><strong><i class="fas fa-home fa-lg"></i></strong></a></p>
            <p><a href="aboutus.html" class="buttonp1 blink_me"><strong>Acerca de Nosotros</strong></a></p>
            <p><a href="formulario.html" class="buttonp1 blink_me"><strong>Contacto</strong></a></p>
            <p><a href="ayuda.html" class="buttonp1 blink_me"><strong>Ayuda</strong></a></p>
            <p><a href="tienda.php" class="buttonp1 blink_me"><strong><i class="fas fa-store fa-lg"></i></strong></a></p>
            <p><a href="#" class="buttonp1 blink_me"><strong><i class="fas fa-shopping-basket"></i> (0)</strong></a></p>
        </div>
    </div>

    <div class="container">
        <br>
        <div class="alert alert-success">
            Pantalla de mensaje...
            <a href="#" class="badge badge-success">Ver carrito</a>
        </div>

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
                        >
                        <div class="card-body">
                            <span><?php echo $bebida['Nombre']; ?></span>
                            <h5 class="card-title">$<?php echo $bebida['Precio']; ?></h5>
                            <p class="card-text">Existencia: <?php echo $bebida['Existencia']; ?></p>
                            
                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                Agregar al carrito
                            </button>
                        </div>
                    </div>
                </div>

            <?php } ?>

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