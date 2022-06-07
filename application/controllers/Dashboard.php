<?php class Dashboard extends CI_Controller
{
	function __construct() {
        parent::__construct();
        if (!$this->session->userdata('status')) {
            redirect('login');
        }
    }

	public function index()
	{
		$pendapatan = $this->Dashboard_model->pendapatan()->row()->total ?? 0;
		$total_transaksi = $this->Dashboard_model->total_transaksi()->row()->total_transaksi;
		$transaksi_baru = $this->Dashboard_model->transaksi_baru()->row()->transaksi_baru;
		$member_baru = $this->Dashboard_model->member_baru()->row()->member_baru;
		$best_parfum = $this->Dashboard_model->best_parfum()->result();

		$data = [
			'pendapatan' => $pendapatan,
			'total_transaksi' => $total_transaksi,
			'transaksi_baru' => $transaksi_baru,
			'member_baru' => $member_baru,
			'parfum' => $best_parfum,
		];
		$this->template->load('layout/index', 'dashboard/index', $data);
	}
}
?>
