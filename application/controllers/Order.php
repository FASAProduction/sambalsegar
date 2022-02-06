<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pemesanan_model', 'pemesanan');
        $this->load->model('keranjang_model', 'keranjang');
        $this->load->library('user_agent');

        if($this->session->userdata('id_pelanggan') == NULL){
            redirect('home');
        }
    }

    public function index(){
        $data['title'] = 'Pemesanan';
        $data['record'] = $this->db->query("SELECT * FROM transaksi JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi");
        $data['total_cart'] = $this->keranjang->get()->num_rows();
        $data['n'] = 1;

        $this->load->view('order', $data);
    }

}