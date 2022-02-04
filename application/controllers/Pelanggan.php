<?php class Pelanggan extends CI_Controller
{
	public function index()
	{
		$this->template->load('layout/index', 'pelanggan/index');
	}
}
?>
