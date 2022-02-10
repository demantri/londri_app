<?php class Transaksi extends CI_Controller
{
	public function index()
	{
		$this->template->load('layout/index', 'transaksi/index');
	}

	public function add()
	{
		$invoice = $this->Transaksi_model->invoice();
		$parfum = $this->db->get('parfum')->result();
		$paket = $this->db->get('paket_londri')->result();

		$details = $this->db->get('detail_transaksi')->result();

		$this->db->where('invoice', $invoice);
		$cek_detail = $this->db->get('detail_transaksi')->row();

		// total
		$grandtotal = $this->db->query("SELECT SUM(subtotal) as grandtotal FROM detail_transaksi WHERE invoice = '$invoice' ")->row()->grandtotal;

		$data = [
			// 'pelanggan' => $pelanggan,
			'kode' => $invoice,
			'parfum' => $parfum,
			'paket' => $paket,
			'details' => $details,
			'cek_detail' => $cek_detail,
			'grandtotal' => $grandtotal,
		];
		$this->template->load('layout/index', 'transaksi/add', $data);
	}

	public function bayar()
	{
		$invoice = $this->input->post('invoice');
		$status_member = $this->input->post('status_member');
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$pembayaran = $this->input->post('pembayaran');
		$pmb_kredit = $this->input->post('pmb_kredit');
		$grandtotal = $this->input->post('grandtotal');

		$selisih = '';
		if ($pembayaran == 'tunai') {
			$selisih = 0;
			$nominal = $grandtotal;
			$status_pembayaran = 'lunas';
		} else {
			$selisih = $pmb_kredit - $grandtotal;
			$nominal = $pmb_kredit;
			$status_pembayaran = 'belum lunas';
		}

		$data = [
			'no_invoice' => $invoice, 
			'nominal' => $nominal, 
			'selisih' => $selisih, 
			'diskon' => 0, 
			'total_pembayaran' => $grandtotal, 
			'metode_pembayaran' => $pembayaran, 
			'status_pembayaran' => $status_pembayaran, 
		];

	}

	public function pk_l()
	{
		$val = $this->input->post('val');
		if ($val) {
			$data = $this->Transaksi_model->fetch_data($val)->row();
		}
		echo json_encode($data);
	}

	public function cek_member()
	{
		$value = $this->input->post('value');
		if ($value) {
			echo $this->Transaksi_model->fetch_member($value);
		}
	}

	public function add_detail()
	{
		$invoice = $this->input->post('invoice');
		$tgl_transaksi = $this->input->post('tgl_transaksi');
		$parfum = $this->input->post('parfum');
		$paket_londri = $this->input->post('paket_londri');
		$harga_paket = $this->input->post('harga_paket');
		$berat = $this->input->post('berat');
		$total = $this->input->post('total');

		// cek detail
		// $this->db->where('invoice', $invoice);
        // $this->db->where('id_produk', $produk->kode);
        // $cek = $this->db->get('pos_detail_penjualan')->row();

		$data = [
			'invoice' => $invoice,
			'tgl_transaksi' => $tgl_transaksi,
			'status' => 'proses detail',
		];
		// print_r($data);exit;
		$this->db->insert('transaksi', $data);

		$detail = [
			'invoice' => $invoice,
			'parfum' => $parfum,
			'paket' => $paket_londri,
			'harga_perkilo' => $harga_paket,
			'berat' => $berat,
			'subtotal' => $total,
			'status_londri' => 'transaksi baru',
		];
		// print_r($detail);exit;
		$this->db->insert('detail_transaksi', $detail);

		redirect('transaksi/add');

	}
}
?>
