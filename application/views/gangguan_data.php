<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Penyambungan Gangguan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php 

  if ($this->session->userdata('message') !='')
  { ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->userdata('message'); ?>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
<?php    
  }
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Gangguan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php
                if(count($penyambungan)==0)
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
                                <th>NO Telepon</th>
                                <th>Tujuan</th>
                                <th>Tgl Permohonan</th>
                                <th>Tgl Pasang</th>
                                <th>Tgl Cabut</th>
                                <th>ID Kwh Ganti</th>
                                <th>Stand Awal</th>
                                <th>Petugas Pasang</th>
                                <th>Sudah Dicabut</th>
                                <?php
                                if($this->session->userdata('level')=='Admin')
                                {
                                ?>
                                <th>Aksi</th>
                                <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach($penyambungan as $p): ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $p->id_pelanggan; ?></td>
                                <td><?php echo $p->no_telepon; ?></td>
                                <td><?php echo $p->tujuan; ?></td>
                                <td><?php echo $p->tanggal_permohonan; ?></td>
                                <td><?php echo $p->tanggal_pasang; ?></td>
                                <td><?php echo $p->tanggal_cabut; ?></td>
                                <td><?php echo $p->id_kwh_ganti; ?></td>
                                <td><?php echo $p->stand_awal; ?></td>
                                <td><?php echo $p->petugas_pasang; ?></td>
                                <?php
                                    if($p->has_cabut==1)
                                        $cabut="Sudah";
                                    else
                                        $cabut="Belum";
                                ?>
                                <td><?php echo $cabut; ?></td>
                                <?php
                                if($this->session->userdata('level')=='Admin')
                                {
                                ?>
                                <td><a href="<?php echo site_url('gangguan/edit/')."/".$p->id; ?>" class="btn btn-warning">Edit</a> 
                                    <a href="<?php echo site_url('gangguan/delete/')."/".$p->id; ?>" class="btn btn-danger">Hapus</a></td>
                                <?php
                                }
                                ?>
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