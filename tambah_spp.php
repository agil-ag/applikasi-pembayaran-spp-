<?php include "header.php"; ?>

<div style="margin-left:400px;">
<div class="container-fluid">
<form action="" method="POST">
	<h3 style="color:gold; text-align: center;">Silahkan Tambah Data SPP</h3>

    <label style="color:white">Tahun </label>
    <select name="tahun" required>
			<option value="" selected>- Pilih Tahun -</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option>
			<option value="2027">2027</option>
	</select>

	<label style="color:white">Nominal</label>
    <input style="color:white" name="nominal" type="number" required>
   
<button type="submit" name="add" class="btn btn-success" style="width: 150px;">SIMPAN</button>
<button class="btn btn-default" onclick="location.href='tampil_kelas.php'" style="width: 150px;"> KEMBALI</button>
</form>
</div>
</div>

<?php if(isset($_POST['add']))
{
	$tahun=$_POST['tahun'];
	$nominal=$_POST['nominal'];

	$query=$koneksi->query("INSERT INTO spp VALUES(DEFAULT,'$tahun','$nominal')");
	if($query>0){
	echo "<script>alert('Sukses Tambah Data SPP');</script>";
	echo "<script>location='tampil_spp.php?sukses';</script>";
}else{
	echo "<script>alert('Error');</script>";
	echo "<script>location='tampil_spp.php';</script>";
}
} ?>

<?php include "footer.php"; ?>