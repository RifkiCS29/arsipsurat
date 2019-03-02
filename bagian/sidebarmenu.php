<?php 
	 include '../koneksi/koneksi.php';
			$sql  		= "SELECT * FROM tb_bagian where id_bagian='".$_SESSION['id']."'";                        
			$query  	= mysqli_query($db, $sql);
			$data 		= mysqli_fetch_array($query);
?>
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-institution"></i> <span> Arsip Surat</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/<?php echo $data['gambar']; ?>"  height="55" width="55" alt="" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?php echo $_SESSION['nama'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-file-text"></i> Kategori Surat <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="datasuratmasuk.php"><i class="fa  fa-inbox"></i>Surat Masuk</a></li>
                      <li><a href="datasuratkeluar.php"><i class="fa fa-send"></i>Surat Keluar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-search"></i> Cek Nomor <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ceknomor.php"><i class="fa fa-laptop"></i>Nomor Surat Keluar</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
