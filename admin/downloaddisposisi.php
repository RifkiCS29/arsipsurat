<?php
include '../koneksi/koneksi.php';
session_start();
include "login/ceksession.php";
include "../assets/PHPExcel/Classes/PHPExcel.php";

date_default_timezone_set("Asia/Jakarta");

$excelku = new PHPExcel();

// Set properties
$excelku->getProperties()->setCreator("Rifki")
                         ->setLastModifiedBy("Rifki");



// Mengambil data dari tabel
                            $id			= $_GET['id_suratmasuk'];
                            $sql  		= "SELECT * FROM tb_suratmasuk where id_suratmasuk='".$id."'";                        
                            $query  	= mysqli_query($db, $sql);
                            $data 		= mysqli_fetch_array($query);

                            $tgl_surat = $data['tanggalsurat_suratmasuk'];
                            $tgl_surat = date('d/m/Y', strtotime($tgl_surat));
                            $tgl_masuk = $data['tanggalmasuk_suratmasuk'];
                            $tgl_masuk = date('d/m/Y', strtotime($tgl_masuk));
                            
                            $tahun = $data['tanggalmasuk_suratmasuk'];
                            $tahun =  date('Y', strtotime($tahun));
                            $nama_file = $tahun.'-'.$data['nomorurut_suratmasuk'].'-disposisi';
                            $bulan = $data['tanggalmasuk_suratmasuk'];
                            $bulan = date('m',strtotime($bulan));
                            if ($bulan == '01') {
                              $bulan = "JAN-";
                            } elseif ($bulan == '02') {
                              $bulan = "FEB-";
                            } elseif ($bulan == '03') {
                              $bulan = "MAR-";
                            } elseif ($bulan == '04') {
                              $bulan = "APR-";
                            } elseif ($bulan == '05') {
                              $bulan = "MEI-";
                            } elseif ($bulan == '06') {
                              $bulan = "JUN-";
                            } elseif ($bulan == '07') {
                              $bulan = "JUL-";
                            } elseif ($bulan == '08') {
                              $bulan = "AUG-";
                            } elseif ($bulan == '09') {
                              $bulan = "SEPT-";
                            } elseif ($bulan == '10') {
                              $bulan = "OKT-";
                            } elseif ($bulan == '11') {
                              $bulan = "NOV-";
                            } elseif ($bulan == '12') {
                              $bulan = "DES-";
                            }
                            
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


    // Set page orientation and size
    $excelku->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
    $excelku->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
    $excelku->getActiveSheet()->getPageMargins()->setTop(0.175);
    $excelku->getActiveSheet()->getPageMargins()->setRight(1.574);
    $excelku->getActiveSheet()->getPageMargins()->setLeft(0.787);
    $excelku->getActiveSheet()->getPageMargins()->setBottom(0.748);
 
  
  // Set lebar kolom

    $excelku->getActiveSheet()->getColumnDimension('A')->setWidth(4.5);
    $excelku->getActiveSheet()->getColumnDimension('B')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('C')->setWidth(4.35);
    $excelku->getActiveSheet()->getColumnDimension('D')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('E')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('F')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('G')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('H')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('I')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('J')->setWidth(1);
    $excelku->getActiveSheet()->getColumnDimension('K')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('L')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('M')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('N')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('O')->setWidth(1.8);
    $excelku->getActiveSheet()->getColumnDimension('P')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('Q')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('R')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('S')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('T')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('U')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('V')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('W')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('X')->setWidth(3.2);
    $excelku->getActiveSheet()->getColumnDimension('Y')->setWidth(3.2);
    // TINGGI BARIS
    $excelku->getActiveSheet()->getRowDimension(1)->setRowHeight(33);
    $excelku->getActiveSheet()->getRowDimension(2)->setRowHeight(30);
    $excelku->getActiveSheet()->getRowDimension(3)->setRowHeight(17.25);
    $excelku->getActiveSheet()->getRowDimension(4)->setRowHeight(17.25);
    $excelku->getActiveSheet()->getRowDimension(5)->setRowHeight(17.25);
    $excelku->getActiveSheet()->getRowDimension(6)->setRowHeight(17.25);
    $excelku->getActiveSheet()->getRowDimension(7)->setRowHeight(12);
    $excelku->getActiveSheet()->getRowDimension(8)->setRowHeight(17.25);
    $excelku->getActiveSheet()->getRowDimension(9)->setRowHeight(11.25);
    $excelku->getActiveSheet()->getRowDimension(10)->setRowHeight(15.75);
    $excelku->getActiveSheet()->getRowDimension(11)->setRowHeight(15.75);
    $excelku->getActiveSheet()->getRowDimension(12)->setRowHeight(14.25);
    $excelku->getActiveSheet()->getRowDimension(13)->setRowHeight(17.25);
    $excelku->getActiveSheet()->getStyle('D3:V6')->getAlignment()->setWrapText(true);

    
    
 // Mergecell, menyatukan beberapa kolom
$excelku->getActiveSheet()->mergeCells('N1:R1');
$excelku->getActiveSheet()->mergeCells('U1:X1');
$excelku->getActiveSheet()->mergeCells('D3:V6');
$excelku->getActiveSheet()->getStyle('D3:V6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$excelku->getActiveSheet()->getStyle('D3:V6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excelku->getActiveSheet()->mergeCells('B8:X8');
$excelku->getActiveSheet()->mergeCells('D11:H11');
$excelku->getActiveSheet()->mergeCells('K11:T11');
$excelku->getActiveSheet()->mergeCells('B13:H13');
$excelku->getActiveSheet()->mergeCells('M13:S13');
$excelku->getActiveSheet()->mergeCells('S1:T1');
$excelku->getActiveSheet()->getStyle('A1:Y13')->getFont()->setName('Calibri');
$excelku->getActiveSheet()->getStyle('A1:Y13')->getFont()->setSize(13);
$excelku->getActiveSheet()->getStyle('A1:Y13')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
   
// Buat Kolom judul tabel
$SI = $excelku->setActiveSheetIndex(0);
 $SI->setCellValue('N1',$data['kode_suratmasuk']);
 $SI->setCellValue('U1',$data['nomorurut_suratmasuk']);
 $SI->setCellValue('S1',$bulan);
 $SI->setCellValue('D3',$data['perihal_suratmasuk']);
 $SI->setCellValue('B8',$data['pengirim']);
 $SI->setCellValue('D11',$tgl_surat);
 $SI->setCellValue('B13',$data['disposisi1']);
 $SI->setCellValue('K11',$data['nomor_suratmasuk']);
 $SI->setCellValue('M13',$tgl_masuk);
//Memberi nama sheet
$excelku->getActiveSheet()->setTitle('DataDisposisi');

$excelku->setActiveSheetIndex(0);

// untuk excel 2007 atau yang berekstensi .xlsx
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$nama_file.'".xlsx');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
$objWriter->save('php://output');
exit;

?>