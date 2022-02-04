<div class="d-sm-flex align-items-center justify-content-between mb-3">
	<h1 class="h3 mb-0 text-gray-800"></h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="./">User</a></li>
		<li class="breadcrumb-item active" aria-current="page">List User</li>
	</ol>
</div>
<!-- notif nya -->
<div class="row mb-3">
	<div class="col-xl-7 col-lg-7" id="notif">
	<?= $this->session->flashdata('success') ?>
	</div>
</div>

<div class="row mb-3">
	<!-- Invoice Example -->
	<div class="col-xl-12 col-lg-7 mb-4">
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">List Produk</h6>
				<a class="m-0 float-right">
					<button class="btn btn-primary rounded-0" data-toggle="modal" data-target="#add_user">Tambah</button>
				</a>
			</div>
			
			<?php if ($this->session->flashdata('success')) ?>

			<div class="table-responsive p-3">
				<table class="table align-items-center table-flush" id="table">
					<thead class="thead-light">
						<tr>
							<th>#</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$no = 1; 
					foreach ($role as $key => $value) { ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= ucwords($value->deskripsi) ?></td>
							<td>
								<a href="#detail_<?= $value->id ?>" data-toggle="modal" class="btn btn-light btn-sm rounded-0">Detail</a>
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
<?php $this->load->view('user/add_user');?>
<?php $this->load->view('user/hak_akses/detail');?>
<script>
	$(document).ready(function() {
		$("#table").dataTable()
	})
</script>
