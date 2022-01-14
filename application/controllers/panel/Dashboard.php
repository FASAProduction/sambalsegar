<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        $this->load->model('pelanggan_model', 'pelanggan');
        $this->load->model('produk_model', 'produk');

        if($this->session->userdata('id_admin') == NULL){
            redirect('panel/auth');
        }
    }

    public function index(){
        $data['title'] = 'Dashboard';
        $data['n_admin'] = $this->admin->get()->num_rows();
        $data['n_produk'] = $this->produk->get()->num_rows();
        $data['n_pelanggan'] = $this->pelanggan->get()->num_rows();

        $this->load->view('panel/templates/header', $data);
        $this->load->view('panel/dashboard');
        $this->load->view('panel/templates/footer');
    }

}