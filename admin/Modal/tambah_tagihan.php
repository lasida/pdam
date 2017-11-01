<div id="tambahTagihan" class="modal fade">
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