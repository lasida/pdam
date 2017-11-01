<table class="table" style="margin-top: 30px">
	<thead>
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
	</thead>
	<tbody>
		<?php
		$idnf = $_GET['bayar'];
		if ($_GET['bayar'] == '*') {
				$brg=mysql_query("select * from tagihan limit $start, $per_hal");
			} else {
				$brg=mysql_query("select * from tagihan where status = '$idnf' limit $start, $per_hal");
			}

		$no=1;

		while($b=mysql_fetch_array($brg)){
			if ($_GET['kec'] == $b['id_kecamatan']) { ?>
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
			}
		?>
	</tbody>
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