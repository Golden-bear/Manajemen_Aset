<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Management Asset Sierad</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<div class="wrapper">
  <header class="main-header">
    <a href="index.php" class="logo">
      <span class="logo-mini"><b>MAN</b></span>
      <span class="logo-lg">Management Asset Sierad</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
       <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">Settings</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="images/pt_sierad_produce.png" class="img-circle" alt="User Image">
                <p>
				<?php
          echo "Sierad";
          echo "<br>";
          if($_SESSION['kode']==0)
          {
           echo "Admin";
          }
          else
          {
            echo "Purchasing";
          }
				?>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profil.php" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
 <aside class="main-sidebar">
   <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa fa-file-text"></i> <span>DATA ASSET</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data/data_asset.php"><i class="fa"></i>Lihat Asset</a></li>
            <li><a href="data/cari_asset.php"><i class="fa"></i>Cari Asset</a></li>
            <?php  
            if($_SESSION['kode']==0)
            {
              ?>
            <li><a href="data/hapus_jenis.php"><i class="fa"></i>Hapus Jenis Asset</a></li>
            <li><a href="data/hapus_lokasi.php"><i class="fa"></i>Hapus Lokasi</a></li>
            <li><a href="data/hapus_unit.php"><i class="fa"></i>Hapus Unit</a></li>
          <?php } ?>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>INPUT ASSET</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tambah/input_asset.php"><i class="fa"></i>Input Asset Baru</a></li>
            <?php
            if($_SESSION['kode']==0)
            {
              ?>
            <li><a href="tambah/tambah_jenis.php"><i class="fa"></i>Tambah Jenis Asset</a></li>
            <li><a href="tambah/tambah_lokasi.php"><i class="fa"></i>Tambah Lokasi</a></li>
            <li><a href="tambah/tambah_unit.php"><i class="fa"></i>Tambah Unit</a></li>
          <?php } ?>
          </ul>
        </li>
      </ul>
   </section>
 </aside>
 
</html>