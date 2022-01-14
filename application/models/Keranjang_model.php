<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang_model extends CI_Model {

    public function get($where = null){
        if($where != null){
            $this->db->where($where);
        }

        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=keranjang.id_pelanggan');
        $this->db->join('produk', 'produk.id_produk=keranjang.id_produk');
        return $this->db->get('keranjang');
    }

    public function insert($id_produk, $harga){
        $data = [
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
            'id_produk' => $id_produk,
            'qty' => 1,
            'harga' => $harga,
        ];

        $this->db->insert('keranjang', $data);
    }

    public function delete($id_produk){
        $where = [
            'id_produk' => $id_produk,
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
        ];
        $this->db->delete('keranjang', $where);
    }

}