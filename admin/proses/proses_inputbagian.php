<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	$nama_bagian	            = mysqli_real_escape_string($db,$_POST['nama_bagian']);
	$username_admin_bagian		= mysqli_real_escape_string($db,$_POST['username_admin_bagian']);
	$password_bagian 	        = mysqli_real_escape_string($db,sha1($_POST['password_bagian']));
    $nama_lengkap	            = mysqli_real_escape_string($db,$_POST['nama_lengkap']);
	$tanggal_lahir_bagian       = mysqli_real_escape_string($db,$_POST['tanggal_lahir_bagian']);
	$alamat			            = mysqli_real_escape_string($db,$_POST['alamat']);
	$no_hp_bagian	   	        = mysqli_real_escape_string($db,$_POST['no_hp_bagian']);
	
	$nama_file_lengkap 		= $_FILES['gambar']['name'];
	$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
	$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
	$tipe_file 		= $_FILES['gambar']['type'];
	$ukuran_file 	= $_FILES['gambar']['size'];
	$tmp_file 		= $_FILES['gambar']['tmp_name'];
	
    $tgl_lahir                  = date('Y-m-d', strtotime($tanggal_lahir_bagian));
	
	if (!($nama_bagian=='') and !($username_admin_bagian=='') and !($password_bagian =='') and !($nama_lengkap=='') and !($tgl_lahir =='') and !($alamat=='') and !($no_hp_bagian=='') and
		($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)){		
		
		$nama_baru = $username_admin_bagian. $ext_file;
		$path = "../../bagian/images/".$nama_baru;
		move_uploaded_file($tmp_file, $path);
		
		$sql = "INSERT INTO tb_bagian(nama_bagian, username_admin_bagian, password_bagian, nama_lengkap, tanggal_lahir_bagian, alamat, no_hp_bagian, gambar)
				values ('$nama_bagian', '$username_admin_bagian', '$password_bagian', '$nama_lengkap', '$tgl_lahir', '$alamat', '$no_hp_bagian', '$nama_baru')";
		$execute = mysqli_query($db, $sql);
		
		echo "<Center><h2><br>Terima Kasih<br>Bagian Telah Didaftarkan ke Sistem</h2></center>
			<meta http-equiv='refresh' content='2;url=../databagian.php'>";
	}
	else{
		echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
			<meta http-equiv='refresh' content='2;url=../inputbagian.php'>";
	}
	
?>
	