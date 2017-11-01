<?php
include 'header.php';
include 'Class/DB.php';

$tag = new DB('tagihan');

$pel = new DB('pelanggan');
$fetch = mysql_fetch_array($tag->getOne('id',$_GET['id']));
$val = mysql_fetch_array($pel->getOne('id', $fetch['id_pelanggan']));

$GLOBALS['status'] = $fetch['status'];

$GLOBALS['no_pel'] = $val['No_Pel'];
$GLOBALS['nama_pel'] = $val['Nama'];
$GLOBALS['telp'] = $val['Telp'];
$GLOBALS['No_KTP'] = $val['No_Ktp'];
$GLOBALS['No_KK'] = $val['No_KK'];
$GLOBALS['Gender'] = $val['Gender'];
$GLOBALS['Alamat'] = $val['Alamat'];
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Tagihan</h3>
<a class="btn" href="tagihan.php?bayar=0"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<table class="table">
	<tr>
		<td>No. Pelanggan</td>
		<td><?php echo $GLOBALS['no_pel'] ?></td>
	</tr>
	<tr>
		<td>Nama Pelanggan</td>
		<td><?php echo $GLOBALS['nama_pel']; ?></td>
	</tr>
	<tr>
		<td>No Telepon</td>
		<td><?php echo $GLOBALS['telp']; ?></td>
	</tr>
	<tr>
		<td>No. KTP</td>
		<td><?php echo $GLOBALS['No_KTP']; ?></td>
	</tr>
	<tr>
		<td>No. Kartu Keluarga</td>
		<td><?php echo $GLOBALS['No_KK']; ?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td><?php echo $GLOBALS['Gender']; ?></td>
	</tr>
	<tr>
		<td>Kecamatan</td>
		<td>
			<?php 
				$kec = new DB('kecamatan');
				$val = mysql_fetch_array($kec->getOne('id', $val['Kecamatan']));
				echo $val['nama_kecamatan'];
			?>
		</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><?php echo $GLOBALS['Alamat']; ?></td>
	</tr>
	<tr>
		<td>Status</td>
		<td>
		<?php
			switch ($GLOBALS['status']) {
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
		?>
		</td>
	</tr>
</table>

<?php include 'footer.php'; ?>
