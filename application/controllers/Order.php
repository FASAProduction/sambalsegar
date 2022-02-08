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
        $pelanggan = $this->session->userdata('id_pelanggan');
        $data['record'] = $this->db->query("SELECT * FROM transaksi
        JOIN detail_transaksi
        ON transaksi.id_transaksi=detail_transaksi.id_transaksi
        JOIN produk
        ON produk.id_produk=detail_transaksi.id_produk
        WHERE id_pelanggan='$pelanggan' GROUP BY transaksi.id_transaksi")->result_array();
        $record = $this->db->query("SELECT * FROM transaksi
        JOIN detail_transaksi
        ON transaksi.id_transaksi=detail_transaksi.id_transaksi
        JOIN produk
        ON produk.id_produk=detail_transaksi.id_produk
        WHERE id_pelanggan='$pelanggan' GROUP BY transaksi.id_transaksi")->result();
        foreach($record as $cow){
            $trans = $cow->id_transaksi;
        }
        $data['count_prod'] = $this->db->query("SELECT COUNT(produk.id_produk) as htg FROM produk
        JOIN detail_transaksi ON detail_transaksi.id_produk=produk.id_produk
        WHERE id_transaksi='$trans'")->result();
        $data['det_prod'] = $this->db->query("SELECT * FROM produk
        JOIN detail_transaksi ON detail_transaksi.id_produk=produk.id_produk
        WHERE id_transaksi='$trans'")->result();
        $data['total_cart'] = $this->keranjang->get()->num_rows();
        $data['n'] = 1;

        $this->load->view('order', $data);
    }

}