<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Pelanggan</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Pelanggan Baru</button>
<br/>
<br/>


<?php
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from pelanggan");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Pelanggan</td>
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
</div>
<form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari .." aria-describedby="basic-addon1" name="cari">
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-2">Nama Pelanggan</th>
		<th class="col-md-2">No Pelanggan</th>
		<th class="col-md-1">No Telepon</th>
		<th class="col-md-3">Alamat</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from pelanggan where Nama like '%$cari%' or No_Pel like '%$cari%	'");
	}else{
		$brg=mysql_query("select * from pelanggan limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['Nama'] ?></td>
			<td><?php echo $b['No_Pel'] ?></td>
			<td><?php echo $b['Telp'] ?></td>
			<td><?php echo $b['Alamat'] ?></td>
			<td>
				<a href="det_barang.php?id=<?php echo $b['id']; ?>" class="btn btn-info">Detail</a>
				<a href="edit.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		<?php
	}
	?>
	<tr>
		<td colspan="4"></td>
		<td>

		</td>
	</tr>
</table>
<ul class="pagination">
			<?php
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>
		</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Pelanggan Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_brg_act.php" method="post">
					<div class="form-group">
						<label>Nama Pelanggan</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Pelanggan ..">
					</div>
					<div class="form-group">
						<label>No Telepon</label>
						<input name="noTlp" type="text" class="form-control" placeholder="No Telepon ..">
					</div>
					<div class="form-group">
						<label>No KTP</label>
						<input name="KTP" type="text" class="form-control" placeholder="No KTP ..">
					</div>
					<div class="form-group">
						<label>No KK</label>
						<input name="KK" type="text" class="form-control" placeholder="No KK ..">
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
							<select type="submit" name="jnsKelamin" class="form-control">
								<option>Pilih Jenis Kelamin ..</option>
								<option>Laki-Laki</option>
								<option>Perempuan</option>
							</select>
					</div>
					<div class="form-group">
						<label>Kecamatan</label>
						<select type="submit" name="kecamatan" class="form-control" onchange="submit">
							<option>Pilih Jenis Kecamatan ..</option>
							<?php
							$pil=mysql_query("select * from kecamatan");
							while($p=mysql_fetch_array($pil)){
								?>
								<option value="<?php echo $p['id']; ?>"><?php echo $p['nama_kecamatan'] ?></option>

								<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Kelurahan</label>
						<select type="submit" name="kelurahan" class="form-control" onchange="submit">
							<option>Pilih Kelurahan ..</option>
							<?php
							$kel=mysql_query("select * from kelurahan order by kecamatan_id") or die("Error");
							while($e=mysql_fetch_array($kel)){
								$kecId = $e['kecamatan_id'];
								$w=mysql_query("select * from kecamatan where id='$kecId'") or die("Error");
								$kec = mysql_fetch_array($w);
								?>
								<option value="<?php echo $e['id']; ?>"><?php echo $kec['nama_kecamatan']." - ".$e['nama'] ?></option>

								<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea name="alamat" class="form-control" placeholder="Alamat .."></textarea>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>




<?php
include 'footer.php';

?>
