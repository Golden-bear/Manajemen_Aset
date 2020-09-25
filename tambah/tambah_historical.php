<?php
session_start();
if(!isset($_SESSION['login']))
	{
		header ("location:../login.php");
	}
else
	{
    error_reporting(0);
    $id=$_REQUEST['id'];
?>
<!DOCTYPE html>
<html>
<?php
include "../main/header.php";
?>
	
<body class="hold-transition skin-blue sidebar-mini">
  <div class="content-wrapper">
    <section class="content-header">
      <h1> Form Input Historical Asset</h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-home"></i> Home</a></li>
		<li>lihat Asset</li>
    <li>Lihat Historical Asset</li>
        <li class="active">Tambah Historical Asset </li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">

			
            <div class="box-body">
			<form method="post" enctype="multipart/form-data" role="form" action="simpan_historical.php?id=<?php echo $id; ?>">
               <div class="box-header with-border">
                  <h3 class="box-title col-md-6">Hitsorical User</h3>
                </div>
                <div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" placeholder="Enter ...">
                </div>
                <div class="form-group">
          <label>Dept</label>
          <input type="text" name="dept" class="form-control" placeholder="Enter ...">
                </div>
                <div class="form-group">
          <label>Bukti Serah Terima</label>
          <input type="file" name="bukti" class="form-control">
                </div>
                <div class="form-group">
          <label>Tanggal Penyerahan</label>
          <input type="date" name="penyerahan" class="form-control">
                </div>
                <div class="form-group">
          <label>Tanggal Pengembalian</label>
          <input type="date" name="pengembalian" class="form-control">
                </div>
                <div class="box-header with-border">
                  <h3 class="box-title col-md-6">Historical Maintenance / Reparasi</h3>
                </div>
                <div class="form-group">
          <label>Perbaikan & pembelian</label>
          <input type="text" name="pembelian" class="form-control">
                </div>
                <div class="form-group">
          <label>No. Batch</label>
          <input type="text" name="batch" class="form-control">
                </div>
                <div class="form-group">
          <label>No. FPU  </label>
          <input type="text" name="fpu" class="form-control">
                </div>
                <div class="form-group">
          <label>Jenis Spare Part</label>
          <input type="text" name="jenis" class="form-control">
                </div>
                <div class="form-group">
          <label>Nomor BTB</label>
          <input type="text" name="btb" class="form-control">
                </div>
                <div class="form-group">
          <label>Tanggal</label>
          <input type="date" name="tanggal" class="form-control">
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