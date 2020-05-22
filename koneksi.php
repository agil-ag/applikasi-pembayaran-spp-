<?php
//variabel koneksi
$koneksi = mysqli_connect("localhost","root","","sppsakti");

if(!$koneksi){
	echo "Koneksi database gagal....!!!";
}
?>