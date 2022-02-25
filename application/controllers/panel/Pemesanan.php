<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pemesanan_model', 'pemesanan');
        $this->load->helper('rupiah_helper');

        if($this->session->userdata('id_admin') == NULL){
            redirect('panel/auth');
        }
    }

    public function index(){
        $data['title'] = 'Pemesanan';
        $data['record'] = $this->db->query("SELECT * FROM transaksi JOIN produk ON produk.id_produk=transaksi.id_produk JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan GROUP BY kode_transaksi")->result_array();
        $data['n'] = 1;

        $this->load->view('panel/templates/header', $data);
        $this->load->view('panel/pemesanan/index');
        $this->load->view('panel/templates/footer');
    }

    public function list($kode_transaksi){
        $a['title'] = "Detail Pemesanan";
        $a['pemesanan'] = $this->db->query("SELECT * FROM transaksi JOIN produk ON produk.id_produk=transaksi.id_produk JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan WHERE kode_transaksi='$kode_transaksi' GROUP BY kode_transaksi")->row_array();
        $this->load->view('panel/templates/header', $a);
        $this->load->view('panel/pemesanan/detail');
        $this->load->view('panel/templates/footer');
    }

    public function paid($kode_transaksi){
        $adm = $this->session->userdata('id_admin');
        $paid = "Sudah Bayar";
        $this->db->query("UPDATE transaksi SET status_bayar='$paid', id_admin='$adm' WHERE kode_transaksi='$kode_transaksi'");
        redirect('panel/pemesanan');
    }

    public function send($kode_transaksi){
        $adm = $this->session->userdata('id_admin');
        $send = "Dikirim";
        $this->db->query("UPDATE transaksi SET status_kirim='$send', id_admin='$adm' WHERE kode_transaksi='$kode_transaksi'");
        redirect('panel/pemesanan');
    }

    public function done($kode_transaksi){
        $adm = $this->session->userdata('id_admin');
        $done = "Selesai";
        $this->db->query("UPDATE transaksi SET status_kirim='$done', id_admin='$adm' WHERE kode_transaksi='$kode_transaksi'");
        redirect('panel/pemesanan');
    }

}