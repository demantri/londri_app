<?php class Transaksi_model extends CI_Model
{
	public function fetch_data($val)
	{
		$q = "SELECT * FROM paket_londri WHERE deskripsi = '$val'";
		return $this->db->query($q);
	}

	public function fetch_member($value = '')
	{
		// $this->db->where('is_deactive', 0);
		// $this->db->where('status_kredit', 0);
		$data = $this->db->get('pelanggan')->result();

		$output = '';
		foreach ($data as $row) {
			$output .= '<option value="'.$row->nama.'">'.$row->nama.'</option>';
		}
		return $output;
	}
}
?>
