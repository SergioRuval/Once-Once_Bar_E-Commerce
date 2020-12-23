<?php
//Para almacenar información de productos a comprar
$mensaje="";

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){
        //Cuando añadimos un nuevo producto
        case 'Agregar':
            //Valida que no se haya incluido un valor externo al ID encriptado
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="ID Correcto ".$ID."<br>";
            }else{
                $mensaje.="¡ALERTA! ID Inorrecto "."<br>";
            }

            //Valida que no se haya incluido un valor externo al Nombre encriptado
            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.="Nombre Correcto ".$NOMBRE."<br>";
            }else{
                $mensaje.="¡ALERTA! Nombre incorrecto "."<br>";
            }

            //Valida que no se haya incluido un valor externo al Precio encriptado
            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.="Precio Correcto ".$PRECIO."<br>";
            }
            else{
                $mensaje.="¡ALERTA! Precio incorrecto "."<br>";
            }

            //Valida que no se haya incluido un valor externo a Cantidad encriptada
            //if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
            if(is_numeric($_POST['cantidad'])){
                //$CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $CANTIDAD=$_POST['cantidad'];
                $mensaje.="Cantidad Correcto ".$CANTIDAD."<br>";
            }
            else{
                $CANTIDAD=1;
                $mensaje.="¡ALERTA! Cantidad incorrecta "."<br>";
            }

            //Validando variable de SESSION
            if(!isset($_SESSION['CARRITO'])){
                //Almacenando la información del primer producto
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['CARRITO'][0]=$producto;
                $mensaje= "¡Producto agregado con ÉXITO!";
            }else{//Ya se tenían productos agregados

                //Se va a validar que el producto seleccionado no esté dentro del carrito
                $idProductos=array_column($_SESSION['CARRITO'],"ID"); //Guarda todos los ID de todos los productos en el carrito

                if(in_array($ID,$idProductos)){
                    echo "<script>alert('Producto ya se ha seleccionado');</script>";
                    $mensaje="";
                }else{
                    $nProductos=count($_SESSION['CARRITO']); //Cuenta el num de productos en el carrito

                    $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                    );
                    $_SESSION['CARRITO'][$nProductos]=$producto;
                    $mensaje= "¡Producto agregado con ÉXITO!";
                }

                
            }

            //$mensaje= print_r($_SESSION,true);

            break;

            //Cuando eliminamos un producto del carrito
            case 'Eliminar':
                if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                    $ID=openssl_decrypt($_POST['id'],COD,KEY);
                    $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                    //Vamos a buscar el producto que se va a eliminar en array de SESSION
                    foreach($_SESSION['CARRITO'] as $i=>$producto){
                        if($producto['ID']==$ID){
                            //Cuando se eligió una cantidad mayor a 1 de un mismo producto
                            if($CANTIDAD >= 2){
                                $_SESSION['CARRITO'][$i]['CANTIDAD']=$CANTIDAD-1;
                            }else{
                                unset($_SESSION['CARRITO'][$i]);
                                echo "<script>alert('Producto eliminado...');</script>";
                            }
                        }
                    }
                }else{
                    $mensaje.="¡ALERTA! ID Inorrecto "."<br>";
                }
            break;
            

    }
}

//Auxiliar para saber si está iniciada sesión
$_SESSION['DENTRO']=1;

?>