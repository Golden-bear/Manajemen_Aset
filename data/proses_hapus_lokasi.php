<?php 
	include '../koneksi.php';
	session_start();
	if (!isset($_SESSION['login'])) 
	{
		header("location: ../login.php");
	}
	else
	{
		$lokasi=$_REQUEST['lokasi'];
		$sql="DELETE FROM lokasi WHERE id_lokasi='$lokasi'";
		$query=mysqli_query($connect, $sql);
		if($query)
		{
			header('location: hapus_lokasi.php?deleted=success');
		}
		else
		{
			header('location: hapus_lokasi.php?deleted=failed');
		}
	}
?>