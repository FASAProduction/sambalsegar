<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Order extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pemesanan_model', 'pemesanan');
        $this->load->model('keranjang_model', 'keranjang');
        $this->load->library('user_agent');
		$this->load->helper('rupiah_helper');
		$this->load->helper('tanggal_helper');
		$this->load->helper('terbilang_helper');

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
	
	public function detail($code){
		$d['title'] = "Pembayaran Transaksi " . $code . " - Sambal Resep Njenot";
		$d['code'] = $code;
		$d['detail'] = $this->pemesanan->details($code)->result();
		$d['total_cart'] = $this->keranjang->get()->num_rows();
		$this->load->view('pay', $d);
	}
	
	public function process_payment(){
		$kode_transaksi = $this->input->post('kode_transaksi', TRUE);
		$payment_method = $this->input->post('payment_method', TRUE);
		$paymento = $this->input->post('paymento');
		$config['upload_path']          = 'assets/img/payment';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['payment']            	= $paymento;
		$config['overwrite']            = true;
		$config['max_size']             = 6024; // 1MB
		$config['max_width']            = 800;
		$config['max_height']           = 700;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('payment')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			$b = array('payment' => $this->upload->data());
			$bpay = $b['payment']['file_name'];
			$this->pemesanan->pay($kode_transaksi,$payment_method,$bpay);
		}

	redirect('order');
	}

}