<?php 
class Member extends CI_Controller
{

    public function index()
    {
        $list = $this->Member_model->getList()->result();
        $data = [
            'list' => $list
        ];
        $this->template->load('layout/index', 'member/index', $data);
    }

    public function daftar_member()
    {
        $id = $this->input->post('id');
        $jenis_member = $this->input->post('jenis_member');
        if ($jenis_member == 1) {
            $point = 2;
        } else {
            $point = 100;
        }
        $rand_member_id = rand(0, 1000000);

        /** insert ke tb_member */
        $insertMember = [
            'id_detail' => $jenis_member, 
            'member_id' => $rand_member_id,
            'point' => $point,
        ];
        $this->db->insert('member', $insertMember);

        /** update pelanggan */
        $tbPelanggan = [
            'member_id' => $rand_member_id,
        ];
        $this->db->where('id', $id);
        $this->db->update('pelanggan', $tbPelanggan);

        redirect('pelanggan');
    }
}
?>