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
                            <th>Kode Transaksi</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total Bayar</th>
                            <th>Status Bayar</th>
                            <th>Status Kirim</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($record as $row):
                            $kt = $row['kode_transaksi'];
                            $d = $this->db->query("SELECT SUM(total) as totala FROM transaksi WHERE kode_transaksi='$kt'")->result_array();
                        ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?php echo $kt; ?></td>
                            <td><?= $row['nama_lengkap']; ?></td>
                            <td><?= $row['tanggal']; ?></td>
                            <?php
                            foreach($d as $s):
                            ?>
                            <td><?= rupiah($s['totala']); ?></td>
                            <?php endforeach; ?>
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
                                <?php if($row['status_bayar'] == 'Belum Bayar'): ?>
                                <a href="<?= base_url('panel/pemesanan/paid/' . $row['kode_transaksi']); ?>"
                                    class="btn btn-primary"
                                    onclick="return confirm('Ubah status bayar menjadi sudah bayar?')">
                                    <i class="fas fa-money-bill-wave"></i>
                                </a>
                                <?php else: ?>
                                <a href="<?php echo base_url('panel/laporan/faktur/'); ?><?php echo $kt; ?>"
                                    class="btn btn-primary">
                                    <i class="fas fa-receipt"></i>
                                </a>
                                <?php endif; ?>

                                <?php if($row['status_kirim'] == 'Dikemas'): ?>
                                <a href="<?= base_url('panel/pemesanan/send/' . $row['kode_transaksi']); ?>"
                                    class="btn btn-info" onclick="return confirm('Ubah status kirim menjadi dikirim?')">
                                    <i class="fas fa-truck"></i>
                                </a>
                                <?php elseif($row['status_kirim'] == 'Dikirim'): ?>
                                <a href="<?= base_url('panel/pemesanan/done/' . $row['kode_transaksi']); ?>"
                                    class="btn btn-primary"
                                    onclick="return confirm('Ubah status kirim menjadi selesai?')">
                                    <i class="fas fa-check-double"></i>
                                </a>
                                <?php else: ?>
                                <a href="#!" class="btn btn-success">
                                    <i class="fas fa-check-circle"></i>
                                </a>
                                <?php endif; ?>

                                <a href="<?= base_url('panel/pemesanan/list/' . $row['kode_transaksi']); ?>"
                                    class="btn btn-warning">
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