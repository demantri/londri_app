
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?= base_url('assets/t1/')?>img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Dashboard</title>
  <link href="<?= base_url('assets/t1/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/t1/')?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/t1/')?>css/ruang-admin.min.css" rel="stylesheet">

	<link href="<?= base_url('assets/t1/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<script src="<?= base_url('assets/t1/')?>vendor/jquery/jquery.min.js"></script>
</head>

<body id="page-top">
  <div id="wrapper">
    <?php $this->load->view('layout/sidebar'); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php $this->load->view('layout/topbar'); ?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
			
				<!-- <?php $this->load->view('layout/breadcrumb');?> -->

				<?= $contents ?>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <script src="<?= base_url('assets/t1/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/t1/')?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url('assets/t1/')?>js/ruang-admin.min.js"></script>
  <script src="<?= base_url('assets/t1/')?>vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url('assets/t1/')?>js/demo/chart-area-demo.js"></script>

	<script src="<?= base_url('assets/t1/')?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/t1/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
	
</body>

</html>
