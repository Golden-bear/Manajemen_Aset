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
		$sql="DELETE FROM histori_reparasi WHERE id_detail='$id' AND batch='$batch' AND fpu='$fpu'";
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