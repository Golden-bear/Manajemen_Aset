<?php 
	include '../koneksi.php';
	session_start();
	if (!isset($_SESSION['login'])) 
	{
		header("location: ../login.php");
	}
	else
	{
		$cabang=$_REQUEST['cabang'];
		$jenis=$_REQUEST['jenis'];
		$no_asset=$_REQUEST['no_asset'];
		if($no_asset==NULL)
		{
			$sql="SELECT detail.id_detail, detail.id_jenis, detail.id_unit, detail.id_inv, detail.id_lokasi, detail.id_license, detail.id_app, detail.id_user, detail.hostname, detail.no_monitor, jenis_asset.jenis, user.nama, user.jabatan, user.dept, lokasi.nama_lokasi, user.login_ad, user.email, user.license_email, unit.nama_unit, inventory.merk, inventory.type, inventory.status_asset, inventory.jumlah, inventory.tanggal, inventory.processor, inventory.hardisk, inventory.ram, inventory.serial_number, license.type_license, license.os, license.sn_os, license.office, license.sn_office, license.project, license.sn_project, license.esqiel, license.sn_sql, aplikasi.visio, aplikasi.av, aplikasi.photoshop, aplikasi.pdf, aplikasi.ax, aplikasi.vdi, aplikasi.lain, detail.status, detail.keterangan FROM detail, jenis_asset, unit, license, inventory, lokasi, aplikasi, user WHERE detail.id_jenis=jenis_asset.id_jenis AND detail.id_inv=inventory.id_inv AND detail.id_lokasi=lokasi.id_lokasi AND detail.id_app=aplikasi.id_app AND detail.id_user=user.id_user AND detail.id_unit=unit.id_unit AND detail.id_license=license.id_license AND detail.id_jenis='$jenis' AND detail.id_lokasi='$cabang'";
			$res=mysqli_query($connect, $sql);

		}
    else
    {
      $sql="SELECT detail.id_detail, detail.id_jenis, detail.id_unit, detail.id_inv, detail.id_lokasi, detail.id_license, detail.id_app, detail.id_user, detail.hostname, detail.no_monitor, jenis_asset.jenis, user.nama, user.jabatan, user.dept, lokasi.nama_lokasi, user.login_ad, user.email, user.license_email, unit.nama_unit, inventory.merk, inventory.type, inventory.status_asset, inventory.jumlah, inventory.tanggal, inventory.processor, inventory.hardisk, inventory.ram, inventory.serial_number, license.type_license, license.os, license.sn_os, license.office, license.sn_office, license.project, license.sn_project, license.esqiel, license.sn_sql, aplikasi.visio, aplikasi.av, aplikasi.photoshop, aplikasi.pdf, aplikasi.ax, aplikasi.vdi, aplikasi.lain, detail.status, detail.keterangan FROM detail, jenis_asset, unit, license, inventory, lokasi, aplikasi, user WHERE detail.id_jenis=jenis_asset.id_jenis AND detail.id_inv=inventory.id_inv AND detail.id_lokasi=lokasi.id_lokasi AND detail.id_app=aplikasi.id_app AND detail.id_user=user.id_user AND detail.id_unit=unit.id_unit AND detail.id_license=license.id_license AND detail.id_jenis='$jenis' AND detail.id_lokasi='$cabang' AND detail.hostname='$no_asset'";
      $res=mysqli_query($connect, $sql);
    }
		?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Management Asset Sierad</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="../https://fonts.googleapis.com/
  css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="../css/refreshform.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="../index.php" class="logo">
      <span class="logo-mini"><b>MAN<</b></span>
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
            <i class="fa fa fa-file-text"></i> <span>DATA ASSET</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data_asset.php"><i class="fa"></i>Lihat Asset</a></li>
            <li><a href="cari_asset.php"><i class="fa"></i>Cari Asset</a></li>
            <li><a href="hapus_jenis.php"><i class="fa"></i>Hapus Jenis Asset</a></li>
            <li><a href="hapus_lokasi.php"><i class="fa"></i>Hapus Lokasi</a></li>
            <li><a href="hapus_unit.php"><i class="fa"></i>Hapus Unit</a></li>
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
            <li><a href="../tambah/tambah_jenis.php"><i class="fa"></i>Tambah Jenis Asset</a></li>
            <li><a href="../tambah/tambah_lokasi.php"><i class="fa"></i>Tambah Lokasi</a></li>
            <li><a href="../tambah/tambah_unit.php"><i class="fa"></i>Tambah Unit</a></li>
          </ul>
        </li>
		
      </ul>
   </section>
 </aside>
 
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Asset
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-home"></i>Home</a></li>
		<li><a href=" ">Data Aset</a></li>
        <li class="active">Lihat Aset</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-18">
		<p align="right">
			<a> <?php echo ("<button type='button' class = 'btn btn-success' onclick=\"location.href='cetak_asset.php'\"><img src='../images/excel.png' width=35 height=35>Export To Excel</button>");?></a>
		</p>
           <div class="box box-primary">
            <div class="box-body">
              <div class="tabel">
              <table id="example1" class="table table-striped">
                <thead>
                <tr>
        					<th style="text-align:center;">Hostname & No. Asset</th>
                  <th style="text-align:center;">No. Monitor</th>
                  <th style="text-align:center;">Jenis Asset</th>
                  <th style="text-align:center;">Nama</th>
                  <th style="text-align:center;">Jabatan</th>
                  <th style="text-align:center;">Dept</th>
                  <th style="text-align:center;">Lokasi</th>
                  <th style="text-align:center;">Login AD</th>
                  <th style="text-align:center;">Email</th>
                  <th style="text-align:center;">License Email</th>
                  <th style="text-align:center;">Unit</th>
                  <th style="text-align:center;">Merk</th>
                  <th style="text-align:center;">Type</th>
                  <th style="text-align:center;">Status</th>
                  <th style="text-align:center;">Jumlah</th>
                  <th style="text-align:center;">Tahun Penyerahan</th>
                  <th style="text-align:center;">Processor</th>
                  <th style="text-align:center;">Hardisk</th>
                  <th style="text-align:center;">RAM</th>
                  <th style="text-align:center;">Serial No.</th>
                  <th style="text-align:center;">Type License</th>
                  <th style="text-align:center;">Operating System</th>
                  <th style="text-align:center;">Serial Number (OS)</th>
                  <th style="text-align:center;">Office</th>
                  <th style="text-align:center;">Serial Number (Office)</th>
                  <th style="text-align:center;">Project</th>
                  <th style="text-align:center;">Serial Number (Project)</th>
                  <th style="text-align:center;">SQL</th>
                  <th style="text-align:center;">Serial Number (SQL)</th>
                  <th style="text-align:center;">Visio</th>
                  <th style="text-align:center;">AV</th>
                  <th style="text-align:center;">Photoshop</th>
                  <th style="text-align:center;">PDF Reader</th>
                  <th style="text-align:center;">Dynamix AX</th>
                  <th style="text-align:center;">VDI / CITRIX</th>
                  <th style="text-align:center;">Aplikasi Lain</th>
                  <th style="text-align:center;">Status</th>
                  <th style="text-align:center;">Keterangan</th>
                  <th style="text-align:center;">Aksi</th>
        				</tr>
                </thead>
			
                <tbody>
                <?php
          				while($data=mysqli_fetch_array($res)){
          					echo "<tr>";
                    echo "<td style='text-align:center;'>".$data['hostname']."</td>";
                    echo "<td style='text-align:center;'>".$data['no_monitor']."</td>";
                    echo "<td style='text-align:center;'>".$data['jenis']."</td>";
                    echo "<td style='text-align:center;'>".$data['nama']."</td>";
                    echo "<td style='text-align:center;'>".$data['jabatan']."</td>";
                    echo "<td style='text-align:center;'>".$data['dept']."</td>";
                    echo "<td style='text-align:center;'>".$data['nama_lokasi']."</td>";
                    echo "<td style='text-align:center;'>".$data['login_ad']."</td>";
                    echo "<td style='text-align:center;'>".$data['email']."</td>";
                    echo "<td style='text-align:center;'>".$data['license_email']."</td>";
                    echo "<td style='text-align:center;'>".$data['nama_unit']."</td>";
                    echo "<td style='text-align:center;'>".$data['merk']."</td>";
                    echo "<td style='text-align:center;'>".$data['type']."</td>";
                    echo "<td style='text-align:center;'>".$data['status_asset']."</td>";
                    echo "<td style='text-align:center;'>".$data['jumlah']."</td>";
                    echo "<td style='text=align:center;'>".$data['tanggal'];
                    echo "<td style='text-align:center;'>".$data['processor']."</td>";
                    echo "<td style='text-align:center;'>".$data['hardisk']."</td>";
                    echo "<td style='text-align:center;'>".$data['ram']."</td>";
                    echo "<td style='text-align:center;'>".$data['serial_number']."</td>";
                    echo "<td style='text-align:center;'>".$data['type_license']."</td>";
                    echo "<td style='text-align:center;'>".$data['os']."</td>";
                    echo "<td style='text-align:center;'>".$data['sn_os']."</td>";
                    echo "<td style='text-align:center;'>".$data['office']."</td>";
                    echo "<td style='text-align:center;'>".$data['sn_office']."</td>";
                    echo "<td style='text-align:center;'>".$data['project']."</td>";
                    echo "<td style='text-align:center;'>".$data['sn_project']."</td>";
                    echo "<td style='text-align:center;'>".$data['esqiel']."</td>";
                    echo "<td style='text-align:center;'>".$data['sn_sql']."</td>";
                    echo "<td style='text-align:center;'>".$data['visio']."</td>";
                    echo "<td style='text-align:center;'>".$data['av']."</td>";
                    echo "<td style='text-align:center;'>".$data['photoshop']."</td>";
                    echo "<td style='text-align:center;'>".$data['pdf']."</td>";
                    echo "<td style='text-align:center;'>".$data['ax']."</td>";
                    echo "<td style='text-align:center;'>".$data['vdi']."</td>";
                    echo "<td style='text-align:center;'>".$data['lain']."</td>";
                    echo "<td style='text-align:center;'>".$data['status']."</td>";
                    echo "<td style='text-align:center;'>".$data['keterangan']."</td>";
                    echo "<td style='text-align:center;'><a class='btn btn-primary' href='edit_asset.php?id=".$data['id_detail']."&&jenis=".$data['id_jenis']."&&unit=".$data['id_unit']."&&inv=".$data['id_inv']."&&lok=".$data['id_lokasi']."&&license=".$data['id_license']."&&app=".$data['id_app']."&&user=".$data['id_user']."'>Edit</a><p></p>
                    <a class='btn btn-danger' href='delete_asset.php?id=".$data['id_detail']."&&jenis=".$data['id_jenis']."&&unit=".$data['id_unit']."&&inv=".$data['id_inv']."&&lok=".$data['id_lokasi']."&&license=".$data['id_license']."&&app=".$data['id_app']."&&user=".$data['id_user']."'>Delete</a></td>";
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
</body>
</html>
<?php 
	}
 ?>