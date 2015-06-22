<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Penyambungan Sementara</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Data Pelanggan & Penyambungan Sementara
            </div>
            <div class="panel-body">
                <form role="form">
                    <div class="row">
                        <div class="col-lg-6">

							    <div class="form-group">
                                    <label>ID Pelanggan</label>
                                    <input type="text" class="form-control"/>
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
                                    <label >Daya</label>
                                  	<input class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kegiatan</label>
                                    <input class="form-control">
                                </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Permintaan</label>
                                    <input class="form-control date-picker">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pasang</label>
                                    <input class="form-control date-picker">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Cabut</label>
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
                                    <label>Petugas Pasang</label>
                                    <input class="form-control">
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