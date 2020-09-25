<?php
	session_start();
	if(!isset($_SESSION['user_type']))
	{
		header ("location:login.php");
	}
	else{
?>
<!DOCTYPE html>
<html>
<?php
include "../main/header.php";
?>

<head>
	<script type="text/javascript" src="chartjs/Chart.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
      </ol>
    </section>
	<?php 
	include 'koneksi.php';
	?>

	<div style="width: 600px; margin: 20px;">
		<canvas id="myChart"></canvas>
	</div>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["BPJS", "UMUM"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_teknik = mysqli_query($koneksi,"select * from pasien where jenis_pasien='BPJS'");
					echo mysqli_num_rows($jumlah_teknik);
					?>, 
					<?php 
					$jumlah_ekonomi = mysqli_query($koneksi,"select * from pasien where jenis_pasien='UMUM'");
					echo mysqli_num_rows($jumlah_ekonomi);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
	
	</div>

</body>
	<?php
		include "../main/footer.php";
	?>
</html>
 <?php }?>