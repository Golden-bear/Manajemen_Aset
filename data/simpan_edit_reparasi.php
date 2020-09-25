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
		$aksi=$_REQUEST['aksi'];
		$batche=$_REQUEST['batche'];
		$efpu=$_REQUEST['efpu'];
		$sparepart=$_REQUEST['sparepart'];
		$btb=$_REQUEST['btb'];
		$tanggal=$_REQUEST['tanggal'];
		$sql="UPDATE histori_reparasi SET id_detail='$id', aksi='$aksi', batch='$batche', fpu='$efpu', sparepart='$sparepart', btb='$btb', tanggal='$tanggal' WHERE id_detail='$id' AND batch='$batch' AND fpu='$fpu'";
		$res=mysqli_query($connect, $sql);
		if($res)
		{
			header("location: histori_asset.php?id=$id&save=success");
		}
		else
		{
			header("location: histori_asset.php?id=$id&save=failed");
		}
	}
 ?>