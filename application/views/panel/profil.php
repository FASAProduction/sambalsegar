<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profil</h1>

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
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="text" name="email" class="form-control" placeholder="Masukkan email" value="<?= $row['email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon <span class="text-danger">*</span></label>
                            <input type="text" name="telepon" class="form-control" placeholder="Masukkan telepon" value="<?= $row['telepon']; ?>" required>
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