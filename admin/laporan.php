<?php 
	include 'header.php'; 
	include 'Class/DB.php';

	$kec = new DB('kecamatan');
	$GLOBALS['kec'] = $kec->getAll();

	$per_hal=10;
	$jumlah_record=mysql_query("SELECT COUNT(*) from tagihan");
	$jum=mysql_result($jumlah_record, 0);
	$halaman=ceil($jum / $per_hal);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$start = ($page - 1) * $per_hal;
?>


<div class="row">
	<div class="col-md-12">
		<p class="lead">Laporan Pelanggan</p>
		<hr>
	</div>
	<div class="row">
		<form action="laporan_act.php" method="post">
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
				<label for="basic-url">Tagihan</label><br>
				<select name="bayar" class="form-control">
					<option value="*">Semua tagihan</option>
					<option value="0">Belum dibayar</option>
					<option value="1">Sudah dibayar</option>
				</select>
			</div>
			<div class="col-md-12" style="margin-top: 30px">
				<input type="hidden" value="1" name="view">
				<button type="submit"	class="btn btn-primary">Lihat</button>
			</div>
		</form>
	</div>
	<div class="row">
		<?php if (isset($_GET['view'])) { ?>
			<?php if ($_GET['view'] == 1) { ?>
				<div class="col-md-12">
					<hr>
					<p class="lead">
						Menampilkan tagihan belum dibayar pada
						<?php 
							if (isset($_GET['kec'])) {
								if ($_GET['kec'] == '*') {
									echo "semua kecamatan";
								} else {
									$kec = new DB('kecamatan');
									$take = mysql_fetch_array($kec->getOne('id',$_GET['kec']));
									echo "Kecamatan ".ucwords($take['nama_kecamatan']);
								}
							} 
						?>
					</p>
				</div>
			<?php } 
				include 'laporan_table.php';
			?>

		<?php } ?>
		</div>
	</div>
</div>