<?php
	session_start();
	include '../../koneksi/koneksi.php';
    $id				            = mysqli_real_escape_string($db,$_POST['id_bagian']);
    $nama_bagian	            = mysqli_real_escape_string($db,$_POST['nama_bagian']);
	$username_admin_bagian		= mysqli_real_escape_string($db,$_POST['username_admin_bagian']);
	$password_bagian 	        = mysqli_real_escape_string($db,sha1($_POST['password_bagian']));
    $nama_lengkap	            = mysqli_real_escape_string($db,$_POST['nama_lengkap']);
	$tanggal_lahir_bagian       = mysqli_real_escape_string($db,$_POST['tanggal_lahir_bagian']);
	$alamat			            = mysqli_real_escape_string($db,$_POST['alamat']);
	$no_hp_bagian	   	        = mysqli_real_escape_string($db,$_POST['no_hp_bagian']);
	$gambar			            = $_FILES['gambar']['name'];
    $tgl_lahir                  = date('Y-m-d', strtotime($tanggal_lahir_bagian));
	
	$sql  		= "SELECT * FROM tb_bagian where id_bagian='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
	
    //jika gambar tidak ada
	if ($gambar == ''){
		$ext			= substr($data['gambar'], strripos($data['gambar'], '.'));	
		$nama_b  		= $username_admin_bagian . $ext;
		rename("../../bagian/images/".$data['gambar'], "../../bagian/images/".$nama_b);
		$sql = "UPDATE tb_bagian set 
						nama_bagian		            = '$nama_bagian',
						username_admin_bagian		= '$username_admin_bagian',
						password_bagian 			= '$password_bagian',
						nama_lengkap                = '$nama_lengkap',
						tanggal_lahir_bagian 		= '$tgl_lahir',
						alamat		                = '$alamat',
						no_hp_bagian			    = '$no_hp_bagian',
						gambar				= '$nama_b' 
				where id_bagian = $id";
				
		$execute = mysqli_query($db, $sql);			
						
		echo "<Center><h2><br>Data Bagian telah terubah</h2></center>
		<meta http-equiv='refresh' content='2;url=../detail-bagian.php?id_bagian=".$id."'>";
	}	
	else{
		
		$tipe_file 		= $_FILES['gambar']['type'];
		$ukuran_file 	= $_FILES['gambar']['size'];
		if (($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)){	
			unlink("../../bagian/images/".$data['gambar']);
			$ext_file		= substr($gambar, strripos($gambar, '.'));			
			$tmp_file 		= $_FILES['gambar']['tmp_name'];
			
			$nama_baru = $username_admin_bagian . $ext_file;
			$path = "../../bagian/images/".$nama_baru;
			move_uploaded_file($tmp_file, $path);
			
			$sql = "UPDATE tb_bagian set 
						nama_bagian		            = '$nama_bagian',
						username_admin_bagian		= '$username_admin_bagian',
						password_bagian 			= '$password_bagian ',
						nama_lengkap                = '$nama_lengkap',
						tanggal_lahir_bagian 		= '$tgl_lahir',
						alamat		                = '$alamat',
						no_hp_bagian			    = '$no_hp_bagian',
						gambar				        = '$nama_baru' 
				where id_bagian = $id";
				
			$execute = mysqli_query($db, $sql);			
		
			echo "<Center><h2><br>Data Bagian telah terubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../detail-bagian.php?id_bagian=".$id."'>";			
		}
		else{
			echo "<Center><h2><br>Gambar yang anda masukkan tidak sesuai ketentuan<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../editbagian.php?id_bagian=".$id."'>";
		}
	
	}
	?>
	