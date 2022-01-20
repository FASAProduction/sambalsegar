<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    function date_filter($awal, $akhir){
        $w = $this->db->query("SELECT * FROM transaksi
        JOIN detail_transaksi
        ON transaksi.id_transaksi=detail_transaksi.id_transaksi
        JOIN pelanggan
        ON pelanggan.id_pelanggan=transaksi.id_pelanggan
        WHERE tanggal BETWEEN '$awal' AND '$akhir' AND status_kirim='Selesai'");
        return $w;
    }

}