<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Filter pencarian dari tanggal <?php echo $aw; ?> sampai tanggal
        <?php echo $akh; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Filter berdasarkan tanggal</h4>
                    <form action="<?php echo base_url('panel/pemesanan/filter'); ?>" method="POST">
                        <div class="form-group">
                            <label>Dari tanggal</label>
                            <input type="date" name="awal" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Sampai tanggal</label>
                            <input type="date" name="akhir" class="form-control" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Filter</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4>Filter untuk bulan ini</h4>
                    <form <?php echo base_url('panel/pemesanan/filter_this_month'); ?> method="POST">
                        <div class="form-group">
                            <label>Dari tanggal</label>
                            <input type="date" name="awal" class="form-control" value="<?php echo date('Y-m'); ?>-01"
                                readonly />
                        </div>
                        <div class="form-group">
                            <label>Sampai tanggal</label>
                            <input type="date" name="akhir" class="form-control" value="<?php echo date('Y-m'); ?>-31"
                                readonly />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Filter</button>
                        </div>
                    </form>

                </div>
                <div class="col-md-12">
                    <a href="<?php echo base_url('panel/periodicpdf'); ?>?from=<?php echo $aw; ?>&&to=<?php echo $akh; ?>"
                        class="btn btn-info btn-block">Download
                        Excel</a>
                </div>
            </div>
            <br />
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
                        <?php foreach($filter as $rowa): ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= $rowa->nama_lengkap; ?></td>
                            <td><?= $rowa->tanggal; ?></td>
                            <td><?= $rowa->total; ?></td>
                            <td>
                                <?php if($rowa->status_bayar == 'Sudah Bayar'): ?>
                                <span class="badge badge-primary">Sudah Bayar</span>
                                <?php else: ?>
                                <span class="badge badge-danger">Belum Bayar</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($rowa->status_kirim == 'Dikemas'): ?>
                                <span class="badge badge-info">Dikemas</span>
                                <?php elseif($rowa->status_kirim == 'Dikirim'): ?>
                                <span class="badge badge-primary">Dikirim</span>
                                <?php else: ?>
                                <span class="badge badge-success">Selesai</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($rowa->status_bayar == 'Belum Bayar'): ?>
                                <a href="<?= base_url('panel/pemesanan/paid/' . $rowa->id_transaksi); ?>"
                                    class="btn btn-primary"
                                    onclick="return confirm('Ubah status bayar menjadi sudah bayar?')">
                                    <i class="fas fa-money-bill-wave"></i>
                                </a>
                                <?php else: ?>
                                <a href="#!" class="btn btn-primary">
                                    <i class="fas fa-receipt"></i>
                                </a>
                                <?php endif; ?>

                                <?php if($rowa->status_kirim == 'Dikemas'): ?>
                                <a href="<?= base_url('panel/pemesanan/send/' . $rowa->id_transaksi); ?>"
                                    class="btn btn-info" onclick="return confirm('Ubah status kirim menjadi dikirim?')">
                                    <i class="fas fa-truck"></i>
                                </a>
                                <?php elseif($rowa->status_kirim == 'Dikirim'): ?>
                                <a href="<?= base_url('panel/pemesanan/done/' . $rowa->id_transaksi); ?>"
                                    class="btn btn-primary"
                                    onclick="return confirm('Ubah status kirim menjadi selesai?')">
                                    <i class="fas fa-check-double"></i>
                                </a>
                                <?php else: ?>
                                <a href="#!" class="btn btn-success">
                                    <i class="fas fa-check-circle"></i>
                                </a>
                                <?php endif; ?>

                                <a href="<?= base_url('panel/pemesanan/list/' . $rowa->id_transaksi); ?>"
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