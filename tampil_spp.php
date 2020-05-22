<?php include "header.php"; ?>

<div class="main">

<div class="row">
<h5>&emsp;DATA SPP </h5>&emsp;&emsp;
    <button class="btn btn-success btn-sm" onclick="location.href='tambah_spp.php'">Tambah Data SPP</button>
</div>

<br>

<div class="table-responsive">
<table class="table table-bordered" cellspacing='0' style="width: 100%">
	<?php require 'koneksi.php';
		$no=1; $ambil=$koneksi->query("SELECT * FROM spp");?>
	<tr>
		<th width="10px">No.</th>
		<th style="text-align: center;">Tahun</th>
		<th style="text-align: center;">Nominal</th>
		<th colspan="2" style="text-align: center;">Aksi</th>
	</tr>
  <?php while($get=$ambil->fetch_assoc()){ ?>  	
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $get['tahun']; ?></td>
		<td><?php echo $get['nominal']; ?></td>
		<td><a href="edit_spp.php?id=<?php echo $get['id_spp']; ?>"><button class="btn btn-success btn-sm">Ubah</button></a></td>
		<td><a href="method/delete_spp.php?kode=<?= $get['id_spp'];?>"><button class="btn btn-danger btn-sm">Hapus</button>
		</td>	 
	</tr>
 <?php $no++; ?> 
 <?php } ?>
</table>

</div>
</div>
<?php include "footer.php"; ?>