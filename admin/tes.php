<?php
include '../koneksi/koneksi.php';
include "../assets/PHPExcel/Classes/PHPExcel.php";

date_default_timezone_set("Asia/Jakarta");

$excelku = new PHPExcel();

// Set properties
$excelku->getProperties()->setCreator("Rifki")
                         ->setLastModifiedBy("Rifki");



// Mergecell, menyatukan beberapa kolom
$excelku->getActiveSheet()->mergeCells('A2:H2');
$excelku->getActiveSheet()->setCellValue('A2', "PEMERINTAH KOTA SAMARINDA");
$excelku->getActiveSheet()->mergeCells('A3:H3');
$excelku->getActiveSheet()->setCellValue('A3', "KANTOR BALAI KOTA SAMARINDA");
$excelku->getActiveSheet()->mergeCells('A4:H4');
$excelku->getActiveSheet()->setCellValue('A4', "BAGIAN TATA USAHA");
$excelku->getActiveSheet()->mergeCells('A5:H5');
$excelku->getActiveSheet()->setCellValue('A5', "Jl.WR.Supratman 12, Telp. 482713 ");
$excelku->getActiveSheet()->mergeCells('A6:H6');
$excelku->getActiveSheet()->setCellValue('A6', "DATA SURAT KELUAR TAHUN");
$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setName('Arial');
$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setSize(14);
$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setBold(true);
$excelku->getActiveSheet()->getStyle('A2:H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

// Buat Kolom judul tabel
$SI = $excelku->setActiveSheetIndex(0);
 $SI->setCellValue('A8', "No");
 $SI->setCellValue('B8', "NOMOR SURAT");
 $SI->setCellValue('C8', "TANGGAL KELUAR");
 $SI->setCellValue('D8', "KODE SURAT");
 $SI->setCellValue('E8', "NAMA BAGIAN");
 $SI->setCellValue('F8', "TANGGAL SURAT");
 $SI->setCellValue('G8', "KEPADA");
 $SI->setCellValue('H8', "PERIHAL");

//Mengeset Syle nya
$headerStylenya = new PHPExcel_Style();
$bodyStylenya   = new PHPExcel_Style();

$headerStylenya->applyFromArray(
	array('fill' 	=> array(
		  'type'    => PHPExcel_Style_Fill::FILL_SOLID,
		  'color'   => array('argb' => 'FFEEEEEE')),
		  'borders' => array('bottom'=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
						'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
		  )
	));
	
$bodyStylenya->applyFromArray(
	array('fill' 	=> array(
		  'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
		  'color'	=> array('argb' => 'FFFFFFFF')),
		  'borders' => array(
						'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
						'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
		  )
    ));


// Mengambil data dari tabel
                $sql1  		= "SELECT * FROM tb_suratkeluar";                        
                $query1  	= mysqli_query($db, $sql1);
$baris  = 9; //Ini untuk dimulai baris datanya, karena di baris 3 itu digunakan untuk header tabel
$no     = 1;

while ($data = $query1->fetch_assoc()) {
  $SI->setCellValue("A".$baris,$no++); //mengisi data untuk nomor urut
  $SI->setCellValue("B".$baris,$data['nomor_suratkeluar']); 
  $SI->setCellValue("C".$baris,$data['tanggalkeluar_suratkeluar']); 
  $SI->setCellValue("D".$baris,$data['kode_suratkeluar']); 
  $SI->setCellValue("E".$baris,$data['nama_bagian']); 
  $SI->setCellValue("F".$baris,$data['tanggalsurat_suratkeluar']); 
  $SI->setCellValue("G".$baris,$data['kepada_suratkeluar']); 
  $SI->setCellValue("H".$baris,$data['perihal_suratkeluar']); 
  $baris++; //looping untuk barisnya
  
  // Set lebar kolom

    $excelku->getActiveSheet()->getColumnDimension('A')->setWidth(8.14);
    $excelku->getActiveSheet()->getColumnDimension('B')->setWidth(29);
    $excelku->getActiveSheet()->getColumnDimension('C')->setWidth(21);
    $excelku->getActiveSheet()->getColumnDimension('D')->setWidth(16);
    $excelku->getActiveSheet()->getColumnDimension('E')->setWidth(18);
    $excelku->getActiveSheet()->getColumnDimension('F')->setWidth(21);
    $excelku->getActiveSheet()->getColumnDimension('G')->setWidth(35);
    $excelku->getActiveSheet()->getColumnDimension('H')->setWidth(40);
    $excelku->getActiveSheet()->getRowDimension($baris)->setRowHeight(25);
}

//Memberi nama sheet
$excelku->getActiveSheet()->setTitle('DataSuratKeluar');

$excelku->setActiveSheetIndex(0);

// untuk excel 2007 atau yang berekstensi .xlsx
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=datasuratkeluar.xlsx');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
$objWriter->save('php://output');
exit;

?>