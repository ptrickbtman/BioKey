<?php
require 'controller/fpdf/fpdf.php';
$pdf = new FPDF();
$pdf -> AddPage('PORTRAIT','letter');
$pdf -> SetFont('Arial','B',14);
$pdf -> Cell(75,7,utf8_decode('BioKey'));
$pdf -> Ln();
$pdf -> Ln();
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(75,7,utf8_decode('Detalle de compra:'));
$pdf -> Ln();
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(40,7,utf8_decode('Orden de compra:'));
$pdf -> Cell(40,7,utf8_decode($_POST['ordC']));
$pdf -> Ln();
$pdf -> Cell(40,7,utf8_decode('Fecha:'));
$pdf -> Cell(40,7,utf8_decode($_POST['fechC']));
$pdf -> Ln();
$pdf -> Ln();
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(75,7,utf8_decode('Datos del comprador:'));
$pdf -> SetFont('Arial','',12);
$pdf -> Ln();
$pdf -> Cell(40,7,utf8_decode('Rut:'));
$pdf -> Cell(40,7,utf8_decode($_POST['rutC']));
$pdf -> Ln();
$pdf -> Cell(40,7,utf8_decode('Nombre:'));
$pdf -> Cell(40,7,utf8_decode($_POST['nomC']));
$pdf -> Ln();
$pdf -> Cell(40,7,utf8_decode('Correo:'));
$pdf -> Cell(40,7,utf8_decode($_POST['corC']));
$pdf -> Ln();
$pdf -> Cell(40,7,utf8_decode('Telefono:'));
$pdf -> Cell(40,7,utf8_decode($_POST['telC']));
$pdf -> Ln();
$pdf -> Ln();
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(75,7,utf8_decode('Dirección de envió:'));
$pdf -> Ln();
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(75,7,utf8_decode($_POST['comC']));
$pdf -> Ln();
$pdf -> Cell(75,7,utf8_decode($_POST['dirC']));
$pdf -> Ln();
$pdf -> Ln();
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(75,7,utf8_decode('Productos:'));
$pdf -> Ln();
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(75,7,utf8_decode("- ".$_POST['cantiC']." Cerradura inteligente BioKey V1.1 (".$_POST['preUnitC'].")"));
$pdf -> Ln();
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(75,7,utf8_decode('Total a pagar: $'.$_POST['preTotC'].' CLP'));
$pdf -> Ln();
$pdf -> Ln();
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(40,7,utf8_decode('Metodo de pago:'));
$pdf -> Cell(40,7,utf8_decode($_POST['nomMetPagC']));
$pdf -> SetFont('Arial','',10);
$pdf -> Ln();
$pdf -> Ln();
$pdf -> Ln();
$pdf -> Cell(25,7,utf8_decode('Gracias por confiar en nosotros, ante cualquier duda, solicitud de cambio o rembolso contáctenos al ""'));
$pdf -> Ln();
$pdf -> Cell(25,7,utf8_decode('o al correo "" , por favor lea las políticas de nuestro sitio antes de realizar una de estas solicitudes. '));
$pdf -> Close();
$pdf -> Output('D','comprobanteBioKey.pdf');
?>