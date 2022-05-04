<?php class Member_model extends CI_Model
{
    public function daftar($table, $id, $member_id)
    {
        $q = "UPDATE $table
        SET member_id = '$member_id'
        WHERE id = '$id'";
        return $this->db->query($q);
    }

    public function getList()
    {
        return $this->db->query("SELECT a.*, b.point, b.join_date, c.deskripsi, c.min_poin
        FROM pelanggan a 
        LEFT JOIN member b ON a.member_id = b.member_id
        LEFT JOIN member_detail c ON c.id = b.id_detail
        ORDER BY join_date DESC");
    }
}
