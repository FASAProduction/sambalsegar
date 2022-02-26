<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tabel Data Pemesanan</h1>

    <a href="<?= base_url('panel/pemesanan'); ?>" class="btn btn-secondary mb-4">
        <i class="fas fa-chevron-left"></i> Kembali
    </a>
    <?php
    $ktr = $pemesanan['kode_transaksi'];
    $f = $this->db->query("SELECT SUM(total) as totall FROM transaksi WHERE kode_transaksi='$ktr'")->row_array();
    $record = $this->db->query("SELECT * FROM transaksi JOIN produk ON produk.id_produk=transaksi.id_produk WHERE kode_transaksi='$ktr'")->result_array();
    $gbr = $this->db->query("SELECT * FROM transaksi WHERE kode_transaksi='$ktr' GROUP BY kode_transaksi")->result();
    ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    Nama Pelanggan : <?= $pemesanan['nama_lengkap']; ?><br>
                    Tanggal : <?= $pemesanan['tanggal']; ?><br>
                    Total Bayar : <?= rupiah($f['totall']); ?><br>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1; 
                        foreach($record as $row):
                        $stotal = $row['harga'] * $row['qty'];
                            ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= $row['nama_produk']; ?></td>
                            <td><?= rupiah($row['harga']); ?></td>
                            <td><?= $row['qty']; ?></td>
                            <td><?= rupiah($stotal); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br />
                <br />
                <h4>Bukti Bayar</h4>
                <br />
                <?php
                foreach($gbr as $pic):
                ?>
                <img src="<?php echo base_url(); ?>assets/img/payment/<?php echo $pic->payment; ?>" width="30%" />
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->