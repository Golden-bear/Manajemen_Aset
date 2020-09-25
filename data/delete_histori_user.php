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
		$esqiel="SELECT bukti FROM histori_user WHERE id_detail='$id' AND nama='$nama'";
		$ress=mysqli_query($connect, $esqiel);
		$data=mysqli_fetch_array($ress);
		$file=glob('../uploads/'.$data['bukti']);
		foreach ($file as $files) 
		{
			if (is_file($files)) 
			{
				unlink($files);
			}
		}


		$sql="DELETE FROM histori_user WHERE id_detail='$id' AND nama='$nama'";
		$res=mysqli_query($connect, $sql);
		if($res)
		{
			header("location: histori_asset.php?id=$id&delete=success");
		}
		else{
			header("location: histori_asset.php?id=$id&delete=failed");
		}
	}
?>