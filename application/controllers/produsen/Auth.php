<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('produsen_model', 'produsen');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->form_validation->run() === FALSE){
            $this->load->view('produsen/login');
        }else{
            $this->login();
        }
    }

    private function login(){
        $email = $this->input->post('email', TRUE);
        $password = sha1($this->input->post('password', TRUE));
        $produsen = $this->produsen->get(['email' => $email])->row_array();

        if($produsen){
            if($password == $produsen['password']){
                $data = [
                    'id_produsen' => $produsen['id_produsen'],
                    'nama_lengkap' => $produsen['nama_lengkap'],
                ];

                $this->session->set_userdata($data);
                redirect('produsen/dashboard');
                // echo "OK!";
            }else{
                redirect('produsen/auth');
            }
        }else{
            redirect('produsen/auth');
        }
    }

    public function logout(){
        $this->session->unset_userdata('id_produsen');
        $this->session->unset_userdata('nama_lengkap');
        redirect('produsen/auth');
    }

}