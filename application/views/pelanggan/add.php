<div class="modal" tabindex="-1" role="dialog" id="add">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Pelanggan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('pelanggan/save')?>" method="POST">
				<div class="modal-body">
					<div class="form-group row">
						<label for="nama" class="col-sm-3">Nama Lengkap</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
							<div style="font-size: 13px; color:red">
								<?php echo form_error('nama'); ?>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="alamat" class="col-sm-3">Alamat</label>
						<div class="col-sm-9">
							<textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control" placeholder="Alamat Domisili"></textarea>
							<div style="font-size: 13px; color:red">
								<?php echo form_error('alamat'); ?>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="no_telp" class="col-sm-3">No. Telp</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No. Telp">
							<div style="font-size: 13px; color:red">
								<?php echo form_error('no_telp'); ?>
							</div>
						</div>
					</div>
					<hr>
					<div class="form-group row">
						<label for="member" class="col-sm">daftar sebagai member?</label>
						<div class="col-sm">
							<input type="checkbox" name="member" id="member">
							<div style="font-size: 13px; color:red">
								<?php echo form_error('member'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
