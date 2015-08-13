<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Ubah Profil</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php 

  if ($this->session->userdata('message') !='')
  { ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->userdata('message'); ?>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
<?php    
  }
?>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 Pengguna
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form role="form" action="<?php echo site_url('pengguna/changeAction') ?>" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                                <input name="id-pengguna-true" type="hidden" value="<?php echo set_value('id-pengguna',$pengguna->id); ?>" class="form-control"/>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="username" disabled value="<?php echo set_value('username',$pengguna->username); ?>" class="form-control">
                                    <?php echo form_error('username'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama" value="<?php echo set_value('nama',$pengguna->nama); ?>" class="form-control">
                                    <?php echo form_error('nama'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input name="password-lama" type="password" value="<?php echo set_value('password-lama'); ?>" class="form-control"/>
                                    <span>*Kosongkan jika tidak ingin mengubah password</span>
                                    <?php echo form_error('password-lama'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input name="password-baru" type="password" value="<?php echo set_value('password-baru'); ?>" class="form-control"/>
                                    <span>*Kosongkan jika tidak ingin mengubah password</span>
                                    <?php echo form_error('password-baru'); ?>
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