<?php
foreach($all as $al):
$kd = $al->kode_transaksi;
$p = $this->db->query("SELECT * FROM pelanggan JOIN transaksi ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE kode_transaksi='$kd' GROUP BY kode_transaksi")->result();
$pr = $this->db->query("SELECT * FROM produk JOIN transaksi ON transaksi.id_produk=produk.id_produk WHERE kode_transaksi='$kd'")->result();
$ad = $this->db->query("SELECT * FROM admin JOIN transaksi ON transaksi.id_admin=admin.id_admin WHERE kode_transaksi='$kd' GROUP BY kode_transaksi")->result();
$to = $this->db->query("SELECT SUM(total) as totally FROM transaksi WHERE kode_transaksi='$kd'")->result();
?>
<html>

<head>
    <title><?php echo $title; ?></title>
    <style>
    #tabel {
        font-size: 15px;
        border-collapse: collapse;
    }

    #tabel td {
        padding-left: 5px;
        border: 1px solid black;
    }
    </style>
</head>

<body style='font-family:tahoma; font-size:18pt;' width="100%" onload="print()">
    <center>
        <table style='width:100%; font-size:11pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:15pt'><b>Sambal Resep Njenot</b></span></br>
                Jln. Laksa Adisucipto Km. 7,5
                <br />
                Desa Santan Gang No. 09 No Rumah 69C, Maguoharjo, Depok, Sleman
                <br />
                info@resepnjenot.com
                <br />
                0852 5749 5886
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                <b><span style='font-size:15pt'>FAKTUR PENJUALAN</span></b></br>
                No Trans. : <?php echo $al->kode_transaksi; ?></br>
                Tanggal :<?php echo format_indo($al->tanggal); ?></br>
            </td>
        </table>
        <hr />
        <table style='width:100%; font-size:12pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                <?php
foreach($p as $pel):
?>
                Nama Pelanggan : <?php echo $pel->nama_lengkap; ?></br>
                Alamat : <?php echo $pel->alamat; ?>
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                No Telp : <?php echo $pel->telepon; ?>
            </td>
            <?php endforeach; ?>
        </table>
        <table cellspacing='0' style='width:100%; font-size:11pt; font-family:calibri;  border-collapse: collapse;'
            border='1'>

            <tr align="center">
                <td width='70%'><b>Nama Produk</b></td>
                <td width='13%'><b>Harga</b></td>
                <td width='4%'><b>Qty</b></td>
                <td width='33%'><b>Total Harga</b></td>
                <?php foreach($pr as $prod):
$total = $prod->harga * $prod->qty; 
?>
            <tr>
                <td><?php echo $prod->nama_produk; ?></td>
                <td style='text-align:center'><?php echo rupiah($prod->harga); ?></td>
                <td style='text-align:center'><?php echo $prod->qty; ?></td>
                <td style='text-align:right'><?php echo rupiah($total); ?></td>
            </tr>
            <?php endforeach; ?>
            <?php foreach($to as $tota): ?>
            <tr>
                <td colspan='3'>
                    <div style='text-align:right'>Total Yang Harus Di Bayar Adalah : </div>
                </td>
                <td style='text-align:right'><?php echo rupiah($tota->totally); ?></td>
            </tr>
            <tr>
                <td colspan='4'>
                    <div style='text-align:right'>Terbilang : <b><?php echo penyebut($tota->totally); ?> Rupiah</b>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan='3'>
                    <div style='text-align:right'>Cash : </div>
                </td>
                <td style='text-align:right'><?php echo rupiah($tota->totally); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br />
        <br />
        <table style='width:100%; font-size:11pt;' cellspacing='2'>
            <tr>
                <?php
$admin = $al->id_admin;
if($admin == "0"){
?>
                <td align='center'>Diterima Oleh,</br></br><u>(<b>Unknown</b>)</u></td>
                <?php }else{
 foreach($ad as $adm):
 ?>
                <td align='center'>Diterima Oleh,</br></br><u>(<b><?php echo $adm->nama_lengkap; ?></b>)</u></td>
                <?php
endforeach;
}
?>
                <td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td>
                <td align='center'>TTD,</br></br><u>(...........)</u></td>
            </tr>
        </table>
        <br />
        <br />
    </center>
    <i
        class="fa fa-scissors"></i>------------------------------------------------------------------------------------------------------
    <script src="https://use.fontawesome.com/bb21722b54.js"></script>
</body>

</html>
<?php endforeach; ?>