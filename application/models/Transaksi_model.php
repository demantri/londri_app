<?php class Transaksi_model extends CI_Model
{
	public function fetch_data($val)
	{
		$q = "SELECT * FROM paket_londri WHERE deskripsi = '$val'";
		return $this->db->query($q);
	}
}
?>
