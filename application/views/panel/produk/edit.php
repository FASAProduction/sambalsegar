<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Pelanggan</h1>

    <a href="<?= base_url('panel/produk'); ?>" class="btn btn-secondary mb-4">
		<i class="fas fa-chevron-left"></i>
		Kembali
	</a>

	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="row">
                <div class="col-md-6">
                    <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                            <label for="nama_produk">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama produk" value="<?= $row['nama_produk']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="deskripsi" class="form-control" placeholder="Masukkan deskripsi" required><?= $row['deskripsi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok <span class="text-danger">*</span></label>
                            <input type="number" name="stok" class="form-control" placeholder="Masukkan stok" value="<?= $row['stok']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga <span class="text-danger">*</span></label>
                            <input type="number" name="harga" class="form-control" placeholder="Masukkan harga" value="<?= $row['harga']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Edit
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