<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Monitoring</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data - Data
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php
                if(count($monitoring)==0)
                {
                ?>
                <div class="alert alert-warning">
                    Tidak ada data
                </div>
                <?php
                }
                else
                {
                ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID Pelanggan</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Daya</th>
                                <th>Tarif</th>
                                <th>Tujuan Pemasangan/Gangguan KWH</th>
                                <th>Tgl Permohonan</th>
                                <th>Tgl Pasang</th>
                                <th>ID KWH Ganti</th>
                                <th>Stand Awal</th>
                                <th>Petugas Pasang</th>
                                <th>Petugas Cabut</th>
                                <th>Rupiah/KWH</th>
                                <th>Tgl Cabut</th>
                                <th>Stand Akhir</th>
                                <th>Pemakaian KWH</th>
                                <th>Tagihan</th>
                                <th>Terbilang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach($monitoring as $m): ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $m->id_pelanggan; ?></td>
                                <td><?php echo $m->nama; ?></td>
                                <td><?php echo $m->alamat; ?></td>
                                <td><?php echo $m->no_telepon; ?></td>
                                <td><?php echo $m->daya; ?></td>
                                <td><?php echo $m->tarif; ?></td>
                                <td><?php echo $m->tujuan; ?></td>
                                <td><?php echo $m->tanggal_permohonan; ?></td>
                                <td><?php echo $m->tanggal_pasang; ?></td>
                                <td><?php echo $m->id_kwh_ganti; ?></td>
                                <td><?php echo $m->stand_awal; ?></td>
                                <td><?php echo $m->petugas_pasang; ?></td>
                                <td><?php echo $m->petugas_cabut; ?></td>
                                <td><?php echo $m->rpkwh; ?></td>
                                <td><?php echo $m->tanggal_cabut; ?></td>
                                <td><?php echo $m->stand_akhir; ?></td>
                                <td><?php echo $m->pemakaian_kwh; ?></td>
                                <td><?php echo $m->tagihan; ?></td>
                                <td><?php echo $m->terbilang; ?></td>
                                <td><a href="#" class="btn btn-warning">Edit</a> <a href="#" class="btn btn-danger">Hapus</a></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <?php
                }
                ?>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>    