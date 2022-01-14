<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Password</h1>

	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="row">
                <div class="col-md-6">
                    <form method="post">
                        <div class="form-group">
                            <label for="password_lama">Password Lama <span class="text-danger">*</span></label>
                            <input type="password" name="password_lama" class="form-control" placeholder="Masukkan password lama">
                        </div>
                        <div class="form-group">
                            <label for="password_baru">Password Baru <span class="text-danger">*</span></label>
                            <input type="password" name="password_baru" class="form-control" placeholder="Masukkan password baru">
                        </div>
                        <div class="form-group">
                            <label for="konf_password_baru">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                            <input type="password" name="konf_password_baru" class="form-control" placeholder="Ulangi password baru">
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