<?php class Pelanggan extends CI_Controller
{
	function __construct() {
        parent::__construct();
        if (!$this->session->userdata('status')) {
            redirect('login');
        }
    }
	
	public function index()
	{
		$list = $this->Pelanggan_model->get_pelanggan()->result();
		$jenis_member = $this->db->get('member_detail')->result();

		$data = [
			'list' => $list,
			'jenis_member' => $jenis_member
		];
		$this->template->load('layout/index', 'pelanggan/index', $data);
	}

	public function save()
	{
		$nama = ucwords($this->input->post('nama'));
		$alamat = ucwords($this->input->post('alamat'));
		$no_telp = $this->input->post('no_telp');
		$member = $this->input->post('member');
		$rand_member_id = '';
		if (!is_null($member)) {
			$rand_member_id = rand(0, 1000000);
		}
		// insert ke pelanggan
		$data = [
			'member_id' => $rand_member_id,
			'nama' => $nama,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
		];
		$this->db->insert('pelanggan', $data);

		// insert ke member
		if (!is_null($member)) {
			$data_member = [
				'id_detail' => 1, 
				'member_id' => $rand_member_id,
				'point' => 2,
			];
			$this->db->insert('member', $data_member);
		}

		redirect('pelanggan');
	}
}
?>
