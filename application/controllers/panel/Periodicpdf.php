<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Periodicpdf extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('print_pdf');
    }

	function index()
	{
        $awal = $this->input->get('from');
        $akhir = $this->input->get('to');
        
        $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'LAPORAN DARI TANGGAL '$awal' HINGGA TANGGAL '$akhir',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(8,6,'No',1,0,'C');
        $pdf->Cell(60,6,'Nama Barang',1,0,'C');
        $pdf->Cell(40,6,'Nama Lengkap',1,0,'C');
        $pdf->Cell(35,6,'Subtotal',1,0,'C');
        $pdf->Cell(35,6,'Total',1,1,'C');

        $pdf->SetFont('Arial','',10);
        $barang = $this->db->query("SELECT * FROM transaksi 
        JOIN detail_transaksi 
        ON transaksi.id_transaksi=detail_transaksi.id_transaksi
        JOIN pelanggan
        ON pelanggan.id_pelanggan=transaksi.id_pelanggan
        JOIN produk
        ON produk.id_produk=detail_transaksi.id_produk
        WHERE tanggal BETWEEN '$awal' AND '$akhir'")->result();
        $no=1;
        foreach ($barang as $data){
            $pdf->Cell(8,6,$no,1,0);
            $pdf->Cell(60,6,$data->nama_produk,1,0);
            $pdf->Cell(40,6,$data->nama_lengkap,1,0);
            $pdf->Cell(35,6,"Rp ".number_format($data->subtotal, 0, ".", "."),1,0);
            $pdf->Cell(35,6,"Rp ".number_format($data->total, 0, ".", "."),1,1);
            $no++;
        }
        $pdf->Output();
	}
}