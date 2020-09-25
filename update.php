<?php
session_start();
if(!isset($_SESSION['login']))
	{
		header ("location:login.php");
	}
else
	{
		$connect = mysqli_connect ('localhost','root','','sierad');
		$username = $_POST['username'];
		$password = $_POST['password'];

		 $query = "UPDATE admin SET username ='$username', password ='$password'";
		   $sql = mysqli_query($connect, $query);
			if($sql){
			  	header ("location:index.php");
			}else{
			  echo "gagal";
			}
	}
?>