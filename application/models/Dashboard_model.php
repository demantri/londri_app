<?php class Dashboard_model extends CI_Model
{
	public function pendapatan()
	{
		$month = date('Y-m');
		$q = "SELECT SUM(total) AS total
		FROM transaksi 
		WHERE STATUS LIKE '%telah%'
		AND LEFT(tgl_transaksi, 7) = '$month'";
		return $this->db->query($q);
	}

	public function total_transaksi()
	{
		$month = date('Y-m');
		$q = "SELECT count(invoice) AS total_transaksi
		FROM transaksi";
		return $this->db->query($q);
	}

	public function transaksi_baru()
	{
		$today = date('Y-m-d');
		$q = "SELECT count(invoice) AS transaksi_baru
		FROM transaksi
		WHERE tgl_transaksi = '$today'
		";
		return $this->db->query($q);
	}

	public function member_baru()
	{
		$today = date('Y-m-d');
		$q = "SELECT count(member_id) AS member_baru
		FROM member
		WHERE LEFT(join_date, 10) = '$today'
		";
		return $this->db->query($q);
	}

	public function best_parfum()
	{
		$q = "SELECT a.*, COUNT(b.parfum) AS total, c.tgl_transaksi
		FROM parfum a
		LEFT JOIN detail_transaksi b ON a.nama_parfum = b.parfum
		LEFT JOIN transaksi c ON b.invoice = c.invoice
		-- WHERE LEFT(tgl_transaksi, 7) = left(SYSDATE(), 7)
		GROUP BY nama_parfum
		ORDER BY total DESC  
		";
		return $this->db->query($q);
	}
}
?>
