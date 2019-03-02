<?php
	session_start();
	include '../../koneksi/koneksi.php';
	$id				= $_SESSION['id'];
	$nama	 		= mysqli_real_escape_string($db,$_POST['nama_admin']);
	$username		= mysqli_real_escape_string($db,$_POST['username_admin']);
	$password   	= mysqli_real_escape_string($db,sha1($_POST['password']));
	$gambar			= $_FILES['gambar']['name'];
	
	$sql  		= "SELECT * FROM tb_admin where id_admin='".$_SESSION['id']."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
	
	if ($gambar == ''){
		$ext			= substr($data['gambar'], strripos($data['gambar'], '.'));	
		$nama_b  		= $username . $ext;
		rename("../images/".$data['gambar'], "../images/".$nama_b);
		$sql = "UPDATE tb_admin set 
						nama_admin 			= '$nama',
						username_admin		= '$username',
						password			= '$password',
						gambar				= '$nama_b' 
				where id_admin = $id";
				
		$execute = mysqli_query($db, $sql);			
		
		$_SESSION['nama'] = $nama;
		$_SESSION['username']= $username;
						
		echo "<Center><h2><br>Data anda telah terubah</h2></center>
		<meta http-equiv='refresh' content='2;url=../profile.php'>";
	}	
	else{
		
		$tipe_file 		= $_FILES['gambar']['type'];
		$ukuran_file 	= $_FILES['gambar']['size'];
		if (($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)){	
			unlink("../images/".$data['gambar']);
			$ext_file		= substr($gambar, strripos($gambar, '.'));			
			$tmp_file 		= $_FILES['gambar']['tmp_name'];
			
			$nama_baru = $username . $ext_file;
			$path = "../images/".$nama_baru;
			move_uploaded_file($tmp_file, $path);
			
			$sql = "UPDATE tb_admin set 
						nama_admin 			= '$nama',
						username_admin		= '$username',
						password			= '$password',
						gambar				= '$nama_baru' 
				where id_admin = $id";
				
			$execute = mysqli_query($db, $sql);			
		
			$_SESSION['nama'] = $nama;
			$_SESSION['username']= $username;
						
			echo "<Center><h2><br>Data anda telah terubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../profile.php'>";			
		}
		else{
			echo "<Center><h2><br>Gambar yang anda masukkan tidak sesuai ketentuan<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../editprofile.php'>";
		}
	
	}
	?>
	