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
    <script src="js-admin/bajas.js"></script>
</head>
<body>
    <div class="navbar">
        <a href="altas.php">Altas</a>
        <a href="bajas.php">Bajas</a>
        <a href="cambios.php">Cambios</a>
    </div>

    <div class="father">
        <div class="end1">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">ID del producto</label>
                        <input type="number" class="form-control" id="id_prod" name="id_prod">
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-primary center" onclick="Bajar()">Eliminar</button>
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