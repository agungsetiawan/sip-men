<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lembar Form Penyambungan Sementara</title>
    <!-- <link href="<?php echo base_url();?>assets/css/sb-admin-2.css" rel="stylesheet"> -->

    <style type="text/css">
    	*{
    		margin: 0px;
    		padding: 0px;
    	}

    	.clear{
    		clear: both;
    	}

    	#container{
    		width: 768px;
    		margin: 0 auto;
    	}

        #table-nomor #table-tanda-tangan{
            width: 768px;
        }

    	#label{
    		font-weight: bold;
    		font-size: 26px;
    		border: 2px solid black;
    		padding: 10px 30px;
            width: 100px;
    		margin-left: 60px;
    	}

        #nomor-surat{
            margin-left: 100px;
        }

    	#header{
    		margin-top:20px;
    	}

    	#logo, #header-text{
    		float: left;
    	}

    	#header-text{
    		margin-left: 15px;
    	}

    	#header-text p{
    		font-weight: bold;
    		margin-bottom: 5px;
    	}

    	#sip-men{
    		font-size: 28px;
    	}

    	#keterangan{
    		margin-top: 30px;
    		border-top:1px solid black;
    		border-bottom: 1px solid black;
    		padding: 10px 60px;
    	}

    	#content{
    		margin-top: 50px;
    	}

    	#paragraf-satu, #paragraf-dua{
    		text-indent: 50px;
    	}

    	#paragraf-dua{
    		margin-top: 20px;
    	}

    	.two-hundred{
    		width: 200px;
    	}

    	#table-two{
    		margin-top: 20px;
    	}

    	#tanggal{
    		text-align: right;
    	}

    	#tanda-tangan{
    		margin-top: 15px;
    	}

    	#tanda-pelanggan{
    		margin-left: 25px;
    		text-align: center;
    	}

    	#tanda-petugas{
    		margin-left: 500px;
    		text-align: center;
    	}

    	.spasi-ttd{
    		margin-top: 80px;
    	}

    	#manajer{
    		margin-top: 10px;
    	}

    	#tanda-manajer{
    		text-align: center;
    	}

        #empty-underline{
            width:200px; 
            border-bottom:1px solid black;
            margin: 0 auto;
            margin-top: 80px;
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="nomor-surat-container">
            <table id="table-nomor">
                <tr>
                    <td width="260px">
                        <div id="label">
                            <p>PASANG</p>
                        </div>
                    </td>
                    <td>
                        <div id="nomor-surat">
                            <p>No. 1/PASANG/SIP-MEN/AREA.JPR/2015</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div id="header">
            <table>
                <tr>
                    <td valign="top">
                        <div id="logo">
                           <img src="<?php echo base_url();?>assets/img/logo-pln.png">
                        </div>
                    </td>
                    <td>
                        <div id="header-text">
                            <p>PT PLN (PERSERO) </p>
                            <p>WILAYAH PAPUA DAN PAPUA BARAT</p>
                            <p>AREA JAYAPURA</p>
                            <p>PEMASANGAN KWH METER SEMENTARA</p>
                            <p id="sip-men">SIP-MEN</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div id="keterangan">
        	<p>KETERANGN : Penyambungan sementara untuk keperluan Konser Musik.</p>
        </div>

        <div id="content">
        	<div id="paragraf-satu">
        		<p>Dalam rangka meningkatkan mutu pelayanan, petugas kami melaksanakan pemasangan <b><i>kWh Meter Sementara</i></b> untuk keperluan seperti yang tertulis pada kolom keterangan di atas, agar energi yang digunakan oleh pelanggan dapat terukur sesuai dengan peraturan yang berlaku.</p>
        	</div>

        	<div id="paragraf-dua">
        		<p>Berdasarkan PERATURAN MENTERI ENERGI DAN SUMBER DAYA MINERAL NO : 11 TAHUN 2015 Tentang Tarif tenaga listrik yang disediakan oleh PT PLN (Persero). Yang bertanda tangan di bawah ini :</p>
        	</div>

        	<table>
    			<tr>
    				<td class="two-hundred">ID. Pelanggan</td>
    				<td>: 12345</td>
    			</tr>
    			<tr>
    				<td>Nama pelanggan</td>
    				<td>: DESKINIEL</td>
    			</tr>
    			<tr>
    				<td>Alamat</td>
    				<td>: JAYAPURA</td>
    			</tr>
    			<tr>
    				<td>Daya</td>
    				<td>: 5500</td>
    			</tr>
    			<tr>
    				<td>No. handphone</td>
    				<td>: 089089089089</td>
    			</tr>
    			<tr>
    				<td>Tarif</td>
    				<td>: B1T</td>
    			</tr>
    		</table>

    		<p>bersedia melakukan pembayaran sesuai dengan jumlah pemakaian yang tertera di kwh meter</p>

    		<table id="table-two">
    			<tr>
    				<td class="two-hundred">ID. kWh-meter Pengganti</td>
    				<td>: SIP-MEN/09</td>
    			</tr>
    			<tr>
    				<td>Stand Awal</td>
    				<td>: 0</td>
    			</tr>
    		</table>

    		<div id="tanggal">
    			<p>Jayapura, 8 Agustus 2015</p>
    		</div>

    		<div id="tanda-tangan">
                <table id="table-tanda-tangan">
                    <tr>
                        <td>
                            <div id="tanda-pelanggan">
                                <p>Pelanggan</p>
                                <p class="spasi-ttd"><u>DESKINIEL</u></p>
                            </div>
                        </td>
                        <td>
                            <div id="tanda-petugas">
                                <p>Petugas Pelaksana</p>
                                <p class="spasi-ttd"><u>BAYU</u></p>
                            </div>
                        </td>
                    </tr>
                </table>
    		</div>

    		<div id="manajer">
    			<div id="tanda-manajer">
    				<p>Mengetahui</p>
    				<p>Manajer Rayon</p>
                    <p id="empty-underline">
                    </p>
    		</div>
        </div>
    </div>
</body>

</html>
