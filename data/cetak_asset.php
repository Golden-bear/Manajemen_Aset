<?php  
	$date=date('d-m-Y');
	header("content-type: application/vnd-ms-excel");
	header("content-disposition: attachment; filename=".$date."-data-asset.xls");
?>
<!doctype html>
<html>
	<head>
		<title>Data Stok Obat</title>
	</head>
	<body>
			<br>
            <div class="header" align="center">
                <h2>DATA ASSET PT. SIERAD PRODUCE</h2>
            </div>
			<div  align="right">
                <h5>Tangerang,  <?php echo date('d F Y');?></h5>
            </div>
			<br>
		<table class="table" border="1px">
			<b>
			<tr class="head" align="center">
				<th style="text-align:center;">Hostname & No. Asset</th>
                  <th style="text-align:center;">No. Monitor</th>
                  <th style="text-align:center;">Jenis Asset</th>
                  <th style="text-align:center;">Nama</th>
                  <th style="text-align:center;">Jabatan</th>
                  <th style="text-align:center;">Dept</th>
                  <th style="text-align:center;">Lokasi</th>
                  <th style="text-align:center;">Login AD</th>
                  <th style="text-align:center;">Email</th>
                  <th style="text-align:center;">License Email</th>
                  <th style="text-align:center;">Unit</th>
                  <th style="text-align:center;">Merk</th>
                  <th style="text-align:center;">Type</th>
                  <th style="text-align:center;">Status</th>
                  <th style="text-align:center;">Jumlah</th>
                  <th style="text-align:center;">Tahun Penyerahan</th>
                  <th style="text-align:center;">Processor</th>
                  <th style="text-align:center;">Hardisk</th>
                  <th style="text-align:center;">RAM</th>
                  <th style="text-align:center;">Serial No.</th>
                  <th style="text-align:center;">Type License</th>
                  <th style="text-align:center;">Operating System</th>
                  <th style="text-align:center;">Serial Number (OS)</th>
                  <th style="text-align:center;">Office</th>
                  <th style="text-align:center;">Serial Number (Office)</th>
                  <th style="text-align:center;">Project</th>
                  <th style="text-align:center;">Serial Number (Project)</th>
                  <th style="text-align:center;">SQL</th>
                  <th style="text-align:center;">Serial Number (SQL)</th>
                  <th style="text-align:center;">Visio</th>
                  <th style="text-align:center;">AV</th>
                  <th style="text-align:center;">Photoshop</th>
                  <th style="text-align:center;">PDF Reader</th>
                  <th style="text-align:center;">Dynamix AX</th>
                  <th style="text-align:center;">VDI / CITRIX</th>
                  <th style="text-align:center;">Aplikasi Lain</th>
                  <th style="text-align:center;">Status</th>
                  <th style="text-align:center;">Keterangan</th>

			</tr>
			</b>
			<?php
			  include "../koneksi.php";
			  $query = "SELECT detail.id_detail, detail.id_jenis, detail.id_unit, detail.id_inv, detail.id_lokasi, detail.id_license, detail.id_app, detail.id_user, detail.hostname, detail.no_monitor, jenis_asset.jenis, user.nama, user.jabatan, user.dept, lokasi.nama_lokasi, user.login_ad, user.email, user.license_email, unit.nama_unit, inventory.merk, inventory.type, inventory.status_asset, inventory.jumlah, inventory.tanggal, inventory.processor, inventory.hardisk, inventory.ram, inventory.serial_number, license.type_license, license.os, license.sn_os, license.office, license.sn_office, license.project, license.sn_project, license.esqiel, license.sn_sql, aplikasi.visio, aplikasi.av, aplikasi.photoshop, aplikasi.pdf, aplikasi.ax, aplikasi.vdi, aplikasi.lain, detail.status, detail.keterangan FROM detail, jenis_asset, unit, license, inventory, lokasi, aplikasi, user WHERE detail.id_jenis=jenis_asset.id_jenis AND detail.id_inv=inventory.id_inv AND detail.id_lokasi=lokasi.id_lokasi AND detail.id_app=aplikasi.id_app AND detail.id_user=user.id_user AND detail.id_unit=unit.id_unit AND detail.id_license=license.id_license";
			  $sql = mysqli_query($connect, $query);
			  while($data = mysqli_fetch_array($sql)){
				echo "<tr>";
				echo "<td style='text-align:center;'>".$data['hostname']."</td>";
                echo "<td style='text-align:center;'>".$data['no_monitor']."</td>";
                echo "<td style='text-align:center;'>".$data['jenis']."</td>";
                echo "<td style='text-align:center;'>".$data['nama']."</td>";
                echo "<td style='text-align:center;'>".$data['jabatan']."</td>";
                echo "<td style='text-align:center;'>".$data['dept']."</td>";
                echo "<td style='text-align:center;'>".$data['nama_lokasi']."</td>";
                echo "<td style='text-align:center;'>".$data['login_ad']."</td>";
                echo "<td style='text-align:center;'>".$data['email']."</td>";
                echo "<td style='text-align:center;'>".$data['license_email']."</td>";
                echo "<td style='text-align:center;'>".$data['nama_unit']."</td>";
                echo "<td style='text-align:center;'>".$data['merk']."</td>";
                echo "<td style='text-align:center;'>".$data['type']."</td>";
                echo "<td style='text-align:center;'>".$data['status_asset']."</td>";
                echo "<td style='text-align:center;'>".$data['jumlah']."</td>";
                echo "<td style='text=align:center;'>".$data['tanggal'];
                echo "<td style='text-align:center;'>".$data['processor']."</td>";
                echo "<td style='text-align:center;'>".$data['hardisk']."</td>";
                echo "<td style='text-align:center;'>".$data['ram']."</td>";
                echo "<td style='text-align:center;'>".$data['serial_number']."</td>";
                echo "<td style='text-align:center;'>".$data['type_license']."</td>";
                echo "<td style='text-align:center;'>".$data['os']."</td>";
                echo "<td style='text-align:center;'>".$data['sn_os']."</td>";
                echo "<td style='text-align:center;'>".$data['office']."</td>";
                echo "<td style='text-align:center;'>".$data['sn_office']."</td>";
                echo "<td style='text-align:center;'>".$data['project']."</td>";
                echo "<td style='text-align:center;'>".$data['sn_project']."</td>";
                echo "<td style='text-align:center;'>".$data['esqiel']."</td>";
                echo "<td style='text-align:center;'>".$data['sn_sql']."</td>";
                echo "<td style='text-align:center;'>".$data['visio']."</td>";
                echo "<td style='text-align:center;'>".$data['av']."</td>";
                echo "<td style='text-align:center;'>".$data['photoshop']."</td>";
                echo "<td style='text-align:center;'>".$data['pdf']."</td>";
                echo "<td style='text-align:center;'>".$data['ax']."</td>";
                echo "<td style='text-align:center;'>".$data['vdi']."</td>";
                echo "<td style='text-align:center;'>".$data['lain']."</td>";
                echo "<td style='text-align:center;'>".$data['status']."</td>";
                echo "<td style='text-align:center;'>".$data['keterangan']."</td>";
				echo "</tr>";
			  }
			?>
		</table>
	</body>
</html>