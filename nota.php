<?php
include 'global/config.php';
//include 'global/conexion.php';
include 'carrito.php';

require ('fpdf182/fpdf.php');

// Creación del objeto
//session_start();
$usuario = "Isacc Alberto De Lira Mata";
//$lastDigit = $_SESSION['DIGITOS'];
//$formaPagar = $_SESSION['FORMAPAGO'];
$formaPagar = "OXXO";

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFont('Times','',13);
$pdf->Cell(20);
$pdf->Cell(150,10,utf8_decode('ISCertificación, organización profesional de certificación, por medio del presente'),0,0,'C');
$pdf->Ln(10);
$pdf->Cell(20);
$pdf->Cell(150,10,'documento certifica que',0,0,'C');
$pdf->SetFont('Helvetica','B',25);
$pdf->Ln(15);
$pdf->Cell(20);
$pdf->Cell(150,15,$usuario,0,0,'C');
$pdf->SetFont('Times','',13);
$pdf->Ln(35);
$pdf->Cell(20);
$pdf->Cell(150,10,'Ha completado exitosamente el',0,0,'C');
$pdf->SetFont('Courier','B',27);
$pdf->Ln(15);
$pdf->Cell(20);
$pdf->SetTextColor(255, 153, 0);
$pdf->Cell(150,15,utf8_decode('PROGRAMA DE CERTIFICACIÓN EN'),0,0,'C');
$pdf->Ln(10);
$pdf->Cell(20);
$pdf->Cell(150,15,'LENGUAJE C++',0,0,'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times','',13);
$pdf->Ln(20);
$pdf->Cell(20);

//Obteniendo fecha de sistema
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$fecha = explode("/",$_SESSION['fechaEx']);

$_SESSION['fechaEx']="";

$pdf->Cell(150,10,'En testimonio de lo anterior, se firma en la ciudad de Aguascalientes, AGS.',0,0,'C');
$pdf->Ln(10);
$pdf->Cell(20);
$pdf->Cell(150,10,utf8_decode('A los '.$fecha[0].' días del mes de '.$meses[$fecha[1]-1].' del año '.$fecha[2].'.'),0,0,'C');
$pdf->Ln(30);
$pdf->Cell(20);
$pdf->SetFont('Times','B',13);
$pdf->Cell(150,10,'INSTRUCTORES',0,0,'C');
$pdf->Line(40,260,90,260);
$pdf->Line(40,262,90,262);
$pdf->Line(120,260,170,260);
$pdf->Line(120,262,170,262);
//$pdf->Image('IMG/firmaSergio.png',40,235,50);
//$pdf->Image('IMG/firmaIsacc.png',125,230,35);
$pdf->Ln(45);
$pdf->Cell(30);
$pdf->SetFont('Times','',13);
$pdf->Cell(50,10,'Sergio Ruvalcaba Lozano',0,0,'C');
$pdf->Cell(30);
$pdf->Cell(50,10,'Isacc Alberto De Lira Mata',0,0,'C');
$pdf->Ln(5);
$pdf->Cell(30);
$pdf->SetFont('Times','I',11);
$pdf->Cell(50,10,utf8_decode('Co-Fundador de ISCertificación'),0,0,'C');
$pdf->Cell(30);
$pdf->Cell(50,10,utf8_decode('Co-Fundador de ISCertificación'),0,0,'C');
$pdf->Output();

?>