<?php include "header.php"; ?>

<div style="margin-left:400px;">
  <div class="container-fluid">
<form action="" method="POST">
  <h3 style="color:gold; text-align: center;">Silahkan Tambah Data Petugas</h3>

    <label style="color:white">Nama Petugas</label>
    <input style="color:white" name="nama_petugas" type="text" required>

    <label style="color:white">Username</label>
    <input style="color:white" name="username" type="text" required>

    <label style="color:white">Password</label>
    <input style="color:white" name="password" type="password" required>

    <label style="color:white">Status</label>
    <select style="color:white" name="level" id="level" class="form-control">
        <option value="">-- Pilih Status --</option> 
        <option value="admin" <?php if ($level=="admin"){ echo "selected"; } ?>>Admin</option>
        <option value="petugas" <?php if ($level=="petugas"){ echo "selected"; } ?>>Petugas</option>
    </select>

    <br>
    <br>
   
<button type="submit" name="add" class="btn btn-success" style="width: 150px;"> SIMPAN</button>
<button class="btn btn-default" onclick="location.href='tampil_petugas.php'" style="width: 150px;"> KEMBALI</button>
</form>
</div>
</div>
<?php if(isset($_POST['add']))
{
	$username=$_POST['username'];
	$nama_petugas=$_POST['nama_petugas'];
	$password=$_POST['password'];
	$level=$_POST['level'];

	$query=$koneksi->query("INSERT INTO petugas VALUES(0,'$username','$password','$nama_petugas','$level')");
	if($query>0){
	echo "<script>alert('Sukses Tambah Data Petugas');</script>";
	echo "<script>location='tampil_petugas.php?sukses';</script>";
}else{
	echo "<script>alert('Error');</script>";
	echo "<script>location='tampil_petugas.php';</script>";
}
} ?>
<?php include "footer.php"?>