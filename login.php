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
<link rel="stylesheet" href="style-social-media-button.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
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
  <?php if (isset($_GET['error'])) { ?><h3 style="text-align: center;"><b style="color: red">amet Username panjenengan / Password panjenengan Salah jajal di iling-iling maneh ngeh</b></h3><?php }else {  ?>

  	 <h3 style="color:gold; text-align: center;">LOGIN ADMINISTRATOR & PETUGAS</h3>
  <?php } ?>      
    <label style="color:white" for="firstName" class="first-name">Username</label>
    <input style="color: white" type="text" name="username" class="form-control" placeholder="Masukan username Anda..." required maxlength="30" autocomplete="off">
    <label style="color: white" for="firstName" class="first-name">Password</label>
    <input style="color: white" type="password" name="password" class="form-control" placeholder="Masukan password Anda..." required maxlength="30" autocomplete="off"><br>
	<button type="submit" name="kirim" class="button" style="text-align:center">LOGIN</button>	
</form>

<form>
	<button type="button" class="button" onclick="location.href='login_siswa.php'" style="padding-top: 15px; width: 567px; font-size: 12px;">Login Siswa</button>
</form>
</div>
</div>

<!-- css social media -->
<style type="text/css">
	body{
  padding: 0;
  margin: 0;
}

.btn{
  display: inline-block;
  width: 50px;
  height: 50px;
  background: #f1f1f1;
  margin: 10px;
  border-radius: 30%;
  box-shadow: 0 5px 15px -5px #00000070;
  color: #3498db;
  overflow: hidden;
  position: relative;
}
.btn i{
  line-height: 50px;
  font-size: 20px;
  transition: 0.2s linear;
}
.btn:hover i{
  transform: scale(1.3);
  color: #f1f1f1;
}
.btn::before{
  content: "";
  position: absolute;
  width: 120%;
  height: 120%;
  background: #3498db;
  transform: rotate(45deg);
  left: -110%;
  top: 90%;
}
.btn:hover::before{
  animation: aaa 0.7s 1;
  top: -10%;
  left: -10%;
}
@keyframes aaa {
  0%{
    left: -110%;
    top: 90%;
  }50%{
    left: 10%;
    top: -30%;
  }100%{
    top: -10%;
    left: -10%;
  }
}
</style>
<!-- end css social media -->

<!-- social media -->
						<div class="panel-footer">
							<h3  style="color:gold; text-align: center;">MY SOCIAL MEDIA</h3>
							<center>
								<a class="btn" href="https://www.instagram.com/agilart1/"><i class="fab fa-instagram"></i></a>

								<a class="btn" href="https://web.facebook.com/setiaagilpamungkas.pamungkas"><i class="fab fa-facebook-f"></i></a>

								<a class="btn" href="https://www.youtube.com/channel/UCptpqR7F2YSjcmP8pd2b6nw?view_as=subscriber"><i class="fab fa-youtube"></i></a>

                <a class="btn" href="wa_tampil.php"><i class="fab fa-whatsapp"></i></a>
								


							</center>
						</div>
						<!-- end social media -->
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php require 'koneksi.php';
if(isset($_POST['kirim'])){
$username=addslashes(trim($_POST['username']));
$password=addslashes(trim($_POST['password']));
$sql=mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username' AND password='$password'");
if(mysqli_num_rows($sql)>0){
$data=mysqli_fetch_array($sql);
$_SESSION['id_petugas']=$data['id_petugas'];
$_SESSION['username']=$data['username'];
$_SESSION['password']=$data['password'];
$_SESSION['nama_petugas']=$data['nama_petugas'];
$_SESSION['level']=$data['level'];

if($_SESSION['level']=="admin"){
	echo "<script>alert('Sukses Login Administrator');</script>";
	echo "<script>location='./index.php?sukses';</script>";
}
if($_SESSION['level']=="petugas"){
	echo "<script>alert('Sukses Login Petugas');</script>";
	echo "<script>location='./petugas.php?sukses';</script>";
} }else{
	echo "<script>alert('Error Login');</script>";
	echo "<script>location='login.php?error';</script>";
 } }
?>
<div class="footer" style="margin-top: 20px;">
  <h5>&copy; Copyright <?= date('Y') ?>. SMK Bimasakti Batanghari Nuban, Lampung Timur </h5>
</div>

</body>
</html>