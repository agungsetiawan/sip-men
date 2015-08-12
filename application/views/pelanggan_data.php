<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Penyambungan Sementara</h1>
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
                Pelanggan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php
                if(count($pelanggan)==0)
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
                                <th>Tarif</th>
                                <th>Daya</th>
                                <th>RP Kwh</th>
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
                            <?php foreach($pelanggan as $p): ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $p->id_pelanggan; ?></td>
                                <td><?php echo $p->nama; ?></td>
                                <td><?php echo $p->alamat; ?></td>
                                <td><?php echo $p->tarif; ?></td>
                                <td><?php echo $p->daya; ?></td>
                                <td><?php echo $p->rpkwh; ?></td>
                                <?php
                                if($this->session->userdata('level')=='Admin')
                                {
                                ?>
                                <td><a href="<?php echo site_url('pelanggan/edit/')."/".$p->id; ?>" class="btn btn-warning">Edit</a> 
                                    <a href="<?php echo site_url('pelanggan/delete/')."/".$p->id; ?>" class="btn btn-danger">Hapus</a></td>
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