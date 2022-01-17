<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_model extends CI_Model {

    public function get($where = null){
        if($where != null){
            $this->db->where($where);
        }

        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=transaksi.id_pelanggan');
        return $this->db->get('transaksi');
    }

    public function list($id_transaksi){
        $this->db->join('transaksi', 'transaksi.id_transaksi=detail_transaksi.id_transaksi');
        $this->db->join('produk', 'produk.id_produk=detail_transaksi.id_produk');
        $this->db->where(['detail_transaksi.id_transaksi' => $id_transaksi]);
        return $this->db->get('detail_transaksi');
    }

    public function update($id_transaksi, $data){
        $this->db->update('transaksi', $data, ['id_transaksi' => $id_transaksi]);
    }

    public function insert_transaksi($data){
        $this->db->insert('transaksi', $data);
    }

    public function insert_detail_transaksi($data){
        $this->db->insert('detail_transaksi', $data);
    }

    function date_filter($awal, $akhir){
        $w = $this->db->query("SELECT * FROM transaksi
        JOIN detail_transaksi
        ON transaksi.id_transaksi=detail_transaksi.id_transaksi
        JOIN pelanggan
        ON pelanggan.id_pelanggan=transaksi.id_pelanggan
        WHERE tanggal BETWEEN '$awal' AND '$akhir'");
        return $w;
    }

}