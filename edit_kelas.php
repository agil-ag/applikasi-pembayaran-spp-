<?php include "header.php"; ?>

<?php 
$Edit = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$_GET[id]'");
$e = mysqli_fetch_array($Edit);
?>
<div class="container-fluid">
<div style="margin-left:400px;">
<form method="post" action="">
	<h3 style="color:gold; text-align: center;">Silahkan Ubah Data Kelas</h3>
	<input type="hidden" name="id_kelas" value="<?php echo $e['id_kelas']; ?>" />
	<table class="table table-bordered table-hover">
		<tr>
			<td width="600px">Kelas</td>
			<td width="600px">
				<select name="nama_kelas" required>
						<option value="<?php echo $e['nama_kelas']; ?>" selected><?php echo $e['nama_kelas']; ?></option>
						<option value="X">X</option>
						<option value="XI">XI</option>
						<option value="XII">XII</option>
				</select>	
			</td>
		</tr>		
		<tr>
			<td>Kompetensi Keahlian</td>
			<td style="color:white"><input type="text" name="kompetensi_keahlian" value="<?php echo $e['kompetensi_keahlian']; ?>" /></td>
		</tr>

		<tr>
			<td colspan="2"><button type="submit" name="edit" class="btn btn-success" style="width: 150px;">UBAH</button></td>
		</tr>
	</table>
</form>
</div>

</div>

<?php if(isset($_POST['edit']))
{
	$id_kelas=$_POST['id_kelas'];

	$nama_kelas=$_POST['nama_kelas'];
	$kompetensi_keahlian=$_POST['kompetensi_keahlian'];

	$query=$koneksi->query("UPDATE kelas SET nama_kelas='$nama_kelas',kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='$id_kelas'");
	if($query>0){
	echo "<script>alert('Sukses Ubah Data Kelas');</script>";
	echo "<script>location='tampil_kelas.php?sukses';</script>";
}else{
	echo "<script>alert('Error');</script>";
	echo "<script>location='tampil_kelas.php';</script>";
}
} ?>


<?php include "footer.php"; ?>