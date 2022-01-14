<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pemesanan_model', 'pemesanan');

        if($this->session->userdata('id_admin') == NULL){
            redirect('panel/auth');
        }
    }

    public function index(){
        $data['title'] = 'Pemesanan';
        $data['record'] = $this->pemesanan->get()->result_array();
        $data['n'] = 1;

        $this->load->view('panel/templates/header', $data);
        $this->load->view('panel/pemesanan/index');
        $this->load->view('panel/templates/footer');
    }

    public function list($id_transaksi = null){
        if($id_transaksi == null){
            show_404();
        }

        $data['title'] = 'Pemesanan';
        $data['pemesanan'] = $this->pemesanan->get(['id_transaksi' => $id_transaksi])->row_array();
        $data['record'] = $this->pemesanan->list($id_transaksi)->result_array();
        $data['n'] = 1;

        $this->load->view('panel/templates/header', $data);
        $this->load->view('panel/pemesanan/detail');
        $this->load->view('panel/templates/footer');
    }

    public function paid($id_transaksi = null){
        if($id_transaksi == null){
            show_404();
        }

        $this->pemesanan->update($id_transaksi, ['status_bayar' => 'Sudah Bayar']);
        redirect('panel/pemesanan');
    }

    public function send($id_transaksi = null){
        if($id_transaksi == null){
            show_404();
        }

        $this->pemesanan->update($id_transaksi, ['status_kirim' => 'Dikirim']);
        redirect('panel/pemesanan');
    }

    public function done($id_transaksi = null){
        if($id_transaksi == null){
            show_404();
        }

        $this->pemesanan->update($id_transaksi, ['status_kirim' => 'Selesai']);
        redirect('panel/pemesanan');
    }

}