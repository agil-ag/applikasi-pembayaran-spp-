<?php 
session_start();
if(isset($_SESSION['password'])){
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cetak Riwayat Pembayaran</title>
	<style type="text/css">
		body{
			font-family: Arial;
		}

		@media print{
			.no-print{
				display: none;
			}
		}

		table{
			border-collapse: collapse;
		}
		
	</style>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

</head>
<div class="container">
<body>
<center>
<h4>SMK Bimasakti Batanghari Nuban <br>Riwayat Pembayaran Siswa</h4>
<br>
</center>
<table class= "table table-bordered table-hover" width="100%" border="1" cellspacing="0" cellpadding="4">
	<tr>
		<th style="text-align: center;">No.</th>
		<th style="text-align: center;">NISN</th>
		<th style="text-align: center;">Nama Siswa</th>
		<th style="text-align: center;">Nama Kelas</th>
		<th style="text-align: center;">Bulan Bayar</th>
		<th style="text-align: center;">Tahun Bayar</th>
		<th style="text-align: center;">Jumlah Bayar</th>
		<th style="text-align: center;">Tanggal Bayar</th>
		<th style="text-align: center;">Keterangan</th>
	</tr>
	<?php 
  if(isset($_GET['tgl_bayar'])){
		$cari = $_GET['tgl_bayar'];
		$key = $_GET['s_keyword'];
		$data = mysqli_query($koneksi, "SELECT * FROM pembayaran INNER JOIN siswa ON pembayaran.nisn=siswa.nisn INNER JOIN kelas ON kelas.id_kelas = siswa.id_kelas where pembayaran.tgl_bayar like '%".$cari."%' and(siswa.nama LIKE '%".$key."%' OR siswa.alamat like '%".$key."%' OR siswa.no_telp like '%".$key."%' OR siswa.nisn like '%".$key."%' OR pembayaran.jumlah_bayar like '%".$key."%') order by siswa.nisn desc");
	}
	else 
	{
		$data = mysqli_query($koneksi,"SELECT * FROM pembayaran INNER JOIN siswa ON pembayaran.nisn=siswa.nisn ORDER BY siswa.nisn ASC");		
	}

	$no = 1;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td align="center"><?php echo $no; ?></td>
		<td align="center"><?php echo $d['nisn']; ?></td>
		<td align="center"><?php echo $d['nama']; ?></td>
		<td align="center"><?php echo $d['nama_kelas']; ?>- <?php echo $d['kompetensi_keahlian']; ?></td>
		<td align="center"><?php echo $d['bulan_dibayar']; ?></td>
		<td align="center"><?php echo $d['tahun_dibayar']; ?></td>
		<td align="center"><?php echo $d['jumlah_bayar']; ?></td>
		<td align="center"><?php echo date("d M Y", strtotime($d['tgl_bayar'])); ?></td>
		<td align="center">LUNAS</td>
		
				<center>
		
			
		</center>
	</tr>
 <?php $no++;
 } ?>
</table>

<table width="100%">
	<tr>
		<td><a href="#" class="no-print" onclick="window.print();"> <button class="btn btn-primary">Cetak / Print </button></a> 
	
	</td>
		<td width="200px">
			<p>Lampung Timur, <?php echo date("d M Y", strtotime("now")); ?><br/>
			Bendahara,</p>
			<br/>
			<br/>
			<p>_____________________</p>
		</td>
	</tr>
</table>


</body>
</div>
</html>

<?php
}else{
	header('location:login.php');
}
?>