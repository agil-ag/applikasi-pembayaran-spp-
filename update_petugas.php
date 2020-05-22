<?php include "header.php";
include 'koneksi.php';
$data=$_GET['kode'];$query=$koneksi->query("SELECT * FROM petugas WHERE id_petugas=$data");
$dataa=$query->fetch_assoc();?>
<div style="margin-left:400px;">
  <div class="container-fluid">
<form action="" method="POST">
  <h3 style="color:gold; text-align: center;">Silahkan Ubah Data Petugas</h3>

    <label style="color:white">NAMA LENGKAP</label>
    <input style="color:white" type="text" name="nama_petugas" value="<?= $dataa['nama_petugas']?>" required>

    <label style="color:white">USERNAME</label>
    <input style="color:white" type="text" name="username"  value="<?= $dataa['username']?>" required>

     <label style="color:white">PASSWORD</label>
    <input style="color:white" name="password" type="password" value="<?= $dataa['password']?>" required>
    
    <input style="color:white" type="hidden" id="lastName" name="id_petugas" value="<?= $dataa['id_petugas']  ?>">

    <button type="submit" name="edit" class="btn btn-success" style="width: 150px;">UBAH</button>    

</form>
</div>
</div>
<?php if(isset($_POST['edit']))
{
	$username=$_POST['username'];
	$nama_petugas=$_POST['nama_petugas'];
  $password=$_POST['password'];
	$id_petugas=$_POST['id_petugas'];

	$query=$koneksi->query("UPDATE petugas SET username='$username',nama_petugas='$nama_petugas',password='$password' WHERE id_petugas='$id_petugas'");
	if($query>0){
	echo "<script>alert('Sukses Ubah Data Petugas');</script>";
	echo "<script>location='tampil_petugas.php?sukses';</script>";
}else{
	echo "<script>alert('Error');</script>";
	echo "<script>location='tampil_petugas.php';</script>";
}
} ?>
<?php include "footer.php"?>