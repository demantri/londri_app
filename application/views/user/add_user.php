<div class="modal" tabindex="-1" role="dialog" id="add_user">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('user/save_user')?>" method="POST">
				<div class="modal-body">
					<!-- <input type="hidden" name="id" id="id"> -->
					<div class="form-group row">
						<label for="username" class="col-sm-3">Username</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="username" id="username" placeholder="Username">
							<div style="font-size: 13px; color:red">
								<?php echo form_error('username'); ?>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-3">Email</label>
						<div class="col-sm-9">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email">
							<div style="font-size: 13px; color:red">
								<?php echo form_error('email'); ?>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-sm-3">Password</label>
						<div class="col-sm-9">
							<input type="password" class="form-control" name="password" id="password" placeholder="Password">
							<div style="font-size: 13px; color:red">
								<?php echo form_error('password'); ?>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="role" class="col-sm-3">Role</label>
						<div class="col-sm-9">
							<select name="role" id="role" class="form-control">
								<option value="">Pilih role</option>
								<?php foreach ($role as $key => $value) { ?>
								<option value="<?= $value->id ?>"><?= $value->deskripsi ?></option>
								<?php } ?>
							</select>
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
