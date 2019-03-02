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
    <!-- Datatables -->
    <link href="../assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
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
              <div class="title_right">
                <h2>Surat Masuk > <small>Data Surat Masuk</small></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data<small>Surat Masuk</small></h2>
                    <div class="clearfix"></div>
                  </div>
                      <form action="downloadlaporan_suratmasuk.php"  name="download_suratmasuk" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <select name="bulan" class="select2_single form-control" tabindex="-1">
                            <option>Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                          </select>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <select name="tahun" class="select2_single form-control" tabindex="-1">
                            <option>Pilih Tahun</option>
                            <?php
                                for ($tahun=2017;$tahun<=2022;$tahun++)
                                      {
                                       echo  '<option value="'.$tahun.'">'.$tahun.'</option>';
                                      }
                            ?>
                          </select>
                        </div>
                  <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Unduh Laporan Surat Masuk</button></a>
                  </form>
                  <div class="x_content">
                  <div class="x_content">
                              <?php
                              include '../koneksi/koneksi.php';
                              $sql1		= "SELECT * FROM tb_suratmasuk WHERE disposisi1 = '".$_SESSION['nama']."' || disposisi2 = '".$_SESSION['nama']."' || disposisi3 = '".$_SESSION['nama']."'" ;                        
                              $query1  	= mysqli_query($db, $sql1);
                              $total		= mysqli_num_rows($query1);
                              if ($total == 0) {
                                echo"<center><h2>Belum Ada Data Surat Masuk</h2></center>";
                              }
                              else{?>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="3%">No Urut</th>
                          <th width="10%">Tanggal Masuk</th>
                          <th width="3%">Kode Surat</th>
                          <th width="10%">Tanggal Surat</th>
                          <th width="14%">Pengirim</th>
                          <th width="15%">Nomor Surat</th>
                          <th width="10%">Kepada</th>
                          <th width="25%">Perihal</th>
                          <th width="15%">Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                            <?php
                            while($data = mysqli_fetch_array($query1)){
                              echo'<tr>
                              <td>	'. $data['nomorurut_suratmasuk'].'  	</td>
                              <td>	'. $data['tanggalmasuk_suratmasuk'].'		</td>
                              <td>	'. $data['kode_suratmasuk'].'	</td>
                              <td>	'. $data['tanggalsurat_suratmasuk'].'	</td>
                              <td>	'. $data['pengirim'].'  		</td>
                              <td>	'. $data['nomor_suratmasuk'].'  		</td>
                              <td>	'. $data['kepada_suratmasuk'].'		</td>
                              <td>  '. $data['perihal_suratmasuk'].'  </td> 
                              <td style="text-align:center;">
                              <a href= ../admin/surat_masuk/'.$data['file_suratmasuk'].'><button type="button" title="Unduh File" class="btn btn-success btn-xs"><i class="fa fa-download"></i></button></a>
                              <a href=detail-suratmasuk.php?id_suratmasuk='.$data['id_suratmasuk'].'><button type="button" title="Detail" class="btn btn-info btn-xs"><i class="fa fa-file-image-o"></i></button></a></td>
                              </tr>';
                            }
                            ?>
                      </tbody>
                    </table>
                    <?php } ?>
                  </div>
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
    <!-- iCheck -->
    <script src="../assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../assets/build/js/custom.min.js"></script>

  </body>
</html>