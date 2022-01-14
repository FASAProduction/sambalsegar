<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pemesanan_model', 'pemesanan');
        $this->load->model('keranjang_model', 'keranjang');

        if($this->session->userdata('id_pelanggan') == NULL){
            redirect('home');
        }
    }

    public function index(){
        $data['title'] = 'Pemesanan';
        $data['record'] = $this->pemesanan->get(['transaksi.id_pelanggan' => $this->session->userdata('id_pelanggan')])->result_array();
        $data['total_cart'] = $this->keranjang->get()->num_rows();
        $data['n'] = 1;

        $this->load->view('order', $data);
    }

}