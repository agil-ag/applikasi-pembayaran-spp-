<?php include "header.php"; ?>

<?php 
$Edit = mysqli_query($koneksi, "SELECT * FROM spp WHERE id_spp='$_GET[id]'");
$e = mysqli_fetch_array($Edit);
?>
<div class="container-fluid">
<div style="margin-left:400px;">
<form method="post" action="">
	<h3 style="color:gold; text-align: center;">Silahkan Ubah Data SPP</h3>
	<input type="hidden" name="id_spp" value="<?php echo $e['id_spp']; ?>" />
	<table class="table table-bordered table-hover">
		<tr>
			<td width="600px">Tahun</td>
			<td width="600px">
				<select name="tahun" required>
						<option value="<?php echo $e['tahun']; ?>" selected><?php echo $e['tahun']; ?></option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>
				</select>	
			</td>
		</tr>		
		<tr>
			<td>Nominal</td>
			<td><input type="text" name="nominal" value="<?php echo $e['nominal']; ?>" /></td>
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
	$id_spp=$_POST['id_spp'];

	$tahun=$_POST['tahun'];
	$nominal=$_POST['nominal'];

	$query=$koneksi->query("UPDATE spp SET tahun='$tahun',nominal='$nominal' WHERE id_spp='$id_spp'");
	if($query>0){
	echo "<script>alert('Sukses Ubah Data SPP');</script>";
	echo "<script>location='tampil_spp.php?sukses';</script>";
}else{
	echo "<script>alert('Error');</script>";
	echo "<script>location='tampil_spp.php';</script>";
}
} ?>


<?php include "footer.php"; ?>