<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin_model', 'admin');

        if($this->session->userdata('id_admin') == NULL){
            redirect('panel/auth');
        }
    }

    public function index(){
        $data['title'] = 'Data Admin';
        $data['record'] = $this->admin->get()->result_array();
        $data['n'] = 1;

        $this->load->view('panel/templates/header', $data);
        $this->load->view('panel/admin/index');
        $this->load->view('panel/templates/footer');
    }

    public function add(){
        $data['title'] = 'Data Admin';

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');

        if($this->form_validation->run() === false){
            $this->load->view('panel/templates/header', $data);
            $this->load->view('panel/admin/add');
            $this->load->view('panel/templates/footer');
        }else{
            $this->admin->insert();
            redirect('panel/admin');
        }
    }

    public function edit($id_admin = null){
        if($id_admin == null){
            show_404();
        }

        $data['title'] = 'Data Admin';
        $data['row'] = $this->admin->get(['id_admin' => $id_admin])->row_array();

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');

        if($this->form_validation->run() === false){
            $this->load->view('panel/templates/header', $data);
            $this->load->view('panel/admin/edit');
            $this->load->view('panel/templates/footer');
        }else{
            $this->admin->update($id_admin);
            redirect('panel/admin');
        }
    }

    public function delete($id_admin = null){
        if($id_admin == null){
            show_404();
        }

        $this->admin->delete($id_admin);
        redirect('panel/admin');
    }

}