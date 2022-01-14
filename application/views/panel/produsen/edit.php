<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Produsen</h1>

    <a href="<?= base_url('panel/produsen'); ?>" class="btn btn-secondary mb-4">
		<i class="fas fa-chevron-left"></i>
		Kembali
	</a>

	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="row">
                <div class="col-md-6">
                    <form method="post">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" value="<?= $row['nama_lengkap']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" <?= ($row['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?= ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?= $row['tanggal_lahir']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" class="form-control" placeholder="Masukkan alamat" required><?= $row['alamat']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="text" name="email" class="form-control" placeholder="Masukkan email" value="<?= $row['email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon <span class="text-danger">*</span></label>
                            <input type="text" name="telepon" class="form-control" placeholder="Masukkan telepon" value="<?= $row['telepon']; ?>" required>
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