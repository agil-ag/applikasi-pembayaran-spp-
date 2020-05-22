<?php include "header.php"; ?>

<div style="margin-left:400px;">
<div class="container-fluid">
<form action="" method="POST">
	<h3 style="color:gold; text-align: center;">silahkan tambah data kelas</h3>

    <label style="color:white">Kelas </label>
    <select name="nama_kelas" required>
			<option value="" selected>- Pilih Kelas -</option>
			<option value="X">X</option>
			<option value="XI">XI</option>
			<option value="XII">XII</option>
	</select>

	<label style="color:white">Kompetensi Keahlian</label>
    <input style="color:white" name="kompetensi_keahlian" type="text" required>
   
<button type="submit" name="add" class="btn btn-success" style="width: 150px;">SIMPAN</button>
<button class="btn btn-default" onclick="location.href='tampil_kelas.php'" style="width: 150px;"> KEMBALI</button>
</form>
</div>
</div>

<?php if(isset($_POST['add']))
{
	$nama_kelas=$_POST['nama_kelas'];
	$kompetensi_keahlian=$_POST['kompetensi_keahlian'];

	$query=$koneksi->query("INSERT INTO kelas VALUES(DEFAULT,'$nama_kelas','$kompetensi_keahlian')");
	if($query>0){
	echo "<script>alert('Sukses Tambah Data Kelas');</script>";
	echo "<script>location='tampil_kelas.php?sukses';</script>";
}else{
	echo "<script>alert('Error');</script>";
	echo "<script>location='tampil_kelas.php';</script>";
}
} ?>

<?php include "footer.php"; ?>