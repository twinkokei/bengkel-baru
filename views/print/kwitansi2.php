<?php
require('rounded_rect.php');

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetXY(2,2);
$pdf->Image('mobil.PNG',10,10,20,15);
$pdf->SetFont('times','B',10);
$pdf->SetXY(35,13);
$pdf->Cell(56,5,'PERSADA NUSANTARA(Auto Body Paint)',0,0,'L');
$pdf->SetFont('times','',10);
$pdf->SetXY(35,19);
$pdf->Cell(56,5,'Jl.TB Simatupang 147',0,0,'L');
$pdf->SetXY(35,22);
$pdf->Cell(56,5,'Jakarta-Indonesia',0,0,'L');

//WorkOrder
$pdf->SetFont('times','B',18);
$pdf->SetXY(98,10);
$pdf->Cell(113,5,'KWITANSI',0,0,'C');
$pdf->SetXY(113,13);
$pdf->Cell(104,5,'-----------------------------------------',0,0,'L');
$pdf->SetFont('times','',10);
$pdf->SetXY(127,17);
$pdf->Cell(60,5,'No.Kwitansi',0,0,'L');
$pdf->SetXY(127,21	);
$pdf->Cell(60,5,'Tgl Bayar',0,0,'L');
$pdf->SetXY(153,17);
$pdf->Cell(60,5,'1009',0,0,'L');
$pdf->SetXY(153,21);
$pdf->Cell(60,5,'21 Jul 2016',0,0,'L');
$pdf->SetFont('times','B',16);
$pdf->SetXY(113,24);

//table kepada;
$pdf->SetFont('times','',10);
$pdf->SetXY(8,28);
$pdf->Cell(40,10,'Terima Dari',0,1);
$pdf->SetLineWidth(0.4);
$pdf->SetFillColor(0);
$pdf->RoundedRect(35, 31, 78, 22, 2, '');
//isi tabel kepada;
$pdf->SetFont('times','B',11);
$pdf->SetXY(37,33);
$pdf->Cell(30, 5, "YULIANTI SUSANTI", 0, 1, 'L');
$pdf->SetFont('times','',10);
$pdf->SetXY(37,38);
$pdf->Cell(30, 4, "Jl. Juanda 50", 0, 1, 'L');
$pdf->SetXY(37,42);
$pdf->Cell(30, 4, "Harmoni", 0, 1, 'L');
$pdf->SetXY(37,46);
$pdf->Cell(30, 4, "Jakarta pusat 11140", 0, 1, 'L');
//tabel merk kend;
$pdf->SetLineWidth(0.4);
$pdf->SetFillColor(0);
$pdf->RoundedRect(117, 31, 45, 40, 2, '');
$pdf->SetFont('times','',10);
$pdf->SetXY(118,33);
$pdf->Cell(30, 4, "Merk Kend.", 0, 1, 'L');
$pdf->SetXY(129,38);
$pdf->Cell(30, 4, "TOYOTA", 0, 1, 'L');
$pdf->SetXY(118,46);
$pdf->Cell(30, 4, "Nomer Polisi", 0, 1, 'L');
$pdf->SetXY(131,51);
$pdf->Cell(30, 4, "B 15180 ZJW", 0, 1, 'L');
$pdf->SetXY(118,60);
$pdf->Cell(30, 4, "Warna", 0, 1, 'L');
$pdf->SetXY(135,64);
$pdf->Cell(25, 4, "PUTIH", 0, 1, 'L');

//tabel dibayar;
$pdf->SetXY(8,53);
$pdf->Cell(40,5,'Dibayar',0,1);
$pdf->SetLineWidth(0.5);
$pdf->SetFillColor(0);
$pdf->RoundedRect(35, 53, 78, 18, 2, '');

//tabel dibayar melalui
$pdf->SetXY(165,31);
$pdf->Cell(38,40,'',0,1);
$pdf->SetFont('times','',9);
$pdf->SetXY(167,33);
$pdf->Cell(30, 4, "Dibayar Melalui", 0, 1, 'L');
$pdf->SetFont('times','B',9);
$pdf->SetXY(175,37);
$pdf->Cell(30, 4, "1000.03-Bank", 0, 1, 'L');
$pdf->SetFont('times','',9);
$pdf->SetXY(167,42);
$pdf->Cell(30, 4, "No. Cek", 0, 1, 'L');
$pdf->SetXY(175,46);
$pdf->Cell(30, 4, "", 0, 1, 'L');
$pdf->SetXY(167,50);
$pdf->Cell(30, 4, "Jml Cek Bank", 0, 1, 'L');
$pdf->SetXY(177,54);
$pdf->Cell(30, 4, "1.500.000", 0, 1, 'L');
$pdf->SetXY(167,59);
$pdf->Cell(25, 4, "Tgl Cek Bank", 0, 1, 'L');
$pdf->SetXY(177,65);
$pdf->Cell(25, 4, "21 Jul 2016", 0, 1, 'L');

//uang sejumlah;
$pdf->SetXY(8,72);
$pdf->Cell(40,10,'Uang Sejumlah',0,1);
$pdf->SetXY(37,73);
$pdf->SetLineWidth(0.3);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetDrawColor(0, 0, 0);
$pdf->Cell(165, 8, "Satu juta lima ratus ribu rupiah", 1, 1	, 'L');

//tabel Rincian Pembayaran
$pdf->SetXY(13,80);
$pdf->SetFont('times','B',10);
$pdf->Cell(40,10,'Rincian Pembayaran',0,1);
$pdf->SetFont('times','',8);
$pdf->SetY(88);
$pdf->Cell(10,8,'No',1,0,'C');
$pdf->Cell(24,8,'No Faktur',1,0,'C');
$pdf->Cell(24,8,'Tgl Faktur',1,0,'C');
$pdf->Cell(33,8,'Tagihan',1,0,'C');
$pdf->Cell(33,8,'Pembayaran',1,0,'C');
$pdf->Cell(32,8,'Sisa Tagihan',1,0,'C');
$pdf->Cell(36,8,'Keterangan',1,1,'C');

$pdf->SetY(96);
$pdf->Cell(10,20,'',1,0,'C');
$pdf->Cell(24,20,'',1,0,'C');
$pdf->Cell(24,20,'',1,0,'C');
$pdf->Cell(33,20,'',1,0,'R');
$pdf->Cell(33,20,'',1,0,'R');
$pdf->Cell(32,20,'',1,0,'R');
$pdf->Cell(36,20,'',1,1,'C');
//isi tabel rincian;
$pdf->SetY(96);
$pdf->Cell(10,5,'1',0,0,'C');
$pdf->Cell(24,5,'110019',0,0,'C');
$pdf->Cell(24,5,'4 Feb 2016',0,0,'C');
$pdf->Cell(33,5,'1.500.000',0,0,'R');
$pdf->Cell(33,5,'1.500.000',0,0,'R');
$pdf->Cell(32,5,'0',0,0,'R');
$pdf->Cell(36,5,'',0,1,'C');

//pembayaran,sisa,total dis,lebih bayar;
$pdf->SetLineWidth(0.2);
$pdf->SetFillColor(0);
$pdf->RoundedRect(146, 117, 56, 5, 2, '');
$pdf->SetLineWidth(0.2);
$pdf->SetFillColor(0);
$pdf->RoundedRect(146, 123, 56, 11, 2, '');
$pdf->SetLineWidth(0.2);
$pdf->SetFillColor(0);
$pdf->RoundedRect(146, 135, 56, 5, 2, '');

//prepared,riviewed,paid,received,date;
$pdf->SetXY(10,118);
$pdf->Cell(17,5,'Prepared By',0,0,'L');
$pdf->SetXY(38,118);
$pdf->Cell(17,5,'Reviewed By',0,0,'L');
$pdf->SetXY(64,118);
$pdf->Cell(17,5,'Reviewed By',0,0,'L');
$pdf->SetXY(90,118);
$pdf->Cell(17,5,'Reviewed By',0,0,'L');

$pdf->SetXY(9,135);
$pdf->Cell(16,2,'____________',0,0,'L');
$pdf->SetXY(37,135);
$pdf->Cell(16,2,'____________',0,0,'L');
$pdf->SetXY(63,135);
$pdf->Cell(16,2,'____________',0,0,'L');
$pdf->SetXY(89,135);
$pdf->Cell(16,2,'____________',0,0,'L');

$pdf->SetXY(10,137);
$pdf->Cell(16,5,'date:',0,0,'L');
$pdf->SetXY(38,137);
$pdf->Cell(16,5,'date:',0,0,'L');
$pdf->SetXY(64,137);
$pdf->Cell(16,5,'date:',0,0,'L');
$pdf->SetXY(90,137);
$pdf->Cell(16,5,'date:',0,0,'L');

$pdf->Output();
?>