<div id="tambahPelanggan" class="modal fade">
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
							$pil=mysql_query("select * from kelurahan");
							while($p=mysql_fetch_array($pil)){
								?>
								<option value="<?php echo $p['id']; ?>"><?php echo $p['nama'] ?></option>

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
	</div>