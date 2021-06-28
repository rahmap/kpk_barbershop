<?php
date_default_timezone_set('Asia/Jakarta'); 

include 'koneksi.php';
require('../../fpdf/fpdf.php');
$query = mysqli_query($conn,"SELECT SUM(pendapatan) as jumlah,tgl_acc FROM `laporan` 
							 WHERE (tgl_acc BETWEEN '".date('01 F, Y')."' AND '".date('d F, Y')."')  GROUP BY tgl_acc ");
$tot = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(pendapatan) as jumlah FROM `laporan`"));


$textColour = array( 0, 0, 0 );
$headerColour = array( 100, 100, 100 );
$tableHeaderTopTextColour = array( 255, 255, 255 );
$tableHeaderTopFillColour = array( 125, 152, 179 );
$tableHeaderTopProductTextColour = array( 0, 0, 0 );
$tableHeaderTopProductFillColour = array( 143, 173, 204 );
$tableHeaderLeftTextColour = array( 99, 42, 57 );
$tableHeaderLeftFillColour = array( 184, 207, 229 );
$tableBorderColour = array( 50, 50, 50 );
$tableRowFillColour = array( 213, 170, 170 );
$reportName = "Laporan Pendapatan ALDYS BarberShop";
$columnLabels = array( "Tanggal", "Pendapatan" );

$pdf = new FPDF( 'P', 'mm', 'A4' );

$pdf->AddPage();
$pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
$pdf->SetFont( 'Arial', 'B', 17 );
$pdf->Cell( 0, 15, $reportName, 0, 0, 'C' );
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->Ln( 16 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, "Laporan pendapatan ALDYS BarberShop berdasarkan hari, yang terjadi mulai tanggal "
	.date('01 F, Y')." sampai ".date('d F, Y').'.' );


$pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
$pdf->Ln( 8 );


$pdf->SetFont( 'Arial', 'B', 15 );


$pdf->SetTextColor( $tableHeaderTopProductTextColour[0], $tableHeaderTopProductTextColour[1], $tableHeaderTopProductTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopProductFillColour[0], $tableHeaderTopProductFillColour[1], $tableHeaderTopProductFillColour[2] );


$pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopFillColour[0], $tableHeaderTopFillColour[1], $tableHeaderTopFillColour[2] );

for ( $i=0; $i<count($columnLabels); $i++ ) {
  $pdf->Cell( 87, 8, $columnLabels[$i], 1, 0, 'C', true );
}

$pdf->Ln( 8 );


$fill = false;
$row = 0;

foreach ( $query as $dataRow ) {

	$pdf->SetFont( 'Arial', 'B', 15 );
	$pdf->SetTextColor( $tableHeaderLeftTextColour[0], $tableHeaderLeftTextColour[1], $tableHeaderLeftTextColour[2] );
	$pdf->SetFillColor( $tableHeaderLeftFillColour[0], $tableHeaderLeftFillColour[1], $tableHeaderLeftFillColour[2] );
	$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
	$pdf->SetFillColor( $tableRowFillColour[0], $tableRowFillColour[1], $tableRowFillColour[2] );
	$pdf->SetFont( 'Arial', '', 12 );


	$pdf->Cell( 87, 7, ($dataRow['tgl_acc'] ) , 1, 0, 'C', $fill );
	$pdf->Cell( 87, 7, ( 'Rp ' . number_format( $dataRow['jumlah'] ) ), 1, 0, 'C', $fill );

	$pdf->Ln( 7 );
}

$tableHeaderTopFillColour = array( 173, 60, 60 );
$pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopFillColour[0], $tableHeaderTopFillColour[1], $tableHeaderTopFillColour[2] );
$pdf->Ln( 7 );
$columnLabels1 = array( "Total Pendapatan", 'Rp '.number_format($tot['jumlah']) );
for ( $i=0; $i<count($columnLabels); $i++ ) {
  $pdf->Cell( 87, 10, $columnLabels1[$i], 1, 0, 'C', true );
}

$pdf->Output( "ALDYS Barbershop - Laporan Pendapatan.pdf", "I" );
?>