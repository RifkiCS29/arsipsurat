<?php
//koneksi ke database
session_start();
include "../../koneksi/koneksi.php";

//validasi login
$username	=	mysqli_real_escape_string($db,$_POST['username_admin']); 
$password	=	mysqli_real_escape_string($db,sha1($_POST['password'])); 
$query		=	mysqli_query($db,"SELECT * FROM tb_admin WHERE username_admin='$username' AND password='$password'"); 
$data		=	$query->fetch_array();
$jumlah=$query->num_rows;

if ($jumlah>0){
	echo"login berhasil ! ";
	$nama=$data['nama_admin'];
	$id =$data['id_admin'];
	$_SESSION['r3su'] = 'dmn';
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