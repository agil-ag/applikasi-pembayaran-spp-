<?php include "header.php"; ?>
<div class="main">
<h3 style="margin-top: -10px;">
	<a href="laporan.php">Riwayat</a> /
	<a href="laporan_siswa.php" target="">Data Siswa</a>	
</h3>
		<br>
		<h3>Laporan Data Siswa</h3>
		<form action="laporan_data_siswa.php" method="get" target="_blank"> 
        <div class="row mb-3">
		    <div class="col-sm-12"><h4>Cari Data Siswa</h4></div> 
		    <br> <br>
		    <div class="col-sm-4">
		        <div class="form-group">
		            <select name="s_jurusan" id="s_jurusan" class="form-control">
		                <option value="">-- Pilih Semua Data --</option> 
		                <option value="2019/2020" <?php if ($s_jurusan=="2019/2020"){ echo "selected"; } ?>>T.A 2019/2020</option>
		                <option value="2020/2021" <?php if ($s_jurusan=="2020/2021"){ echo "selected"; } ?>>T.A 2020/2021</option>
		                <option value="2021/2022" <?php if ($s_jurusan=="2021/2022"){ echo "selected"; } ?>>T.A 2021/2022</option>
		                <option value="2022/2023" <?php if ($s_jurusan=="2022/2023"){ echo "selected"; } ?>>T.A 2022/2023</option>
		            </select>
		        </div>
		    </div>
		    <div class="col-sm-4">
		        <div class="form-group">
		            <input type="text" placeholder="Kata Kunci" name="s_keyword" id="s_keyword" class="form-control" value="<?php echo $s_keyword; ?>">
		        </div>
		    </div>
		    <div class="col-sm-4" >
		        <button id="search" name="search" class="btn btn-success">Cetak Data</button>
		    </div>
		</div>
	</form>
	<!-- <li><a href="laporan_tunggakan.php" target="_blank">Laporan Tunggakan</a></li> -->
</ul>
</div>
<?php include "footer.php"; ?>