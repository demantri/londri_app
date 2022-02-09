<?php class Transaksi extends CI_Controller
{
	public function index()
	{
		$this->template->load('layout/index', 'transaksi/index');
	}

	public function add()
	{
		// $cek = $this->input->post('value');
		// // $pelanggan = $this->db->get('pelanggan')->result();
		// if ($cek == 1) {
		// 	$this->db->where('member_id !=', '');
		// 	$pelanggan = $this->db->get('pelanggan')->result();
		// } else {
		// 	$pelanggan = $this->db->get('pelanggan')->result();
		// }
		$pelanggan = $this->c_m(0);
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

	public function c_m($value = 0)
	{
		$value = $this->input->post('value');
		if ($value == 1) {
			# code...
			$this->db->where('member_id !=', '');
			$res = $this->db->get('pelanggan')->result();
		} else {
			# code...
			$res = $this->db->get('pelanggan')->result();
		}
		return $res;
	}
}
?>
