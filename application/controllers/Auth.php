<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('pelanggan_model', 'pelanggan');
        $this->load->model('keranjang_model', 'keranjang');
    }

    public function index(){
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if($this->form_validation->run() === FALSE){
            $data['total_cart'] = $this->keranjang->get()->num_rows();
            $this->load->view('signin', $data);
        }else{
            $this->login();
        }
    }

    private function login(){
        $email = $this->input->post('email', TRUE);
        $password = sha1($this->input->post('password', TRUE));
        $pelanggan = $this->pelanggan->get(['email' => $email])->row_array();

        if($pelanggan){
            if($password == $pelanggan['password']){
                $data = [
                    'id_pelanggan' => $pelanggan['id_pelanggan'],
                    'nama_lengkap' => $pelanggan['nama_lengkap'],
                ];

                $this->session->set_userdata($data);
                redirect('home');
                // echo "OK!";
            }else{
                redirect('auth');
            }
        }else{
            redirect('auth');
        }
    }

    public function logout(){
        $this->session->unset_userdata('id_pelanggan');
        $this->session->unset_userdata('nama_lengkap');
        redirect('auth');
    }

}