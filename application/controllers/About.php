<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('keranjang_model', 'keranjang');
    }

    public function index(){
        $data['total_cart'] = $this->keranjang->get()->num_rows();
        $this->load->view('about', $data);
    }

}