<?php 
	include '../koneksi.php';
	session_start();
	if (!isset($_SESSION['login'])) 
	{
		header("location: ../login.php");
	}
	else
	{
		$unit=$_REQUEST['unit'];
		$sql="DELETE FROM unit WHERE id_unit='$unit'";
		$query=mysqli_query($connect, $sql);
		if($query)
		{
			header('location: hapus_unit.php?deleted=success');
		}
		else
		{
			header('location: hapus_unit.php?deleted=failed');
		}
	}
?>