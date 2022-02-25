<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Cart extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('keranjang_model', 'keranjang');
        $this->load->model('produk_model', 'produk');
        $this->load->model('pemesanan_model', 'pemesanan');
        $this->load->helper('string');
        $this->load->helper('rupiah_helper');
		$this->load->library('user_agent');

        if($this->session->userdata('id_pelanggan') == NULL){
            redirect('home');
        }
    }

    public function index(){
        $data['no'] = 1;
		$data['record'] = $this->keranjang->lihat_keranjang()->result_array();
		$data['total_cart'] = $this->keranjang->lihat_keranjang()->num_rows();
        $this->load->view('cart', $data);
    }
	
	public function qty(){
		$qty = $this->input->post('qty');
		$id_cart = $this->input->post('id_keranjang');
		$this->db->query("UPDATE keranjang SET qty='$qty' WHERE id_keranjang='$id_cart'");
		redirect('cart');
	}
	
	public function add($id_produk){
		$pel = $this->session->userdata('id_pelanggan');
		$prd = $this->db->query("SELECT * FROM produk WHERE id_produk='$id_produk'")->result_array();
		$qtyy = "1";
		foreach($prd as $pr){
		$prodd = $pr['harga'];
		}
		$this->db->query("INSERT INTO keranjang (id_pelanggan,id_produk,qty)
		VALUES ('$pel','$id_produk','$qtyy')");
		redirect('cart');
	}
	
	public function checkout(){
		$pelang = $this->session->userdata('id_pelanggan');
		$resi = $this->keranjang->view_keranjang()->result_array();
		$acak = $this->keranjang->CreateCode();
		$tgl = date('Y-m-d');
		$dataa = array();
		
		$index = 0;
		foreach($resi as $da){
			$produk = $da['prod'];
			$qty = $da['qty'];
			$harga = $da['harga'];
			array_push($dataa, array(
			'kode_transaksi' => $acak,
			'id_pelanggan' => $pelang,
			'id_produk' => $produk,
			'qty' => $qty,
			'tanggal' => $tgl,
			'total' => $harga * $qty,
			'status_bayar' => "Belum Bayar",
			'status_kirim' => "Dikemas",
			));
		
			$index++;
		
		}
		
		$this->db->insert_batch('transaksi',$dataa);
		$this->db->query("DELETE FROM keranjang WHERE id_pelanggan='$pelang'");
		redirect('order');
	}
 

}