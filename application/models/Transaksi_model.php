<?php class Transaksi_model extends CI_Model
{
	public function invoice()
    {
        $query1   = "SELECT MAX(RIGHT(invoice,3)) as kode FROM transaksi WHERE status <> 'proses detail'";
        $abc      = $this->db->query($query1);
        $kode = "";
        if ($abc->num_rows() > 0) {
            foreach ($abc->result() as $k) {
                $tmp = ((int) $k->kode) + 1;
                $kd  = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
		$date = date('Ymd');
        $kode   = "INV".$date.$kd;
        return $kode;
    }

	public function fetch_data($val)
	{
		$q = "SELECT * FROM paket_londri WHERE deskripsi = '$val'";
		return $this->db->query($q);
	}

	public function fetch_member($value = '')
	{
		if ($value == 1) {
			// member 
			$this->db->where('member_id <>', '');
			$data = $this->db->get('pelanggan')->result();
			$output = '';
			foreach ($data as $row) {
				$output .= '<option value="'.$row->nama.'">'.$row->nama.'</option>';
			}
		} else {
			$this->db->where('member_id =', '');
			$data = $this->db->get('pelanggan')->result();
			$output = '';
			foreach ($data as $row) {
				$output .= '<option value="'.$row->nama.'">'.$row->nama.'</option>';
			}
		}
		return $output;
	}

	public function list_pembayaran()
	{
		$q = "SELECT b.*, a.pelanggan, a.tgl_transaksi
		FROM transaksi a
		JOIN pembayaran b ON a.invoice = b.no_invoice
		WHERE status_pembayaran = 'belum lunas'
		ORDER BY no_invoice DESC ";
		return $this->db->query($q);
	}
}
?>
