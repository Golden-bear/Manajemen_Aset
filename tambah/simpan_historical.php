<?php 
	include '../koneksi.php';
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location: ../login.php');
	}
	else
	{
		if (isset($_REQUEST['simpan'])) {
			$hitung=0;
			$id=$_REQUEST['id'];
			$nama=$_REQUEST['nama'];
			$dept=$_REQUEST['dept'];	
			$penyerahan=$_REQUEST['penyerahan'];
			$pengembalian=$_REQUEST['pengembalian'];
			$pembelian=$_REQUEST['pembelian'];
			$batch=$_REQUEST['batch'];	
			$fpu=$_REQUEST['fpu'];
			$jenis=$_REQUEST['jenis'];
			$btb=$_REQUEST['btb'];
			$tanggal=$_REQUEST['tanggal'];
			$bukti=basename($_FILES["bukti"]["name"]);
			$target="../uploads/";
			$target_file = $target . basename($_FILES["bukti"]["name"]);
			move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file);

			if($nama==NULL AND $dept==NULL AND $bukti==NULL AND $penyerahan==NULL AND $pengembalian==NULL)
			{
				$hitung=$hitung;
			}
			else
			{
				$dolar="INSERT INTO histori_user VALUES ('$id', '$nama', '$dept', '$bukti', '$penyerahan', '$pengembalian')";
				$query=mysqli_query($connect, $dolar);
				if($query)
				{
					$hitung=$hitung+1;
				}
			}
			if($pembelian==NULL AND $batch==NULL AND $fpu==NULL AND $jenis==NULL AND $btb==NULL AND $tanggal==NULL)
			{
				$hitung=$hitung;
			}
			else
			{
				$dodol="INSERT INTO histori_reparasi VALUES ('$id', '$pembelian', '$batch', '$fpu', '$jenis', '$btb', '$tanggal')";
				$queue=mysqli_query($connect, $dodol);
				if($queue)
				{
					$hitung=$hitung+1;
				}
			}

			if($hitung>=1)
			{
				header("location: ../data/histori_asset.php?id=$id&save=success");
			}
			else
			{
				header("location: ../data/histori_asset.php?id=$id&save=failed");
			}
		}
	}

 ?>