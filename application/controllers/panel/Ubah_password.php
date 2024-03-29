<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_password extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        $this->load->library('form_validation');

        if($this->session->userdata('id_admin') == NULL){
            redirect('panel/auth');
        }
    }

    public function index(){
        $data['title'] = 'Ubah Password';

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim');
        $this->form_validation->set_rules('konf_password_baru', 'Konfirmasi Password Baru', 'required|trim');

        if($this->form_validation->run() === FALSE){
            $this->load->view('panel/templates/header', $data);
            $this->load->view('panel/ubah_password');
            $this->load->view('panel/templates/footer');
        }else{
            $row = $this->admin->get(['id_admin' => $this->session->userdata('id_admin')])->row_array();

            if($row['password'] == sha1($this->input->post('password_lama'))){
                if($this->input->post('password_baru') == $this->input->post('konf_password_baru')){
                    $this->admin->change_password($this->session->userdata('id_admin'));
                    redirect('panel/auth/logout');
                }else{
                    echo 'Konfirmasi password tidak sama!';
                }
            }else{
                echo 'Password lama salah!';
            }

        }
    }

}