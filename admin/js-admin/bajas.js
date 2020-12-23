window.onload = function (){
    Cargar();
}

function Cargar(){
    $("#productos").load("php-admin/getProductos.php");
}

function Bajar(){
    var id = $("#id_prod").val();

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "php-admin/quitarProducto.php",
        data: "id_prod="+id,
        success: function(resp){
            Cargar();
            Limpiar(); 
            console.log(resp);
        }
    });
}

function Limpiar(){
    $("#id_prod").val("");
}