window.onload = function (){
    Cargar();
}

function Cargar(){
    $("#productos").load("php-admin/getProductos.php");
}

function Cambiar(){
    var nombre = $("#nombre").val();
    var cat = $("#cat").val();
    var precio = $("#precio").val();
    var desc = $("#desc").val();
    var exist = $("#exist").val();
    var id = $("#id").val();
    
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "php-admin/cambiarProducto.php",
        data: "nombre="+nombre+"&cat="+cat+"&precio="+precio+"&desc="+desc+"&exist="+exist+"&id="+id,
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
    $("#id").val("");
}