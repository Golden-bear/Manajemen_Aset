<?php 
	include '../koneksi.php';
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location: ../login.php');
	}
	else
	{
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
		$esqiel=$_REQUEST['sql'];
		$sn_sql=$_REQUEST['sn_sql'];
		$visio=$_REQUEST['visio'];
		$av=$_REQUEST['av'];
		$ps=$_REQUEST['ps'];
		$pdf=$_REQUEST['pdf'];
		$ax=$_REQUEST['ax'];
		$vdi=$_REQUEST['vdi'];
		$lain=$_REQUEST['app_lain'];
		$status=$_REQUEST['status'];
		$ket=$_REQUEST['ket'];

		$sql="INSERT INTO inventory(merk, type, processor, hardisk, ram, serial_number, tanggal, jumlah, status_asset) VALUES('$merk', '$tipe', '$processor', '$hardisk', '$ram', '$sn', '$tanggal', '$jumlah', '$status_asset')";
		$res=mysqli_query($connect, $sql);
		if($res)
		{
			$sql1="INSERT INTO license(type_license, os, sn_os, office, sn_office, project, sn_project, esqiel, sn_sql) VALUES('$type_license', '$os', '$sn_os', '$office', '$sn_office','$project', '$sn_project', '$esqiel', '$sn_sql')";
			$res1=mysqli_query($connect, $sql1);
			if($res1)
			{
				$sql5="INSERT INTO aplikasi(visio, av, photoshop, pdf, ax, vdi, lain) VALUES('$visio', '$av', '$ps', '$pdf', '$ax', '$vdi', '$lain')";
				$res5=mysqli_query($connect, $sql5);
				if($res5)
				{
					$sql2="INSERT INTO user(nama, jabatan, dept, login_ad, email, license_email) VALUES('$nama', '$jabatan', '$dept', '$ad', '$email', '$sn_email')";
					$res2=mysqli_query($connect, $sql2);
					if($res2)
					{
						$sql3="SELECT inventory.id_inv, license.id_license, aplikasi.id_app, user.id_user FROM inventory, license, aplikasi, user WHERE inventory.merk='$merk' AND inventory.type='$tipe' AND inventory.processor='$processor' AND inventory.hardisk='$hardisk' AND inventory.ram='$ram' AND inventory.serial_number='$sn' AND inventory.tanggal='$tanggal' AND inventory.jumlah='$jumlah' AND inventory.status_asset='$status_asset' AND license.type_license='$type_license' AND license.os='$os' AND license.sn_os='$sn_os' AND license.office='$office' AND license.sn_office='$sn_office' AND license.project='$project' AND license.sn_project='$sn_project' AND license.esqiel='$esqiel' AND license.sn_sql='$sn_sql' AND aplikasi.visio='$visio' AND aplikasi.av='$av' AND aplikasi.photoshop='$ps' AND aplikasi.pdf='$pdf' AND aplikasi.ax='$ax' AND aplikasi.vdi='$vdi' AND aplikasi.lain='$lain' AND user.nama='$nama' AND user.jabatan='$jabatan' AND user.dept='$dept' AND user.login_ad='$ad' AND user.email='$email' AND user.license_email='$sn_email'";
						$res3=mysqli_query($connect, $sql3);
						$data=mysqli_fetch_array($res3);
						if($data)
						{
							$sql4="INSERT INTO detail(hostname, no_monitor, id_jenis, id_unit, id_inv, id_lokasi, id_license, id_app, id_user, status, keterangan) VALUES('$hostname', '$monitor', '$jenis_asset', '$unit', '$data[id_inv]', '$lokasi', '$data[id_license]', '$data[id_app]', '$data[id_user]', '$status', '$ket')";
							$hasil=mysqli_query($connect, $sql4);
							if($hasil)
							{
								header("location: input_asset.php?save=success");
							}
							else{
								header("location: input_asset.php?save=failed");
							}
						}
						else{
							header("location: input_asset.php?save=failed");
						}
					}
					else{
						header("location: input_asset.php?save=failed");
					}
				}
				else{
					header("location: input_asset.php?save=failed");
				}
			}
			else{
				header("location: input_asset.php?save=failed");
			}
		}
		else{
			header("location: input_asset.php?save=failed");

		}

	}
 ?>