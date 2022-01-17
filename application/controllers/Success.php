<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Success extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pelanggan_model', 'pelanggan');
        $this->load->model('keranjang_model', 'keranjang');
    }

    public function index(){
        $data['title'] = "Berhasil";
        $data['total_cart'] = $this->keranjang->get()->num_rows();
        $this->load->view('success', $data);
    }


}