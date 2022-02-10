<div class="modal" tabindex="-1" role="dialog" id="bayar">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Pembayaran #<?= $kode ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('transaksi/bayar')?>" method="POST">
				<div class="modal-body">
					<input type="hidden" id="invoice" name="invoice">
					<div class="form-group row">
						<label for="status_member" class="col-sm-4">Status Member</label>
						<div class="col-sm-8">
							<select name="status_member" id="status_member" class="form-control" required>
								<option value="">- pilih status -</option>
								<option value="1">Member</option>
								<option value="2">Non-member</option>
							</select>
						</div>
					</div>
					<div class="form-group row" id="pelanggan">
						<label for="nama_pelanggan" class="col-sm-4">Nama Pelanggan</label>
						<div class="col-sm-8">
							<select name="nama_pelanggan" id="nama_pelanggan" class="form-control" required>
							
							</select>
						</div>
					</div>
					<hr>
					<div class="form-group row" id="metode">
						<label for="pembayaran" class="col-sm-4">Pembayaran</label>
						<div class="col-sm-8">
							<select name="pembayaran" id="pembayaran" class="form-control" required>
								<option value="">-</option>
								<option value="tunai">Lunas</option>
								<option value="kredit">Kredit</option>
							</select>
						</div>
					</div>
					<div class="form-group row" id="nominal">
						<label for="pmb_kredit" class="col-sm-4">Nominal</label>
						<div class="col-sm-8">
							<input type="text" name="pmb_kredit" id="pmb_kredit" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="pembayaran" class="col-sm-4">Grandtotal</label>
						<div class="col-sm-8">
							<input type="text" name="grandtotal" id="grandtotal" class="form-control" readonly>
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
