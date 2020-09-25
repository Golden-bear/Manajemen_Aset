<?php
session_start();
if(!isset($_SESSION['login']))
	{
		header ("location:../login.php");
	}
else
	{
    error_reporting(0);
    $simpan=$_REQUEST['save'];
?>
<!DOCTYPE html>
<html>
<?php
include "../main/header.php";
?>
	
<body class="hold-transition skin-blue sidebar-mini">
  <div class="content-wrapper">
    <section class="content-header">
      <h1> Form Input Asset</h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-home"></i> Home</a></li>
		<li>Input Asset</li>
        <li class="active">Input Asset Baru</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">

			
            <div class="box-body">
			<form method="post" action="simpan_asset.php" enctype="multipart/form-data" role="form">
               
                <div class="form-group">
					<label> Hostname & No. Asset</label>
					<input type="text" name="hostname" class="form-control" placeholder="Enter ..." required>
                </div>

                 <div class="form-group">
					<div>
            <label> No. Monitor</label>
          <input type="text" name="monitor" class="form-control" placeholder="Enter ...">
                </div>

                 <div class="form-group">
          <div>
						<label> Jenis Asset</label>
             			<select class="form-control" name="jenis_asset">
             				<?php
              					include"../koneksi.php";
               					$sql = "SELECT * FROM jenis_asset ORDER BY jenis ASC";
               					$query = mysqli_query ($connect, $sql);
              					while($data=mysqli_fetch_array($query))
              					{
                					echo "<option value=$data[id_jenis]>$data[jenis]</option>";        
              					}
              				?>
             			 </select>
              			</div>
                </div>

                <div class="box-header with-border">
                  <h3 class="box-title col-md-6"> User</h3>
                </div>

                <div class="form-group">
          <label> Nama</label>
          <input type="text" name="nama" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label> Jabatan</label>
          <input type="text" name="jabatan" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label> Departemen</label>
          <input type="text" name="dept" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <div>
            <label> Lokasi</label>
                  <select class="form-control" name="lokasi">
                    <?php
                        include"../koneksi.php";
                        $query = "SELECT * FROM lokasi ORDER BY nama_lokasi ASC";
                        $lokasi = mysqli_query ($connect, $query);
                        while($data=mysqli_fetch_array($lokasi))
                        {
                          echo "<option value=$data[id_lokasi] >$data[nama_lokasi]</option>";        
                        }
                      ?>
                   </select>
                    </div>
                </div>

                <div class="form-group">
          <label> Login AD</label>
          <input type="text" name="ad" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label> Email</label>
          <input type="text" name="email" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label> License Email</label>
          <input type="text" name="sn_email" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <div>
            <label> Unit</label>
                  <select class="form-control" name="unit">
                    <?php
                        include"../koneksi.php";
                        $sql1 = "SELECT * FROM unit ORDER BY nama_unit ASC";
                        $unit = mysqli_query ($connect, $sql1);
                        while($hasil=mysqli_fetch_array($unit))
                        {
                          echo "<option value=$hasil[id_unit]>$hasil[nama_unit]</option>";        
                        }
                      ?>
                   </select>
                    </div>
                </div>

                <div class="box-header with-border">
              		<h3 class="box-title col-md-6"> Asset Inventory</h3>
           		</div>

           		<div class="form-group">
					<label> Merk</label>
					<input type="text" name="merk" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
					<label> Type</label>
					<input type="text" name="tipe" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label>Status</label>
          <input type="text" name="status_asset" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label>Jumlah</label>
          <input type="text" name="jumlah" class="form-control" placeholder="Enter ...">
                </div>

				<div class="form-group">
          <label>Tahun Penyerahan</label>
          <input type="text" name="tanggal" class="form-control" placeholder="Enter ...">
                </div>
                
                <div class="box-header with-border">
              		<h3 class="box-title col-md-6"> Spesifikasi</h3>
           		</div>

				<div class="form-group">
					<label> Processor</label>
					<input type="text" name="processor" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
					<label> Hardisk</label>
					<input type="text" name="hardisk" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
					<label> RAM</label>
					<input type="text" name="ram" class="form-control" placeholder="Enter ...">
                </div>
				
				<div class="form-group">
					<label> Serial Number</label>
					<input type="text" name="sn" class="form-control" placeholder="Enter ...">
                </div>

          <div class="box-header with-border">
            <h3 class="box-title col-md-6"> LICENSING</h3>
          </div>

           		<div class="form-group">
					<label> Type Lisence</label>
					<input type="text" name="type_license" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
					<label> Operating System</label>
					<input type="text" name="os" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
					<label> Serial Number OS</label>
					<input type="text" name="sn_os" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
					<label> Office</label>
					<input type="text" name="office" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
					<label> Serial Number Office</label>
					<input type="text" name="sn_office" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label> Project</label>
          <input type="text" name="project" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label> Serial Number Project</label>
          <input type="text" name="sn_project" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label> SQL</label>
          <input type="text" name="sql" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label> Serial Number SQL</label>
          <input type="text" name="sn_sql" class="form-control" placeholder="Enter ...">
                </div>

                <div class="box-header with-border">
                  <h3 class="box-title col-md-6"> Aplikasi</h3>
              </div>

              <div class="form-group">
          <label> Visio</label>
          <input type="text" name="visio" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label> Anti Virus</label>
          <input type="text" name="av" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label> Photoshop</label>
          <input type="text" name="ps" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label> PDF Reader</label>
          <input type="text" name="pdf" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label> Dynamix AX</label>
          <input type="text" name="ax" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label> VDI / CITRIX</label>
          <input type="text" name="vdi" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
          <label> Aplikasi Lain</label>
          <input type="text" name="app_lain" class="form-control" placeholder="Enter ...">
                </div>

                <div class="box-header with-border">
              		<h3 class="box-title col-md-6"> Lain-lain</h3>
           		</div>

                <div class="form-group">
					<label> Status</label>
					<input type="text" name="status" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
					<label> Keterangan</label>
					<input type="text" name="ket" class="form-control" placeholder="Enter ...">
                </div>

				<div class="row">
					<div class="col-xs-8"></div>
					<div class="col-xs-4">
						<button type="submit" name="simpan" value= "simpan" class="btn btn-primary btn-block btn-flat">SIMPAN</button>
					</div>
					</div>
			</form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script type="text/javascript">
    <?php 
      if($simpan!=NULL)
      {
        if($simpan=='success'){?>
          alert("Data Berhasil Disimpan!");
     <?php }
        else{?>
          alert("Data Gagal Disimpan!");
      <?php }
      } ?>
  </script>
</body>
<?php
	include "../main/footer.php";
?>
</html>
<?php } ?>