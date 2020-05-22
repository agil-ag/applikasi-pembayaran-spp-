<?php 
session_start();
if(isset($_SESSION['password'])){
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Pembayaran</title>
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
</head>
<body>
<h3>MTS AL-FATAH NATAR <br/>LAPORAN DATA PEMBAYARAN SPP SISWA</h3>
<hr/>
<p>Tanggal : <?php echo $_GET['tgl1']." - ".$_GET['tgl2']; ?></p>
<table width="100%" border="1" cellspacing="0" cellpadding="4">
	<tr>
		<th style="text-align: center;">No.</th>
		<th style="text-align: center;">NIS</th>
		<th style="text-align: center;">Nama Siswa</th>
		<th style="text-align: center;">Kelas</th>
		<th style="text-align: center;">No. Bayar</th>
		<th style="text-align: center;">Pembayaran Bulan</th>
		<th style="text-align: center;">Jumlah</th>
		<th style="text-align: center;">Keterangan</th>
	</tr>
	<?php
	$sqlBayar = mysqli_query($konek, "SELECT spp.*,siswa.nis,siswa.namasiswa,siswa.kelas
									FROM spp INNER JOIN siswa ON spp.idsiswa=siswa.idsiswa
									WHERE tglbayar BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]'
									ORDER BY nobayar ASC");
	$no=1;
	$total=0;
	while($d=mysqli_fetch_array($sqlBayar)){
		echo "<tr>
		<td align='center'>$no</td>
		<td align='center'>$d[nis]</td>
		<td>$d[namasiswa]</td>
		<td align='center'>$d[kelas]</td>
		<td align='center'>$d[nobayar]</td>
		<td>$d[bulan]</td>
		<td align='right'>Rp.$d[jumlah]</td>
		<td>$d[ket]</td>
		</tr>";
		$no++;
		$total+= $d['jumlah'];
	} 
	?>
	<tr>
		<td colspan="6" align="right">Total</td>
		
		<td align="right"><b>Rp.<?= number_format($total);?></b></td>
	</tr>
</table>

<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<p>Natar, <?php echo date('d/m/Y'); ?><br/>
			Bendahara,</p>
			<br/>
			<br/>
			<p>______________</p>
		</td>
	</tr>
</table>

<a href="#" class="no-print" onclick="window.print();">Cetak / Print</a> 
<a href="excel_laporan_pembayaran.php?tgl1=<?php echo $_GET['tgl1']; ?>&tgl2=<?php echo $_GET['tgl2']; ?>"
	class="no-print" target="_blank">Export ke Excel</a> 
</body>
</html>

<?php
}else{
	header('location:login.php');
}
?>