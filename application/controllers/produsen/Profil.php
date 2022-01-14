<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('produsen_model', 'produsen');
        $this->load->library('form_validation');

        if($this->session->userdata('id_produsen') == NULL){
            redirect('produsen/auth');
        }
    }

    public function index(){
        $data['title'] = 'Profil';
        $data['row'] = $this->produsen->get(['id_produsen' => $this->session->userdata('id_produsen')])->row_array();

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');

        if($this->form_validation->run() === FALSE){
            $this->load->view('produsen/templates/header', $data);
            $this->load->view('produsen/profil');
            $this->load->view('produsen/templates/footer');
        }else{
            $this->produsen->update($this->session->userdata('id_produsen'));
            redirect('produsen/profil');
        }
    }

}