<?php include "header_petugas.php"; ?>

<div style="margin-left:400px;">
<div class="container-fluid">
<h3 style="color:white">&emsp;Silahkan Tambah Data Pembayaran</h3>
<form method="get" action="">
    <label style="color:white">Cari NISN </label>
	<input style="color:white" type="text" name="nisn" />
	<input style="color:white" type="submit" name="cari" value="Cari Siswa" />
</form>

<?php
if(isset($_GET['nisn']) && $_GET['nisn']!=''){
	$siswa = mysqli_query($koneksi, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN spp ON siswa.id_spp = spp.id_spp WHERE siswa.nisn='$_GET[nisn]'");
	$ds=mysqli_fetch_array($siswa);
	$nisn = $ds['nisn'];
	$id_spp = $ds['id_spp'];
	$nominal = $ds['nominal'];
	$nama = $ds['nama'];
	$kelas = $ds['nama_kelas'];
	$kompetensi = $ds['kompetensi_keahlian'];
} ?>

<form action="" method="POST">
	<label style="color:white">NISN</label>
    <input style="color:white" name="nisn" type="text" value="<?=$nisn;?>">

    <label style="color:white">Nama Siswa</label>
    <input style="color:white" name="nama" type="text" value="<?=$nama;?>" required>

    <label style="color:white">Kelas</label>
    <input style="color:white" name="nama" type="text" value="<?=$kelas;?> - <?=$kompetensi;?>" required>

    <label style="color:white">Jumlah Bayar SPP</label>
	<input style="color:white" name="id_spp" type="hidden" value="<?=$id_spp;?>">
    <input style="color:white" name="jumlah_bayar" type="text" value="<?=$nominal;?>" required>

    <label style="color:white">Bulan Dibayar</label>
    <select name="bulan_dibayar">
			<option value="" selected>- Pilih Bulan -</option>
			<option value="Januari">Januari</option>
			<option value="Februari">Februari</option>
			<option value="Maret">Maret</option>
			<option value="April">April</option>
			<option value="Mei">Mei</option>
			<option value="Juni">Juni</option>
			<option value="Juli">Juli</option>
			<option value="Agustus">Agustus</option>
			<option value="September">September</option>
			<option value="Oktober">Oktober</option>
			<option value="November">November</option>
			<option value="Desember">Desember</option>
	</select>

	<label style="color:white">Tahun Dibayar</label>
    <select name="tahun_dibayar">
			<option value="" selected>- Pilih Tahun -</option>
			<?php
                $thn_skrg = date('Y');
                for ($x = $thn_skrg; $x <= 2030; $x++) {
                ?>
                    <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
            <?php } ?>
	</select>

	<label style="color:white">Tanggal Bayar</label>
    <input style="color:white" name="tgl_bayar" type="date" value="<?php echo date('Y-m-d'); ?>" required>

	<br>
	<br>

<button type="submit" name="add" class="btn btn-success" style="width: 150px; margin-top: 20px;">SIMPAN</button>
<button class="btn btn-default" onclick="location.href='tampil_pembayaran_petugas.php'" style="width: 150px; margin-top: 20px;"> KEMBALI</button>
</form>
</div>
</div>



<?php if(isset($_POST['add']))
{
	$id_petugas=$_SESSION['id_petugas'];
	$nisn=$_POST['nisn'];
	$bulan_dibayar=$_POST['bulan_dibayar'];
	$tahun_dibayar=$_POST['tahun_dibayar'];
	$jumlah_bayar=$_POST['jumlah_bayar'];
	$tgl_bayar=$_POST['tgl_bayar'];
	$id_spp=$_POST['id_spp'];

	$query=$koneksi->query("INSERT INTO pembayaran VALUES(DEFAULT,'$id_petugas','$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar','$id_spp','$jumlah_bayar')");
	if($query>0){
	echo "<script>alert('Sukses Tambah Data Pembayaran');</script>";
	echo "<script>location='tampil_pembayaran_petugas.php?sukses';</script>";
}else{
	echo "<script>alert('Error');</script>";
	echo "<script>location='tampil_pembayaran_petugas.php';</script>";
}
} ?>

<?php include "footer.php"; ?>