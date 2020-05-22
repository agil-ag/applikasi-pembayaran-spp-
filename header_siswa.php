<?php
ob_start();
session_start();
if(!isset($_SESSION['username'])) header("location:login.php");
date_default_timezone_set('Asia/jakarta'); error_reporting(0);
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Pembayaran SPP</title>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="assets/logo_sekolah.jpeg"/>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="table.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

</head>
<body>
<div class="navbar" style="margin-bottom: -10px;">
  <a href="#" ><b> <h4 style="color:white"> Aplikasi Pembayaran SPP </h4></b></a>
  <a><h5 style="color:white; text-align: right;">Siswa : <?php echo $_SESSION['nama']; ?></h5></a>
  <a href="logout.php" class="right"> <h5 style="color:white">Logout</h5></a>
</div>
<hr>
<div style="padding-left: 10px; margin-top:2px;">
<a href="tampil_pembayaran_siswa.php"><button><b>Lihat Pembayaran SPP</b></Button></a>
<br>
</div>
<hr/> 