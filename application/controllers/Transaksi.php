<?php class Transaksi extends CI_Controller
{
	public function index()
	{
		$this->template->load('layout/index', 'transaksi/index');
	}

	public function add()
	{
		$pelanggan = $this->db->get('pelanggan')->result();
		$parfum = $this->db->get('parfum')->result();
		$paket = $this->db->get('paket_londri')->result();
		$data = [
			'pelanggan' => $pelanggan,
			'parfum' => $parfum,
			'paket' => $paket,
		];
		$this->template->load('layout/index', 'transaksi/add', $data);
	}

	public function pk_l()
	{
		$val = $this->input->post('val');
		if ($val) {
			$data = $this->Transaksi_model->fetch_data($val)->row();
		}
		echo json_encode($data);
	}
}
?>
