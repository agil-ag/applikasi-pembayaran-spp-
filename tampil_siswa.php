<?php include "header.php"; ?>

<div class="main">

<div class="row">
<h5>&emsp;DATA SISWA </h5>&emsp;&emsp;
    <button class="btn btn-success btn-sm" onclick="location.href='tambah_siswa.php'">Tambah Data Siswa</button>
</div>

<br>

<div class="table-responsive">
<table class="table table-bordered" cellspacing='0' style="width: 100%">
	<?php require 'koneksi.php';
		$no=1; $ambil=$koneksi->query("SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas");?>
	<tr>
		<th width="10px">No.</th>
		<th style="text-align: center;">NISN</th>
		<th style="text-align: center;">NIS</th>
		<th style="text-align: center;">Nama Siswa</th>
		<th style="text-align: center;">Kelas</th>
		<th style="text-align: center;">Alamat</th>
		<th style="text-align: center;">Telepon</th>
		<th colspan="2" style="text-align: center;">Aksi</th>
	</tr>
  <?php while($get=$ambil->fetch_assoc()){ ?>  	
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $get['nisn']; ?></td>
		<td><?php echo $get['nis']; ?></td>
		<td><?php echo $get['nama']; ?></td>
		<td><?php echo $get['nama_kelas']; ?> - <?php echo $get['kompetensi_keahlian']; ?></td>
		<td><?php echo $get['alamat']; ?></td>
		<td><?php echo $get['no_telp']; ?></td>
		<td><a href="edit_siswa.php?id=<?php echo $get['nisn']; ?>"><button class="btn btn-success btn-sm">Ubah Data & SPP</button></a></td>
		<td><a href="method/delete_siswa.php?kode=<?= $get['nisn'];?>"><button class="btn btn-danger btn-sm">Hapus</button>
		</td>	 
	</tr>
 <?php $no++; ?> 
 <?php } ?>
</table>

</div>
</div>
<?php include "footer.php"; ?>