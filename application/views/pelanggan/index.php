<div class="d-sm-flex align-items-center justify-content-between mb-3">
	<h1 class="h3 mb-0 text-gray-800"></h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="./">Pelanggan</a></li>
		<li class="breadcrumb-item active" aria-current="page">List Pelanggan</li>
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
				<h6 class="m-0 font-weight-bold text-primary">List Pelanggan</h6>
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
							<th>Nama</th>
							<th>Alamat</th>
							<th>No. Telp</th>
							<th>Jenis member</th>
							<th>Created at</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$no = 1;
					foreach ($list as $key => $value) { ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->nama ?></td>
							<td><?= $value->alamat ?></td>
							<td><?= $value->no_telp ?></td>
							<td><?= $value->jenis_member ? '<span class="badge badge-primary">'.$value->jenis_member.'</span>' : '<span class="badge badge-light">Belum berlangganan member</span>' ?></td>
							<td><?= $value->created_at?></td>
							<td class="text-center">
								<div class="btn-group" role="group" aria-label="Basic example">
									<button type="button" class="btn btn-light">Detail</button>
									<button type="button" class="btn btn-warning">Edit</button>
									<button type="button" class="btn btn-danger">Hapus</button>
								</div>
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
<?php $this->load->view('pelanggan/add');?>
<script>
	$(document).ready(function() {
		$("#table").dataTable()
	})
</script>
