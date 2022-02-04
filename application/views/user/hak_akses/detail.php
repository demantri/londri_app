<?php foreach ($role as $key => $value) { ?>
<div class="modal" tabindex="-1" role="dialog" id="detail_<?= $value->id ?>">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail Role</h5>
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
								<td>Create</td>
								<td>
									<input type="checkbox"<?= ($value->create == 1 ? 'checked' : '') ?> value="" name="checkbox[]">
								</td>
							</tr>
							<tr>
								<td>Update</td>
								<td>
									<input type="checkbox"<?= ($value->update == 1 ? 'checked' : '') ?> value="" name="create">
								</td>
							</tr>
							<tr>
								<td>Delete</td>
								<td>
									<input type="checkbox"<?= ($value->delete == 1 ? 'checked' : '') ?> value="" name="checkbox[]">
								</td>
							</tr>
							<tr>
								<td>Modul Transaksi</td>
								<td>
									<input type="checkbox"<?= ($value->modul_transaksi == 1 ? 'checked' : '') ?> value="" name="checkbox[]">
								</td>
							</tr>
							<tr>
								<td>Laporan Pendapatan</td>
								<td>
									<input type="checkbox"<?= ($value->laporan_pendapatan == 1 ? 'checked' : '') ?> value="" name="checkbox[]">
								</td>
							</tr>
							<tr>
								<td>Jurnal Umum</td>
								<td>
									<input type="checkbox"<?= ($value->jurnal == 1 ? 'checked' : '') ?> value="" name="checkbox[]">
								</td>
							</tr>
							<tr>
								<td>Buku Besar</td>
								<td>
									<input type="checkbox"<?= ($value->bb == 1 ? 'checked' : '') ?> value="" name="asd">
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
<?php } ?>
