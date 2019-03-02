<?php
//koneksi ke database
if (isset($_SESSION['r3su'])){
	if ($_SESSION['r3su'] == 'dmn'){
        
    }
	elseif($_SESSION['r3su'] == 'bgn'){
	    header('location:../bagian/');	
	}
}
else header('location:../')

?>