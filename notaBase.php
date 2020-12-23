<?php

include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';

require ('fpdf182/fpdf.php');

//$idUsuario=$_SESSION['IDUsuario'];
//Obtener los datos del pago
$sentencia = $pdo->prepare("SELECT * FROM `pago`");
$sentencia->execute();
$pagosActual=$sentencia->fetchAll(PDO::FETCH_ASSOC);

$pagoActual = [];
foreach($pagosActual as $i=>$pago){
    if($pago['IDUsuario']==21){
        $pagoActual = $pago;
        break;
    }
}

// Creación del objeto de la clase heredada
//session_start();
$nombre = "Isacc Alberto De Lira Mata";
//$formaPago = ;
$direccion = "Privada Norberto Gómez";
$ciudad = "Aguascalientes";
$edo = "Aguascalientes";
$pais = "México";
$tel = "4495541891";
$cp = "20030";
$digitos = "4545";
$total = 629.00;

//$productos = array();

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//Encabezado
// Logo
	$pdf->Image('images/logo.jpg',95,10,20,20);
	// Arial bold 15
	$pdf->SetFont('Arial','B',15);
	// Movernos a la derecha
	$pdf->Ln(20);
    $pdf->Cell(80);
	// Título
    if($pagoActual['FormaPago']=="OXXO")
	   $pdf->Cell(30,10,utf8_decode('BOLETA DE PAGO'),0,0,'C');
    else
        $pdf->Cell(30,10,utf8_decode('RECIBO DE PAGO'),0,0,'C');
	// Salto de línea
    $pdf->Ln(5);
    $fecha = getdate();
    $pdf->SetFont('Courier','B',11);
    $pdf->Cell(190,10,$fecha['mday'].'-'.$fecha['mon'].'-'.$fecha['year'],0,0,'C');
	$pdf->Ln(15);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(20);
$pdf->Cell(150,10,utf8_decode('DATOS DEL CLIENTE'),0,0,'C');

$pdf->Ln(8);

//TABLA
$pdf->SetDrawColor(201,30,30);
$pdf->Line(15,45,195,45);
$pdf->Line(15,125,195,125);

$pdf->SetFont('Courier','B',11);
$pdf->Cell(20);
$pdf->Cell(150,10,utf8_decode('Forma de pago:'),0,0,'C');
$pdf->Ln(5);
$pdf->SetFont('Courier','U',13);
$pdf->Cell(15);

if($pagoActual['FormaPago']=="OXXO"){
    $pdf->Cell(155,10,utf8_decode($pagoActual['FormaPago']),0,0,'C');
}else if($pagoActual['FormaPago']=="BBVA Bancomer"){
    $pdf->Cell(160,10,utf8_decode($pagoActual['FormaPago']),0,0,'C');
    $pdf->Ln(10);
    $pdf->SetFont('Courier','B',11);
    $pdf->Cell(20);
    $pdf->Cell(100,10,utf8_decode('Número de Tarjeta:'),0,0,'C');
    $pdf->SetFont('Courier','',11);
    $pdf->Cell(5);
    $pdf->Cell(5,10,'XXXX-XXXX-XXXX-'.$pagoActual['Digitos'],0,0,'C');
}else{
    $pdf->Cell(160,10,utf8_decode($pagoActual['FormaPago']),0,0,'C');
    $pdf->Ln(10);
    $pdf->SetFont('Courier','B',11);
    $pdf->Cell(20);
    $pdf->Cell(100,10,utf8_decode('Número de Tarjeta:'),0,0,'C');
    $pdf->SetFont('Courier','',11);
    $pdf->Cell(5);
    $pdf->Cell(10,10,'XXXX-XXXX-XXXX-'.$pagoActual['Digitos'],0,0,'C');
}
    
$pdf->Ln(10);

$pdf->SetFont('Courier','B',11);
$pdf->Cell(20);
$pdf->Cell(1,10,utf8_decode('Nombre:'),0,0,'C');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20);
$pdf->Cell(40,10,$nombre,0,0,'C');
$pdf->Ln(5);

$pdf->SetFont('Courier','B',11);
$pdf->Cell(20);
$pdf->Cell(8,10,utf8_decode('Dirección:'),0,0,'C');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20);
$pdf->Cell(60,10,utf8_decode($pagoActual['Direccion']),0,0,'C');
$pdf->Ln(5);

$pdf->SetFont('Courier','B',11);
$pdf->Cell(20);
$pdf->Cell(30,10,utf8_decode('Código Postal:'),0,0,'C');
$pdf->SetFont('Courier','',11);
$pdf->Cell(6);
$pdf->Cell(10,10,$pagoActual['CP'],0,0,'C');


$pdf->Ln(5);

$pdf->SetFont('Courier','B',11);
$pdf->Cell(20);
$pdf->Cell(14,10,utf8_decode('Ciudad:'),0,0,'C');
$pdf->SetFont('Courier','',11);
$pdf->Cell(6);
$pdf->Cell(25,10,$pagoActual['Ciudad'],0,0,'C');
$pdf->Ln(5);

$pdf->SetFont('Courier','B',11);
$pdf->Cell(20);
$pdf->Cell(14,10,utf8_decode('Estado:'),0,0,'C');
$pdf->SetFont('Courier','',11);
$pdf->Cell(6);
$pdf->Cell(25,10,$pagoActual['Estado'],0,0,'C');
$pdf->Ln(5);

$pdf->SetFont('Courier','B',11);
$pdf->Cell(5);
$pdf->Cell(39,10,utf8_decode('País:'),0,0,'C');
$pdf->SetFont('Courier','',11);
$pdf->Cell(6);

if($pagoActual['Pais']=="MX"){
    $pdf->Cell(1,10,utf8_decode('MÉXICO'),0,0,'C');
}else{
    $pdf->Cell(1,10,utf8_decode('ESTADOS UNIDOS'),0,0,'C');
}

$pdf->Ln(5);

$pdf->SetFont('Courier','B',11);
$pdf->Cell(20);
$pdf->Cell(22,10,utf8_decode('Num. Telefónico:'),0,0,'C');
$pdf->SetFont('Courier','',11);
$pdf->Cell(13);
$pdf->Cell(19,10,$pagoActual['NumTel'],0,0,'C');
$pdf->Ln(10);


//Vemos cuál forma de pago se eligió
switch($pagoActual['FormaPago']){
    case 'OXXO':
        require ('nota1.php');
        break;
    case 'BBVA Bancomer':
        $pdf->Ln(10);
        break;
    case 'Santander':
        $pdf->Ln(10);
        break;
}

//Mostrando la lista de productos con gastos de envío, impuestos y descuentos

$pdf->SetFont('Arial','B',12);
//$pdf->Cell(10);
$pdf->Cell(0,0,utf8_decode('RESUMEN DE PEDIDO'),0,0,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(90,10,utf8_decode('PRODUCTO'),0,0,'C');
$pdf->Cell(10);
$pdf->Cell(10,10,utf8_decode('CANTIDAD'),0,0,'C');
$pdf->Cell(10);
$pdf->Cell(30,10,utf8_decode('PRECIO'),0,0,'C');
$pdf->Cell(10);
$pdf->Cell(10,10,utf8_decode('COSTO'),0,0,'C');
$pdf->Ln(5);

$pdf->SetFont('Courier','',11);
//Aquí los muestra
foreach($_SESSION['CARRITO'] as $i=>$producto){
    $pdf->Cell(90,10,utf8_decode($producto['NOMBRE']),0,0,'C');
    $pdf->Cell(30,10,$producto['CANTIDAD'],0,0,'C');
    $pdf->Cell(30,10,$producto['PRECIO'],0,0,'C');
    $pdf->Cell(30,10,number_format($producto['PRECIO']*$producto['CANTIDAD'],2),0,0,'C');
    $pdf->Ln(5);
}

$pdf->Ln(5);

$pdf->SetFont('Arial','I',11);
$pdf->Cell(150,10,'TOTAL',0,0,'R');
$pdf->Ln(5);
$pdf->Cell(173,1,'$'.number_format($pagoActual['TotalFinal'],2),0,0,'R');
$pdf->Ln(5);

if($pagoActual['TotalOriginal']>500){
    $pdf->Cell(175,10,utf8_decode('* Envío gratis'),0,0,'R');
}else{
    $pdf->Cell(175,10,utf8_decode('+ $100.00 de envío'),0,0,'R');
}

$pdf->Ln(10);

if($pagoActual['Pais']=="MX"){
    $pdf->Cell(173,1,'+ 5% IVA sobre producto (MX) $'.number_format($pagoActual['Impuesto'],2),0,0,'R');
}else{
    $pdf->Cell(173,1,'+ 10% IVA sobre producto (USA) $'.number_format($pagoActual['Impuesto'],2),0,0,'R');
}

$pdf->Ln(5);

$pdf->Cell(173,1,$pagoActual['Cupones'],0,0,'R');


//Pie de página
$pdf->Image('images/bordePie.png',30,280,150,3);
$pdf->Ln(2);


$pdf->Output();

?>