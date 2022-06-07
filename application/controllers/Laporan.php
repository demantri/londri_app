<?php 
class Laporan extends CI_Controller
{
    public function jurnal()
    {
        $this->template->load('template', 'laporan/jurnal');
    }
}
?>