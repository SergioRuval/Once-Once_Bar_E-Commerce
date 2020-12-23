<?php

$pdf->SetFont('Arial','',12);
$pdf->Cell(20);
$pdf->Cell(150,30,utf8_decode('Paga tu pedido de ONCE:ONCE Sports Bar en OXXO.'),0,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(20);
$pdf->Cell(150,30,'$'.$total,0,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$pdf->Cell(20);
$pdf->Cell(150,30,utf8_decode('Dicta al cajero(a) los siguientes números:'),0,0,'C');
$pdf->Ln(8);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20);
$pdf->Cell(150,30,utf8_decode('3322 8857 1234 0239'),0,0,'C');
$pdf->Ln(30);
$pdf->Line(15,165,195,165);

?>