<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Laporan Penjualan</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Filter berdasarkan tanggal</h4>
                    <form action="<?php echo base_url('panel/laporan/filter'); ?>" method="POST">
                        <div class="form-group">
                            <label>Dari tanggal</label>
                            <input type="date" name="awal" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Sampai tanggal</label>
                            <input type="date" name="akhir" class="form-control" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fas fa-fw fa-filter"></i>
                                Filter</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4>Filter untuk bulan ini</h4>
                    <br />
                    <a href="<?php echo base_url('panel/laporan/fakturmonth'); ?>" class="btn btn-primary btn-block"><i
                            class="fas fa-fw fa-eye"></i> Preview
                        PDF</a>

                </div>
            </div>
            <br />
        </div>
    </div>

</div>
<!-- /.container-fluid -->