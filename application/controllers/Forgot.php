<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pelanggan_model', 'pelanggan');
        $this->load->model('keranjang_model', 'keranjang');
    }

    public function index(){
        $data['title'] = "Lupa Password";
        $data['total_cart'] = $this->keranjang->get()->num_rows();
        $this->load->view('forgot', $data);
    }

    public function change(){
        $data['title'] = "Lupa Password";
        $email = $this->input->post('email');
        $data['mail'] = $this->pelanggan->forgot($email)->result();
        $data['mail_count'] = $this->pelanggan->forgot($email)->num_rows();
        $data['total_cart'] = $this->keranjang->get()->num_rows();
        $this->load->view('change', $data);
    }

    public function success(){
        $data['title'] = "Lupa Password";
        $id_pelanggan = $this->input->post('id_pelanggan');
        $password = sha1($this->input->post('password'));
        $this->pelanggan->change($id_pelanggan,$password);
        $data['total_cart'] = $this->keranjang->get()->num_rows();
        redirect('success');
    }


}