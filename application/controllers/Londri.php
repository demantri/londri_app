<?php class Londri extends CI_Controller
{
	// paket
	public function index() //list paket
	{
		$list = $this->db->get('paket_londri')->result();
		$data = [
			'list' => $list,
		];
		$this->template->load('layout/index', 'londri/paket/index', $data);
	}

	public function save_paket()
	{
		$deskripsi = $this->input->post('deskripsi');
		$durasi = $this->input->post('durasi');
		$harga_paket = $this->input->post('harga_paket');
		$data = [
			'deskripsi' => ucwords($deskripsi),
			'durasi' => $durasi,
			'harga_paket' => $harga_paket,
		];
		$this->db->insert('paket_londri', $data);
		redirect('londri/list-paket');
	}

	public function list_parfum()
	{
		$this->template->load('layout/index', 'londri/index');
	}
}
?>
