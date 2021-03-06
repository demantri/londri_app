<?php class Transaksi extends CI_Controller
{
	function __construct() {
        parent::__construct();
        if (!$this->session->userdata('status')) {
            redirect('login');
        }
    }
	
	public function index()
	{
		$this->db->order_by('tgl_transaksi', 'desc');
		$list = $this->db->get('transaksi')->result();
		$data = [
			'list' => $list,
		];
		$this->template->load('layout/index', 'transaksi/index', $data);
	}

	public function add()
	{
		$invoice = $this->Transaksi_model->invoice();
		$parfum = $this->db->get('parfum')->result();
		$paket = $this->db->get('paket_londri')->result();

		$this->db->where('invoice', $invoice);
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
			$status_transaksi = 'telah melakukan pembayaran';

			/** update ke jurnal */
			$this->Laporan_model->GenerateJurnal($invoice, "transaksi londri", date('Y-m-d'), 'd', $grandtotal, 111);
			$this->Laporan_model->GenerateJurnal($invoice, "transaksi londri", date('Y-m-d'), 'k', $grandtotal, 411);
		} else {
			$selisih = $pmb_kredit - $grandtotal;
			$nominal = $pmb_kredit;
			$status_pembayaran = 'belum lunas';
			$status_transaksi = 'belum melakukan pembayaran';
		}

		// tabel pembayaran
		$data = [
			'no_invoice' => $invoice, 
			'nominal' => $nominal, 
			'selisih' => $selisih, 
			'diskon' => 0, 
			'total_pembayaran' => $grandtotal, 
			'metode_pembayaran' => $pembayaran, 
			'status_pembayaran' => $status_pembayaran, 
		];
		$this->db->insert('pembayaran', $data);

		// tabel transaksi
		$trans = [
			'pelanggan' => $nama_pelanggan,
			'total' => $grandtotal,
			'status' => $status_transaksi,
		];
		$this->db->where('invoice', $invoice);
		$this->db->update('transaksi', $trans);

		redirect('transaksi');
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

		$this->db->where('status', 'proses detail');
        $cek_trans = $this->db->get('transaksi')->num_rows();

		if ($cek_trans == 0) {
			# code...
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
				'status_londri' => 'dalam proses',
			];
			// print_r($detail);exit;
			$this->db->insert('detail_transaksi', $detail);
		} else {
			# code...
			$detail = [
				'invoice' => $invoice,
				'parfum' => $parfum,
				'paket' => $paket_londri,
				'harga_perkilo' => $harga_paket,
				'berat' => $berat,
				'subtotal' => $total,
				'status_londri' => 'dalam proses',
			];
			// print_r($detail);exit;
			$this->db->insert('detail_transaksi', $detail);
		}

		redirect('transaksi/add');

	}

	public function pembayaran()
	{
		$list = $this->Transaksi_model->list_pembayaran()->result();
		$data = [
			'list' => $list,
		];
		$this->template->load('layout/index', 'transaksi/pembayaran/index', $data);
	}

	public function pembayaran_kredit()
	{
		$invoice = $this->input->post('invoice');
		$nominal = $this->input->post('nominal');
		$selisih = $this->input->post('selisih');
		$kembalian = $this->input->post('kembalian');
		$total_pembayaran = $this->input->post('total_pembayaran');

		$this->db->where('no_invoice', $invoice);
		$last_nominal_invoice = $this->db->get('pembayaran')->row()->nominal;

		$data = [
			'nominal' => $nominal + $last_nominal_invoice,
			'kembalian' => $kembalian,
			'status_pembayaran' => 'lunas'
		];
		$this->db->where('no_invoice', $invoice);
		$this->db->update('pembayaran', $data);

		$trans = [
			'status' => 'telah melakukan pembayaran',
		];
		$this->db->where('invoice', $invoice);
		$this->db->update('transaksi', $trans);

		redirect('transaksi/pembayaran');
	}
}
?>
