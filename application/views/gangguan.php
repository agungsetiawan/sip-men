<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gangguan KWH Meter</h1>
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

<?php 

  if ($this->session->userdata('error') !='')
  { ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->userdata('error'); ?>
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
                Input Data Gangguan
            </div>
            <div class="panel-body">
                
                <form role="form" id="form-gangguan" method="POST" action="<?php echo site_url("gangguan/create"); ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                                <label>ID Pelanggan</label>
							    <div class="form-group">
                                    <div class="input-group">
                                        <input name="id-pelanggan" id="cari-pelanggan" type="text" value="<?php echo set_value('id-pelanggan'); ?>" class="form-control" placeholder="Input ID Pelanggan di sini">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="button-cari-pelanggan"><i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <?php echo form_error('id-pelanggan'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama" id="nama" value="<?php echo set_value('nama'); ?>" class="form-control">
                                    <?php echo form_error('nama'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="3"><?php echo set_value('alamat'); ?></textarea>
                                    <?php echo form_error('alamat'); ?>
                                </div>
                                <div class="form-group">
                                    <label>No. HP</label>
                                    <input type="text" name="nohp" id="nohp" value="<?php echo set_value('nohp'); ?>" class="form-control">
                                    <?php echo form_error('nohp'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Daya</label>
                                    <input name="daya" id="daya" value="<?php echo set_value('daya'); ?>" class="form-control">
                                    <?php echo form_error('daya'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tarif</label>
                                    <input name="tarif" id="tarif" value="<?php echo set_value('tarif'); ?>" class="form-control">
                                    <?php echo form_error('tarif'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Rp/KWH</label>
                                    <input name="rpkwh" id="rpkwh" value="<?php echo set_value('rpkwh'); ?>" class="form-control">
                                    <?php echo form_error('rpkwh'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Gangguan</label>
                                    <?php
                                      $options=array('Relay Rusak'=>'Relay Rusak',
                                                     'LCD Blank'=>'LCD Blank',
                                                     'Keypad Rusak'=>'Keypad Rusak',
                                                     'Mati Total'=>'Mati Total',
                                                     'Lain'=>'Lain');
                                      echo form_dropdown('gangguan',$options,set_value('gangguan', 'default'),array('class'=>'form-control'));
                                    ?>
                                </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Gangguan</label>
                                <input name="tanggal-gangguan" value="<?php echo set_value('tanggal-gangguan'); ?>" class="form-control date-picker">
                                <?php echo form_error('tanggal-gangguan'); ?>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pasang</label>
                                <input name="tanggal-pasang" value="<?php echo set_value('tanggal-pasang'); ?>" class="form-control date-picker">
                                <?php echo form_error('tanggal-pasang'); ?>
                            </div>
                            <div class="form-group">
                                <label>ID KWH M Ganti</label>
                                <?php
                                    $sipmen=array();

                                    for($i=1;$i<=50;$i++){
                                        $sipmen[]="SIP-MEN/".$i;
                                    }

                                    echo form_dropdown('idkwhganti',$sipmen,set_value('idkwhganti', 'default'),array('class'=>'form-control'));
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Stand Awal</label>
                                <input name="stand-awal" value="<?php echo set_value('stand-awal'); ?>" class="form-control">
                                <?php echo form_error('stand-awal'); ?>
                            </div>
                            <div class="form-group">
                                <label>Petugas</label>
                                <input name="petugas" value="<?php echo set_value('petugas'); ?>" class="form-control">
                                <?php echo form_error('petugas'); ?>
                            </div>
                            <img id="uploadPreview" class="img-responsive img-thumbnail" src="" alt="Foto Stand Awal" style="width: 300px; height: 200px; display : none;">
                            <div class="form-group">
                                <label>Foto Stand Awal</label>
                                <input type="file" name="userfile" class="form-control" id="uploadImage" onchange="PreviewImage();">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-default">Save</button>
                            <button type="submit" id="btn-print-gangguan" class="btn btn-info">Print</button>
                            <button type="reset" id="reset" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </form>
                    <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>