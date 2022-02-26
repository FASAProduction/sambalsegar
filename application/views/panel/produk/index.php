<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tabel Data Produk</h1>
    <?php echo $this->session->flashdata('yey'); ?>
    <a href="<?= base_url('panel/produk/add'); ?>" class="btn btn-primary mb-4">
        <i class="fas fa-plus"></i> Tambah Baru
    </a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($record as $row): ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= $row['nama_produk']; ?></td>
                            <td><?= $row['stok']; ?></td>
                            <td>Rp.<?= number_format($row['harga'], 2, ",", "."); ?></td>
                            <td>
                                <img src="<?= base_url('upload/' . $row['gambar']); ?>" class="img-fluid img-thumbnail"
                                    width="150">
                            </td>
                            <td>
                                <a href="<?= base_url('panel/produk/edit/' . $row['id_produk']); ?>"
                                    class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('panel/produk/delete/' . $row['id_produk']); ?>"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus <?= $row['nama_produk']; ?>?')"
                                    class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->