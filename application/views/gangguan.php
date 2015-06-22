<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gangguan KWH Meter</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Data Gangguan
            </div>
            <div class="panel-body">
                <form role="form">
                    <div class="row">
                        <div class="col-lg-6">
                            
                                <label>ID Pelanggan</label>
							    <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Input ID Pelanggan di sini">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>No. HP</label>
                                    <input class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Daya</label>
                                    <input class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tarif</label>
                                    <input class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Rp/KWH</label>
                                    <input class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Gangguan</label>
                                    <select class="form-control">
                                        <option>Relay Rusak</option>
                                        <option>LCD Blank</option>
                                        <option>Keypad Rusak</option>
                                        <option>Mati Total</option>
                                        <option>Lain-Lain</option>
                                    </select>
                                </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Gangguan</label>
                                <input class="form-control date-picker">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pasang</label>
                                <input class="form-control date-picker">
                            </div>
                            <div class="form-group">
                                <label>ID KWH M Ganti</label>
                                <select class="form-control">
                                    <option>SIP-MEN/01</option>
                                    <option>SIP-MEN/02</option>
                                    <option>SIP-MEN/03</option>
                                    <option>SIP-MEN/04</option>
                                    <option>SIP-MEN/05</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Stand Awal</label>
                                <input class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Petugas</label>
                                <input class="form-control">
                            </div>
                            <img id="uploadPreview" class="img-responsive img-thumbnail" src="" alt="Foto Stand Awal" style="width: 300px; height: 200px; display : none;">
                            <div class="form-group">
                                <label>Foto Stand Awal</label>
                                <input type="file" class="form-control" id="uploadImage" onchange="PreviewImage();">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-default">Save</button>
                            <button type="button" class="btn btn-info">Print</button>
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