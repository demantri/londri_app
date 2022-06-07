<?php 
class Laporan_model extends CI_Model
{
    public function GenerateJurnal($invoice, $keterangan, $tgljurnal, $posisidc, $nominal, $nocoa)
    {
        $data = [
            'invoice' => $invoice,
            'keterangan' => $keterangan,
            'tgl_jurnal' => $tgljurnal,
            'posisi_d_c' => $posisidc,
            'nominal' => $nominal,
            'no_coa' => $nocoa,
        ];
        return $this->db->insert("jurnal", $data);
    }  
}
?>
