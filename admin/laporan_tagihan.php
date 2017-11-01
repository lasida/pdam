<?php
	include 'header.php';
	include 'Class/DB.php';

	$per_hal=10;
	$jumlah_record=mysql_query("SELECT COUNT(*) from tagihan");
	$jum=mysql_result($jumlah_record, 0);
	$halaman=ceil($jum / $per_hal);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$start = ($page - 1) * $per_hal;
?>


<div class="row">
	<div class="col-md-12">
		<p class="lead">Laporan Tagihan</p>
		<hr>
	</div>
	<div class="row">
			<div class="col-md-4">
				<form action="laporan_tagihan_by_nopel.php" method="post">
						<div class="panel panel-default">
						  <div class="panel-heading">Berdasarkan No Pelanggan</div>
						  <div class="panel-body">
						    <input type="text" class="form-control" placeholder="No Pelanggan" name="nopel">
						    <hr>
								<button class="btn btn-primaty" type="submit">Lihat</button>
						  </div>
						</div>
				</form>
			</div>
			<div class="col-md-4">
				<form action="laporan_tagihan_by_rgmon.php" method="post">
						<div class="panel panel-default">
						  <div class="panel-heading">Berdasarkan jenjang bulan</div>
						  <div class="panel-body">
						  	<div class="row">
						  		<div class="col-md-4">
								    <select class="form-control" name="startmon">
								    	<option value="1">Januari</option>
								    	<option value="2">Februari</option>
								    	<option value="3">Maret</option>
								    	<option value="4">April</option>
								    	<option value="5">Mei</option>
								    	<option value="6">Juni</option>
								    	<option value="7">July</option>
								    	<option value="8">Agustus</option>
								    	<option value="9">September</option>
								    	<option value="10">Oktober</option>
								    	<option value="11">November</option>
								    	<option value="12">Desember</option>
								    </select>
						  		</div>
						  		<div class="col-md-4">
						  		<select class="form-control" name="endmon">
						  				<option value="1">Januari</option>
						  				<option value="2">Februari</option>
						  				<option value="3">Maret</option>
						  				<option value="4">April</option>
						  				<option value="5">Mei</option>
						  				<option value="6">Juni</option>
						  				<option value="7">July</option>
						  				<option value="8">Agustus</option>
						  				<option value="9">September</option>
						  				<option value="10">Oktober</option>
						  				<option value="11">November</option>
						  				<option value="12">Desember</option>
						  			</select>
						  		</div>
						  		<div class="col-md-4">
						  			<input type="text" class="form-control" placeholder="Tahun" name="yr">
						  		</div>
						  	</div>
						    <hr>
								<button class="btn btn-primaty" type="submit">Lihat</button>
						  </div>
						</div>
				</form>
			</div>
			<div class="col-md-4">
				<form action="laporan_tagihan_by_rgyr.php" method="post">
						<div class="panel panel-default">
						  <div class="panel-heading">Berdasarkan jenjang tahun</div>
						  <div class="panel-body">
						  	<div class="row">
						  		<div class="col-md-6">
						  			<input type="text" class="form-control" placeholder="Tahun mulai" name="startyr">
						  		</div>
							  	<div class="col-md-6">
							  			<input type="text" class="form-control" placeholder="Tahun akhir" name="endyr">
							  		</div>
							  </div>
						    <hr>
								<button class="btn btn-primaty" type="submit">Lihat</button>
						  </div>
						  </div>
						</div>
				</form>
			</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="row" style="margin-top: 50px">
					<?php
						if (isset($_GET['stbyno'])) {
						include 'laporan_tagihan_stbyno.php';
						}
						if (isset($_GET['stbyrgmon'])) {
						include 'laporan_tagihan_stbyrgmon.php';
						}
						if (isset($_GET['stbyrgyr'])) {
						include 'laporan_tagihan_stbyrgyr.php';
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
