<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Perubahan Data Pengguna</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Pengguna
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form role="form" action="<?php echo site_url('pengguna/editAction') ?>" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                                <input name="id-pelanggan-true" type="hidden" value="<?php echo $pengguna->id ?>" class="form-control"/>
                                <div class="form-group">
                                    <label>ID Pelanggan</label>
                                    <input name="id-pelanggan" type="text" value="<?php echo set_value('id-pelanggan',$pengguna->id); ?>" class="form-control" disabled/>
                                    <?php echo form_error('id-pelanggan'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama" value="<?php echo set_value('nama',$pengguna->nama); ?>" class="form-control">
                                    <?php echo form_error('nama'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="username" value="<?php echo set_value('username',$pengguna->username); ?>" class="form-control">
                                    <?php echo form_error('username'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <?php
                                      $options=array('Admin'=>'Admin',
                                                     'Supervisor'=>'Supervisor',
                                                     'Manajer Rayon'=>'Manajer Rayon',
                                                     'Operator'=>'Operator');
                                      echo form_dropdown('level',$options,$pengguna->level,array('class'=>'form-control'));
                                    ?>
                                    <?php echo form_error('level'); ?>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-default">Save</button>
                            <button type="reset" id="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </form>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>