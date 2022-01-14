<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pelanggan_model', 'pelanggan');
        $this->load->model('keranjang_model', 'keranjang');
        $this->load->library('form_validation');

        if($this->session->userdata('id_pelanggan') == NULL){
            redirect('home');
        }
    }

    public function index(){
        $data['title'] = 'Profil';
        $data['row'] = $this->pelanggan->get(['id_pelanggan' => $this->session->userdata('id_pelanggan')])->row_array();
        $data['total_cart'] = $this->keranjang->get()->num_rows();

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');

        if($this->form_validation->run() === FALSE){
            $this->load->view('profile', $data);
        }else{
            $this->pelanggan->update($this->session->userdata('id_pelanggan'));
            redirect('profile');
        }
    }

}