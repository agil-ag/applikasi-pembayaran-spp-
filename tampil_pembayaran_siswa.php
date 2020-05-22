<?php include "header_siswa.php"; ?>

<div class="main">

<div class="row">
<h5>&emsp;DATA PEMBAYARAN SPP </h5>&emsp;&emsp;
</div>

<br>

<div class="table-responsive">
<table class="table table-bordered" cellspacing='0' style="width: 100%">
	<?php require 'koneksi.php';
		$nisn = $_SESSION['nisn'];
		$no=1; $ambil=$koneksi->query("SELECT * FROM pembayaran JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN spp ON pembayaran.id_spp = spp.id_spp JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas WHERE siswa.nisn = $nisn");?>
	<tr>
		<th width="10px">No.</th>
		<th style="text-align: center;">NISN</th>		
		<th style="text-align: center;">Nama Siswa</th>
		<th style="text-align: center;">Tanggal Bayar</th>
		<th style="text-align: center;">Bulan & Tahun Bayar</th>
		<th style="text-align: center;">Petugas</th>
		<th style="text-align: center;">Nominal</th>
	</tr>
  <?php while($get=$ambil->fetch_assoc()){ ?>  	
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $get['nisn']; ?></td>
		<td><?php echo $get['nama']; ?></td>		
		<td><?php echo date("d M Y", strtotime($get['tgl_bayar'])); ?></td>
		<td><?php echo $get['bulan_dibayar']; ?> <?php echo $get['tahun_dibayar']; ?></td>
		<td><?php echo $get['nama_petugas']; ?></td>
		<td><?php echo $get['nominal']; ?></td>		
		</td>	 
	</tr>
 <?php $no++; ?> 
 <?php } ?>
</table>

</div>
</div>
<?php include "footer.php"; ?>