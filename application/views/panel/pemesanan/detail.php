<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tabel Data Pemesanan</h1>

    <a href="<?= base_url('panel/pemesanan'); ?>" class="btn btn-secondary mb-4">
        <i class="fas fa-chevron-left"></i> Kembali
    </a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    Nama Pelanggan : <?= $pemesanan['nama_lengkap']; ?><br>
                    Tanggal : <?= $pemesanan['tanggal']; ?><br>
                    Total Bayar : <?= $pemesanan['total']; ?><br>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($record as $row): ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= $row['nama_produk']; ?></td>
                            <td><?= $row['qty']; ?></td>
                            <td><?= $row['subtotal']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->