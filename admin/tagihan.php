<?php include 'header.php'; ?>

<h3>
	<span class="glyphicon glyphicon-briefcase"></span>  Tagihan
	<?php 
		if ($_GET['bayar']==0) {
			echo "yang belum dibayar";
		} else {
			echo "yang sudah dibayar";
		}
	?>
</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tagihan Baru</button>
<br/>
<br/>


<?php
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from tagihan");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="row">
	<div class="col-md-12">
		<table class="col-md-2">
			<tr>
				<td>Jumlah Tagihan</td>
				<td><?php echo $jum; ?></td>
			</tr>
			<tr>
				<td>Jumlah Halaman</td>
				<td><?php echo $halaman; ?></td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<form action="filter_tagihan.php" method="get" style="margin-top: 30px">
			<div class="row">
			<br><br>
				<div class="col-md-12">
					<div class="input-group">
						<select name="filter_tagihan">
							<option value="0">Filter berdasarkan</option>
							<option value="0">Belum dibayar</option>
							<option value="1">Sudah dibayar</option>
						</select>
						<button type="submit">Refresh</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-6">
		<form action="cari_act.php" method="get" style="margin-top: 30px">
			<div class="row">
			<br><br>
				<div class="col-md-12">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
						<input type="text" class="form-control" placeholder="Cari .." aria-describedby="basic-addon1" name="cari">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<br/>
<table class="table">
	<tr>
		<th>No</th>
		<th>No. Pelanggan</th>
		<th>Nama Pelanggan</th>
		<th>Tanggal Bayar</th>
		<th>Bulan </th>
		<th>Meteran </th>
		<th>Tarif</th>
		<th>Status</th>
		<th>Opsi</th>
	</tr>
	<?php
	$idnf = $_GET['bayar'];
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from tagihan where Nama like '%$cari%' or No_Pel like '%$cari%	'");
	}else{
		$brg=mysql_query("select * from tagihan where status = '$idnf' limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<?php 
				$params = $b['id_pelanggan']; 
				$sql = mysql_query("select * from pelanggan where id = '$params'");
				while($val=mysql_fetch_array($sql)){ ?>
				<td><?php echo $val['No_Pel']; ?></td>
				<td><?php echo $val['Nama']; ?></td>
			<td><?php 
				if ($b['status']==0) {
				 	echo "Belum dibayar";
				 } else {
				 	echo date('d', $b['ts_bayar']);
				 }
			?></td>
			<td><?php 
				if ($b['status']==0) {
				 	echo "Belum dibayar";
				 } else {
				 	echo date('F', $b['ts_bayar']);
				 }
			?></td>
			<td><?php echo $b['mKubik'] ?></td>
			<td><?php 
				echo "Rp.".number_format($b['tarif']).",-" 
				?></td>
			<?php
				}
			?>
			<td><?php 
				switch ($b['status']) {
					case 0:
						echo "Belum dibayar";
						break;
					
					default:
						echo "Sudah dibayar";
						break;
				}
			 ?></td>
			<td>
				<a href="det_tagihan
				.php?id=<?php echo $b['id']; ?>" class="btn btn-info">Detail</a>
				<?php if ($b['status'] != 1): ?>
					<a href="edit_laku.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Bayar</a>
				<?php endif ?>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_laku.php?<?php echo "id=".$b['id']."&bayar=".$idnf; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>

		<?php
	}
	?>
	<?php if ($no ==  1): ?>
		<tr><td colspan="9">Tagihan Kosong</td></tr>
	<?php endif ?>
	<tr>
		<td colspan="9">Total Pemasukan</td>
		<?php
		if(isset($_GET['tanggal'])){
			$tanggal=mysql_real_escape_string($_GET['tanggal']);
			$x=mysql_query("select sum(total_harga) as total from tagihan where tanggal='$tanggal'");
			$xx=mysql_fetch_array($x);
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		}else{

		}

		?>
	</tr>
	<tr>
		<td colspan="9">Total Laba</td>
		<?php
		if(isset($_GET['tanggal'])){
			$tanggal=mysql_real_escape_string($_GET['tanggal']);
			$x=mysql_query("select sum(laba) as total from tagihan where tanggal='$tanggal'");
			$xx=mysql_fetch_array($x);
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		}else{

		}

		?>
	</tr>
</table><ul class="pagination">
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
				<h4 class="modal-title">Tambah Tagihan Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_tagihan_act.php" method="post">
					<div class="form-group">
						<label>No Pelanggan</label>
						<input type="text" name="pelanggan" placeholder="Nomor pelanggan" class="form-control">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
			</form>
		</div>
	</div>
</div>
</div>

<?php
	include 'Modal/bayar_tagihan.php';
?>


<?php
include 'footer.php';
?>
