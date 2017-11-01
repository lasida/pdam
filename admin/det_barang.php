<?php
include 'header.php';
include 'Class/DB.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Pelanggan</h3>
<a class="btn" href="pelanggan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysql_real_escape_string($_GET['id']);
$GLOBALS['id'] = $_GET['id'];

$det=mysql_query("select * from pelanggan where id='$id_brg'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>
	<table class="table">
		<tr>
			<td>No. Pelanggan</td>
			<td><?php echo $d['No_Pel']; ?></td>
		</tr>
		<tr>
			<td>Nama Pelanggan</td>
			<td><?php echo $d['Nama']; ?></td>
		</tr>
		<tr>
			<td>No Telepon</td>
			<td><?php echo $d['Telp']; ?></td>
		</tr>
		<tr>
			<td>No. KTP</td>
			<td><?php echo $d['No_Ktp']; ?></td>
		</tr>
		<tr>
			<td>No. Kartu Keluarga</td>
			<td><?php echo $d['No_KK']; ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td><?php echo $d['Gender']; ?></td>
		</tr>
		<tr>
			<td>Kecamatan</td>
			<td>
				<?php 
					$kec = new DB('kecamatan');
					$val = mysql_fetch_array($kec->getOne('id', $d['Kecamatan']));
					echo $val['nama_kecamatan'];
				?>
			</td>
		</tr>
				<tr>
			<td>Kelurahan</td>
			<td>
				<?php 
					$kec = new DB('kelurahan');
					$val = mysql_fetch_array($kec->getOne('id', $d['kelurahan_id']));
					echo $val['nama'];
				?>
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $d['Alamat']; ?></td>
		</tr>
	<?php
}
?>
		<tr>
			<td>Status</td>
			<td>
			<?php
				$id = mysql_real_escape_string($GLOBALS['id']);
				$w = mysql_query("select * from tagihan where id_pelanggan='$id'")or die(mysql_error());
				$d=mysql_fetch_array($w);
				switch ($d) {
					case null:
						echo "Belum ada tagihan";
						break;

					default:
							switch ($d['status']) {
								case 0:
									echo "Tagihan belum dibayarkan";
									break;

								case 1:
									echo "Tagihan sudah dibayarkan";
									break;
								
								default:
									echo "Tagihan sudah dibayarkan";
									break;
							}
						break;
				}
			?>
			</td>
		</tr>
	</table>
<?php include 'footer.php'; ?>
