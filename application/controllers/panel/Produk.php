<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('produk_model', 'produk');

        if($this->session->userdata('id_admin') == NULL){
            redirect('panel/auth');
        }
    }

    public function index(){
        $data['title'] = 'Data Produk';
        $data['record'] = $this->produk->get()->result_array();
        $data['n'] = 1;

        $this->load->view('panel/templates/header', $data);
        $this->load->view('panel/produk/index');
        $this->load->view('panel/templates/footer');
    }

    public function add(){
        $data['title'] = 'Data Produk';
        $this->load->view('panel/templates/header', $data);
        $this->load->view('panel/produk/add');
        $this->load->view('panel/templates/footer');
    }

    public function add_process(){
        $adm = $this->session->userdata('id_admin');
        $id_admin = $adm;
        $nama_produk = $this->input->post('nama_produk');
        $deskripsi = $this->input->post('deskripsi');
        $stok = $this->input->post('stok');
        $harga = $this->input->post('harga');
        $config['upload_path']          = 'assets/img/products';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['gambar']            	= $nama_produk;
		$config['overwrite']            = true;
		$config['max_size']             = 6024; // 1MB
		$config['max_width']            = 800;
		$config['max_height']           = 700;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			$b = array('gambar' => $this->upload->data());
			$bpic = $b['gambar']['file_name'];
			$this->produk->add($id_admin,$nama_produk,$deskripsi,$stok,$harga,$bpic);
            $this->session->set_flashdata('yey', '<div class="alert alert-success">Berhasil!</div>');
		}

        redirect('panel/produk');
    }

    public function edit($id_produk = null){
        if($id_produk == null){
            show_404();
        }

        $data['title'] = 'Data Produk';
        $data['row'] = $this->produk->get(['id_produk' => $id_produk])->row_array();

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');

        if($this->form_validation->run() === false){
            $this->load->view('panel/templates/header', $data);
            $this->load->view('panel/produk/edit');
            $this->load->view('panel/templates/footer');
        }else{
            $this->produk->update($id_produk);
            redirect('panel/produk');
        }
    }

    public function delete($id_produk = null){
        if($id_produk == null){
            show_404();
        }

        $this->produk->delete($id_produk);
        redirect('panel/produk');
    }

}