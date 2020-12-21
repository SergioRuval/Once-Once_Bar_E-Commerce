<?php
//Para almacenar información de productos a comprar
session_start();

$mensaje="";

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){
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
            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje.="Cantidad Correcto ".$CANTIDAD."<br>";
            }
            else{
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
            }else{//Ya se tenían productos agregados
                $nProductos=count($_SESSION['CARRITO']); //Cuenta el num de productos en el carrito
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['CARRITO'][$nProductos]=$producto;
            }

            $mensaje= print_r($_SESSION,true);

            break;
    }
}


?>