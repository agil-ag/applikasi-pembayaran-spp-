<?php include "header.php"; ?>

<div style="margin-left:400px;">
<div class="container-fluid">
<form action="" method="POST">
	<h3 style="color:gold; text-align: center;">Silahkan Tambah Data Siswa</h3>

    <label style="color:white">NISN </label>
    <input style="color:white" name="nisn" type="text" required>

    <label style="color:white">NIS</label>
    <input style="color:white" name="nis" type="text" required>

    <label style="color:white">Nama Siswa</label>
    <input style="color:white" name="nama" type="text" required>

    <label style="color:white">Kelas</label>
    <select name="id_kelas">
			<option value="" selected>- Pilih Kelas -</option>
		<?php require 'koneksi.php';
		$ambil=$koneksi->query("SELECT * FROM kelas");?>
		<?php while($get=$ambil->fetch_assoc()){ ?>
			<option value="<?php echo $get['id_kelas']; ?>"><?php echo $get['nama_kelas']; ?> - <?php echo $get['kompetensi_keahlian']; ?></option>
		<?php } ?>
	</select>

	<label style="color:white">Alamat</label>
    <input style="color:white" name="alamat" type="text" required>

    <label style="color:white">Telepon</label>
    <input style="color:white" name="no_telp" type="text" required>

    <label style="color:white">Biaya SPP</label>
    <select name="id_spp">
			<option value="" selected>- Pilih SPP -</option>
		<?php require 'koneksi.php';
		$ambil=$koneksi->query("SELECT * FROM spp");?>
		<?php while($get=$ambil->fetch_assoc()){ ?>
			<option value="<?php echo $get['id_spp']; ?>"><?php echo $get['nominal']; ?></option>
		<?php } ?>
	</select>

	<label style="color:white">USERNAME</label>
    <input style="color:white" name="username" type="text" required>

    <label style="color:white">PASSWORD</label>
    <input style="color:white" name="password" type="password" required>    
   
<button type="submit" name="add" class="btn btn-success" style="width: 150px;">SIMPAN</button>
<button class="btn btn-default" onclick="location.href='tampil_siswa.php'" style="width: 150px;"> KEMBALI</button>
</form>
</div>
</div>

<?php if(isset($_POST['add']))
{
	$nisn=$_POST['nisn'];
	$nis=$_POST['nis'];
	$nama=$_POST['nama'];
	$id_kelas=$_POST['id_kelas'];
	$alamat=$_POST['alamat'];
	$no_telp=$_POST['no_telp'];
	$id_spp=$_POST['id_spp'];
	$username=$_POST['username'];
	$password=$_POST['password'];	

	$query=$koneksi->query("INSERT INTO siswa VALUES('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp','$username','$password')");
	if($query>0){
	echo "<script>alert('Sukses Tambah Data Siswa');</script>";
	echo "<script>location='tampil_siswa.php?sukses';</script>";
}else{
	echo "<script>alert('Error');</script>";
	echo "<script>location='tampil_siswa.php';</script>";
}
} ?>

<?php include "footer.php"; ?>