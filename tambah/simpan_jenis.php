<?php 
	include '../koneksi.php';
	session_start();
	if (!isset($_SESSION['login'])) {
		header('location: ../login.php');
	}
	else
	{
		$jenis=$_REQUEST['jenis'];
		$salah=0;
		$sql1="SELECT * FROM jenis_asset";
		$res1=mysqli_query($connect, $sql1);
		while($hasil=mysqli_fetch_array($res1)){
			if ($jenis==$hasil['jenis']) {	
				$salah++;	
			}
		}
		if($salah>0)
		{
			header('location: tambah_jenis.php?save=redudansi');
		}
		else{
			$sql="INSERT INTO jenis_asset(jenis) VALUES ('$jenis')";
			$res=mysqli_query($connect,$sql);
			if($res)
			{
				header('location: tambah_jenis.php?save=success');
			}
			else
			{
				header('location: tambah_jenis.php?save=failed');
			}
		}
	}
 ?>