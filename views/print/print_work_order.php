<?php
include 'config.php';
require ('rounded_rect.php');

while ($row = mysql_fetch_array($query)) {
	

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetXY(2,2);
// $pdf->Image('mobil.PNG',10,10,20,15);
$pdf->SetFont('times','B',10);
$pdf->SetXY(35,13);
$pdf->Cell(56,5,'PERSADA NUSANTARA(Auto Body Paint)',0,0,'L');
$pdf->SetFont('times','',10);
$pdf->SetXY(35,19);
$pdf->Cell(56,5,'Jl.TB Simatupang 147',0,0,'L');
$pdf->SetXY(35,22);
$pdf->Cell(56,5,'Jakarta-Indonesia',0,0,'L');

//WorkOrder
$pdf->SetFont('times','B',16);
$pdf->SetXY(98,10);
$pdf->Cell(113,5,'Work Order',0,0,'C');
$pdf->SetXY(113,13);
$pdf->Cell(104,5,'----------------------------------------------',0,0,'L');
$pdf->SetFont('times','',10);
$pdf->SetXY(127,17);
$pdf->Cell(60,5,'No.Faktur',0,0,'L');
$pdf->SetXY(127,21	);
$pdf->Cell(60,5,'Tgl Faktur',0,0,'L');
$pdf->SetXY(153,17);
$pdf->Cell(60,5,$row['work_order_id'],0,0,'L');
$pdf->SetXY(153,21);
$pdf->Cell(60,5,$row['date'],0,0,'L');
$pdf->SetFont('times','B',16);
$pdf->SetXY(113,24);
$pdf->Cell(104,5,'----------------------------------------------',0,0,'L');
$pdf->SetFont('times','',10);
$pdf->SetXY(185,28);
$pdf->Cell(15,5, "Petugas",0, 1, 'L');
$pdf->SetFont('times','B',11);
$pdf->SetXY(184,32);
$pdf->Cell(15,5, "ANDRI",0, 1, 'L');
$pdf->SetXY(117,32);
$pdf->Cell(22,5, "Konsumen",0, 1, 'L');

//table kepada;
$pdf->SetXY(20,33);
$pdf->Cell(22,5, "Kepada Yth",0, 1, 'L');
$pdf->SetLineWidth(0.4);
$pdf->SetFillColor(0);
$pdf->RoundedRect(20, 38, 87, 23, 2, '');
//Isi dari diterima;
$pdf->SetFont('times','B',10);
$pdf->SetXY(21,39);
$pdf->Cell(30,5,$row['asuransi_name'],0,1);
$pdf->SetXY(21,43);
$pdf->Cell(76,5, $row['asuransi_address'],	0, 1, 'L');
$pdf->SetXY(21,47);
$pdf->Cell(86,5, "Nanang Jakarta Selatan 12100",0,0, 'L');
$pdf->SetXY(37,51);
$pdf->Cell(59,5, "_____________________________________",0, 1, 'L');
$pdf->SetFont('times','I',10);
$pdf->SetXY(21,55);
$pdf->Cell(20,5, "Attention :",0, 1, 'L');

//tabel data asuransi konsumen;
$pdf->SetXY(20,62);
$pdf->Cell(22,5, "Data Asuransi Konsumen",0, 1, 'L');
$pdf->SetLineWidth(0.4);
$pdf->SetFillColor(0);
$pdf->RoundedRect(20, 67, 87, 18, 2, '');
//Isi dari Data asuransi konsumen ;
$pdf->SetFont('times','',10);
$pdf->SetXY(22,68);
$pdf->Cell(24,5, "Nama Asuransi",0, 1, 'L');
$pdf->SetXY(22,73);
$pdf->Cell(20,5, "No Polis",0, 1, 'L');
$pdf->SetXY(22,78);
$pdf->Cell(29,5, "Tgl Akhir Asuransi",0, 1, 'L');
$pdf->SetXY(54,68);
$pdf->Cell(20,5, $row['asuransi_name'],0, 1, 'L');
$pdf->SetXY(54,73);
$pdf->Cell(36,5, $row['no_polis'],0, 1, 'L');
$pdf->SetXY(54,78);
$pdf->Cell(20,5, $row['date_asuransi'],0, 1, 'L');

//table Konsumen;
$pdf->SetLineWidth(0.4);
$pdf->SetFillColor(0);
$pdf->RoundedRect(115, 37, 85, 48, 2, '');
//isi konsumen;
$pdf->SetFont('times','B',11);
$pdf->SetXY(118,38);
$pdf->Cell(22,5, "YULIANTI SUSANTI",0, 1, 'L');
$pdf->SetFont('times','',11);
$pdf->SetXY(118,41);
$pdf->Cell(22,5, "Jl. Juanda 50 Harmoni",0, 1, 'L');
$pdf->SetXY(118,45);
$pdf->Cell(22,5, "Jakarta Pusat 11140 DKI-Jakarta",0, 1, 'L');
$pdf->SetFont('times','',16);
$pdf->SetXY(118,48);
$pdf->Cell(22,5, "------------------------------------------",0, 1, 'L');
$pdf->SetFont('times','',11);
$pdf->SetXY(121,51);
$pdf->Cell(22,5, "Merk Mobil",0, 1, 'L');
$pdf->SetXY(121,56);
$pdf->Cell(22,5, "Tahun ",0, 1, 'L');
$pdf->SetXY(121,61);
$pdf->Cell(22,5, "Warna",0, 1, 'L');
$pdf->SetXY(121,66);
$pdf->Cell(22,5, "Nomer Polis",0, 1, 'L');
$pdf->SetXY(121,72);
$pdf->Cell(22,5, "Nomer Mesin",0, 1, 'L');
$pdf->SetXY(121,77);
$pdf->Cell(22,5, "Nomer Rangka",0, 1, 'L');

//isi konsumen
$pdf->SetXY(155,51);
$pdf->Cell(22,5, $row['merk_name'],0, 1, 'L');
$pdf->SetXY(155,56);
$pdf->Cell(22,5, $row['tahun'],0, 1, 'L');
$pdf->SetXY(155,61);
$pdf->Cell(22,5, $row['color_name'],0, 1, 'L');
$pdf->SetXY(155,66);
$pdf->Cell(22,5, $row['no_polisi'],0, 1, 'L');
$pdf->SetXY(155,72);
$pdf->Cell(22,5, $row['no_mesin'],0, 1, 'L');
$pdf->SetXY(155,77);
$pdf->Cell(22,5, $row['no_rangka'],0, 1, 'L');

//tabel Rincian Pembayaran
$pdf->SetFont('times','',10);
$pdf->SetXY(17,89);
$pdf->Cell(10,8,'No',1,0,'C');
$pdf->Cell(28,8,'Kode',1,0,'C');
$pdf->Cell(95,8,'Rincian Jasa/Barang',1,0,'C');
$pdf->Cell(25,8,'Banyak',1,0,'C');
$pdf->Cell(25,8,'Serial Number',1,0,'C');
		
$pdf->SetLineWidth(0.3);
$pdf->SetXY(17,97);
$pdf->Cell(10,15,'',1,0,'C');
$pdf->Cell(28,15,'',1,0,'C');
$pdf->Cell(95,15,'',1,0,'C');
$pdf->Cell(25,15,'',1,0,'R');
$pdf->Cell(25,15,'',1,0,'R');	

//Isi Rincian Pembayaran
$pdf->SetXY(17,97);
$pdf->Cell(10,5,'1',1,0,'C');
$pdf->SetXY(27,97);
$pdf->Cell(28,5,'B LAMPDEP',1,0,'L');
$pdf->SetXY(55,97);
$pdf->Cell(95,5,'Lampu Depan',1,0,'L');
$pdf->SetXY(150,97);
$pdf->Cell(25,5,'1',1,0,'C');
$pdf->SetXY(175,97);
$pdf->Cell(25,5,'00',1,0,'C');

//Keterangan
$pdf->SetFont('times','',11);
$pdf->SetXY(16,113);
$pdf->Cell(22,5, "Keterangan  :",0, 1, 'L');
$pdf->SetXY(17,118);
$pdf->Cell(183,17, "",1, 1, 'L');

}

$pdf->Output("work_order.pdf");

?>