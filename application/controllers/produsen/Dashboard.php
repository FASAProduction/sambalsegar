<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('produsen_model', 'produsen');
        $this->load->model('pelanggan_model', 'pelanggan');
        $this->load->model('produk_model', 'produk');

        if($this->session->userdata('id_produsen') == NULL){
            redirect('produsen/auth');
        }
    }

    public function index(){
        $data['title'] = 'Dashboard';
        // $data['n_produsen'] = $this->produsen->get()->num_rows();
        // $data['n_produk'] = $this->produk->get()->num_rows();
        // $data['n_pelanggan'] = $this->pelanggan->get()->num_rows();

        $this->load->view('produsen/templates/header', $data);
        $this->load->view('produsen/dashboard');
        $this->load->view('produsen/templates/footer');
    }

}