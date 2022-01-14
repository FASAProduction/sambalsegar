<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tabel Data Pelanggan</h1>

    <a href="<?= base_url('panel/pelanggan/add'); ?>" class="btn btn-primary mb-4">
		<i class="fas fa-plus"></i> Tambah Baru
	</a>

	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
						    <th>#</th>
							<th>Nama Lengkap</th>
							<th>Jenis Kelamin</th>
							<th>Email</th>
							<th>Telepon</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($record as $row): ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= $row['nama_lengkap']; ?></td>
                            <td><?= $row['jenis_kelamin']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['telepon']; ?></td>
                            <td>
                                <a href="<?= base_url('panel/pelanggan/edit/' . $row['id_pelanggan']); ?>" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('panel/pelanggan/delete/' . $row['id_pelanggan']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus <?= $row['nama_lengkap']; ?>?')" class="btn btn-danger">
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