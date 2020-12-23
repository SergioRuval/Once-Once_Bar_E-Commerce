<?php
    include 'global/config.php';
    include 'global/conexion.php';
    include 'carrito.php';

    $total=0;
    $totalOrg=0;
    $iva=0;
    $cupones = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>

<!-- Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">

<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- CDN SweetAlert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>
    body{
        background-color: white-space  !important;
        margin: auto;
    }

    .father{
        width: 100%;
        display: flex;
        align-items: center;
    }

    .end1{
        margin: 3%;
        width: 50%;
        font-family: 'Montserrat', sans-serif;
    }

    .end2{
        margin: 3%;
        width: 50%;
        /*display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;*/
    }

    .orden{
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
    }

    .comentarios{
        text-align: right;
    }

    .cupon{
        width: 50%;
        text-align: center;
    }

    .center{
        background-color: black;
        border: 1px solid black;
    }
</style>
</head>
<body>

<?php if($_POST){ 
    
    ?>
    <div class="father">
    <div class="end1">
        <form method="post" action="saveDatos.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="ejemplo@dominio.com" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Número Telefónico</label>
                    <input type="tel" id="phone" name="phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName">Nombre Completo</label>
                <input type="text" class="form-control" id="inputName" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="inputAddress">Dirección</label>
                <input type="text" class="form-control" name="direccion" id="inputAddress" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputCity">Ciudad</label>
                    <input type="text" class="form-control" name="city" id="inputCity" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Estado</label>
                    <input type="text" class="form-control" name="estado" id="inputState" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="paises">País</label> <br>
                    <select name="pais" id="pais" style="width: 100%; height: 50%" onchange="muestraImpuestos();">
                        <option value="MX">México</option>
                        <option value="USA">Estados Unidos</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Código Postal</label>
                    <input type="text" class="form-control" name="codPostal" id="inputZip" required>
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Método de Pago</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="formaPago" id="gridRadios1" value="OXXO" checked>
                            <label class="form-check-label" for="gridRadios1">
                                OXXO
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="formaPago" id="gridRadios2" value="BBVA Bancomer">
                            <label class="form-check-label" for="gridRadios2">
                                Tarjeta BBVA Bancomer
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="formaPago" id="gridRadios3" value="Santander">
                            <label class="form-check-label" for="gridRadios3">
                                Tarjeta Banco Santander
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <br>
            
            <input type="hidden" name="IVA" value="<?php echo $iva;?>">
            <input type="hidden" name="cupones" value="<?php echo $cupones;?>">
            <input type="hidden" name="totalOriginal" value="<?php echo $total;?>">
            <input type="hidden" name="totalFinal" value="<?php echo $totalOrg;?>">
            <button type="submit" class="btn btn-primary center" name="btnAccion" value="Finalizar">Finalizar compra</button>
        </form>
    </div>
    <div class="end2">
    <div class="container orden">
    <legend class="text-center">RESUMEN DEL PEDIDO</legend>
        <table class="table table-light table-bordered">
            <tbody>
                <tr>
                    <th width="40%">Producto</th>
                    <th width="20%" class="text-center">Cantidad</th>
                    <th width="20%" class="text-center">Precio</th>
                    <th width="20%" class="text-center">Total</th>
                </tr>
                <?php foreach($_SESSION['CARRITO'] as $i=>$producto){?>
                <tr>
                    <td width="40%"><?php echo $producto['NOMBRE'];?></td>
                    <td width="20%" class="text-center"><?php echo $producto['CANTIDAD'];?></td>
                    <td width="20%" class="text-center">$<?php echo $producto['PRECIO'];?></td>
                    <td width="20%" class="text-center">$<?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2);?></td>
                </tr>
                <?php $total+=$producto['PRECIO']*$producto['CANTIDAD'];
                      $totalOrg = $total*1.05;

                      if($total<500){
                        $totalOrg = ($total*1.05)+100;
                      }  

                      $_SESSION['TOTALORIGINAL']=$total;
                      $iva=$total*0.05;
                ?>
                <?php }?>
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                <tr id="muestraTotal">
                    <td colspan="3" align="right"><h3>TOTAL ($)</h3><input type="hidden" name="total"></td>
                    <td align="right" style="border-top: 5px solid black;">
                        <h2 id="original" style="text-decoration: line-through;"></h2><br>
                        <h3 id="totalFinal"><?php 
                        if(!isset($_SESSION['CUPON'])){
                            echo number_format(($totalOrg*1.05),2);
                        }else{
                            echo number_format($_SESSION['TOTAL_DESC'],2);
                        }
                        ?></h3>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="5" class="comentarios">
                        <label name="impuestos" id="impuestos">+5% IVA sobre producto (MX)
                            <!--<?php 
                                $totalOrg=$total*1.05;
                                //$_SESSION['TOTAL']=$total;
                            ?>-->
                        </label><br>
                        <label name="costEnvio">
                            <?php
                                if($total>500){
                                    echo "*Envío gratis";
                                }else{
                                    echo "+ $100.00 de envío";
                                    $totalOrg+=100;
                                }
                            ?>
                        </label><br>
                        <label name="cuponAp" id="cuponAp"></label>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="cupon">
            <label for="inputCupon">Ingresar Cupón de Compra</label>
            <input type="text" class="form-control" id="inputCupon" name="inputCupon"> 
            <button class="btn btn-warning" type="submit" name="btnAccion" value="Aplicar" style="margin-top: 5px; text-align:center" onclick="aplicar()">Aplicar</button> <br>
            <a href="tiendaIsacc.php">Volver</a>
        </div>
        </div>
    </div>
    </div>
    </div>



<?php } ?>

<script>
    document.getElementById("original").innerHTML = <?php echo number_format($total,2);?>;
    document.getElementById("totalFinal").innerHTML = <?php echo number_format($totalOrg,2);?>;
    
    <?php 
       if($total > 500){?>
            document.getElementByName("costEnvio").innerHTML = "*Envío gratuito";
    <?php }else{?>
            document.getElementByName("costEnvio").innerHTML = "+ $100.00 de envío";     
    <?php    $totalOrg+=100;
    }?>

    function aplicar(){
        var auxCupon = document.getElementById("inputCupon").value;
        var total_desc = 0;
        var cuponAplicado = "";

        if(auxCupon != ""){
            switch(auxCupon){
                case 'MIORDEN1':
                    <?php if(!isset($_SESSION['C1'])){ ?>
                        ///document.getElementById("original").innerHTML = <?php echo $total;?>;
                        document.getElementById("totalFinal").innerHTML = <?php echo $totalOrg*0.9?>;
                        
                        <?php 
                            $_SESSION['TOTAL_DESC']=$totalOrg*0.9;
                            $_SESSION['CUPON']="1";
                            $_SESSION['C1']="1";
                            $totalOrg*=0.9;
                            $_SESSION['TOTALFINAL']=$totalOrg; 
                            $descuento=$totalOrg*0.1;
                            $cupones.="-10% de descuento del total de la compra [$".$descuento."] '\n'";
                            $_SESSION['CUPONES']="-10% de descuento del total de la compra [$".$descuento."] '\n'";
                        ?>
                        swal("¡EXCELENTE!", "Cupón aplicado correctamente.", "success");
                        document.getElementById("inputCupon").value = "";
                        
                        cuponAplicado = document.getElementById("cuponAp").innerHTML + "-10% de descuento del total de la compra. <br>";
                        document.getElementById("cuponAp").innerHTML = cuponAplicado;

                        var aux = "<?php echo $totalOrg;?>";
                        alert(aux);
                        ////////////////////////////////////////////////////////////////////////////////
                    <?php }else{?>
                        swal("¡OJO!", "El cupón ya ha sido aplicado.", "warning");
                        document.getElementById("inputCupon").value = "";
                        //$_SESSION['C1']="";
                    <?php }?>

                    break;
                case 'CERV2':
                    swal("¡EXCELENTE!", "Cupón aplicado correctamente.", "success");
                    document.getElementById("inputCupon").value = "";

                    cuponAplicado = document.getElementById("cuponAp").innerHTML + "Cervezas al 2x1 <br>";
                    <?php
                        $cupones.="Cervezas al 2x1 '\n'";
                        $_SESSION['CUPONES'].="Cervezas al 2x1 '\n'";
                    ?>
                    document.getElementById("cuponAp").innerHTML = cuponAplicado;
                    break;
                case 'PROMO3':

                    break;
                default:
                    swal("¡ERROR!", "Código de cupón inválido.", "error");
                    <?php 
                        $_SESSION['TOTAL_DESC']=$total;
                        $_SESSION['CUPON']="0";
                    ?>
                    break;
            }
        }
        else{
            swal("¡ERROR!", "No has ingresado ningún código de cupón.", "error");
        }
    }

    //Se activa al cambiar el país
    function muestraImpuestos(){
        var paisActual = document.getElementById("pais").value;

        if(paisActual == "MX"){
            <?php
                if($total>500){
                    $totalOrg=($total*1.05);
                    $_SESSION['TOTALFINAL']=$totalOrg;  
                }else{
                    $totalOrg=($total*1.05)+100;
                    $_SESSION['TOTALFINAL']=$totalOrg;  
                }
                $iva=$total*0.05;
                $_SESSION['IVA']=$iva;
            ?>
            var auxIVA=<?php echo $iva;?>;
                document.getElementById("impuestos").innerHTML = "+ 5% IVA sobre producto (MX) [$" + auxIVA + "]<br>";
                document.getElementById("totalFinal").innerHTML = <?php echo $totalOrg?>;
        }else{
            <?php
                if($total>500){
                    $totalOrg=($total*1.1);
                    $_SESSION['TOTALFINAL']=$totalOrg; 
                }else{
                    $totalOrg=($total*1.1)+100;
                    $_SESSION['TOTALFINAL']=$totalOrg;  
                }
                $iva=$total*0.1;
                $_SESSION['IVA']=$iva;
                ?>
            var auxIVA=<?php echo $iva;?>;
                document.getElementById("impuestos").innerHTML = "+ 10% IVA sobre producto (USA) [$" + auxIVA + "]<br>";
                document.getElementById("totalFinal").innerHTML = <?php echo $totalOrg?>;
        }

    }

    $(document).ready(function(){
        $("#pais").focusin(function(){
            var paisActual = document.getElementById("pais").value;
            if(paisActual == "MX"){
                <?php 
                //if($total>500){
                    //$totalOrg=($totalOrg*1.05); 
                //}else{
                    //$totalOrg=($totalOrg*1.05)+100; 
                //}
                $iva=$total*0.05;
                ?>
                var auxIVA=<?php echo $iva;?>;
                document.getElementById("impuestos").innerHTML = "+5% IVA sobre producto (MX)<br>" + auxIVA;
                document.getElementById("totalFinal").innerHTML = <?php echo $totalOrg?>;
            }else{
                <?php 
                //if($total>500){
                    //$totalOrg=($totalOrg*1.1); 
                //}else{
                    //$totalOrg=($totalOrg*1.1)+100; 
                //} 
                $iva=$total*0.1;?>
                var auxIVA=<?php echo $iva;?>;
                document.getElementById("impuestos").innerHTML = "+10% IVA sobre producto (USA)<br>" + auxIVA;
                document.getElementById("totalFinal").innerHTML = <?php echo $totalOrg?>;
            }
        });
        $("#pais").focusout(function(){
            var paisActual = document.getElementById("pais").value;
            if(paisActual == "MX"){
                <?php 
                //if($total>500){
                    //$totalOrg=($totalOrg*1.05); 
                //}else{
                 //   $totalOrg=($totalOrg*1.05)+100; 
               // } 
                $iva=$total*0.05;?>
                var auxIVA=<?php echo $iva;?>;
                document.getElementById("impuestos").innerHTML = "+5% IVA sobre producto (MX)<br>" + auxIVA;
                document.getElementById("totalFinal").innerHTML = <?php echo $totalOrg?>;
            }else{
                <?php 
                //if($total>500){
                   // $totalOrg=($totalOrg*1.1); 
                //}else{
                 //   $totalOrg=($totalOrg*1.1)+100; 
                //} 
                $iva=$total*0.1;?>
                var auxIVA=<?php echo $iva;?>;
                document.getElementById("impuestos").innerHTML = "+10% IVA sobre producto (USA)<br>" + auxIVA;
                document.getElementById("totalFinal").innerHTML = <?php echo $totalOrg?>;
            }
        });
    });

</script>

</body>
</html>