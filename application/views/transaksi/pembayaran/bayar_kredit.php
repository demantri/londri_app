<div class="modal" tabindex="-1" role="dialog" id="bayar_kredit">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Pembayaran #</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('transaksi/pembayaran_kredit')?>" method="POST">
				<div class="modal-body">
					<input type="hidden" id="invoice" name="invoice">
					<div id="info"></div>
					<div class="form-group row">
						<label for="selisih" class="col-sm-4">Selisih</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="selisih" id="selisih" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="grandtotal" class="col-sm-4">Grandtotal</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="grandtotal" id="total" readonly>
						</div>
					</div>
					<hr>
					<div class="form-group row">
						<label for="nominal" class="col-sm-4">Nominal</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="nominal" id="nominal" placeholder="Masukkan jumlah bayar">
							<span style="font-size:13px; color:red;">
								*merupakan jumlah yang harus dibayar
							</span>
						</div>
					</div>
					<div class="form-group row">
						<label for="kembalian" class="col-sm-4">Kembalian</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="kembalian" id="kembalian" value="0" readonly>
						</div>
					</div>
				</div>
				<div class="modal-footer" id="btnkredit">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
