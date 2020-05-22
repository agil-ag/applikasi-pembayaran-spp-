<?php 
ob_start();
session_start();
if(isset($_SESSION['password'])) header("location:index.php");
error_reporting(0); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Aplikasi Pembayaran Spp</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<div style="background:none">
 <marquee direction="left">
 <h3><b>Selamat Datang Di Website Pembayaran SPP SMK Bimasakti Batanghari Nuban, Lampung Timur</b></h3></marquee>
</div>
	<center><h3 style="text-align: center;">Silahkan Login Menggunakan Username Dan Password Anda</h3></center> 
<hr/>
<div style="margin-left:355px;">
<div class="main">
<form action="" method="POST">
  <?php if (isset($_GET['error'])) { ?><h3 style="text-align: center;"><b style="color: red">Maaf Username / Password Anda Salah</b></h3><?php }else {  ?>
  	 <h3 style="color:gold; text-align: center;">LOGIN SISWA</h3>
  <?php } ?>      
      <label style="color:white" for="firstName" class="first-name">Username</label>
    <input style="color: white" type="text" name="username" class="form-control" placeholder="Masukan username Anda..." required maxlength="30" autocomplete="off">
    <label style="color: white" for="firstName" class="first-name">Password</label>
    <input style="color: white" type="password" name="password" class="form-control" placeholder="Masukan password Anda..." required maxlength="30" autocomplete="off"><br>
	<button type="submit" name="kirim" class="button" style="padding-top: 15px;">LOGIN</button>	
</form>

</div>
</div>

<?php require 'koneksi.php';
if(isset($_POST['kirim'])){
$username=addslashes(trim($_POST['username']));
$password=addslashes(trim($_POST['password']));
$sql=mysqli_query($koneksi,"SELECT * FROM siswa WHERE username='$username' AND password='$password'");
if(mysqli_num_rows($sql)>0){
$data=mysqli_fetch_array($sql);
$_SESSION['nisn']=$data['nisn'];
$_SESSION['username']=$data['username'];
$_SESSION['password']=$data['password'];
$_SESSION['nama']=$data['nama'];

echo "<script>alert('Sukses Login Siswa');</script>";
echo "<script>location='./siswa.php?sukses';</script>";
 }else{
	echo "<script>alert('Error Login');</script>";
	echo "<script>location='login_siswa.php?error';</script>";
 } }
?>
<div class="footer" style="margin-top: 350px;">
  <h5>&copy; Copyright <?= date('Y') ?>. SMK Bimasakti Batanghari Nuban, Lampung Timur </h5>
</div>
</body>
</html>