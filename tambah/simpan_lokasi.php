<?php 
	include '../koneksi.php';
	session_start();
	if(!isset($_SESSION['login'])){
		header('location: ../login.php');
	}
	else
	{
		$lokasi=$_REQUEST['lokasi'];
		$salah=0;
		$sql1="SELECT * FROM lokasi";
		$res1=mysqli_query($connect, $sql1);
		while($hasil=mysqli_fetch_array($res1)){
			if ($lokasi==$hasil['nama_lokasi']) {	
				$salah++;	
			}
		}
		if($salah>0)
		{
			header('location: tambah_lokasi.php?save=redudansi');
		}
		else{
			$sql="INSERT INTO lokasi(nama_lokasi) VALUES ('$lokasi')";
			$res=mysqli_query($connect,$sql);
			if ($res) 
			{
				header('location: tambah_lokasi.php?save=success');
			}
			else
			{
				header('location: tambah_lokasi.php?save=failed');
			}
		}
	}
 ?>