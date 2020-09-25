<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header ("location:../login.php");
	}
	else{
    error_reporting(0);
    $id=$_REQUEST['id'];
    $delete=$_REQUEST['delete'];
    $save=$_REQUEST['save'];
    require_once '../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Management Asset Sierad</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="../css/refreshform.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="../index.php" class="logo">
      <span class="logo-mini"><b>MAN</b></span>
      <span class="logo-lg"><b>Management </b>Asset Sierad</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
       <ul class="nav navbar-nav">
            <ul class="dropdown-menu"></ul>
            <ul class="dropdown-menu"></ul>

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">Settings</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="../images/pt_sierad_produce.png" class="img-circle" alt="User Image">
                <p>
				<?php
					echo "Sierad";
					echo "<br>";
					echo "Admin";
				?>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../profil.php" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Keluar</a>
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
            <i class="fa fa-file-text"></i> <span>DATA ASSET</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data_asset.php"><i class="fa"></i>Lihat Asset</a></li>
            <li><a href="cari_asset.php"><i class="fa"></i>Cari Asset</a></li>
            <?php 
            if($_SESSION['kode']==0)
            { ?>
            <li><a href="hapus_jenis.php"><i class="fa"></i>Hapus Jenis Asset</a></li>
            <li><a href="hapus_lokasi.php"><i class="fa"></i>Hapus Lokasi</a></li>
            <li><a href="hapus_unit.php"><i class="fa"></i>Hapus Unit</a></li>
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
            <li><a href="../tambah/input_asset.php"><i class="fa"></i>Input Asset Baru</a></li>
            <?php 
            if($_SESSION['kode']==0)
            { ?>
            <li><a href="../tambah/tambah_jenis.php"><i class="fa"></i>Tambah Jenis Asset</a></li>
            <li><a href="../tambah/tambah_lokasi.php"><i class="fa"></i>Tambah Lokasi</a></li>
            <li><a href="../tambah/tambah_unit.php"><i class="fa"></i>Tambah Unit</a></li>
            <?php } ?>
          </ul>
        </li>
      </ul>
   </section>
 </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Historical Asset
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-home"></i>Home</a></li>
	     	<li>Data Asset</li>
        <li>Lihat Asset</li>
        <li class="active">Historical Asset</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-18">
          <?php 
          if($_SESSION['kode']==0) 
            { ?>
		<p align="right">
			<a> <?php echo ("<button type='button' class = 'btn btn-primary' onclick=\"location.href='../tambah/tambah_historical.php?id=$id'\">Tambah Historical</button>");?></a>
		</p>
  <?php } ?>
           <div class="box box-primary">
            <div class="box-body">
               <div class="tabel">   
              <table class="table table-striped">
                <thead>
                <tr>
                  <th style="background-color: black; color: white; text-align: center;" colspan="6">Historical User</th>
                </tr> 
                <tr>
                    <th style="text-align:center;">Nama</th>
                    <th style="text-align:center;">Dept</th>
                    <th style="text-align:center;">Bukti Serah Terima</th>
                    <th style="text-align:center;">Tanggal Penyerahan</th>
                    <th style="text-align:center;">Tanggal Pengembalian</th>
                    <?php 
                    if($_SESSION['kode']==0) 
                      { ?>
                    <th style="text-align:center;">Aksi</th>
                  <?php } ?>
        				</tr>
                </thead>
                <tbody>
               <?php 
                  $sql1="SELECT histori_user.nama, histori_user.dept, histori_user.bukti, histori_user.tgl_penyerahan, histori_user.tgl_pengembalian FROM histori_user, detail WHERE histori_user.id_detail=detail.id_detail AND histori_user.id_detail='$id'";
                  $result=mysqli_query($connect, $sql1);
                  while ($data=mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td style='text-align:center;'>".$data['nama']."</td>";
                    echo "<td style='text-align:center;'>".$data['dept']."</td>";
                    echo "<td style='text-align:center;'>".$data['bukti']."<p><a href='../uploads/".$data['bukti']."'><button class='btn btn-primary'>Lihat Bukti</button></a></p></td>";
                    echo "<td style='text-align:center;'>".$data['tgl_penyerahan']."</td>";
                    echo "<td style='text-align:center;'>".$data['tgl_pengembalian']."</td>";
                    if($_SESSION['kode']==0)
                    {
                      echo "<td style='text-align:center;'><a class='btn btn-primary' href='edit_histori_user.php?id=$id&nama=".$data['nama']."'>Edit</a><p></p>
                        <a class='btn btn-danger' href='delete_histori_user.php?id=$id&nama=".$data['nama']."'>Delete</a></td>";
                    }
                    echo "</tr>";
                    
                  }

                ?>
                </tbody>
              </table>
              <br>
              <br>
              <br>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="text-align: center; background-color: black; color: white;" colspan="7">Historical Maintenance / Reparasi</th>
                  </tr>
                  <tr>
                    <th style="text-align: center;" rowspan="2">Perbaikan & Pembelian</th>
                    <th style="text-align: center;" colspan="3">Spare Part</th>
                    <th style="text-align: center;">Bukti</th>
                    <th style="text-align: center;" rowspan="2">Tanggal</th>
                    <?php 
                    if($_SESSION['kode']==0) 
                      { ?>
                    <th style="text-align: center;" rowspan="2">Aksi</th>
                  <?php } ?>
                  </tr>
                  <tr>
                    <th style="text-align: center;">No. Batch</th>
                    <th style="text-align: center;">No. FPU</th>
                    <th style="text-align: center;">Jenis Spare Part</th>
                    <th style="text-align: center;">Nomor BTB</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $sql2="SELECT histori_reparasi.aksi, histori_reparasi.batch, histori_reparasi.fpu, histori_reparasi.sparepart, histori_reparasi.btb, histori_reparasi.tanggal FROM histori_reparasi, detail WHERE histori_reparasi.id_detail=detail.id_detail AND histori_reparasi.id_detail='$id'";
                    $res=mysqli_query($connect, $sql2);
                    while ($baris=mysqli_fetch_array($res)) {
                      echo "<tr>";
                      echo "<td style='text-align:center;'>".$baris['aksi']."</td>";
                      echo "<td style='text-align:center;'>".$baris['batch']."</td>";
                      echo "<td style='text-align:center;'>".$baris['fpu']."</td>";
                      echo "<td style='text-align:center;'>".$baris['sparepart']."</td>";
                      echo "<td style='text-align:center;'>".$baris['btb']."</td>";
                      echo "<td style='text-align:center;'>".$baris['tanggal']."</td>";
                      if($_SESSION['kode']==0)
                      {
                      echo "<td style='text-align:center;'><a class='btn btn-primary' href='edit_histori_reparasi.php?id=$id&batch=".$baris['batch']."&fpu=".$baris['fpu']."'>Edit</a><p></p>
                  <a class='btn btn-danger' href='delete_histori_reparasi.php?id=$id&batch=".$baris['batch']."&fpu=".$baris['fpu']."'>Delete</a></td>";
                      }
                      echo "</tr>";
                    }
                   ?>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
    })
  })
</script>
<script>
  <?php 
    if($delete!=NULL){
      if($delete=='success'){?>
        alert("Data Berhasil Dihapus!");
      <?php }
      else{ ?>
        alert("Data Gagal Dihapus!")  
      <?php }
    }
    if($save!=NULL){
      if($save=='success'){?>
        alert("Data Berhasil di Update!")
      <?php }
      else{ ?>
        alert("Data Gagal di Update!");            
    <?php }
    } ?>
</script>
</body>
</html>
	<?php } ?>