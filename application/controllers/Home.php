<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('produk_model', 'produk');
        $this->load->model('keranjang_model', 'keranjang');
        $this->load->library('user_agent');
    }

    public function index(){
        $data['record'] = $this->produk->get()->result_array();
        $data['total_cart'] = $this->keranjang->get()->num_rows();
        $this->load->view('home', $data);
    }

}