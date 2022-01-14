<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pemesanan_model', 'pemesanan');

        if($this->session->userdata('id_produsen') == NULL){
            redirect('produsen/auth');
        }
    }

    public function index(){
        $data['title'] = 'Pemesanan';
        $data['record'] = $this->pemesanan->get()->result_array();
        $data['n'] = 1;

        $this->load->view('produsen/templates/header', $data);
        $this->load->view('produsen/pemesanan/index');
        $this->load->view('produsen/templates/footer');
    }

    public function list($id_transaksi = null){
        if($id_transaksi == null){
            show_404();
        }

        $data['title'] = 'Pemesanan';
        $data['pemesanan'] = $this->pemesanan->get(['id_transaksi' => $id_transaksi])->row_array();
        $data['record'] = $this->pemesanan->list($id_transaksi)->result_array();
        $data['n'] = 1;

        $this->load->view('produsen/templates/header', $data);
        $this->load->view('produsen/pemesanan/detail');
        $this->load->view('produsen/templates/footer');
    }

    public function paid($id_transaksi = null){
        if($id_transaksi == null){
            show_404();
        }

        $this->pemesanan->update($id_transaksi, ['status_bayar' => 'Sudah Bayar']);
        redirect('produsen/pemesanan');
    }

    public function send($id_transaksi = null){
        if($id_transaksi == null){
            show_404();
        }

        $this->pemesanan->update($id_transaksi, ['status_kirim' => 'Dikirim']);
        redirect('produsen/pemesanan');
    }

    public function done($id_transaksi = null){
        if($id_transaksi == null){
            show_404();
        }

        $this->pemesanan->update($id_transaksi, ['status_kirim' => 'Selesai']);
        redirect('produsen/pemesanan');
    }

}