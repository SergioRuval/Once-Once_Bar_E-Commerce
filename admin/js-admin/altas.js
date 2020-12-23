window.onload = function (){
    Cargar();
}

function Cargar(){
    $("#productos").load("php-admin/getProductos.php");
}

function Agregar(){
    var nombre = $("#nombre").val();
    var cat = $("#cat").val();
    var precio = $("#precio").val();
    var desc = $("#desc").val();
    var exist = $("#exist").val();

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "php-admin/agregarProducto.php",
        data: "nombre="+nombre+"&cat="+cat+"&precio="+precio+"&desc="+desc+"&exist="+exist,
        success: function(resp){
            Cargar();
            Limpiar();
        }
    });
}

function Limpiar(){
    $("#nombre").val("");
    $("#precio").val("");
    $("#desc").val("");
    $("#exist").val("");
    $("#cat").val("");
}