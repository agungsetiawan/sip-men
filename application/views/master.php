<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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
                <a class="navbar-brand" href="index.html">Aplikasi SIP-MEN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Deskiniel</strong>
                                    <span class="pull-right text-muted">
                                        <em>Hari ini (29-08-2016)</em>
                                    </span>
                                </div>
                                <div>Pemasangan sementara keperluan konser</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Paulo Margo</strong>
                                    <span class="pull-right text-muted">
                                        <em>Hari ini (29-08-2016)</em>
                                    </span>
                                </div>
                                <div>Ganti Kwh meter di warung kopi usah kau kenang lagi</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Kak Set</strong>
                                    <span class="pull-right text-muted">
                                        <em>Hari ini (29-08-2016)</em>
                                    </span>
                                </div>
                                <div>Pencabutan di warung kopi tak kenal lara</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                        <li>
                            <a href="<?php echo site_url("monitoring"); ?>"><i class="fa fa-table fa-fw"></i> Monitoring Data</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("pengguna"); ?>"><i class="fa fa-user fa-fw"></i> Data Pengguna</a>
                        </li>
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
	<script type="text/javascript">

		$(document).ready(function() {
		    $('.date-picker')
		        .datepicker({
		            format: 'dd/mm/yyyy'
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

		 });

		$('#reset').on('click',function(e){
	        $('#uploadPreview').css("display","none");
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
