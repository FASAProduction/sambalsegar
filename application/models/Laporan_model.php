<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    function date_filter($awal, $akhir){
        $w = $this->db->query("SELECT * FROM transaksi
        JOIN produk
        ON produk.id_produk=transaksi.id_produk
        JOIN pelanggan
        ON pelanggan.id_pelanggan=transaksi.id_pelanggan
        WHERE tanggal BETWEEN '$awal' AND '$akhir' AND status_kirim='Selesai' GROUP BY kode_transaksi");
        return $w;
    }

}