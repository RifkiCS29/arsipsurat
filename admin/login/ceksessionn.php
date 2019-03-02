<?php
//koneksi ke database
if (isset($_SESSION['r3su'])){
	if ($_SESSION['r3su'] == 'dmn')	{
		header('location:../');
	}
	else if($_SESSION['r3su'] == 'bgn'){
		header('location:../../bagian/');
	}
}

?>