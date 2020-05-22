<?php include "header.php"?>
<div class="main">
<div class="row">
<h5>&emsp;PETUGAS </h5>&emsp;&emsp;
    <button class="btn btn-success btn-sm" onclick="location.href='add_petugas.php'">Tambah Petugas</button>
</div>
<br>
	<div class="table-responsive">
	 <table  class="table table-bordered" cellspacing='0' style="width: 100%">
		<?php require 'koneksi.php';
			$no=1; $ambil=$koneksi->query("SELECT * FROM petugas");?>
		<tr>
			<th width="10px;">No.</th>					
			<th style="text-align: center;">Nama Petugas</th>
			<th style="text-align: center;">Username</th>
			<th style="text-align: center;">Status</th>
			<th colspan="2" style="text-align: center;">Aksi</th>
			
		</tr>
		<?php while($get=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?= $no;  ?></td>
			<td><?= $get['nama_petugas'];  ?></td>
			<td><?= $get['username'];  ?></td>
			<td><?= $get['level'];  ?></td>
			<td><a href="update_petugas.php?kode=<?= $get['id_petugas'];?>"><button class="btn btn-success btn-sm">Ubah</button></td>
			<td><a href="method/deletea.php?kode=<?= $get['id_petugas'];?>"><button class="btn btn-danger btn-sm">Hapus</button></td>
		</tr>
		<?php $no++; } ?>
	</table>
	</div>
</div>

<?php include "footer.php"?> 