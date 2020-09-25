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
		$nama=$_REQUEST['nama'];
		$sql="SELECT * FROM histori_user WHERE id_detail='$id' AND nama='$nama'";
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
			<form method="post" enctype="multipart/form-data" role="form" action="simpan_edit_user.php?id=<?php echo $id; ?>&nama=<?php echo $nama ?>">
                <div class="" lass="form-group">
					<label>Nama</label>
					<input type="text" name="name" class="form-control" value="<?php echo $data['nama']; ?>">
                </div>
                <div class="form-group">
          <label>Dept</label>
          <input type="text" name="dept" class="form-control" value="<?php echo $data['dept']; ?>">
                </div>
                <div class="form-group">
          <label>Bukti Serah Terima</label>
          <input type="file" name="bukti" class="form-control" value="<?php echo $data['bukti']; ?>">
                </div>
                <div class="form-group">
          <label>Tanggal Penyerahan</label>
          <input type="date" name="penyerahan" class="form-control" value="<?php echo $data['tgl_penyerahan']; ?>">
                </div>
                <div class="form-group">
          <label>Tanggal Pengembalian</label>
          <input type="date" name="pengembalian" class="form-control" value="<?php echo $data['tgl_pengembalian']; ?>">
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