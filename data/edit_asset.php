<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header ("location:../login.php");
	}
	else{
    include "../koneksi.php";
    $id = $_GET['id'];
    $jenis=$_GET['jenis'];
    $inv=$_GET['inv'];
    $lokasi=$_GET['lok'];
    $app=$_GET['app'];
    $user=$_GET['user'];
    $unit=$_GET['unit'];
    $license=$_GET['license'];
    $sql = "SELECT detail.id_detail, detail.hostname, detail.no_monitor, jenis_asset.jenis, user.nama, user.jabatan, user.dept, lokasi.nama_lokasi, user.login_ad, user.email, user.license_email, unit.nama_unit, inventory.merk, inventory.type, inventory.status_asset, inventory.jumlah, inventory.tanggal, inventory.processor, inventory.hardisk, inventory.ram, inventory.serial_number, license.type_license, license.os, license.sn_os, license.office, license.sn_office, license.project, license.sn_project, license.esqiel, license.sn_sql, aplikasi.visio, aplikasi.av, aplikasi.photoshop, aplikasi.pdf, aplikasi.ax, aplikasi.vdi, aplikasi.lain, detail.status, detail.keterangan FROM detail, jenis_asset, inventory, lokasi, aplikasi, user, license, unit WHERE detail.id_jenis=jenis_asset.id_jenis AND detail.id_inv=inventory.id_inv AND detail.id_lokasi=lokasi.id_lokasi AND detail.id_app=aplikasi.id_app AND detail.id_user=user.id_user AND detail.id_unit=unit.id_unit AND detail.id_license=license.id_license AND detail.id_detail='$id'";
    $query = mysqli_query($connect, $sql);
    $data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<?php include "../main/header.php"; ?>
<body class="hold-transition skin-blue sidebar-mini">

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Form Edit Data Asset</h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-home"></i>Home</a></li>
		<li><a href="obatdata/data_obat.php">Data Asset</a></li>
        <li class="active">Edit Data Asset</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Asset</h3>
            </div>
            <div class="box-body">
			       <form method="POST" action="update_asset.php?id=<?php echo $id.'&&jenis='.$jenis.'&&unit='.$unit.'&&inv='.$inv.'&&lok='.$lokasi.'&&license='.$license.'&&app='.$app.'&&user='.$user; ?>" enctype="multipart/form-data" role="form">
                </div>
			         	<div class="form-group">
                  <label>Hostname</label>
                  <input type="text" name="hostname" class="form-control" value="<?php echo $data['hostname']; ?>">
                </div>
                <div class="form-group">
                  <label>No. Monitor</label>
                  <input type="text" name="monitor" class="form-control" value="<?php echo $data['no_monitor']; ?>">
                </div>
				        <div class="form-group">
                  <label>Jenis Asset</label>
                  <select class="form-control" name="jenis_asset">
                    <?php
                        include"../koneksi.php";
                        $sql2 = "SELECT * FROM jenis_asset ORDER BY jenis ASC";
                        $query2 = mysqli_query ($connect, $sql2);
                        while($hasil=mysqli_fetch_array($query2))
                        {
                          
                          if ($hasil['jenis']==$data['jenis']) {
                            echo "<option value=$hasil[id_jenis] selected>$hasil[jenis]</option>";
                          }
                          else{
                            echo "<option value=$hasil[id_jenis]>$hasil[jenis]</option>";
                          }        
                        }
                      ?>
                   </select>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" name="jabatan" class="form-control" value="<?php echo $data['jabatan']; ?>">
                </div>
                <div class="form-group">
                  <label>Dept</label>
                 <input type="text" name="dept" class="form-control" value="<?php echo $data['dept']; ?>">
                </div>
                <div class="form-group">
                  <label>Lokasi</label>
                  <select class="form-control" name="lokasi">
                    <?php
                        include"../koneksi.php";
                        $sql3 = "SELECT * FROM lokasi ORDER BY nama_lokasi ASC";
                        $query3 = mysqli_query ($connect, $sql3);
                        while($cabang=mysqli_fetch_array($query3))
                        {
                          if($cabang['nama_lokasi']==$data['nama_lokasi'])
                          {
                            echo "<option value=$cabang[id_lokasi] selected>$cabang[nama_lokasi]</option>";
                          }
                          else{
                            echo "<option value=$cabang[id_lokasi]>$cabang[nama_lokasi]</option>";        
                          }
                        }
                      ?>
                   </select>
                </div>
                <div class="form-group">
                  <label>Login AD</label>
                  <input type="text" name="ad" class="form-control" value="<?php echo $data['login_ad']; ?>">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>">
                </div>
                <div class="form-group">
                  <label>License Email</label>
                  <input type="text" name="sn_email" class="form-control" value="<?php echo $data['license_email']; ?>">
                </div>
                <div class="form-group">
                  <label>Unit</label>
                  <select class="form-control" name="unit">
                    <?php
                        include"../koneksi.php";
                        $sql9 = "SELECT * FROM unit ORDER BY nama_unit ASC";
                        $query9 = mysqli_query ($connect, $sql9);
                        while($unit=mysqli_fetch_array($query9))
                        {
                          if($unit['nama_unit']==$data['nama_unit'])
                          {
                            echo "<option value=$unit[id_unit] selected>$unit[nama_unit]</option>";
                          }
                          else{
                            echo "<option value=$unit[id_unit]>$unit[nama_unit]</option>";        
                          }
                        }
                      ?>
                   </select>
                </div>
				        <div class="form-group">
                  <label>Merk</label>
                  <input type="text" name="merk" class="form-control" value="<?php echo $data['merk']; ?>">
                </div>
				        <div class="form-group">
                  <label>Type</label>
                  <input type="text" name="tipe" class="form-control" value="<?php echo $data['type']; ?>">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <input type="text" name="status_asset" class="form-control" value="<?php echo $data['status_asset']; ?>">
                </div>
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="text" name="jumlah" class="form-control" value="<?php echo $data['jumlah']; ?>">
                </div>
                <div class="form-group">
                  <label>Tahun Penyerahan</label>
                  <input type="text" name="tanggal" class="form-control" value="<?php echo $data['tanggal']; ?>">
                </div>
                <div class="form-group">
                  <label>Processor</label>
                  <input type="text" name="processor" class="form-control" value="<?php echo $data['processor']; ?>">
                </div>
                <div class="form-group">
                  <label>Hardisk</label>
                  <input type="text" name="hardisk" class="form-control" value="<?php echo $data['hardisk']; ?>">
                </div>
                <div class="form-group">
                  <label>RAM</label>
                  <input type="text" name="ram" class="form-control" value="<?php echo $data['ram']; ?>">
                </div>
                <div class="form-group">
                  <label>Serial No.</label>
                  <input type="text" name="sn" class="form-control" value="<?php echo $data['serial_number']; ?>">
                </div>
                <div class="form-group">
                  <label>Type License</label>
                  <input type="text" name="type_license" class="form-control" value="<?php echo $data['type_license']; ?>">
                </div>
                <div class="form-group">
                  <label>Operating System</label>
                  <input type="text" name="os" class="form-control" value="<?php echo $data['os']; ?>">
                </div>
                <div class="form-group">
                  <label>Serial Number (OS)</label>
                  <input type="text" name="sn_os" class="form-control" value="<?php echo $data['sn_os']; ?>">
                </div>
                <div class="form-group">
                  <label>Office</label>
                  <input type="text" name="office" class="form-control" value="<?php echo $data['office']; ?>">
                </div>
                <div class="form-group">
                  <label>Serial Number (Office)</label>
                  <input type="text" name="sn_office" class="form-control" value="<?php echo $data['sn_office']; ?>">
                </div>
                <div class="form-group">
                  <label>project</label>
                  <input type="text" name="project" class="form-control" value="<?php echo $data['project']; ?>">
                </div>
                <div class="form-group">
                  <label>Serial Number Project</label>
                  <input type="text" name="sn_project" class="form-control" value="<?php echo $data['sn_project']; ?>">
                </div>
                <div class="form-group">
                  <label>SQL</label>
                  <input type="text" name="esqiel" class="form-control" value="<?php echo $data['esqiel']; ?>">
                </div>
                <div class="form-group">
                  <label>Serial Number SQL</label>
                  <input type="text" name="sn_sql" class="form-control" value="<?php echo $data['sn_sql']; ?>">
                </div>
                <div class="form-group">
                  <label>Visio</label>
                  <input type="text" name="visio" class="form-control" value="<?php echo $data['visio']; ?>">
                </div>
                <div class="form-group">
                  <label>Anti Virus</label>
                  <input type="text" name="av" class="form-control" value="<?php echo $data['av']; ?>">
                </div>
                <div class="form-group">
                  <label>Photoshop</label>
                  <input type="text" name="ps" class="form-control" value="<?php echo $data['photoshop']; ?>">
                </div>
                <div class="form-group">
                  <label>PDF Reader</label>
                  <input type="text" name="pdf" class="form-control" value="<?php echo $data['pdf']; ?>">
                </div>
                <div class="form-group">
                  <label>Dynamix AX</label>
                  <input type="text" name="ax" class="form-control" value="<?php echo $data['ax']; ?>">
                </div>
                <div class="form-group">
                  <label>VDI / CITRIX</label>
                  <input type="text" name="vdi" class="form-control" value="<?php echo $data['vdi']; ?>">
                </div>
                <div class="form-group">
                  <label>Aplikasi Lain</label>
                  <input type="text" name="lain" class="form-control" value="<?php echo $data['lain']; ?>">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <input type="text" name="status" class="form-control" value="<?php echo $data['status']; ?>">
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" name="keterangan" class="form-control" value="<?php echo $data['keterangan']; ?>">
                </div>
                <input type="submit" value="Simpan" class='btn btn-primary'>
			         <a href="data_asset.php"><input type="button" value="Batal" class='btn btn-primary'></a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
<?php include "../main/footer.php"; ?>
</html>
	<?php } ?>