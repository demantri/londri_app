<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
	<div class="sidebar-brand-icon">
		<img src="<?= base_url('assets/t1/')?>img/logo/logo2.png">
	</div>
	<div class="sidebar-brand-text mx-3">RuangAdmin</div>
	</a>
	<hr class="sidebar-divider my-0">
	<li class="nav-item">
		<a class="nav-link" href="index.html">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<hr class="sidebar-divider">
	<div class="sidebar-heading">
	data master 
	</div>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('pelanggan')?>">
			<i class="fas fa-fw fa-palette"></i>
			<span>Pelanggan</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#member-toggle" aria-expanded="true"
			aria-controls="member-toggle">
			<i class="fas fa-fw fa-columns"></i>
			<span>Member</span>
		</a>
		<div id="member-toggle" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="login.html">List Member</a>
				<a class="collapse-item" href="register.html">Daftar Member</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('londri/list-paket')?>">
			<i class="fas fa-fw fa-palette"></i>
			<span>Paket Londri</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('londri/list-parfum')?>">
			<i class="fas fa-fw fa-palette"></i>
			<span>Parfum</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user-toggle" aria-expanded="true"
			aria-controls="user-toggle">
			<i class="fas fa-fw fa-columns"></i>
			<span>User</span>
		</a>
		<div id="user-toggle" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('user')?>">User</a>
				<a class="collapse-item" href="<?= base_url('user/role')?>">Role</a>
			</div>
		</div>
	</li>
	<hr class="sidebar-divider">
	<div class="sidebar-heading">
	Transaksi
	</div>
	<li class="nav-item">
	<a class="nav-link" href="<?= base_url('transaksi')?>">
		<i class="fas fa-fw fa-chart-area"></i>
		<span>Transaksi Londri</span>
	</a>
	</li>
	<hr class="sidebar-divider">
	<div class="sidebar-heading">
	laporan
	</div>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#lap-londri" aria-expanded="true"
			aria-controls="lap-londri">
			<i class="fas fa-fw fa-columns"></i>
			<span>Laporan Londri</span>
		</a>
		<div id="lap-londri" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
			<a class="collapse-item" href="login.html">Pendapatan Londri</a>
			<a class="collapse-item" href="register.html">Jurnal Umum</a>
			<a class="collapse-item" href="404.html">Buku Besar</a>
			</div>
		</div>
	</li>
</ul>
<!-- Sidebar -->
