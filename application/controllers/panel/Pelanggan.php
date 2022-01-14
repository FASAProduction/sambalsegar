<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('pelanggan_model', 'pelanggan');

        if($this->session->userdata('id_admin') == NULL){
            redirect('panel/auth');
        }
    }

    public function index(){
        $data['title'] = 'Data Pelanggan';
        $data['record'] = $this->pelanggan->get()->result_array();
        $data['n'] = 1;

        $this->load->view('panel/templates/header', $data);
        $this->load->view('panel/pelanggan/index');
        $this->load->view('panel/templates/footer');
    }

    public function add(){
        $data['title'] = 'Data Pelanggan';

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');

        if($this->form_validation->run() === false){
            $this->load->view('panel/templates/header', $data);
            $this->load->view('panel/pelanggan/add');
            $this->load->view('panel/templates/footer');
        }else{
            $this->pelanggan->insert();
            redirect('panel/pelanggan');
        }
    }

    public function edit($id_pelanggan = null){
        if($id_pelanggan == null){
            show_404();
        }

        $data['title'] = 'Data Pelanggan';
        $data['row'] = $this->pelanggan->get(['id_pelanggan' => $id_pelanggan])->row_array();

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');

        if($this->form_validation->run() === false){
            $this->load->view('panel/templates/header', $data);
            $this->load->view('panel/pelanggan/edit');
            $this->load->view('panel/templates/footer');
        }else{
            $this->pelanggan->update($id_pelanggan);
            redirect('panel/pelanggan');
        }
    }

    public function delete($id_pelanggan = null){
        if($id_pelanggan == null){
            show_404();
        }

        $this->pelanggan->delete($id_pelanggan);
        redirect('panel/pelanggan');
    }

}