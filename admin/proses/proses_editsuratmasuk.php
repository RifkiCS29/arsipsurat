<?php
	session_start();
	include '../../koneksi/koneksi.php';
    $id				                    = mysqli_real_escape_string($db,$_POST['id_suratmasuk']);
	$tanggalmasuk_suratmasuk	        = mysqli_real_escape_string($db,$_POST['tanggalmasuk_suratmasuk']);
	$kode_suratmasuk	                = mysqli_real_escape_string($db,$_POST['kode_suratmasuk']);
    $nomorurut_suratmasuk               = mysqli_real_escape_string($db,$_POST['nomorurut_suratmasuk']);
	$nomor_suratmasuk	                = mysqli_real_escape_string($db,$_POST['nomor_suratmasuk']);
	$tanggalsurat_suratmasuk            = mysqli_real_escape_string($db,$_POST['tanggalsurat_suratmasuk']);
    $pengirim                           = mysqli_real_escape_string($db,$_POST['pengirim']);
	$kepada_suratmasuk		            = mysqli_real_escape_string($db,$_POST['kepada_suratmasuk']);
	$perihal_suratmasuk   	            = mysqli_real_escape_string($db,$_POST['perihal_suratmasuk']);
    $operator	                        = mysqli_real_escape_string($db,$_POST['operator']);
	$disposisi1	                        = mysqli_real_escape_string($db,$_POST['disposisi1']);
	$tanggal_disposisi1                 = mysqli_real_escape_string($db,$_POST['tanggal_disposisi1']);
	$disposisi2	                        = mysqli_real_escape_string($db,$_POST['disposisi2']);
	$tanggal_disposisi2                 = mysqli_real_escape_string($db,$_POST['tanggal_disposisi2']);
    $disposisi3	                        = mysqli_real_escape_string($db,$_POST['disposisi3']);
	$tanggal_disposisi3                 = mysqli_real_escape_string($db,$_POST['tanggal_disposisi3']);

	$file_suratmasuk			            = $_FILES['file_suratmasuk']['name'];
     date_default_timezone_set('Asia/Jakarta'); 
		$tanggal_entry  = date("Y-m-d H:i:s");
        $thnNow = date("Y");
        $tgl_masuk                  = date('Y-m-d H:i:s', strtotime($tanggalmasuk_suratmasuk));
        $tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratmasuk));
        $tgl_disp1                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi1));
        $tgl_disp2                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi2));
        $tgl_disp3                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi3));
	
	$sql  		= "SELECT * FROM tb_suratmasuk where id_suratmasuk='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
	
    //jika gambar tidak ada
	if ($file_suratmasuk == ''){
		$ext			= substr($data['file_suratmasuk'], strripos($data['file_suratmasuk'], '.'));	
		$nama_b  		= $thnNow.'-'.$nomorurut_suratmasuk. $ext;
		rename("../surat_masuk/".$data['file_suratmasuk'], "../surat_masuk/".$nama_b);
		$sql = "UPDATE tb_suratmasuk set 
						tanggalmasuk_suratmasuk     = '$tgl_masuk',
						kode_suratmasuk    		    = '$kode_suratmasuk',
                        nomorurut_suratmasuk        = '$nomorurut_suratmasuk',
						nomor_suratmasuk 			= '$nomor_suratmasuk',
						tanggalsurat_suratmasuk	    = '$tgl_surat',
                        pengirim                    = '$pengirim',
						kepada_suratmasuk           = '$kepada_suratmasuk',
						perihal_suratmasuk		    = '$perihal_suratmasuk',
                        operator            	    = '$operator',
                        tanggal_entry               = '$tanggal_entry',
                        disposisi1                  = '$disposisi1',
                        tanggal_disposisi1          = '$tgl_disp1',
                        disposisi2                  = '$disposisi2',
                        tanggal_disposisi2          = '$tgl_disp2',
                        disposisi3                  = '$disposisi3',
                        tanggal_disposisi3          = '$tgl_disp3',
						file_suratmasuk			= '$nama_b' 
				where id_suratmasuk = $id";
				
		$execute = mysqli_query($db, $sql);			
						
		echo "<Center><h2><br>Data Surat masuk telah diubah</h2></center>
		<meta http-equiv='refresh' content='2;url=../detail-suratmasuk.php?id_suratmasuk=".$id."'>";
	}	
	else{
		
        $tipe_file 		= $_FILES['file_suratmasuk']['type'];
        $ukuran_file 	= $_FILES['file_suratmasuk']['size'];
		if (($tipe_file == "application/pdf") and ($ukuran_file <= 10340000)){	
			unlink("../surat_masuk/".$data['file_suratmasuk']);
			$ext_file		= substr($file_suratmasuk, strripos($file_suratmasuk, '.'));			
			$tmp_file 		= $_FILES['file_suratmasuk']['tmp_name'];
			
			$nama_baru = $thnNow.'-'.$nomorurut_suratmasuk. $ext_file;
			$path = "../surat_masuk/".$nama_baru;
			move_uploaded_file($tmp_file, $path);
			
			$sql = "UPDATE tb_suratmasuk set 
						tanggalmasuk_suratmasuk     = '$tgl_masuk',
						kode_suratmasuk    		    = '$kode_suratmasuk',
                        nomorurut_suratmasuk        = '$nomorurut_suratmasuk',
						nomor_suratmasuk 			= '$nomor_suratmasuk',
						tanggalsurat_suratmasuk	    = '$tgl_surat',
                        pengirim                    = '$pengirim',
						kepada_suratmasuk           = '$kepada_suratmasuk',
						perihal_suratmasuk		    = '$perihal_suratmasuk',
                        operator            	    = '$operator',
                        tanggal_entry               = '$tanggal_entry',
                        disposisi1                  = '$disposisi1',
                        tanggal_disposisi1          = '$tgl_disp1',
                        disposisi2                  = '$disposisi2',
                        tanggal_disposisi2          = '$tgl_disp2',
                        disposisi3                  = '$disposisi3',
                        tanggal_disposisi3          = '$tgl_disp3',
						file_suratmasuk			= '$nama_baru' 
				where id_suratmasuk = $id";
				
			$execute = mysqli_query($db, $sql);			
		
			echo "<Center><h2><br>Data Surat masuk telah diubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../detail-suratmasuk.php?id_suratmasuk=".$id."'>";			
		}
		else{
			echo "<Center><h2><br>File yang anda masukkan tidak sesuai ketentuan<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../editsuratmasuk.php?id_suratmasuk=".$id."'>";
		}
	
	}
	?>
	