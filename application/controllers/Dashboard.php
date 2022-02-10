<?php class Dashboard extends CI_Controller
{
	public function index()
	{
		$pendapatan = $this->Dashboard_model->pendapatan()->row()->total;
		$total_transaksi = $this->Dashboard_model->total_transaksi()->row()->total_transaksi;
		$transaksi_baru = $this->Dashboard_model->transaksi_baru()->row()->transaksi_baru;
		$member_baru = $this->Dashboard_model->member_baru()->row()->member_baru;
		$data = [
			'pendapatan' => $pendapatan,
			'total_transaksi' => $total_transaksi,
			'transaksi_baru' => $transaksi_baru,
			'member_baru' => $member_baru,
		];
		$this->template->load('layout/index', 'dashboard/index', $data);
	}
}
?>
