<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIP-MEN PLN Jayapura</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/css/plugins/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url(); ?>">Aplikasi SIP-MEN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <?php
                            $CI =& get_instance();
                            $CI->load->model('penyambungan_model');
                            $notifikasi = $CI->penyambungan_model->getByDate(date("Y-m-d"));
                        ?>
                        <?php
                            if(count($notifikasi)==0)
                            {
                        ?>
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>Pemasangan & Pencabutan</strong>
                                            <span class="pull-right text-muted">
                                                <em>Hari ini (<?php echo date("d-m-Y")?>)</em>
                                            </span>
                                        </div>
                                        <div>Tidak ada jadwal</div>
                                    </a>
                                </li>
                        <?php
                            }
                            else
                            {
                        ?>
                                <?php foreach($notifikasi as $n):?>
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong><?php echo $n->petugas_pasang; ?></strong>
                                            <span class="pull-right text-muted">
                                                <em>Hari ini (<?php echo date("d-m-Y")?>)</em>
                                            </span>
                                        </div>
                                        <?php if($n->tanggal_cabut==date("Y-m-d")) 
                                                {
                                        ?>
                                                <div>Pencabutan - <?php echo $n->nama; ?></div>
                                        <?php 
                                                }
                                                else
                                                {
                                        ?>
                                                <div>Pemasangan sementara <?php echo $n->tujuan." - ".$n->nama ?></div>
                                        <?php
                                                }
                                        ?>
                                        
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <?php endforeach;?>
                        <?php
                            }
                        ?>
                        <!-- <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li> -->
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo site_url('pengguna/profil'); ?>"><i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nama'); ?></a>
                        </li>
                        <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('welcome/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo site_url("welcome"); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("penyambungan"); ?>"><i class="fa fa-flash fa-fw"></i> Penyambungan Sementara</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("gangguan"); ?>"><i class="fa fa-fire fa-fw"></i> Gangguan KWH Meter</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("pemutusan"); ?>"><i class="fa fa-legal fa-fw"></i> Pemutusan</a>
                        </li>
                        <?php
                        if($this->session->userdata('level')!='Operator')
                        {
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Monitoring Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url("monitoring"); ?>"><i class="fa fa-table fa-fw"></i>Gabungan</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("penyambungan/data"); ?>"><i class="fa fa-flash fa-fw"></i>Penyambungan</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("gangguan/data"); ?>"><i class="fa fa-fire fa-fw"></i>Gangguan</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-legal fa-fw"></i>Pemutusan</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php
                        }
                        ?>

                       <?php
                        if($this->session->userdata('level')=='Admin')
                        {
                        ?>
                        <li>
                            <a href="<?php echo site_url("pengguna"); ?>"><i class="fa fa-user fa-fw"></i> Data Pengguna</a>
                        </li>
                        <?php
                        }
                        ?>
                        <?php
                        if($this->session->userdata('level')!='Operator')
                        {
                        ?>
                        <li>
                            <a href="<?php echo site_url("pelanggan"); ?>"><i class="fa fa-users fa-fw"></i> Data Pelanggan</a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <?php echo $contents; ?>
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/js/plugins/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/js/sb-admin-2.js"></script>

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

	<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

        <script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" />
	<script type="text/javascript">

		$(document).ready(function() {
		    $('.date-picker')
		        .datepicker({
		            format: 'dd-mm-yyyy'
		        });		  

            $('.date-picker').on('changeDate',function(){
                $(this).datepicker('hide');
            });   


            $('#button-cari-pelanggan').on('click', function(){
                 dataString = $("#cari-pelanggan").val();
                 $.ajax({
                   type: "GET",
                   url: "<?php echo base_url(); ?>index.php/pelanggan/search/"+dataString,
                   success: function(data){
                       $("#nama").val(data.nama);
                       $("#alamat").val(data.alamat);
                       $("#daya").val(data.daya);
                       $("#tarif").val(data.tarif);
                       $("#rpkwh").val(data.rpkwh);
                   }
                 });
            });

            $('#button-cari-pemutusan').on('click', function(){
                dataString = $("#cari-pelanggan").val();
                 $.ajax({
                   type: "GET",
                   url: "<?php echo base_url(); ?>index.php/pemutusan/search/"+dataString,
                   success: function(data){

                        if(data.has_cabut==1){
                            alert("Pencabutan Telah Dilakukan");
                            return;
                        }

                       $("#nama").val(data.nama);
                       $("#alamat").val(data.alamat);
                       $("#nohp").val(data.no_telepon);
                       $("#daya").val(data.daya);
                       $("#tarif").val(data.tarif);
                       $("#rpkwh").val(data.rpkwh);
                       $("#gangguan").val(data.tujuan);

                       $("#tanggal-pasang").val(data.tanggal_pasang);
                       $("#stand-awal").val(data.stand_awal);
                       $("#petugas").val(data.petugas_pasang);
                       $("#idkwhganti").val(data.id_kwh_ganti);

                       $("#tanggal-cabut").val(data.tanggal_cabut);

                       $("#id-penyambungan").val(data.id);
                       
                   }
                 });
            });

            $("#cari-pelanggan").autocomplete({
                source:"<?php echo base_url(); ?>index.php/pelanggan/searchAutoComplete",
                minLength:1
            });

		 });

		$('#reset').on('click',function(e){
	        $('#uploadPreview').css("display","none");
	    });

        $('#btn-print-penyambungan').on('click',function(e){
            $('#form-penyambungan').attr("action","<?php echo site_url('lembar/penyambungan'); ?>");
        });

        $('#btn-print-gangguan').on('click',function(e){
            $('#form-gangguan').attr("action","<?php echo site_url('lembar/gangguan'); ?>");
        });

        $('#btn-print-pemutusan').on('click',function(e){
            $('#form-pemutusan').attr("action","<?php echo site_url('lembar/pemutusan'); ?>");
        });

		function PreviewImage() {
			document.getElementById("uploadPreview").style.display = "block";

		    var oFReader = new FileReader();
		    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

		    oFReader.onload = function(oFREvent) {
		      document.getElementById("uploadPreview").src = oFREvent.target.result;
		    };
		};
	</script>

</body>

</html>
