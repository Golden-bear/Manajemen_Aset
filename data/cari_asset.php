<?php
session_start();
if(!isset($_SESSION['login']))
	{
		header ("location:../login.php");
	}

else
	{
?>
<!DOCTYPE html>
<html>
<?php
	include "../main/header.php";
?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Cari Asset</h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-home"></i> Home</a></li>
        <li>Cari Asset</li>
		<li class="active">Cari Asset</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Asset</h3>
            </div>
            <div class="box-body">
			<form method="post" action="proses_cari.php" enctype="multipart/form-data" role="form">
				<div class="form-group">
            <label>Lokasi</label>
            <div>
              <select class="form-control" name="cabang">
              <?php
              include"../koneksi.php";
              $query = "SELECT * FROM lokasi ORDER BY nama_lokasi ASC";
              $tampil = mysqli_query ($connect, $query);
              while($data=mysqli_fetch_array($tampil))
              {
                echo "<option value=$data[id_lokasi]>$data[nama_lokasi]</option>";        
              }
              ?>
              </select>
              </div>
            </div>
          <div class="form-group">
            <label>Jenis Asset</label>
            <div>
              <select class="form-control" name="jenis">
              <?php
              include"../koneksi.php";
              $query = "SELECT * FROM jenis_asset ORDER BY jenis ASC";
              $tampil = mysqli_query ($connect, $query);
              while($data=mysqli_fetch_array($tampil))
              {
                echo "<option value=$data[id_jenis]>$data[jenis]</option>";        
              }
              ?>
              </select>
              </div>
            </div>
				<div class="form-group">
                  <label> Hostname & No. Asset</label>
                  <input type="text" name="no_asset" class="form-control" placeholder="Enter ...">
                </div>

				<div class="row">
				  <div class="col-xs-8"></div>
				  <div class="col-xs-4">
					<button type="submit" name="simpan" value= "simpan" class="btn btn-primary btn-block btn-flat">CARI  </button>
				  </div>
				</div>
			</form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
<?php
	include "../main/footer.php";
?>
</html>
<?php } ?>
