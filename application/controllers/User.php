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

	public function hak_akses()
	{
		$role = $this->db->get('role')->result();
		$data = [
			'role' => $role,
		];
		$this->template->load('layout/index', 'user/hak_akses/index', $data);
	}

	public function update_role()
	{
		$check[] = $this->input->post('checkbox');
		$create = $this->input->post('asd');
		print_r($create);exit;
	}
}
?>
