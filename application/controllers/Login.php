<?php class Login extends CI_Controller
{
	public function index()
	{
		$this->load->view('layout/new_login');
	}

	public function doLogin()
	{
		$username = $this->input->post('username');
		$pass = $this->input->post('pass');
		// print_r($pass);exit;
		$where = [
			'username' => $username,
			'password' => md5($pass),
		];
		$cek = $this->Login_model->cek_login('user', $where)->num_rows();
		if ($cek > 0) {
			$data_sess = [
				'username' => $username, 
				'status' => 'login'
			];
			$this->session->set_userdata($data_sess);
			redirect(base_url('dashboard'));
		} else {
			# code...
			echo 'Username atau password salah!';
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
?>
