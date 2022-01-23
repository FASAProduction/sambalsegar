<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Thismonthpdf extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('print_pdf');
    }

	function index()
	{
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
        
        $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Courier','B',16);
        $pdf->Cell(0,7,'SAMBAL RESEP NJENOT',0,1,'C');
        $pdf->Cell(0,7,'LAPORAN PENJUALAN BULAN INI (' .$bulan. ' ' . $tahun_ini . ')',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Courier','B',10);

        $pdf->Cell(8,6,'No',1,0,'C');
        $pdf->Cell(60,6,'Nama Barang',1,0,'C');
        $pdf->Cell(20,6,'Qty',1,0,'C');
        $pdf->Cell(40,6,'Pelanggan',1,0,'C');
        $pdf->Cell(35,6,'Subtotal',1,0,'C');
        $pdf->Cell(35,6,'Total',1,1,'C');

        $pdf->SetFont('Courier','',10);
        $barang = $this->db->query("SELECT * FROM transaksi 
        JOIN detail_transaksi 
        ON transaksi.id_transaksi=detail_transaksi.id_transaksi
        JOIN pelanggan
        ON pelanggan.id_pelanggan=transaksi.id_pelanggan
        JOIN produk
        ON produk.id_produk=detail_transaksi.id_produk
        WHERE MONTH(tanggal) = '$bulan_ini'")->result();
        $no=1;
        foreach ($barang as $data){
            $pdf->Cell(8,6,$no,1,0);
            $pdf->Cell(60,6,$data->nama_produk,1,0);
            $pdf->Cell(20,6,$data->qty,1,0);
            $pdf->Cell(40,6,$data->nama_lengkap,1,0);
            $pdf->Cell(35,6,"Rp ".number_format($data->subtotal, 0, ".", "."),1,0);
            $pdf->Cell(35,6,"Rp ".number_format($data->total, 0, ".", "."),1,1);
            $no++;
        }
        $pdf->Output('Laporan_Bulan_'.$bulan.'_'.$tahun_ini.'.pdf','I');
	}

    function download()
	{
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
        
        $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Courier','B',16);
        $pdf->Cell(0,7,'SAMBAL RESEP NJENOT',0,1,'C');
        $pdf->Cell(0,7,'LAPORAN PENJUALAN BULAN INI (' .$bulan. ' ' . $tahun_ini . ')',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Courier','B',10);

        $pdf->Cell(8,6,'No',1,0,'C');
        $pdf->Cell(60,6,'Nama Barang',1,0,'C');
        $pdf->Cell(20,6,'Qty',1,0,'C');
        $pdf->Cell(40,6,'Pelanggan',1,0,'C');
        $pdf->Cell(35,6,'Subtotal',1,0,'C');
        $pdf->Cell(35,6,'Total',1,1,'C');

        $pdf->SetFont('Courier','',10);
        $barang = $this->db->query("SELECT * FROM transaksi 
        JOIN detail_transaksi 
        ON transaksi.id_transaksi=detail_transaksi.id_transaksi
        JOIN pelanggan
        ON pelanggan.id_pelanggan=transaksi.id_pelanggan
        JOIN produk
        ON produk.id_produk=detail_transaksi.id_produk
        WHERE MONTH(tanggal) = '$bulan_ini'")->result();
        $no=1;
        foreach ($barang as $data){
            $pdf->Cell(8,6,$no,1,0);
            $pdf->Cell(60,6,$data->nama_produk,1,0);
            $pdf->Cell(20,6,$data->qty,1,0);
            $pdf->Cell(40,6,$data->nama_lengkap,1,0);
            $pdf->Cell(35,6,"Rp ".number_format($data->subtotal, 0, ".", "."),1,0);
            $pdf->Cell(35,6,"Rp ".number_format($data->total, 0, ".", "."),1,1);
            $no++;
        }
        $pdf->Output('Laporan_SRN_Bulan_'.$bulan.'_'.$tahun_ini.'.pdf','D');
	}
}

?>