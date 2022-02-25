<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
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
                    'status_login' => "masuk",
                ];

                $this->session->set_userdata($data);
                redirect('home');
                // echo "OK!";
            }else{
                $this->session->set_flashdata('done', '<div class="alert alert-danger"><b>GAGAL MASUK!</b> Cek kembali email dan password Anda.</div>');
                redirect('auth');
            }
        }else{
            redirect('auth');
        }
    }

    public function register(){
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        $nama_lengkap = $this->input->post('nama_lengkap');
        $alamat = $this->input->post('alamat');
        $telepon = $this->input->post('telepon');
        $this->pelanggan->add_cust($email,$password,$nama_lengkap,$alamat,$telepon);
        $this->session->set_flashdata('done', '<div class="alert alert-success"><b>BERHASIL BUAT AKUN!</b> Siahkan login dengan akun yang Anda buat.</div>');
        redirect('auth');
    }

    public function logout(){
        $this->session->unset_userdata('id_pelanggan');
        $this->session->unset_userdata('nama_lengkap');
        redirect('auth');
    }

}