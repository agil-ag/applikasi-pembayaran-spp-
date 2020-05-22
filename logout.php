<?php
error_reporting(0);
session_start();

$_SESSION['idadmin'];
$_SESSION['username'];
$_SESSION['password'];
$_SESSION['namalengkap'];
$_SESSION['alamat'];
$_SESSION['foto'];
$_SESSION['level'];
$_SESSION['nis'];



unset($_SESSION['idadmin']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['namalengkap']);
unset($_SESSION['alamat']);
unset($_SESSION['foto']);
unset($_SESSION['nis']);
unset($_SESSION['level']);

session_unset();
session_destroy();

echo "<script>alert('logout berhasil');</script>";
echo "<script>location='login.php';</script>";

?>
