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
	</tr>
	<?php
	$brg=mysql_query("select * from tagihan");
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<?php 
			$startmon = $_GET['startmon'];
			$endmon = $_GET['endmon'];
			$yr = $_GET['yr'];
			$range = range($startmon, $endmon);
			for ($i= $startmon; $i < $endmon+1; $i++) { 
			if ((date('n',$b['ts_bayar']) == $i && date('Y',$b['ts_bayar']) == $yr) or (date('n',$b['timestamps']) == $i && date('Y',$b['timestamps']) == $yr) ) {
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
			</tr>

			<?php } ?>
		<?php
			}
		?>
			
	
		<?php
	}
	?>
</table>

</body>
</html>