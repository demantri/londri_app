<!-- <div class="d-sm-flex align-items-center justify-content-between mb-3">
	<h1 class="h3 mb-0 text-gray-800"></h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="./">Transaksi</a></li>
		<li class="breadcrumb-item active" aria-current="page">Tambah Londri</li>
	</ol>
</div> -->
<!-- notif nya -->
<div class="row mb-3">
	<div class="col-xl-7 col-lg-7" id="notif">
	<?= $this->session->flashdata('success') ?>
	</div>
</div>

<div class="row mb-3">
	<div class="col-xl-6 col-lg-12 mb-3">
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Tambah Londri</h6>
			</div>
			<div class="card-body">
				<form>
					<div class="form-group row">
						<label for="no_invoice" class="col-sm-3">No. Invoice</label>
						<div class="col-sm-9">
						<input type="password" class="form-control" id="no_invoice" placeholder="No. Invoice">
						</div>
					</div>
					<div class="form-group row">
						<label for="tgl_transaksi" class="col-sm-3 col-form-label">Tgl. Transaksi</label>
						<div class="col-sm-9">
						<input type="date" class="form-control" id="tgl_transaksi" placeholder="Tgl. Transaksi" value="<?= date('Y-m-d')?>">
						</div>
					</div>
					<hr>
					<div class="form-group row">
						<label for="parfum" class="col-sm-3 col-form-label">Parfum</label>
						<div class="col-sm-9">
							<select name="parfum" id="parfum" class="form-control">
								<option value="">- pilih parfum -</option>
								<?php foreach ($parfum as $parfum) { ?>
								<option value="<?= $parfum->nama_parfum?>"><?= $parfum->nama_parfum?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="paket_londri" class="col-sm-3 col-form-label">Paket</label>
						<div class="col-sm-9">
						<select name="paket_londri" id="paket_londri" class="form-control">
							<option value="">- pilih paket londri -</option>
							<?php foreach ($paket as $paket) { ?>
							<option value="<?= $paket->deskripsi?>"><?= $paket->deskripsi?></option>
							<?php } ?>
						</select>
						<div style="color: red; font-size:13px" id="show_paket">
							
						</div>
						</div>
					</div>
					<div class="form-group row" id="after_paket">
						<label for="berat" class="col-sm-3 col-form-label">Berat</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="berat" placeholder="Berat" onkeyup="this.value=this.value.replace(/[^\d.]/g, '')">
						</div>
						
						<label for="total" class="col-sm-2 col-form-label">Total</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="total" value="0" readonly>
						</div>
					</div>
					<hr>
					<div class="form-group row">
						<div class="col-sm-10">
						<button type="submit" class="btn btn-outline-primary">Tambah</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-xl-6 col-lg-12 mb-3">
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
			</div>
			<div class="card-body">
				<table class="table table-striped table-flush">
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
						<tr>
							<td>1</td>
							<td>Paket Regular</td>
							<td>7.8</td>
							<td>Yummy Bau bgt</td>
							<td>Rp. 32.000</td>
							<td class="text-center">
								<a href=""><i class="fas fa-trash"></i></a>
							</td>
						</tr>
					</tbody>
				</table>
				<hr>
				<div class="form-group row">
					<div class="col-sm-5" style="font-size:15px; color:red;">*silahkan centang jika member</div>
					<div class="col-sm-6">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="cek_member">
							<label class="custom-control-label" for="cek_member">Member</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama_pelanggan" class="col-sm-3">Nama Pelanggan</label>
					<div class="col-sm-9">
					<input type="text" value="0" class="nama_pelanggan">
					<select name="nama_pelanggan" id="nama_pelanggan" class="form-control">
					<option value="">- pilih pelanggan -</option>
					<?php foreach ($pelanggan as $pel) { ?>
					<option value=""><?= $pel->nama ?></option>
					<?php } ?>
					</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$("#table").dataTable()
		$("#after_paket").hide()
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
				$("#berat").val(0)
				$("#total").val(0)
			}
		})

		$("#cek_member").on('click', function() {
			check = $("#cek_member").is(":checked")
			if (check) {
				$(".nama_pelanggan").val(1)
			} else {
				$(".nama_pelanggan").val(0)
			}
		})

		// function select_val(value) {
		// 	$.ajax({
		// 		url : "<?= base_url('transaksi/c_m/')?>"+value, 
		// 		method : "post", 
		// 		data : {
		// 			value : value
		// 		}, 
		// 		success:function(e) {
		// 			console.log(e)
		// 		}
		// 	})
		// }
	})
</script>
