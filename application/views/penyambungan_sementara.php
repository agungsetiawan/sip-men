<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Penyambungan Sementara</h1>
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
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Data Pelanggan & Penyambungan Sementara
            </div>
            <div class="panel-body">
                <form role="form" id="form-penyambungan" action="<?php echo site_url('penyambungan/create') ?>" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
							    <div class="form-group">
                                    <label>ID Pelanggan</label>
                                    <input name="id-pelanggan" type="text" value="<?php echo set_value('id-pelanggan'); ?>" class="form-control"/>
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
                                    <label>No. HP</label>
                                    <input name="nohp" value="<?php echo set_value('nohp'); ?>" class="form-control">
                                    <?php echo form_error('nohp'); ?>
                                </div>
                                <div class="form-group">
                                    <label >Daya</label>
                                  	<input name="daya" value="<?php echo set_value('daya'); ?>" class="form-control">
                                    <?php echo form_error('daya'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kegiatan</label>
                                    <input name="kegiatan" value="<?php echo set_value('kegiatan'); ?>" class="form-control">
                                    <?php echo form_error('kegiatan'); ?>
                                </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Permintaan</label>
                                    <input name="tanggal-permintaan" value="<?php echo set_value('tanggal-permintaan'); ?>" class="form-control date-picker">
                                    <?php echo form_error('tanggal-permintaan'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pasang</label>
                                    <input name="tanggal-pasang" value="<?php echo set_value('tanggal-pasang'); ?>" class="form-control date-picker">
                                    <?php echo form_error('tanggal-pasang'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Cabut</label>
                                    <input name="tanggal-cabut" value="<?php echo set_value('tanggal-cabut'); ?>" class="form-control date-picker">
                                    <?php echo form_error('tanggal-cabut'); ?>
                                </div>
                                <div class="form-group">
                                    <label>ID KWH M Ganti</label>
                                    <select name="idkwhganti" class="form-control">
                                        <option>SIP-MEN/01</option>
                                        <option>SIP-MEN/02</option>
                                        <option>SIP-MEN/03</option>
                                        <option>SIP-MEN/04</option>
                                        <option>SIP-MEN/05</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Stand Awal</label>
                                   	<input name="stand-awal" value="<?php echo set_value('stand-awal'); ?>" class="form-control">
                                    <?php echo form_error('stand-awal'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Petugas Pasang</label>
                                    <input name="petugas-pasang" value="<?php echo set_value('petugas-pasang'); ?>" class="form-control">
                                    <?php echo form_error('petugas-pasang'); ?>
                                </div>
                                <img id="uploadPreview" class="img-responsive img-thumbnail" src="" alt="Foto Stand Awal" style="width: 300px; height: 200px; display : none;">
                                <div class="form-group">
                                    <label>Foto Stand Awal</label>
                                    <input type="file" class="form-control" id="uploadImage" onchange="PreviewImage();">
                                </div>
                                                                        
                        </div>
                    </div> <!-- row 1 -->
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-default">Save</button>
                            <button type="submit" id="btn-print-penyambungan" class="btn btn-info">Print</button>
                            <button type="reset" id="reset" class="btn btn-danger">Delete</button>
                        </div>
                    </div> <!-- row 2 -->
                </form>    
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>