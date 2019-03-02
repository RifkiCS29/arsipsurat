<?php
if (isset($_SESSION['r3su'])){
	if($_SESSION['r3su'] == 'bgn'){
		header('location:bagian/');
	}
	else if($_SESSION['r3su'] == 'dmn'){
		header('location:admin/');
	}
}
?>