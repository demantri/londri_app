<div class="d-sm-flex align-items-center justify-content-between mb-4">
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
	<div class="col-xl-12 col-lg-12 mb-4">
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
							<th>Username</th>
							<th>Email</th>
							<th>Password</th>
							<th>Role</th>
							<th>Created at</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$no = 1; 
					foreach ($user as $key => $value) { ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->username ?></td>
							<td><?= $value->email ?></td>
							<td><?= substr($value->password, 0, 20).'...' ?></td>
							<td><?= $value->deskripsi ?></td>
							<td><?= $value->created_at ?></td>
							<td><?= $value->username ?></td>
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
<script>
	$(document).ready(function() {
		$("#table").dataTable()
	})
</script>
