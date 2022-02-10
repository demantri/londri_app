<div class="d-sm-flex align-items-center justify-content-between mb-3">
	<a href="<?= base_url('transaksi')?>" class="btn btn-light rounded-0">Kembali</a>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="./">Transaksi</a></li>
		<li class="breadcrumb-item active" aria-current="page">Tambah Londri</li>
	</ol>
</div>
<!-- notif nya -->
<div class="row mb-3">
	<div class="col-xl-7 col-lg-7" id="notif">
	<?= $this->session->flashdata('success') ?>
	</div>
</div>

<div class="row mb-3">
	<div class="col-xl-5 col-lg-12 mb-3">
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Tambah Londri</h6>
			</div>
			<div class="card-body">
				<form action="<?= base_url('transaksi/add_detail')?>" method="post">
					<div class="form-group row">
						<label for="no_invoice" class="col-sm-3">No. Invoice</label>
						<div class="col-sm-9">
						<input type="text" name="invoice" class="form-control" id="no_invoice" placeholder="No. Invoice" value="<?= $kode ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="tgl_transaksi" class="col-sm-3 col-form-label">Tgl. Transaksi</label>
						<div class="col-sm-9">
						<input type="date" name="tgl_transaksi" class="form-control" id="tgl_transaksi" placeholder="Tgl. Transaksi" value="<?= date('Y-m-d')?>">
						</div>
					</div>
					<hr>
					<div class="form-group row">
						<label for="parfum" class="col-sm-3 col-form-label">Parfum</label>
						<div class="col-sm-9">
							<select name="parfum" id="parfum" class="form-control" required>
								<option value="">- pilih parfum -</option>
								<?php foreach ($parfum as $parfum) { ?>
								<option value="<?= $parfum->nama_parfum?>"><?= $parfum->nama_parfum?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div id="x">
						<div class="form-group row">
							<label for="paket_londri" class="col-sm-3 col-form-label">Paket</label>
							<div class="col-sm-9">
							<select name="paket_londri" id="paket_londri" class="form-control" required>
								<option value="">- pilih paket londri -</option>
								<?php foreach ($paket as $paket) { ?>
								<option value="<?= $paket->deskripsi?>"><?= $paket->deskripsi?></option>
								<?php } ?>
							</select>
							<div style="color: red; font-size:13px" id="show_paket">
								
							</div>
							<input type="hidden" id="harga_paket" name="harga_paket">
							</div>
						</div>
						<div class="form-group row" id="after_paket">
							<label for="berat" class="col-sm-3 col-form-label">Berat</label>
							<div class="col-sm-3">
								<input type="text" name="berat" class="form-control" id="berat" placeholder="Berat" onkeyup="this.value=this.value.replace(/[^\d.]/g, '')" required>
							</div>
							
							<label for="total" class="col-sm-2 col-form-label">Total</label>
							<div class="col-sm-4">
								<input type="text" name="total" class="form-control" id="total" value="0" readonly>
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<div class="col-sm-10">
							<button type="submit" class="btn btn-outline-primary">Tambah</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-xl-7 col-lg-12 mb-3">
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
				<a href="" class="btn btn-outline-danger">Batalkan</a>
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered table-flush">
					<thead>
						<tr>
							<th>#</th>
							<th>Paket</th>
							<th>Berat</th>
							<th>Parfum</th>
							<th>Subtotal</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$no = 1;
					$total = 0;
					foreach ($details as $key => $value) { ?>
						<?php 
							$total += $value->subtotal;
						?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->paket ?></td>
							<td><?= $value->berat ?> kg</td>
							<td><?= $value->parfum ?></td>
							<td><?= $value->subtotal ?></td>
							<td class="text-center">
								<a href=""><i class="fas fa-trash"></i></a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="4" class="text-center">Grandtotal</th>
							<th colspan="2"><?= $total ?></th>
						</tr>
					</tfoot>
				</table>
				<br>
				<?php if (!empty($cek_detail)) { ?>
				<hr>
				<div id="btn">
					<button class="btn btn-success" onclick="alert('on progres')">Cetak & Bayar</button>
					<button class="btn btn-outline-success bayar" data-target="#bayar" data-toggle="modal" data-grandtotal="<?= $grandtotal ?>" data-invoice="<?= $kode ?>">Bayar</button>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('transaksi/bayar');?>
<script>
	$(document).ready(function() {
		$("#table").dataTable()
		$("#after_paket").hide()
		$("#pelanggan").hide()
		$("#metode").hide()
		$("#x").hide()
		// $("#btn").hide()
		$("#parfum").on('change', function() {
			value = $(this).val()
			if (value) {
				$("#x").show()
			} else {
				$("#x").hide()
			}
		})

		$("#paket_londri").on('change', function () {
			val = $(this).val()
			if (val) {
				$.ajax({
					url : "<?= base_url('transaksi/pk_l')?>", 
					method : "post", 
					data : {
						val : val, 
					}, 
					success:function (e) {
						obj = JSON.parse(e)
						$("#show_paket").show()
						$("#after_paket").show()
						var html = "";
						html = "<span>*paket perkilo adalah " + obj.harga_paket+ " </span>"
						$("#show_paket").html(html)
						$("#harga_paket").val(obj.harga_paket)
						// ketik berat 
						berat = $("#berat").val()
						rumusx = obj.harga_paket * berat
						// $("#total").val(rumusx)
						$("#berat").keyup(function(event) {
							text = $(this).val();
							console.log(text)
							$("#total").val(text * obj.harga_paket)
						})

					}
				})
			} else {
				$("#show_paket").hide()
				$("#after_paket").hide()
				$("#harga_paket").val('')
				$("#berat").val('')
				$("#total").val(0)
			}
		})

		$("#status_member").on('change', function() {
			value = $(this).val()
			if (value) {
				$.ajax({
					url : "<?= base_url('transaksi/cek_member/')?>" + value,
					method : "post", 
					data : {
						value : value, 
					}, 
					success:function(e) {
						$("#pelanggan").show()
						$("#metode").show()
						// $("#btn").show()
						$("#nama_pelanggan").html(e)
					}
				})
			} else {
				$("#pelanggan").hide()
				$("#metode").hide()
				// $("#btn").hide()
			}
		})

		$("#nominal").hide()
		var grandtot = $("#grandtotal").val()
		$("#pmb_kredit").val(grandtot)
		$("#pembayaran").on('change', function() {
			status = $(this).val()
			var grandtot = $("#grandtotal").val()
			if (status == 'kredit') {
				$("#nominal").show()
				$("#pmb_kredit").val(0)
			} else {
				$("#nominal").hide()
				$("#pmb_kredit").val(grandtot)
			}
		})
	})

	$(document).on("click", ".bayar", function () {
		var invoice = $(this).data('invoice');
		var grandtotal = $(this).data('grandtotal');
		$(".modal-body #invoice").val( invoice );
		$(".modal-body #grandtotal").val( grandtotal );
	});
</script>
