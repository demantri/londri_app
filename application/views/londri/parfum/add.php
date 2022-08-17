<div class="modal" tabindex="-1" role="dialog" id="add">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('parfum/saveParfum')?>" method="POST">
				<div class="modal-body">
                    <div class="form-group row">
                        <label for="nama_parfum" class="col-sm-3">Nama Parfum</label>
						<div class="col-sm-9">
                            <input type="text" name="nama_parfum" id="nama_parfum" class="form-control" placeholder="Nama Parfum">	
							<div style="font-size: 13px; color:red">
                                <?php echo form_error('nama_parfum'); ?>
                            </div>
                        </div>
					</div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-3">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi">
                            <div style="font-size: 13px; color:red">
                                <?php echo form_error('deskripsi'); ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group row">
						<label for="harga_parfum" class="col-sm-3">Harga Parfum</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="harga_parfum" id="harga_parfum" placeholder="Harga Parfum">
							<div style="font-size: 13px; color:red">
								<?php echo form_error('harga_parfum'); ?>
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
