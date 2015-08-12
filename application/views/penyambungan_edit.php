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
                Ubah Data Penyambungan Sementara
            </div>
            <div class="panel-body">
                <form role="form" id="form-penyambungan" action="<?php echo site_url('penyambungan/editAction') ?>" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                                <input name="id-penyambungan-true" type="hidden" value="<?php echo $penyambungan->id ?>" class="form-control"/>
							    <div class="form-group">
                                    <label>ID Pelanggan</label>
                                    <input name="id-pelanggan" type="text" value="<?php echo set_value('id-pelanggan',$penyambungan->id_pelanggan); ?>" class="form-control" disabled/>
                                    <?php echo form_error('id-pelanggan'); ?>
                                </div>
                                <div class="form-group">
                                    <label>No. HP</label>
                                    <input name="nohp" value="<?php echo set_value('nohp',$penyambungan->no_telepon); ?>" class="form-control">
                                    <?php echo form_error('nohp'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kegiatan</label>
                                    <input name="kegiatan" value="<?php echo set_value('kegiatan',$penyambungan->tujuan); ?>" class="form-control">
                                    <?php echo form_error('kegiatan'); ?>
                                </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Permintaan</label>
                                    <input name="tanggal-permintaan" value="<?php echo set_value('tanggal-permintaan',$penyambungan->tanggal_permohonan); ?>" class="form-control date-picker">
                                    <?php echo form_error('tanggal-permintaan'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pasang</label>
                                    <input name="tanggal-pasang" value="<?php echo set_value('tanggal-pasang',$penyambungan->tanggal_pasang); ?>" class="form-control date-picker">
                                    <?php echo form_error('tanggal-pasang'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Cabut</label>
                                    <input name="tanggal-cabut" value="<?php echo set_value('tanggal-cabut',$penyambungan->tanggal_cabut); ?>" class="form-control date-picker">
                                    <?php echo form_error('tanggal-cabut'); ?>
                                </div>
                                <div class="form-group">
                                    <label>ID KWH M Ganti</label>
                                    <?php
                                        $sipmen=array();

                                        for($i=1;$i<=50;$i++){
                                            $sipmen["SIP-MEN/".$i]="SIP-MEN/".$i;
                                        }

                                        echo form_dropdown('idkwhganti',$sipmen,set_value('idkwhganti', $penyambungan->id_kwh_ganti),array('class'=>'form-control'));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Stand Awal</label>
                                   	<input name="stand-awal" value="<?php echo set_value('stand-awal',$penyambungan->stand_awal); ?>" class="form-control">
                                    <?php echo form_error('stand-awal'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Petugas Pasang</label>
                                    <input name="petugas-pasang" value="<?php echo set_value('petugas-pasang',$penyambungan->petugas_pasang); ?>" class="form-control">
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