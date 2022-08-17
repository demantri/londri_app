<?php 
class Parfum extends CI_Controller
{
    public function index()
    {
        $list = $this->db->get('parfum')->result();
        $data = [
            'list' => $list
        ];
		$this->template->load('layout/index', 'londri/parfum/index', $data);
    }

    public function saveParfum()
    {
        $nama_parfum = $this->input->post('nama_parfum');
        $deskripsi = $this->input->post('deskripsi');
        $harga_parfum = $this->input->post('harga_parfum');

        $data = [
            'nama_parfum' => $nama_parfum,
            'deskripsi' => $deskripsi,
            'harga_parfum' => $harga_parfum,
        ];
        $this->db->insert('parfum', $data);
		redirect('londri/list-parfum');
    }
}
