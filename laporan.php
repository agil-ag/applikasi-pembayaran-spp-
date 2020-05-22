<?php include "header.php"; ?>
<div class="main">		
		<h3> Riwayat Pembayaran</h3>
		<form action="laporan_riwayat.php" method="get" target="_blank"> 
        <div class="row mb-3">
		    <div class="col-sm-12"><h4 style="color:white" >Cari Riwayat Pembayaran SPP Siswa</h4></div>
		    <br> <br>
		    <div class="col-sm-4">
		        <div class="form-group">
		           <input style="color:white" type="date" name="tgl_bayar" id="tgl_bayar" class="form-control">
		        </div>
		    </div>
		    <div style="color:white" class="col-sm-4">
		        <div  class="form-group">
		            <input type="text" placeholder="Kata Kunci" name="s_keyword" id="s_keyword" class="form-control" value="<?php echo $s_keyword; ?>">
		        </div>
		    </div>
		    <div class="col-sm-4" >
		        <button id="search" name="search" class="btn btn-success">Cetak Data</button>
		    </div>

		    <div style="color:white"  class="col-sm-12"><span>Kata Kunci : NISN, Nama Siswa, Alamat, Telepon, Jumlah Bayar</span></div> 
		</div>
	</form>	
</ul>
</div>
<?php include "footer.php"; ?>