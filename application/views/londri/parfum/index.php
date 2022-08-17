<div class="d-sm-flex align-items-center justify-content-between mb-3">
	<h1 class="h3 mb-0 text-gray-800"></h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="./">Masterdata</a></li>
		<li class="breadcrumb-item active" aria-current="page">Paket Londri</li>
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
				<h6 class="m-0 font-weight-bold text-primary">Daftar Parfum</h6>
				<a class="m-0 float-right">
					<button class="btn btn-primary rounded-0" data-toggle="modal" data-target="#add">Tambah</button>
				</a>
			</div>
			
			<?php if ($this->session->flashdata('success')) ?>

			<div class="table-responsive p-3">
				<table class="table align-items-center table-flush" id="table">
					<thead class="thead-light">
						<tr>
							<th>#</th>
							<th>Nama Parfum</th>
							<th>Stok</th>
							<th>Deskripsi</th>
							<th>Harga Parfum</th>
						</tr>
					</thead>
					<tbody>
					<?php
                    $no = 1;
                    foreach ($list as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->nama_parfum?></td>
                            <td><?= $value->stok?></td>
                            <td><?= $value->deskripsi?></td>
                            <td><?= 'Rp. ' . number_format($value->harga_parfum)?></td>
                        </tr>    
                    <?php } ?>
					</tbody>
				</table>
			</div>
			<div class="card-footer"></div>
		</div>
	</div>
</div>
<?php $this->load->view('londri/parfum/add');?>
<script>
	$(document).ready(function() {
		$("#table").dataTable()
	})
</script>
