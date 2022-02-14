<div class="d-sm-flex align-items-center justify-content-between mb-3">
	<h1 class="h3 mb-0 text-gray-800"></h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="./">Transaksi</a></li>
		<li class="breadcrumb-item active" aria-current="page">Pembayaran Londri</li>
	</ol>
</div>
<!-- notif nya -->
<div class="row mb-3">
	<div class="col-xl-7 col-lg-7" id="notif">
	<?= $this->session->flashdata('success') ?>
	</div>
</div>

<div class="row mb-3">
	<div class="col-xl-12 col-lg-12 mb-3">
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Pembayaran Londri</h6>
				<a class="m-0 float-right">
					<!-- <button class="btn btn-primary rounded-0" data-toggle="modal" data-target="#add">Tambah</button> -->
					<!-- <a href="<?= base_url('transaksi/add')?>" class="btn btn-primary rounded-0">Tambah</a> -->
				</a>
			</div>
			
			<?php if ($this->session->flashdata('success')) ?>

			<div class="table-responsive p-3">
				<table class="table align-items-center table-flush" id="table">
					<thead class="thead-light">
						<tr>
							<th>#</th>
							<th>Tgl. Transaksi</th>
							<th>No. Invoice</th>
							<th>Nama Pelanggan</th>
							<th>Total Transaksi</th>
							<th>Selisih</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$no = 1;
					foreach($list as $item) { ?>
						<tr>
							<td><?= $no++?> </td>
							<td><?= $item->tgl_transaksi ?></td>
							<td><strong><?= $item->no_invoice ?></strong></td>
							<td><?= $item->pelanggan ?></td>
							<td><?= format_rp($item->total_pembayaran) ?></td>
							<td><?= format_rp($item->selisih) ?></td>
							<td class="text-center">
								<button class="btn btn-primary rounded-0 bayar_kredit" data-toggle="modal" data-target="#bayar_kredit" data-id="<?= $item->no_invoice ?>"
								data-selisih="<?= substr($item->selisih, "1") ?>"
								data-total="<?= $item->total_pembayaran ?>">Bayar</button>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="card-footer"></div>
		</div>
	</div>
</div>
<?php $this->load->view('transaksi/pembayaran/bayar_kredit');?>
<script>
	$(document).ready(function() {
		$("#table").dataTable()
	})
	$(document).on("click", ".bayar_kredit", function () {
		var invoice = $(this).data('id');
		var selisih = $(this).data('selisih');
		var total = $(this).data('total');
		// var grandtotal = $(this).data('grandtotal');
		$(".modal-body #invoice").val( invoice );
		$(".modal-body #selisih").val( selisih );
		$(".modal-body #total").val( total );
	});

	$("#nominal").keyup(function(event) {
		text = $(this).val();
		console.log(text)
		selisih = $("#selisih").val()
		rumus = text - selisih
		
		if (rumus >= 0) {
			$("#info").hide()
			$("#btnkredit").show()
			$("#kembalian").val(rumus)
		} else {
			$("#info").show()
			var html = '<div class="alert alert-info">'+
						'Pembayaran harus lebih atau sama dengan selisih.'+
					'</div>';
					$("#info").html(html)
			$("#btnkredit").hide()
			$("#kembalian").val(0)
		}
	})

	$("#btnkredit").hide()
</script>
