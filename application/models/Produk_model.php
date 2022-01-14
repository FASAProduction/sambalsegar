<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function get($where = null){
        $this->db->join('produsen', 'produsen.id_produsen=produk.id_produsen');

        if($where != null){
            $this->db->where($where);
        }

        return $this->db->get('produk');
    }

    public function insert(){
        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'deskripsi' => $this->input->post('deskripsi'),
            'stok' => $this->input->post('stok'),
            'harga' => $this->input->post('harga'),
            'gambar' => $this->_upload(),
        ];

        if($this->session->userdata('id_produsen')){
            $data['id_produsen'] = $this->session->userdata('id_produsen');
        }

        $this->db->insert('produk', $data);
    }

    public function update($id_produk){
        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'deskripsi' => $this->input->post('deskripsi'),
            'stok' => $this->input->post('stok'),
            'harga' => $this->input->post('harga'),
        ];

        if($this->session->userdata('id_produsen')){
            $data['id_produsen'] = $this->session->userdata('id_produsen');
        }

        if(!empty($_FILES['gambar']['name'])){
            $data['gambar'] = $this->_upload();
        }

        $this->db->update('produk', $data, ['id_produk' => $id_produk]);
    }

    public function delete($id_produk){
        $this->_delete($id_produk);
        $this->db->delete('produk', ['id_produk' => $id_produk]);
    }

    private function _upload(){
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'jpg|jpeg';
        $config['file_name'] = random_string('alnum', 10);
        $config['overwrite'] = true;
        $config['max_size'] = 1024;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('gambar')){
            return $this->upload->data('file_name');
        }

        return 'default.jpg';
    }

    private function _delete($id_produk){
        $produk = $this->get(['id_produk' => $id_produk])->row_array();
        if($produk['gambar'] != 'default.jpg'){
            $filename = explode('.', $produk['gambar'])[0];
            return array_map('unlink', glob(FCPATH."upload/$filename.*"));
        }
    }

}