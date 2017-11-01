<!-- modal ganti harga  -->
<div id="gantiHarga" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Ganti harga air</h4>
			</div>
			<div class="modal-body">
				<form action="update_harga.php" method="post">
					<div class="form-group">
						<label>Harga</label><br><small>*tanpa koma atau titik</small>
						<input name="harga" type="text" class="form-control" placeholder="Harga Baru..">
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