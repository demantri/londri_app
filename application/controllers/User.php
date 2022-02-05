<?php class User extends CI_Controller
{
	public function index()
	{
		$role = $this->db->get('role')->result();
		$user = $this->db->get('user')->result();
		$data = [
			'role' => $role,
			'user' => $user,
		];
		$this->template->load('layout/index', 'user/index', $data);
	}

	public function save_user()
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$role = $this->input->post('role');

		$data = [
			'username' => $username, 
			'email' => $email, 
			'password' => $password, 
			'role' => $role, 
		];

		print_r($data);exit;
	}

	public function role()
	{
		$this->db->where('is_deleted', 0);
		$list = $this->db->get('role')->result();
		$role = $this->db->get('role')->result();
		$data = [
			'list' => $list,
			'role' => $role,
		];
		$this->template->load('layout/index', 'user/hak_akses/index', $data);
	}

	public function save_role()
	{
		$deskripsi = $this->input->post('deskripsi');
		$create = is_null($this->input->post('create')) ? '0' : '1';
		$update = is_null($this->input->post('update')) ? '0' : '1';
		$delete = is_null($this->input->post('delete')) ? '0' : '1';
		$modul_transaksi = is_null($this->input->post('modul_transaksi')) ? '0' : '1';
		$laporan_pendapatan = is_null($this->input->post('laporan_pendapatan')) ? '0' : '1';
		$jurnal = is_null($this->input->post('jurnal')) ? '0' : '1';
		$bb = is_null($this->input->post('bb')) ? '0' : '1';
		$data = [
			'deskripsi' => $deskripsi,
			'create' => $create,
			'update' => $update,
			'delete' => $delete,
			'modul_transaksi' => $modul_transaksi,
			'laporan_pendapatan' => $laporan_pendapatan,
			'jurnal' => $jurnal,
			'bb' => $bb,
		];
		$this->db->insert('role', $data);
		redirect('user/role');
	}

	public function update_role()
	{
		$id = $this->input->post('id');
		$create = is_null($this->input->post('create')) ? '0' : '1';
		$update = is_null($this->input->post('update')) ? '0' : '1';
		$delete = is_null($this->input->post('delete')) ? '0' : '1';
		$modul_transaksi = is_null($this->input->post('modul_transaksi')) ? '0' : '1';
		$laporan_pendapatan = is_null($this->input->post('laporan_pendapatan')) ? '0' : '1';
		$jurnal = is_null($this->input->post('jurnal')) ? '0' : '1';
		$bb = is_null($this->input->post('bb')) ? '0' : '1';
		
		$data = [
			'create' => $create,
			'update' => $update,
			'delete' => $delete,
			'modul_transaksi' => $modul_transaksi,
			'laporan_pendapatan' => $laporan_pendapatan,
			'jurnal' => $jurnal,
			'bb' => $bb,
		];
		$this->db->where('id', $id);
		$this->db->update('role', $data);
		redirect('user/role');
	}

	public function delete_role($id)
	{
		$data = [
			'is_deleted' => 1
		];
		$this->db->where('id', $id);
		$this->db->update('role', $data);
		redirect('user/role');
	}
}
?>
