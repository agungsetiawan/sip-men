<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Pelanggan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah Pelanggan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form role="form" action="<?php echo site_url('pelanggan/createAction') ?>" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>ID Pelanggan</label>
                                <input name="id-pelanggan" value="<?php echo set_value('id-pelanggan'); ?>" class="form-control">
                                <?php echo form_error('id-pelanggan'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input name="nama" value="<?php echo set_value('nama'); ?>" class="form-control">
                                <?php echo form_error('nama'); ?>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3"><?php echo set_value('alamat'); ?></textarea>
                                <?php echo form_error('alamat'); ?>
                            </div>
                            <div class="form-group">
                                <label >Jenis Tarif</label>
                                <?php
                                  $options=array('rumahtangga'=>'Rumah Tangga',
                                                 'bisnis'=>'Bisnis',
                                                 'industri'=>'Industri',
                                                 'sosial'=>'Sosial',
                                                 'pemerintah'=>'Pemerintah');
                                  echo form_dropdown('jenis-tarif',$options,set_value('jenis-tarif', 'default'),array('class'=>'form-control'));
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Daya</label>
                                <input name="daya"value="<?php echo set_value('daya'); ?>" class="form-control"/>
                                <?php echo form_error('daya'); ?>
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