<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Pengguna</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah Pengguna
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form role="form" action="<?php echo site_url('pengguna/createAction') ?>" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama" value="<?php echo set_value('nama'); ?>" class="form-control">
                                    <?php echo form_error('nama'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="username" value="<?php echo set_value('username'); ?>" class="form-control">
                                    <?php echo form_error('username'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" value="<?php echo set_value('password'); ?>" class="form-control"/>
                                    <?php echo form_error('password'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <?php
                                      $options=array('Admin'=>'Admin',
                                                     'Supervisor'=>'Supervisor',
                                                     'Manajer Rayon'=>'Manajer Rayon',
                                                     'Operator'=>'Operator');
                                      echo form_dropdown('level',$options,set_value('level', 'default'),array('class'=>'form-control'));
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