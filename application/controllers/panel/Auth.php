<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->form_validation->run() === FALSE){
            $this->load->view('panel/login');
        }else{
            $this->login();
        }
    }

    private function login(){
        $email = $this->input->post('email', TRUE);
        $password = sha1($this->input->post('password', TRUE));
        $admin = $this->admin->get(['email' => $email])->row_array();

        if($admin){
            if($password == $admin['password']){
                $data = [
                    'id_admin' => $admin['id_admin'],
                    'nama_lengkap' => $admin['nama_lengkap'],
                ];

                $this->session->set_userdata($data);
                redirect('panel/dashboard');
            }else{
                redirect('panel/auth');
            }
        }else{
            redirect('panel/auth');
        }
    }

    public function logout(){
        $this->session->unset_userdata('id_admin');
        $this->session->unset_userdata('nama_lengkap');
        redirect('panel/auth');
    }

}