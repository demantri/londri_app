<?php foreach ($role as $key => $value) { ?>
<div class="modal" tabindex="-1" role="dialog" id="detail_<?= $value->id ?>">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Hak Akses</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('user/update_role')?>" method="POST">
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="<?= $value->id ?>">
					<h5 class="mb-3">Role : <?= $value->deskripsi ?></h5>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<td>
									<label for="create">Create</label>
								</td>
								<td>
									<input type="checkbox"<?= ($value->create == 1 ? 'checked' : '') ?> name="create" id="create" value="">
								</td>
							</tr>
							<tr>
								<td><label for="update">Update</label></td>
								<td>
									<input type="checkbox"<?= ($value->update == 1 ? 'checked' : '') ?> name="update" id="update" value="">
								</td>
							</tr>
							<tr>
								<td><label for="delete">Delete</label></td>
								<td>
									<input type="checkbox"<?= ($value->delete == 1 ? 'checked' : '') ?> name="delete" id="delete" value="">
								</td>
							</tr>
							<tr>
								<td><label for="modul_transaksi">Modul Transaksi</label></td>
								<td>
									<input type="checkbox"<?= ($value->modul_transaksi == 1 ? 'checked' : '') ?> name="modul_transaksi" id="modul_transaksi" value="">
								</td>
							</tr>
							<tr>
								<td><label for="laporan_pendapatan">Laporan Pendapatan</label></td>
								<td>
									<input type="checkbox"<?= ($value->laporan_pendapatan == 1 ? 'checked' : '') ?> name="laporan_pendapatan" id="laporan_pendapatan" value="">
								</td>
							</tr>
							<tr>
								<td><label for="jurnal">Jurnal Umum</label></td>
								<td>
									<input type="checkbox"<?= ($value->jurnal == 1 ? 'checked' : '') ?> name="jurnal" id="jurnal" value="">
								</td>
							</tr>
							<tr>
								<td><label for="bb">Buku Besar</label></td>
								<td>
									<input type="checkbox"<?= ($value->bb == 1 ? 'checked' : '') ?> name="bb" id="bb" value="">
								</td>
							</tr>
						</thead>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$('#create, #update, #delete, #modul_transaksi, #laporan_pendapatan, #jurnal, #bb').on("click", function() {
		$("#create").prop('checked') ? $("#create").val(1) : ''
		$("#update").prop('checked') ? $("#update").val(1) : ''
		$("#delete").prop('checked') ? $("#delete").val(1) : ''
		$("#modul_transaksi").prop('checked') ? $("#modul_transaksi").val(1) : ''
		$("#laporan_pendapatan").prop('checked') ? $("#laporan_pendapatan").val(1) : ''
		$("#jurnal").prop('checked') ? $("#jurnal").val(1) : ''
		$("#bb").prop('checked') ? $("#bb").val(1) : ''
	})
</script>
<?php } ?>
