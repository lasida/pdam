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
			$startyr = $_GET['startyr'];
			$endyr = $_GET['endyr'];
			$range = range($startyr, $endyr);
			for ($i= $startyr; $i < $endyr+1; $i++) {
			if (date('Y',$b['timestamps']) == $i ) {
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
	<?php if ($no != 1): ?>
		<tr>
			<td><a type='submit' href='pdf/laporan_tagihan_pdf.php?<?php echo "stbyrgyr=1&startyr=".$startyr."&endyr=".$endyr; ?>'	class='btn btn-success' target='_blank'>Cetak</a></td>
		</tr>
		<?php else: ?>
			<tr>
				<p class="lead">Tagihan dengan jenjang tahun yang diberikan tidak ada</p>
			</tr>
	<?php endif ?>
</table>
