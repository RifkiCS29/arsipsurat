<?php
//koneksi ke database
if (isset($_SESSION['r3su'])){
	if ($_SESSION['r3su'] == 'bgn'){
       
    }
	elseif($_SESSION['r3su'] == 'dmn'){
	    header('location:../admin/');	
	}
}
else header('location:../')

?>