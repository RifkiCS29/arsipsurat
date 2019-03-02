<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	$tanggalkeluar_suratkeluar	        = mysqli_real_escape_string($db,$_POST['tanggalkeluar_suratkeluar']);
	$kode_suratkeluar	                = mysqli_real_escape_string($db,$_POST['kode_suratkeluar']);
	$nomor_suratkeluar	                = mysqli_real_escape_string($db,$_POST['nomor_suratkeluar']);
    $nama_bagian	                    = mysqli_real_escape_string($db,$_POST['nama_bagian']);
	$tanggalsurat_suratkeluar           = mysqli_real_escape_string($db,$_POST['tanggalsurat_suratkeluar']);
	$kepada_suratkeluar		            = mysqli_real_escape_string($db,$_POST['kepada_suratkeluar']);
	$perihal_suratkeluar   	            = mysqli_real_escape_string($db,$_POST['perihal_suratkeluar']);
    $operator	                        = mysqli_real_escape_string($db,$_POST['operator']);
	
        date_default_timezone_set('Asia/Jakarta'); 
		$tanggal_entry  = date("Y-m-d H:i:s");
        $thnNow = date("Y");
	
	$nama_file_lengkap 		= $_FILES['file_suratkeluar']['name'];
	$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
	$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
	$tipe_file 		= $_FILES['file_suratkeluar']['type'];
	$ukuran_file 	= $_FILES['file_suratkeluar']['size'];
	$tmp_file 		= $_FILES['file_suratkeluar']['tmp_name'];
	
    $tgl_keluar                 = date('Y-m-d H:i:s', strtotime($tanggalkeluar_suratkeluar));
    $tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratkeluar));
	$ambilnomor                 = substr("$nomor_suratkeluar",0,4);
	
    if (!($tgl_keluar=='') and !($kode_suratkeluar =='') and !($nomor_suratkeluar =='') and !($nama_bagian =='') and !($tgl_surat =='') and !($kepada_suratkeluar =='') and !($perihal_suratkeluar =='') and !($operator =='') and !($tanggal_entry =='') and   
		($tipe_file == "application/pdf") and ($ukuran_file <= 10340000)){		
		
		$nama_baru = $thnNow.'-'.$ambilnomor. $ext_file;
		$path = "../surat_keluar/".$nama_baru;
		move_uploaded_file($tmp_file, $path);
		
		$sql = "INSERT INTO tb_suratkeluar(tanggalkeluar_suratkeluar, kode_suratkeluar, nomor_suratkeluar, nama_bagian, tanggalsurat_suratkeluar, kepada_suratkeluar, perihal_suratkeluar, file_suratkeluar, operator, tanggal_entry)
				values ('$tgl_keluar', '$kode_suratkeluar', '$nomor_suratkeluar', '$nama_bagian', '$tgl_surat', '$kepada_suratkeluar', '$perihal_suratkeluar', '$nama_baru', '$operator', '$tanggal_entry')";
		$execute = mysqli_query($db, $sql);
		
		echo "<Center><h2><br>Terima Kasih<br>Surat Keluar Telah Dimasukkan</h2></center>
			<meta http-equiv='refresh' content='2;url=../datasuratkeluar.php'>";
	}
	else{
		echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
			<meta http-equiv='refresh' content='2;url=../inputsuratkeluar.php'>";
	}
	
?>
	