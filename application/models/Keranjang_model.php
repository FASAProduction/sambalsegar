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
	
	public function view_keranjang(){
		$pelang = $this->session->userdata('id_pelanggan');
		$a = $this->db->query("SELECT id_pelanggan, keranjang.id_produk as prod, qty, harga FROM keranjang
		JOIN produk ON produk.id_produk=keranjang.id_produk
		WHERE id_pelanggan='$pelang'");
		return $a;
	}
	
	public function lihat_keranjang(){
		$pelang = $this->session->userdata('id_pelanggan');
		$a = $this->db->query("SELECT * FROM keranjang
		JOIN produk ON produk.id_produk=keranjang.id_produk
		WHERE id_pelanggan='$pelang'");
		return $a;
	}
	
	public function order($dataa){
		return $this->db->insert_batch('transaksi',$dataa);
	}
	
	public function CreateCode(){
    $this->db->select('RIGHT(transaksi.kode_transaksi,4) as kode', FALSE);
    $this->db->order_by('kode','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('transaksi');
        if($query->num_rows() <> 0){      
             $data = $query->row();
             $kode = intval($data->kode) + 1; 
        }
        else{      
             $kode = 1;  
        }
    $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
    $kodetampil = "TR-SRN".$batas;
    return $kodetampil;  
}

public function more($kodetrans){
	$c = $this->db->query("SELECT nama_produk FROM transaksi
	JOIN produk
	ON produk.id_produk=transaksi.id_produk
	WHERE kode_transaksi='$kodetrans'");
	return $c;
}

public function more_kd($kodetrans){
	$x = $this->db->query("SELECT COUNT(kode_transaksi) as kod FROM transaksi WHERE kode_transaksi='$kodetrans'");
	return $x;
}
}