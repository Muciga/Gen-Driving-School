<?php 
require 'fpdf.php';
class PDF extends FPDF{
	function LoadData($file){
		$lines = file($file);
		$data = array();
		foreach($lines as $line)
			$data[] = explode(';',trim($line));
		return $data;
	}
	function BasicTable($header){
		foreach($header as $col)
			$this->Cell(40,7,$col,1);
		$this->Ln();
	}
}
$pdf = new FPDF();
$header = array('Country', 'Capital', 'Area', 'Population');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header);
$pdf->Output();
?>