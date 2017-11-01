<?php 
	include 'header.php'; 
	include 'Class/DB.php';

	$kec = new DB('kecamatan');
	$GLOBALS['kec'] = $kec->getAll();

	$kel = new DB('kelurahan');
	$GLOBALS['kel'] = $kel->getAll();

	$per_hal=10;
	$jumlah_record=mysql_query("SELECT COUNT(*) from tagihan");
	$jum=mysql_result($jumlah_record, 0);
	$halaman=ceil($jum / $per_hal);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$start = ($page - 1) * $per_hal;
?>


<div class="row">
	<div class="col-md-12">
		<p class="lead">Laporan</p>
		<hr>
	</div>
	<div class="row">
		<form action="laporan_pelanggan_act.php" method="post">
			<div class="col-md-6">
					<label for="basic-url">Kecamatan</label><br>
					<select name="kecamatan" class="form-control">
						<option value="*">Semua kecamatan</option>
						<?php 
							while ($fetch = mysql_fetch_array($GLOBALS['kec'])) {							
						?>
						<option value="<?php echo $fetch['id'] ?>"><?php echo $fetch['nama_kecamatan'] ?></option>
						<?php } ?>
					</select>
			</div>
			<div class="col-md-6">
					<label for="basic-url">Kelurahan</label><br>
					<select name="kelurahan" class="form-control">
						<option value="*">Semua kelurahan</option>
						<?php 
							while ($fetch = mysql_fetch_array($GLOBALS['kel'])) {							
						?>
						<option value="<?php echo $fetch['id'] ?>"><?php echo $fetch['nama'] ?></option>
						<?php } ?>
					</select>
			</div>
			<div class="col-md-12" style="margin-top: 30px">
				<input type="hidden" value="1" name="view">
				<button type="submit"	class="btn btn-primary">Lihat</button>
				<?php 
					if (isset($_GET['view'])) {
						$kec = $_GET['kec'];
						$kel = $_GET['kel'];
					}
				?>
			</div>
		</form>
	</div>
	<div class="row" style="margin-top: 50px">
			<?php 
				if (isset($_GET['view'])) {
				include 'laporan_pelanggan_table.php';
				}
			?>
		</div>
	</div>
</div>