<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('laporan_model', 'laporan');

        if($this->session->userdata('id_admin') == NULL){
            redirect('panel/auth');
        }
    }

    public function index(){
        $data['title'] = 'Laporan Penjualan';

        $this->load->view('panel/templates/header', $data);
        $this->load->view('panel/laporan/index');
        $this->load->view('panel/templates/footer');
    }

    public function filter(){
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $data['title'] = "Hasil filter";
        $data['filter'] = $this->laporan->date_filter($awal,$akhir)->result();
        $data['filter_count'] = $this->laporan->date_filter($awal,$akhir)->num_rows();
        $data['n'] = 1;
        $data['aw'] = $awal;
        $data['akh'] = $akhir;
        $this->load->view('panel/templates/header', $data);
        $this->load->view('panel/laporan/filter', $data);
        $this->load->view('panel/templates/footer');
    }

}