<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('keranjang_model', 'keranjang');
        $this->load->model('produk_model', 'produk');
        $this->load->model('pemesanan_model', 'pemesanan');
        $this->load->helper('string');
		$this->load->library('user_agent');

        if($this->session->userdata('id_pelanggan') == NULL){
            redirect('home');
        }
    }

    public function index(){
        $data['no'] = 1;
        $data['record'] = $this->keranjang->get(['keranjang.id_pelanggan' => $this->session->userdata('id_pelanggan')])->result_array();
        $data['total_cart'] = $this->keranjang->get()->num_rows();
        $this->load->view('cart', $data);
    }

    public function add($id_produk = NULL){
        if($id_produk == NULL){
            show_404();
        }

        $produk = $this->produk->get(['id_produk' => $id_produk])->row_array();
        $this->keranjang->insert($produk['id_produk'], $produk['harga']);
        return redirect('cart');
    }

    public function delete($id_produk = NULL){
        if($id_produk == NULL){
            show_404();
        }

        $this->keranjang->delete($id_produk);
        return redirect('cart');
    }

    public function checkout(){
        $record = $this->keranjang->get(['keranjang.id_pelanggan' => $this->session->userdata('id_pelanggan')])->result_array();
        
        $total = 0;
        foreach($record as $row){
            $sum = $row['harga'] * $row['qty'];
            $total += $sum;
        }

        $id_transaksi = random_string('alnum', 10);

        $data = [
            'id_transaksi' => $id_transaksi,
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
            'tanggal' => date('Y-m-d'),
            'total' => $total,
            'status_bayar' => 'Belum Bayar',
            'status_kirim' => 'Dikemas',
        ];
        $this->pemesanan->insert_transaksi($data);

        // var_dump($data);
        // echo '<br><br>';

        foreach($record as $row){
            $sum = $row['harga'] * $row['qty'];
            // echo $id_transaksi . ' | ' . $row['id_produk'] . ' | ' . $row['qty'] . ' | ' . $row['harga'] . ' | ' . $sum . '<br>';
            $data = [
                'id_transaksi' => $id_transaksi,
                'id_produk' => $row['id_produk'],
                'qty' => $row['qty'],
                'subtotal' => $sum,
            ];
            $this->pemesanan->insert_detail_transaksi($data);
            $this->keranjang->delete($row['id_produk']);
        }

        return redirect('order');
    }

}