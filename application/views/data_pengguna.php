<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Pengguna</h1>
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
    <div class="col-lg-12 text-right" style="margin-bottom:10px">
        <a class="btn btn-primary" href="<?php echo site_url('pengguna/create'); ?>">Tambah</a>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Pengguna
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach($pengguna as $p): ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $p->nama; ?></td>
                                <td><?php echo $p->username; ?></td>
                                <td><?php echo $p->level; ?></td>
                                <td><a href="<?php echo site_url('pengguna/edit/')."/".$p->id; ?>" class="btn btn-warning">Edit</a> 
                                    <a href="<?php echo site_url('pengguna/delete/')."/".$p->id; ?>" class="btn btn-danger">Hapus</a></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>