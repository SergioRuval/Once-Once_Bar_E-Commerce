<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/inventario.css">
    <script src="https://kit.fontawesome.com/25f85f35ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="js-admin/altas.js"></script>

</head>
<body>
    <div class="navbar">
        <a href="altas.php">Altas</a>
        <a href="bajas.php">Bajas</a>
        <a href="cambios.php">Cambios</a>
    </div>

    <div class="father">
        <div class="end1">
            <form autocomplete="off">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombre del nuevo producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Descripción</label>
                        <input type="text" class="form-control" id="desc" name="desc">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputZip">Existencia</label>
                        <input type="number" class="form-control" id="exist" name="exist">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputZip">Categoría</label>
                        <input type="text" class="form-control" id="cat" name="cat">
                    </div>
                    <!-- <div class="form-group col-md-6">
                        <label for="inputZip">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div> -->
                </div>
                <br>
                <button type="button" class="btn btn-primary center" onclick="Agregar()">Añadir producto</button>
                <a type="button" class="btn btn-primary center" href="admin.html">Regresar a inicio</a>
            </form>
        </div>
        <div class="end2">
            <h3 class="titulo">Productos</h3>
            <div class="datagrid">
                <table>
                    <tr>
                        <th>Id Producto</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Existencia</th>
                    </tr>
                    <tbody id="productos">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>