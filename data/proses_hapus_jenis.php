<?php 
	include '../koneksi.php';
	session_start();
	if (!isset($_SESSION['login'])) 
	{
		header("location: ../login.php");
	}
	else
	{
		$jenis=$_REQUEST['jenis'];
		$sql="DELETE FROM jenis_asset WHERE id_jenis='$jenis'";
		$query=mysqli_query($connect, $sql);
		if($query)
		{
			header('location: hapus_jenis.php?deleted=success');
		}
		else
		{
			header('location: hapus_jenis.php?deleted=failed');
		}
	}
?>