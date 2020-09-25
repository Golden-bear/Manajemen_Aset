<?php 
	include '../koneksi.php';
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location: ../login.php');
	}
	else
	{
		$id=$_REQUEST['id'];
    $batch=$_REQUEST['batch'];
    $fpu=$_REQUEST['fpu'];
		$sql="SELECT * FROM histori_reparasi WHERE id_detail='$id' AND batch='$batch' AND fpu='$fpu'";
		$res=mysqli_query($connect, $sql);
		$data=mysqli_fetch_array($res);
		?>

<!DOCTYPE html>
<html>
<?php
include "../main/header.php";
?>
	
<body class="hold-transition skin-blue sidebar-mini">
  <div class="content-wrapper">
    <section class="content-header">
      <h1> Form Edit Historical User</h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-home"></i> Home</a></li>
		<li>lihat Asset</li>
    <li>Lihat Historical Asset</li>
        <li class="active">Edit Historical User </li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">

			
            <div class="box-body">
			<form method="post" enctype="multipart/form-data" role="form" action="simpan_edit_reparasi.php?id=<?php echo $id; ?>&batch=<?php echo $batch; ?>&fpu=<?php echo $fpu; ?>">
                <div class="" lass="form-group">
					<label>Perbaikan & Pembelian</label>
					<input type="text" name="aksi" class="form-control" value="<?php echo $data['aksi']; ?>">
                </div>
                <div class="form-group">
          <label>No. Batch</label>
          <input type="text" name="batche" class="form-control" value="<?php echo $data['batch']; ?>">
                </div>
                <div class="form-group">
          <label>No. FPU</label>
          <input type="text" name="efpu" class="form-control" value="<?php echo $data['fpu']; ?>">
                </div>
                <div class="form-group">
          <label>Jenis Spare Part</label>
          <input type="text" name="sparepart" class="form-control" value="<?php echo $data['sparepart']; ?>">
                </div>
                <div class="form-group">
          <label>Nomor BTB</label>
          <input type="text" name="btb" class="form-control" value="<?php echo $data['btb']; ?>">
                </div>
          <label>Tanggal</label>
          <input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal']; ?>">
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
</body>
</html>

	<?php  }?>