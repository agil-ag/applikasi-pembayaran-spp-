<?php include "header.php"; ?>

<?php 
$Edit = mysqli_query($koneksi, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN spp ON siswa.id_spp=spp.id_spp WHERE nisn='$_GET[id]'");
$e = mysqli_fetch_array($Edit);
?>
<div class="container-fluid">
<div style="margin-left:400px;">
<form method="post" action="">
	<h3 style="color:gold; text-align: center;">Silahkan Ubah Data Siswa</h3>
	<input type="hidden" name="idsiswa" value="<?php echo $e['nisn']; ?>" />
	<table class="table table-bordered table-hover">
		<tr>
			<td width="600px">NISN</td>
			<td width="600px"><input class="form-control" type="text" name="nisn" value="<?php echo $e['nisn']; ?>" readonly /></td> 
		</tr>
		<tr>
			<td>NIS</td>
			<td><input  class="form-control" type="text" name="nis" value="<?php echo $e['nis']; ?>"></td>
		</tr>
		<tr>
			<td>Nama Siswa</td>
			<td><input  class="form-control" type="text" name="nama" value="<?php echo $e['nama']; ?>"></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>
				<select name="id_kelas">
				<option value="<?=$e['id_kelas'];?>"><?=$e['nama_kelas'];?> - <?php echo $e['kompetensi_keahlian']; ?></option>
				<?php require 'koneksi.php';
				$ambil=$koneksi->query("SELECT * FROM kelas");?>
				<?php while($get=$ambil->fetch_assoc()){ ?>					
					<option value="<?php echo $get['id_kelas']; ?>"><?php echo $get['nama_kelas']; ?> - <?php echo $get['kompetensi_keahlian']; ?></option>
				<?php } ?>
			</select>	
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><input class="form-control" type="text" name="alamat" value="<?php echo $e['alamat']; ?>"  /></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td><input class="form-control" type="text" name="no_telp" value="<?php echo $e['no_telp']; ?>"  /></td>
		</tr>
		<tr>
			<td>Biaya SPP</td>
			<td>
				<select name="id_spp">
				<option value="<?=$e['id_spp'];?>"><?=$e['nominal'];?></option>
				<?php require 'koneksi.php';
				$ambil=$koneksi->query("SELECT * FROM spp");?>
				<?php while($get=$ambil->fetch_assoc()){ ?>					
					<option value="<?php echo $get['id_spp']; ?>"><?php echo $get['nominal']; ?></option>
				<?php } ?>
			</select>	
			</td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input class="form-control" type="text" name="username" value="<?php echo $e['username']; ?>"  /></td>	
		</tr>
		<tr>
			<td>Password</td>
			<td><input class="form-control" type="password" name="password" value="<?php echo $e['password']; ?>"  /></td>	
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
	$nisn=$_POST['nisn'];
	$nis=$_POST['nis'];
	$nama=$_POST['nama'];
	$id_kelas=$_POST['id_kelas'];
	$alamat=$_POST['alamat'];
	$no_telp=$_POST['no_telp'];
	$id_spp=$_POST['id_spp'];
	$username=$_POST['username'];
  	$password=$_POST['password'];

	$query=$koneksi->query("UPDATE siswa SET nisn='$nisn',nis='$nis',nama='$nama',id_kelas='$id_kelas',alamat='$alamat',no_telp='$no_telp',id_spp='$id_spp',username='$username',password='$password' WHERE nisn='$nisn'");
	if($query>0){
	echo "<script>alert('Sukses Ubah Data Siswa');</script>";
	echo "<script>location='tampil_siswa.php?sukses';</script>";
}else{
	echo "<script>alert('Error');</script>";
	echo "<script>location='tampil_siswa.php';</script>";
}
} ?>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Transaksi SPP</h4>
      </div>
      <div class="modal-body">
        <p>

	<form method="post" action="tambah_spp.php">

	<input type="hidden" name="idsiswa" value="<?php echo $e['idsiswa']; ?>" />

	<input type="hidden" name="kelas" value="<?php echo $e['kelas']; ?>" />
        	
        	<label>Biaya SPP:</label>
        	<input type="text" name="biaya" class="form-control" required>  <br>

        	<label>Jatuh Tempo Pertama:</label>
			<td><input type="text" name="jatuhtempo" value="2018-07-10" required/></td>


        </p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
        	</form>




<?php include "footer.php"; ?>