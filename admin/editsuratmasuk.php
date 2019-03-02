<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Arsip Surat Kota Samarinda </title>

    <!-- Bootstrap -->
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/icon.ico">

    <!-- Custom Theme Style -->
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- Profile and Sidebarmenu -->
        <?php
        include("sidebarmenu.php");
        ?>
        <!-- /Profile and Sidebarmenu -->

        <!-- top navigation -->
        <?php
        include("header.php");
        ?>
        <!-- /top navigation -->   

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Surat Masuk</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Surat Masuk ><small>Edit Surat Masuk</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="proses/proses_editsuratmasuk.php" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <?php include '../koneksi/koneksi.php';
                            $id			= mysqli_real_escape_string($db,$_GET['id_suratmasuk']);
                            $sql  		= "SELECT * FROM tb_suratmasuk where id_suratmasuk='".$id."'";                        
                            $query  	= mysqli_query($db, $sql);
                            $data 		= mysqli_fetch_array($query);
                            $tgl_masuk = $data['tanggalmasuk_suratmasuk'];
                            $tgl_masuk = date('m-d-Y H:i:s', strtotime($tgl_masuk));
                            $tgl_surat = $data['tanggalsurat_suratmasuk'];
                            $tgl_surat = date('m-d-Y', strtotime($tgl_surat));
                            $tgl_disp1 = $data['tanggal_disposisi1'];
                            $tgl_disp1  = date('m-d-Y H:i:s', strtotime($tgl_disp1));
                            $tgl_disp2 = $data['tanggal_disposisi2'];
                            $tgl_disp2  = date('m-d-Y H:i:s', strtotime($tgl_disp2));
                            $tgl_disp3 = $data['tanggal_disposisi3'];
                            $tgl_disp3  = date('m-d-Y H:i:s', strtotime($tgl_disp3));
                            ?>
                            
                      <input type=hidden name="id_suratmasuk" value="<?php echo $id;?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Masuk <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker4'>
                            <input value="<?php echo "$tgl_masuk" ?>" type='text' id="tanggalmasuk_suratmasuk" name="tanggalmasuk_suratmasuk" required="required" class="form-control" required="required" readonly="readonly" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kode Surat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?php echo $data['kode_suratmasuk'];?>" type="text" onkeyup="validAngka(this)" id="kode_suratmasuk" name="kode_suratmasuk" required="required" maxlength="7" placeholder="Masukkan Kode Surat" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Urut <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?php echo $data['nomorurut_suratmasuk'];?>" type="text" onkeyup="validAngka(this)" id="nomorurut_suratmasuk" name="nomorurut_suratmasuk" required="required" maxlength="4" placeholder="Masukkan Nomor Urut Surat" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Surat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?php echo $data['nomor_suratmasuk'];?>" type="text" id="nomor_suratmasuk" name="nomor_suratmasuk" required="required" maxlength="35" placeholder="Masukkan Nomor Surat" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Surat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                                <input value="<?php echo "$tgl_surat" ?>" type="text" class="form-control has-feedback-left" id="single_cal3" name="tanggalsurat_suratmasuk" placeholder="First Name" aria-describedby="inputSuccess2Status3" required="required" readonly="readonly">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </fieldset>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pengirim <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?php echo $data['pengirim'];?>" type="text" id="pengirim" name="pengirim" required="required" placeholder="Masukkan Asal/Pengirim Surat" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kepada <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?php echo $data['kepada_suratmasuk'];?>" type="text" id="kepada_suratmasuk" name="kepada_suratmasuk" required="required" placeholder="Masukkan Tujuan Surat" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Perihal <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea id="perihal_suratmasuk" name="perihal_suratmasuk" required="required" class="form-control" rows="3" placeholder='Masukkan Perihal Surat'><?php echo $data['perihal_suratmasuk'];?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <input name="file_suratmasuk" accept="application/pdf" type="file" id="file_suratmasuk" class="form-control" autocomplete="off"/><a href= "<?php echo 'surat_masuk/'.$data['file_suratmasuk'].''?>"><b>Lihat File Sebelumnya</b></a></input> (Maksimal 10 MB ) 
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Operator </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?php echo $_SESSION['nama'];?>" type="text" id="operator" name="operator"  readonly="readonly" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Disposisi 1 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="disposisi1" class="select2_single form-control" tabindex="-1">
                          <option value="<?php echo $data['disposisi1'];?>"><?php echo $data['disposisi1'];?></option>
                            <option></option>
                                <?php include '../koneksi/koneksi.php';
                                $sql2  		= "SELECT nama_bagian FROM tb_bagian";                        
                                $query2  	= mysqli_query($db, $sql2);
                                while ($data2 = mysqli_fetch_array($query2)){
                                      echo '<option value="'.$data2['nama_bagian'].'">'.$data2['nama_bagian'].'</option>';
                                      } 
                                ?> 
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Disposisi 1 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker'>
                            <input value="<?php echo "$tgl_disp1" ?>" type='text' id="tanggal_disposisi1" name="tanggal_disposisi1" class="form-control"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Disposisi 2 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="disposisi2" class="select2_single form-control" tabindex="-1">
                          <option value="<?php echo $data['disposisi2'];?>"><?php echo $data['disposisi2'];?></option>
                            <option></option>
                                <?php include '../koneksi/koneksi.php';
                                $sql3  		= "SELECT nama_bagian FROM tb_bagian";                        
                                $query3  	= mysqli_query($db, $sql3);
                                while ($data3 = mysqli_fetch_array($query3)){
                                      echo '<option value="'.$data3['nama_bagian'].'">'.$data3['nama_bagian'].'</option>';
                                      } 
                                ?> 
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Disposisi 2</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='datetimepicker6'>
                            <input value="<?php echo "$tgl_disp2" ?>" type='text' id="tanggal_disposisi2" name="tanggal_disposisi2" class="form-control"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Disposisi 3 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="disposisi3" class="select2_single form-control" tabindex="-1">
                          <option value="<?php echo $data['disposisi3'];?>"><?php echo $data['disposisi3'];?></option>
                            <option></option>
                                <?php include '../koneksi/koneksi.php';
                                $sql4  		= "SELECT nama_bagian FROM tb_bagian";                        
                                $query4  	= mysqli_query($db, $sql4);
                                while ($data4 = mysqli_fetch_array($query4)){
                                      echo '<option value="'.$data4['nama_bagian'].'">'.$data4['nama_bagian'].'</option>';
                                      } 
                                ?> 
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Disposisi 3 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='datetimepicker7'>
                            <input value="<?php echo "$tgl_disp3" ?>" type='text' id="tanggal_disposisi3" name="tanggal_disposisi3" class="form-control"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="datasuratmasuk.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a>
                          <button type="submit" name="update" value="Update" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Simpan</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../assets/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../assets/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../assets/vendors/moment/min/moment.min.js"></script>
    <script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../assets/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../assets/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../assets/vendors/select2/dist/js/select2.full.min.js"></script>
        <script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Parsley -->
    <script src="../assets/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../assets/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../assets/vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../assets/build/js/custom.min.js"></script>
	 <!-- Initialize datetimepicker -->
<script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>
<script language='javascript'>
function validAngka(a)
{
	if(!/^[0-9.]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1000);
	}
}
</script>
  </body>
</html>
