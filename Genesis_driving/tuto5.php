<?php
require('fpdf.php');
$transactid = $_POST['transactid'];
$paidfor = $_POST['paid_for'];
$paidby = $_POST['paid_by'];
$amount = $_POST['amount'];
class PDF extends FPDF
{
// Colored table
function FancyTable($header, $data)
{
	// Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	// Header
	$w = array(40, 35, 40, 40, 40);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Data
	$w = array(40, 35, 40, 40, 40);
	for($i=0;$i<count($data);$i++)
		$this->Cell($w[$i],7,$data[$i],1,0,'C',true);
	$this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
$header = array('Transaction ID', 'Amount', 'Paid by','Paid to','Date');
// Data loading
$data = array($transact_id,$paidfor,$paidby,$id,$amount);
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->ob_end_clean();
$pdf->Output();
?>
