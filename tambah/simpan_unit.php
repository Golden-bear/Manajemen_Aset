<?php 
  include '../koneksi.php';
  session_start();
  if (!isset($_SESSION['login'])) {
    header('location: ../login.php');
  }
  else
  {
    $unit=$_REQUEST['unit'];
    $salah=0;
    $sql1="SELECT * FROM unit";
    $res1=mysqli_query($connect, $sql1);
    while($hasil=mysqli_fetch_array($res1)){
      if ($unit==$hasil['nama_unit']) {  
        $salah++; 
      }
    }
    if($salah>0)
    {
      header('location: tambah_unit.php?save=redudansi');
    }
    else{
      $sql="INSERT INTO unit(nama_unit) VALUES ('$unit')";
      $res=mysqli_query($connect,$sql);
      if($res)
      {
        header('location: tambah_unit.php?save=success');
      }
      else
      {
        header('location: tambah_unit.php?save=failed');
      }
    }
  }
 ?>