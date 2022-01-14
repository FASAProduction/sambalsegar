<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tabel Data Pemesanan</h1>

	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
						    <th>#</th>
							<th>Nama Pelanggan</th>
							<th>Tanggal</th>
							<th>Total Bayar</th>
							<th>Status Bayar</th>
							<th>Status Kirim</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($record as $row): ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= $row['nama_lengkap']; ?></td>
                            <td><?= $row['tanggal']; ?></td>
                            <td><?= $row['total']; ?></td>
                            <td>
								<?php if($row['status_bayar'] == 'Sudah Bayar'): ?>
									<span class="badge badge-primary">Sudah Bayar</span>
								<?php else: ?>
									<span class="badge badge-danger">Belum Bayar</span>
								<?php endif; ?>
							</td>
                            <td>
								<?php if($row['status_kirim'] == 'Dikemas'): ?>
									<span class="badge badge-info">Dikemas</span>
								<?php elseif($row['status_kirim'] == 'Dikirim'): ?>
									<span class="badge badge-primary">Dikirim</span>
								<?php else: ?>
									<span class="badge badge-success">Selesai</span>
								<?php endif; ?>
							</td>
                            <td>
                                <a href="<?= base_url('produsen/pemesanan/list/' . $row['id_transaksi']); ?>" class="btn btn-warning">
                                    <i class="fas fa-list"></i>
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