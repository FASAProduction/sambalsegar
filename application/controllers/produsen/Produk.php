<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('produk_model', 'produk');

        if($this->session->userdata('id_produsen') == NULL){
            redirect('produsen/auth');
        }
    }

    public function index(){
        $data['title'] = 'Data Produk';
        $data['record'] = $this->produk->get()->result_array();
        $data['n'] = 1;

        $this->load->view('produsen/templates/header', $data);
        $this->load->view('produsen/produk/index');
        $this->load->view('produsen/templates/footer');
    }

    public function add(){
        $data['title'] = 'Data Produk';

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');

        if($this->form_validation->run() === false){
            $this->load->view('produsen/templates/header', $data);
            $this->load->view('produsen/produk/add');
            $this->load->view('produsen/templates/footer');
        }else{
            $this->produk->insert();
            redirect('produsen/produk');
        }
    }

    public function edit($id_produk = null){
        if($id_produk == null){
            show_404();
        }

        $data['title'] = 'Data Produk';
        $data['row'] = $this->produk->get(['id_produk' => $id_produk])->row_array();

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');

        if($this->form_validation->run() === false){
            $this->load->view('produsen/templates/header', $data);
            $this->load->view('produsen/produk/edit');
            $this->load->view('produsen/templates/footer');
        }else{
            $this->produk->update($id_produk);
            redirect('produsen/produk');
        }
    }

    public function delete($id_produk = null){
        if($id_produk == null){
            show_404();
        }

        $this->produk->delete($id_produk);
        redirect('produsen/produk');
    }

}