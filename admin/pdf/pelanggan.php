<?php 
include '../config.php'; 
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Pelanggan</title>
</head>
<body>
	

<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-2">Nama Pelanggan</th>
		<th class="col-md-2">No Pelanggan</th>
		<th class="col-md-1">No Telepon</th>
		<th class="col-md-3">Alamat</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
	</tr>
	<?php
	$kec = $_GET['kec'];
	$kel = $_GET['kel'];

	if ($kec == '*' && $kel == '*') {
		$brg=mysql_query("select * from pelanggan") or die("Error");
	} elseif ($kec == '*' && $kel != '*') {
		$brg=mysql_query("select * from pelanggan where kelurahan_id='$kel'") or die("Error");
	} elseif ($kec != '*' && $kel == '*') {
		$brg=mysql_query("select * from pelanggan where Kecamatan='$kec'") or die("Error");
	} elseif ($kec != '*' && $kel != '*') {
		$brg=mysql_query("select * from pelanggan where Kecamatan='$kec' and kelurahan_id='$kel'") or die("Error");
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

</body>
</html>