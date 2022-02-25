<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('laporan_model', 'laporan');
		$this->load->helper('rupiah_helper');
		$this->load->helper('terbilang_helper');
		$this->load->helper('tanggal_helper');

        if($this->session->userdata('id_admin') == NULL){
            redirect('panel/auth');
        }
    }

    public function index(){
        $data['title'] = 'Laporan Penjualan';

        $this->load->view('panel/templates/header', $data);
        $this->load->view('panel/laporan/index');
        $this->load->view('panel/templates/footer');
    }

    public function filter(){
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $data['title'] = "Hasil filter";
        $data['filter'] = $this->laporan->date_filter($awal,$akhir)->result();
        $data['filter_count'] = $this->laporan->date_filter($awal,$akhir)->num_rows();
        $data['n'] = 1;
        $data['aw'] = $awal;
        $data['akh'] = $akhir;
        $this->load->view('panel/templates/header', $data);
        $this->load->view('panel/laporan/filter', $data);
        $this->load->view('panel/templates/footer');
    }
	
	public function faktur($code){
		$d['title'] = "Faktur Penjualan " . $code;
		$d['all'] = $this->db->query("SELECT * FROM produk JOIN transaksi ON transaksi.id_produk=produk.id_produk WHERE kode_transaksi='$code' GROUP BY kode_transaksi")->result();
		$this->load->view('panel/laporan/faktur', $d);
	}
	
	public function fakturperiodic(){
        $from = $this->input->get('from');
        $to = $this->input->get('to');
		$d['title'] = "Faktur Penjualan dari tanggal " . $from . "-" . $to;
		$d['afaktur'] = $this->db->query("SELECT * FROM produk JOIN transaksi ON transaksi.id_produk=produk.id_produk WHERE tanggal BETWEEN '$from' AND '$to' AND status_kirim='Selesai' GROUP BY kode_transaksi")->result();
		$this->load->view('panel/laporan/all_faktur', $d);
	}

    public function fakturmonth(){
        $bulan_ini = date('m');
        $tahun_ini = date('Y');

        if($bulan_ini == '01'){
            $bulan = "Januari";
        }else if($bulan_ini == '02'){
            $bulan = "Februari";
        }else if($bulan_ini == '03'){
            $bulan = "Maret";
        }else if($bulan_ini == '04'){
            $bulan = "April";
        }else if($bulan_ini == '05'){
            $bulan = "Mei";
        }else if($bulan_ini == '06'){
            $bulan = "Juni";
        }else if($bulan_ini == '07'){
            $bulan = "Juli";
        }else if($bulan_ini == '08'){
            $bulan = "Agustus";
        }else if($bulan_ini == '09'){
            $bulan = "September";
        }else if($bulan_ini == '10'){
            $bulan = "Oktober";
        }else if($bulan_ini == '11'){
            $bulan = "November";
        }else{
            $bulan = "Desember";
        }
		$d['title'] = "Faktur Penjualan Bulan " . $bulan . "-" . $tahun_ini;
		$d['afaktur'] = $this->db->query("SELECT * FROM produk JOIN transaksi ON transaksi.id_produk=produk.id_produk WHERE MONTH(tanggal) = '$bulan_ini' AND status_kirim='Selesai' GROUP BY kode_transaksi")->result();
		$this->load->view('panel/laporan/all_faktur', $d);
	}

}