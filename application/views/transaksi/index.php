<div class="d-sm-flex align-items-center justify-content-between mb-3">
	<h1 class="h3 mb-0 text-gray-800"></h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="./">Transaksi</a></li>
		<li class="breadcrumb-item active" aria-current="page">Transaksi Londri</li>
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
				<h6 class="m-0 font-weight-bold text-primary">Transaksi Londri</h6>
				<a class="m-0 float-right">
					<!-- <button class="btn btn-primary rounded-0" data-toggle="modal" data-target="#add">Tambah</button> -->
					<a href="<?= base_url('transaksi/add')?>" class="btn btn-primary rounded-0">Tambah</a>
				</a>
			</div>
			
			<?php if ($this->session->flashdata('success')) ?>

			<div class="table-responsive p-3">
				<table class="table align-items-center table-flush" id="table">
					<thead class="thead-light">
						<tr>
							<th>#</th>
							<th>Tgl. Transaksi</th>
							<th>Nama Pelanggan</th>
							<th>Paket</th>
							<th>Total Transaksi</th>
							<th>Status Pembayaran</th>
							<th>Status Order</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
			<div class="card-footer"></div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$("#table").dataTable()
	})
</script>
