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
		$jenis=$_REQUEST['jenis'];
		$unit=$_REQUEST['unit'];
		$inv=$_REQUEST['inv'];
		$lok=$_REQUEST['lok'];
		$license=$_REQUEST['license'];
		$app=$_REQUEST['app'];
		$user=$_REQUEST['user'];
		$hostname=$_REQUEST['hostname'];
		$monitor=$_REQUEST['monitor'];
		$jenis_asset=$_REQUEST['jenis_asset'];
		$nama=$_REQUEST['nama'];
		$jabatan=$_REQUEST['jabatan'];
		$dept=$_REQUEST['dept'];
		$lokasi=$_REQUEST['lokasi'];
		$ad=$_REQUEST['ad'];
		$email=$_REQUEST['email'];
		$sn_email=$_REQUEST['sn_email'];
		$unit=$_REQUEST['unit'];
		$merk=$_REQUEST['merk'];
		$tipe=$_REQUEST['tipe'];
		$status_asset=$_REQUEST['status_asset'];
		$jumlah=$_REQUEST['jumlah'];
		$tanggal=$_REQUEST['tanggal'];
		$processor=$_REQUEST['processor'];
		$hardisk=$_REQUEST['hardisk'];
		$ram=$_REQUEST['ram'];
		$sn=$_REQUEST['sn'];
		$type_license=$_REQUEST['type_license'];
		$os=$_REQUEST['os'];
		$sn_os=$_REQUEST['sn_os'];
		$office=$_REQUEST['office'];
		$sn_office=$_REQUEST['sn_office'];
		$project=$_REQUEST['project'];
		$sn_project=$_REQUEST['sn_project'];
		$esqiel=$_REQUEST['esqiel'];
		$sn_sql=$_REQUEST['sn_sql'];
		$visio=$_REQUEST['visio'];
		$av=$_REQUEST['av'];
		$ps=$_REQUEST['ps'];
		$pdf=$_REQUEST['pdf'];
		$ax=$_REQUEST['ax'];
		$vdi=$_REQUEST['vdi'];
		$lain=$_REQUEST['lain'];
		$status=$_REQUEST['status'];
		$ket=$_REQUEST['keterangan'];

		$sql="UPDATE inventory SET merk='$merk', type='$tipe', processor='$processor', hardisk='$hardisk', ram='$ram', serial_number='$sn', tanggal='$tanggal', jumlah='$jumlah', status_asset='$status_asset' WHERE id_inv='$inv'";
		$res=mysqli_query($connect, $sql);
		if($res)
		{
			$sql2="UPDATE license SET type_license='$type_license', os='$os', sn_os='$sn_os', office='$office', sn_office='$sn_office', project='$project', sn_project='$sn_project', esqiel='$esqiel', sn_sql='$sn_sql' WHERE id_license='$license'";
			$res2=mysqli_query($connect, $sql2);
			if($res2)
			{
				$sql3="UPDATE user SET nama='$nama', jabatan='$jabatan', dept='$dept', login_ad='$ad', email='$email', license_email='$sn_email' WHERE id_user='$user'";
				$res3=mysqli_query($connect, $sql3);
				if($res3)
				{
					$sql9="UPDATE aplikasi SET visio='$visio', av='$av', photoshop='$ps', pdf='$pdf', ax='$ax', vdi='$vdi', lain='$lain' WHERE id_app='$app'";
					$res9=mysqli_query($connect, $sql9);
					if($res9)
					{
						$sql4="UPDATE detail SET hostname='$hostname', no_monitor='$monitor', id_jenis='$jenis_asset', id_unit='$unit', id_lokasi='$lokasi', status='$status', keterangan='$ket' WHERE id_detail='$id'";
						$res4=mysqli_query($connect,$sql4);
						if($res4)
						{
							header("location: data_asset.php?edit=success");
						}
						else
						{
							echo "A";
							//header("location: data_asset.php?edit=failed");
						}
					}
					else
					{
						echo "b";
						//header("location: data_asset.php?edit=failed");
					}
				}
				else
				{
					echo "c";
					//header("location: data_asset.php?edit=failed");
				}
			}
			else
			{
				echo "d";
				//header("location: data_asset.php?edit=failed");
			}	

		}
		else
		{
			echo "e";
			//header("location: data_asset,php?edit=failed");
		}
	}

 ?>