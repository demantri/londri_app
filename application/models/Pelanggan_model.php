<?php class Pelanggan_model extends CI_Model
{
	public function get_pelanggan()
	{
		$q = "SELECT a.*, b.point, b.join_date, c.deskripsi AS jenis_member, c.min_poin
		FROM pelanggan a
		LEFT JOIN member b ON a.member_id = b.member_id
		LEFT JOIN member_detail c ON b.id_detail = c.id
		WHERE is_deleted = 0
		";
		return $this->db->query($q);
	}
}
?>
