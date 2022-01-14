<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produsen extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('produsen_model', 'produsen');

        if($this->session->userdata('id_admin') == NULL){
            redirect('panel/auth');
        }
    }

    public function index(){
        $data['title'] = 'Data Produsen';
        $data['record'] = $this->produsen->get()->result_array();
        $data['n'] = 1;

        $this->load->view('panel/templates/header', $data);
        $this->load->view('panel/produsen/index');
        $this->load->view('panel/templates/footer');
    }

    public function add(){
        $data['title'] = 'Data Produsen';

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');

        if($this->form_validation->run() === false){
            $this->load->view('panel/templates/header', $data);
            $this->load->view('panel/produsen/add');
            $this->load->view('panel/templates/footer');
        }else{
            $this->produsen->insert();
            redirect('panel/produsen');
        }
    }

    public function edit($id_produsen = null){
        if($id_produsen == null){
            show_404();
        }

        $data['title'] = 'Data Produsen';
        $data['row'] = $this->produsen->get(['id_produsen' => $id_produsen])->row_array();

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');

        if($this->form_validation->run() === false){
            $this->load->view('panel/templates/header', $data);
            $this->load->view('panel/produsen/edit');
            $this->load->view('panel/templates/footer');
        }else{
            $this->produsen->update($id_produsen);
            redirect('panel/produsen');
        }
    }

    public function delete($id_produsen = null){
        if($id_produsen == null){
            show_404();
        }

        $this->produsen->delete($id_produsen);
        redirect('panel/produsen');
    }

}