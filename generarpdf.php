<?php
require('fpdf/fpdf.php');
class PDF extends FPDF{
	function Header(){
		//$this->Image('banner.png',10,8,280,50);
		$this->SetFont('Arial','I',22);
		$this->Cell(0,10,'Reporte De Busqueda',0,0,'C');
	}
	function Footer(){
		$this->SetY(-10);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Page'.$this->PageNo().'',0,0,'C');
		//$this->Image('univalle.png',250,170,33);
	}
}
$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Helvetica','I',23);
$pdf->Image('banner.png',10,8,280,50);
$pdf->Image('logo.jpg',245,150,40,50);
$pdf->Ln(10);
$pdf->Ln(10);
$pdf->Ln(10);
$pdf->Cell(0,7,"Datos Socios Buscados",0,0,'C');
$pdf->Ln(40);
$pdf->SetFont('Times','B',20);
$pdf->SetFillColor(222, 222, 152);
$pdf->Cell(40,7,"Nombre",1,0,'L','true');
$pdf->Cell(40,7,"ApellidoP",1,0,'C','true');
$pdf->Cell(40,7,"ApellidoM",1,0,'C','true');
$pdf->Cell(40,7,"Entrenador",1,0,'C','true');
$pdf->Cell(40,7,"Estado",1,0,'C','true');
$pdf->Cell(40,7,"Edad",1,0,'C','true');
$pdf->Cell(40,7,"Genero",1,0,'R','true');
$pdf->Ln(8);
/*$pdf->Ln(8);
$pdf->Ln(30);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);*/
$buscar=$_POST['buscarh'];
include 'conexion.php';
$result=mysql_query("SELECT * FROM Socio WHERE Nick LIKE '%$buscar%' OR Nombre LIKE '%$buscar%' AND Tipo='atleta' ORDER BY Nombre",$db_handle);
	if($row=mysql_fetch_array($result)){
		do{
			$pdf->SetFont('Courier','I',17);
			$pdf->SetFillColor(152, 222, 194);
			$pdf->Cell(40,7,$row['Nombre'],1,0,'L','true');
			$pdf->Cell(40,7,$row['ApellidoP'],1,0,'C','true');
			$pdf->Cell(40,7,$row['ApellidoM'],1,0,'C','true');
			$pdf->Cell(40,7,$row['Entrenador'],1,0,'C','true');
			$pdf->Cell(40,7,$row['Estado'],1,0,'C','true');
			$pdf->Cell(40,7,$row['Edad'],1,0,'C','true');
			$pdf->Cell(40,7,$row['Genero'],1,0,'R','true');
			$pdf->Ln(8);
		}while ($row=mysql_fetch_array($result));
	}
/*$pdf->Cell(0,10,'',0,1);
$pdf->Ln();
$pdf->Cell(0,7,'',0,0,'C');
$pdf->Ln(15);
$pdf->SetTextColor('255','0','0');*/
$pdf->Ln(40);
$pdf->SetFont('Helvetica','B',23);
$pdf->Cell(0,10,"".date("d")."/".date("m")."/".date("Y")."",0,0,'L');
$pdf->Output();
?>

