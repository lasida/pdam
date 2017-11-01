<table class="table">
	<?php
	$id = $_GET['no'];
	$brg=mysql_query("select * from tagihan where id_pelanggan='$id'") or die("string");
	$no=1; ?>
	<?php if (mysql_num_rows($brg) == null): ?>
		<p class="lead">Kosong, Periksa kembali nomor pelanggan</p>
		<?php else: ?>
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
	<?php endif ?>
	<?php
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
		</tr>

		<?php
	}
	?>
	<?php if (mysql_num_rows($brg) != 0): ?>
		<tr>
			<td><a type='submit' href='pdf/laporan_tagihan_pdf.php?<?php echo "stbyno=1&no=".$id ?>'	class='btn btn-success' target='_blank'>Cetak</a></td>
		</tr>
	<?php endif ?>
</table>