<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pemesanan_model', 'pemesanan');
        $this->load->model('keranjang_model', 'keranjang');
        $this->load->library('user_agent');
		$this->load->helper('rupiah_helper');

        if($this->session->userdata('id_pelanggan') == NULL){
            redirect('home');
        }
    }

    public function index(){
        $data['title'] = 'Pemesanan - Sambal Resep Njenot';
        $pelanggan = $this->session->userdata('id_pelanggan');
        $data['record'] = $this->db->query("SELECT * FROM transaksi
		JOIN produk
		ON produk.id_produk=transaksi.id_produk WHERE id_pelanggan='$pelanggan' GROUP BY kode_transaksi")->result_array();
        $data['total_cart'] = $this->keranjang->get()->num_rows();
        $data['n'] = 1;

        $this->load->view('order', $data);
    }
	
	public function pay($code){
		$d['title'] = "Pembayaran Transaksi " . $code . " - Sambal Resep Njenot";
		$d['code'] = $code;
		$d['detail'] = $this->pemesanan->details($code)->result();
		$d['total_cart'] = $this->keranjang->get()->num_rows();
		$this->load->view('pay', $d);
	}

}