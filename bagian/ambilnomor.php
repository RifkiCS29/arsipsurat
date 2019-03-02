<?php
	session_start();
	include '../koneksi/koneksi.php';
    include 'login/ceksession.php';

        $sql1 		= "SELECT * FROM tb_suratkeluar ORDER BY nomor_suratkeluar DESC LIMIT 1" ;  
        $query1  	= mysqli_query($db, $sql1);
        $data     = mysqli_fetch_array($query1);

        $nomorbaru	        = mysqli_real_escape_string($db,$_POST['nomorbaru']);


        date_default_timezone_set('Asia/Jakarta'); 
		$tanggal_entry  = date("Y-m-d H:i:s");
        $tgl_keluar     = date("Y-m-d H:i:s");
        $tgl_surat     = date("Y-m-d");
        $thnNow = date("Y");
        $nama_bagian    =  $_SESSION['nama'];
        $tmp_file 		= "file_temp/-file_temp.pdf";
        $ext            = ".pdf";

        if($data['nama_bagian'] <> $_SESSION['nama'] and $data['nama_bagian'] <> '' and $data['nomor_suratkeluar']==$nomorbaru){
  			    echo "<center><h2>Nomor ini telah diambil Bagian Lain </h2></center>
  			    <meta http-equiv='refresh' content='2;url=ceknomor.php'>";
        } 
        elseif(!($nomorbaru=='') and !($nama_bagian=='')){
        $nama_baru = $thnNow.'-'.$nomorbaru.$ext ;
		$path = "../admin/surat_keluar/".$nama_baru;
		copy($tmp_file, $path);
        $sql = "INSERT INTO tb_suratkeluar(	tanggalkeluar_suratkeluar, nomor_suratkeluar, nama_bagian, tanggalsurat_suratkeluar, file_suratkeluar, tanggal_entry)
				values ('$tgl_keluar', '$nomorbaru', '$nama_bagian', '$tgl_surat', '$nama_baru' ,'$tanggal_entry')";
		$execute = mysqli_query($db, $sql);

        echo "<Center><h2><br>Terima Kasih<br>Nomor telah diambil Bagian Anda</h2></center>
		<meta http-equiv='refresh' content='2;url=ceknomor.php'>";

        }                                  


?>