<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pemutusan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

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
                Input Data Pemutusan
            </div>
            <div class="panel-body">
                <form role="form" method="POST" action="<?php echo site_url("pemutusan/create"); ?>">
                    <div class="row">
                        <div class="col-lg-6">
                                <input type="hidden" id="id-penyambungan" name="id-penyambungan" value="<?php echo set_value('id-penyambungan'); ?>">
							    <div class="form-group">
                                    <label>ID Pelanggan</label>
                                    <div class="input-group">
                                        <input type="text" name="id-pelanggan" id="cari-pelanggan" value="<?php echo set_value('id-pelanggan'); ?>" class="form-control" placeholder="Cari ID Pelanggan di sini"/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="button-cari-pemutusan"><i class="fa fa-search"></i>
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
                                    <label >Daya</label>
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
                                    <input name="gangguan" id="gangguan" value="<?php echo set_value('gangguan'); ?>" class="form-control">
                                    <?php echo form_error('gangguan'); ?>
                                </div>
                                
                            
                        </div>
                        <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Pasang</label>
                                    <input name="tanggal-pasang" id="tanggal-pasang" value="<?php echo set_value('tanggal-pasang'); ?>" class="form-control date-picker">
                                    <?php echo form_error('tanggal-pasang'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Stand Awal</label>
                                   	<input name="stand-awal" id="stand-awal" value="<?php echo set_value('stand-awal'); ?>" class="form-control">
                                    <?php echo form_error('stand-awal'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Petugas Pasang</label>
                                    <input name="petugas" id="petugas" value="<?php echo set_value('petugas'); ?>" class="form-control">
                                    <?php echo form_error('petugas'); ?>
                                </div>
                                <div class="form-group">
                                    <label>ID KWH M Ganti</label>
                                    <input name="idkwhganti" id="idkwhganti" value="<?php echo set_value('idkwhganti'); ?>" class="form-control">
                                    <?php echo form_error('idkwhganti'); ?>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label>Tanggal Cabut</label>
                                  	<input name="tanggal-cabut" id="tanggal-cabut" value="<?php echo set_value('tanggal-cabut'); ?>" class="form-control date-picker">
                                    <?php echo form_error('tanggal-cabut'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Stand Akhir</label>
                                  	<input name="stand-akhir" value="<?php echo set_value('stand-akhir'); ?>" class="form-control">
                                    <?php echo form_error('stand-akhir'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Petugas Cabut</label>
                                    <input name="petugas-cabut" value="<?php echo set_value('petugas-cabut'); ?>" class="form-control">
                                     <?php echo form_error('petugas-cabut'); ?>
                                </div>
                                                                        
                                
                        </div>
                    </div> <!-- row 1 -->
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-default">Save</button>
                            <button type="button" class="btn btn-info">Print</button>
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