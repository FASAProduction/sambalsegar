<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Produk</h1>

    <a href="<?= base_url('panel/produk'); ?>" class="btn btn-secondary mb-4">
        <i class="fas fa-chevron-left"></i>
        Kembali
    </a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="<?php echo base_url('produk/add_process'); ?>"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="nama_produk" class="form-control"
                                placeholder="Masukkan nama produk" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="deskripsi" class="form-control" placeholder="Masukkan deskripsi"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok <span class="text-danger">*</span></label>
                            <input type="number" name="stok" class="form-control" placeholder="Masukkan stok" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga <span class="text-danger">*</span></label>
                            <input type="number" name="harga" class="form-control" placeholder="Masukkan harga"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-danger">
                            <i class="fas fa-sync-alt"></i> Reset
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->