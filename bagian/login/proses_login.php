<?php
//koneksi ke database
session_start();
include "../../koneksi/koneksi.php";

//validasi login
$username	=	mysqli_real_escape_string($db,$_POST['username_admin_bagian']); 
$password	=	mysqli_real_escape_string($db,sha1($_POST['password_bagian'])); 
$query		=	mysqli_query($db,"SELECT * FROM tb_bagian WHERE username_admin_bagian='$username' AND password_bagian='$password'"); 
$data		=	$query->fetch_array();
$jumlah=$query->num_rows;

if ($jumlah>0){
	echo"login berhasil ! ";
	$nama=$data['nama_bagian'];
	$id =$data['id_bagian'];
	$_SESSION['r3su'] = 'bgn';
	$_SESSION['id'] = $id;
	$_SESSION['username'] 	= $username;
	$_SESSION['nama'] = $nama;
	header('location:../');
	}
else{
    echo "<center>Username atau Password anda salah<br><br><h3>Silahkan Ulangi </h3></center>";
	echo "<meta http-equiv='refresh' content='2;url=../login/'>";
}
?>