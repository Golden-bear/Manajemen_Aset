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
		$name=$_REQUEST['name'];
		$dept=$_REQUEST['dept'];
		$penyerahan=$_REQUEST['penyerahan'];
		$pengembalian=$_REQUEST['pengembalian'];
		$bukti=basename($_FILES["bukti"]["name"]);
		$target="../uploads/";
		$target_file = $target . basename($_FILES["bukti"]["name"]);
		move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file);

		$sql="UPDATE histori_user SET id_detail='$id', nama='$name', dept='$dept', bukti='$bukti', tgl_penyerahan='$penyerahan', tgl_pengembalian='$pengembalian' WHERE id_detail='$id' AND nama='$nama'";
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