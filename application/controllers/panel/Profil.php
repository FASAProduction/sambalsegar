<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        $this->load->library('form_validation');

        if($this->session->userdata('id_admin') == NULL){
            redirect('panel/auth');
        }
    }

    public function index(){
        $data['title'] = 'Profil';
        $data['row'] = $this->admin->get(['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');

        if($this->form_validation->run() === FALSE){
            $this->load->view('panel/templates/header', $data);
            $this->load->view('panel/profil');
            $this->load->view('panel/templates/footer');
        }else{
            $this->admin->update($this->session->userdata('id_admin'));
            redirect('panel/profil');
        }
    }

}