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

    <link rel="stylesheet" href="css/tienda.css">
    <script src="https://kit.fontawesome.com/25f85f35ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <link rel='icon' href='images/favicon.ico' type='image/x-icon'>

</head>

<body>

    <div class="faq1">
        <p class="textfaq1"><strong><span>T</span><span>i</span><span>e</span><span>n</span><span>d</span><span>a</span><span> </span><span>O</span><span>N</span><span>C</span><span>E</span><span>:</span><span>O</span><span>N</span><span>C</span><span>E</span></strong></p>
    </div>
    <script src="js/zoomin2.js"></script>

    <div class="category">
        <a href="#"><strong>Todos los productos</strong></a>
        <a href="#"><strong>Comida</strong></a>
        <a href="#"><strong>Bebidas</strong></a>
    </div> <!-- div categoria-->

    <!-- IMAGEN BANNER -->
    <div class="banner">
        <img src="images/banner-cupon2.PNG" alt="" width="100%">
    </div>


    <div class="carrito">
        <p><a href="showCarrito.php" class="blink_me"><strong><i class="fas fa-shopping-basket"></i> (<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?>)</strong></a></p>
    </div>

    <div class="regresar">
        <p><a href="index.php" class="blink_me"><strong>Regresar a inicio</strong></a></p>
    </div>


    <!-- PRODUCTOS -->
    <div class="menu">
        <?php
            $sentencia = $pdo->prepare("SELECT * FROM `bebidas`");
            $sentencia->execute();
            $listaBebidas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaBebidas);
        ?>
        <?php foreach($listaBebidas as $bebida){ ?>
            <div class="card">
                <img src="<?php echo $bebida['Img'];?>" alt="<?php echo $bebida['Nombre'];?>" style="width:100%">
                <h1><?php echo $bebida['Nombre']; ?></h1>
                <p class="price">$<?php echo $bebida['Precio']; ?></p>
                <p>Existencia: <?php echo $bebida['Existencia']; ?></p>
                <p><?php echo $bebida['Descripcion'];?></p>

                <form action="" method="POST">
                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($bebida['IDBebida'],COD,KEY); ?>">
                    <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($bebida['Nombre'],COD,KEY); ?>">
                    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($bebida['Precio'],COD,KEY); ?>">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" min="1" max="<?php echo $bebida['Existencia'];?>" value="1">
                    <p><button name="btnAccion" value="Agregar" type="submit">Añadir al carrito</button></p>
                </form>
            </div>
        <?php } ?>
    </div>

    <!-- <div class="menu">
        <div class="card">
            <img src="images/menu/boneless.jpg" alt="Denim Jeans" style="width:100%">
            <h1>Boneless 10</h1>
            <p class="price">$90.00</p>
            <p>Deliciosas alitas de pollo sin hueso, bañadas en salsa bufalo</p>
            <p><button>Añadir al carrito</button></p>
        </div>
        <div class="card">
            <img src="images/menu/hawai.jpg" alt="Denim Jeans" style="width:100%">
            <h1>Hamburguesa Hawaina</h1>
            <p class="price">$60.00</p>
            <p>Carne de res, piña, jamón, queso americano. Incluyen papas gajo</p>
            <p><button>Añadir al carrito</button></p>
        </div>
        <div class="card">
            <img src="images/menu/papas.png" alt="Denim Jeans" style="width:100%">
            <h1>Papas Arrachera</h1>
            <p class="price">$80.00</p>
            <p>Papas a la francesa con queso para nachos y carne de arrachera (250gr).</p>
            <p><button>Añadir al carrito</button></p>
        </div>
        <div class="card">
            <img src="images/menu/parrillada.jpg" alt="Denim Jeans" style="width:100%">
            <h1>Parrillada Arrachera</h1>
            <p class="price">$110.00</p>
            <p>Acompañada de cebollitas, tortillas, chile guero, guacamole.</p>
            <p><button>Añadir al carrito</button></p>
        </div>
    </div> -->

    <footer>
        <div class="piedepagina">
            <a class="textbottom blink_me"><strong>Aviso de Privacidad - Términos y Condiciones - ONCE:ONCE Copyright 2020</strong></a>
        </div>
    </footer>

</body>

</html>