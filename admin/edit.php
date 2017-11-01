<?php
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Pelanggan</h3>
<a class="btn" href="pelanggan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_brg=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from pelanggan where id='$id_brg'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>
	<form action="update.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['Nama'] ?>"></td>
			</tr>
			<tr>
				<td>No. Telepon</td>
				<td><input type="text" class="form-control" name="noTlp" value="<?php echo $d['Telp'] ?>"></td>
			</tr>
			<tr>
				<td>No. KTP</td>
				<td><input type="text" class="form-control" name="KTP" value="<?php echo $d['No_Ktp'] ?>"></td>
			</tr>
			<tr>
				<td>No. Kartu Keluarga</td>
				<td><input type="text" class="form-control" name="KK" value="<?php echo $d['No_KK'] ?>"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><select type="submit" name="jnsKelamin" class="form-control">
					<option><?php echo $d['Gender'] ?></option>
					<option>Laki-Laki</option>
					<option>Perempuan</option>
				</select></td>
			</tr>
			<tr>
				<td>Kecamatan</td>
				<td><select type="submit" name="kecamatan" class="form-control" onchange="submit">
					<option value="<?php echo $d['Kecamatan'] ?>">Pilih Kecamatan</option>
					<?php
					$pil=mysql_query("select * from kecamatan");
					while($p=mysql_fetch_array($pil)){
						?>
						<option value="<?php echo $p['id'] ?>"><?php echo $p['nama_kecamatan'] ?></option>

						<?php
					}
					?>
				</select></td>
			</tr>
			<tr>
				<td>Kelurahan</td>
				<td><select type="submit" name="kelurahan" class="form-control" onchange="submit">
					<option value="<?php echo $d['kelurahan_id'] ?>">Pilih Kelurahan</option>
					<?php
					$pil=mysql_query("select * from kelurahan") or die("error");
					while($p=mysql_fetch_array($pil)){
						?>
						<option value="<?php echo $p['id'] ?>"><?php echo $p['nama'] ?></option>

						<?php
					}
					?>
				</select></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" class="form-control" name="alamat" value="<?php echo $d['Alamat'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php
}
?>
<?php include 'footer.php'; ?>
