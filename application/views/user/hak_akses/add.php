<div class="modal" tabindex="-1" role="dialog" id="add">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('user/save_role')?>" method="POST">
				<div class="modal-body">
					<div class="form-group row">
						<label for="deskripsi" class="col-sm-3">Deskripsi</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi">
							<div style="font-size: 13px; color:red">
								<?php echo form_error('deskripsi'); ?>
							</div>
						</div>
					</div>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<td>
									<label for="create">Create</label>
								</td>
								<td>
									<input type="checkbox" name="create" id="create" value="">
								</td>
							</tr>
							<tr>
								<td><label for="create">Update</label></td>
								<td>
									<input type="checkbox" name="update" id="update" value="">
								</td>
							</tr>
							<tr>
								<td><label for="create">Delete</label></td>
								<td>
									<input type="checkbox" name="delete" id="delete" value="">
								</td>
							</tr>
							<tr>
								<td><label for="create">Modul Transaksi</label></td>
								<td>
									<input type="checkbox" name="modul_transaksi" id="modul_transaksi" value="">
								</td>
							</tr>
							<tr>
								<td><label for="create">Laporan Pendapatan</label></td>
								<td>
									<input type="checkbox" name="laporan_pendapatan" id="laporan_pendapatan" value="">
								</td>
							</tr>
							<tr>
								<td><label for="create">Jurnal Umum</label></td>
								<td>
									<input type="checkbox" name="jurnal" id="jurnal" value="">
								</td>
							</tr>
							<tr>
								<td><label for="create">Buku Besar</label></td>
								<td>
									<input type="checkbox" name="bb" id="bb" value="">
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
