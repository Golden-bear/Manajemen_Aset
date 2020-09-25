<?php 
	session_start();
	include '../koneksi.php';
	if(!isset($_SESSION['login']))
	{
		header("location: ../login.php");
	}
	else
	{
		$id=$_REQUEST['id'];
		$unit=$_REQUEST['unit'];
		$jenis=$_REQUEST['jenis'];
		$inv=$_REQUEST['inv'];
		$lok=$_REQUEST['lok'];
		$license=$_REQUEST['license'];
		$app=$_REQUEST['app'];
		$user=$_REQUEST['user'];
		$esqiel="SELECT * FROM histori_user WHERE id_detail='$id'";
		$ress=mysqli_query($connect, $esqiel);
		while($data=mysqli_fetch_array($ress))
		{
			$file=glob('../uploads/'.$data['bukti']);
			foreach ($file as $files) 
			{
				if (is_file($files)) 
				{
					unlink($files);
				}
			}
		}


		$sql6="DELETE FROM histori_user WHERE id_detail='$id'";
		$res6=mysqli_query($connect, $sql6);
		if($res6)
		{
			$sql7="DELETE FROM histori_reparasi WHERE id_detail='$id'";
			$res7=mysqli_query($connect,$sql7);
			if($res7)
			{
				$sql="DELETE FROM detail WHERE id_detail='$id'";
				$res=mysqli_query($connect, $sql);
				if($res)
				{
					$sql2="DELETE FROM aplikasi WHERE id_app='$app'";
					$res2=mysqli_query($connect, $sql2);
					if($res2)
					{
						$sql3="DELETE FROM inventory WHERE id_inv='$inv'";
						$res3=mysqli_query($connect, $sql3);
						if($res3)
						{
							$sql4="DELETE FROM user WHERE id_user='$user'";
							$res4=mysqli_query($connect,$sql4);
							if ($res4) 
							{
								$sql5="DELETE FROM license WHERE id_license='$license'";
								$res5=mysqli_query($connect, $sql5);
								if($res5)
								{
									header("location: data_asset.php?deleted=success");
								}
								else
								{
									header("location: data_asset.php?deleted=failed");
								}
							}
							else
							{
								header("location: data_asset.php?deleted=failed");
							}
						}
						else
						{
							header("location: data_asset.php?deleted=failed");
						}
					}
					else
					{
						header("location: data_asset.php?deleted=failed");
					}
				}
				else
				{
					header("location: data_asset.php?deleted=failed");
				}
			}
			else{
				header("location: data_asset.php?deleted=failed");
			}
		}
		else{
			header("location: data_asset.php?deleted=failed");
		}
		
	}

 ?>