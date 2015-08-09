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

        #table-nomor, #table-tanda-tangan{
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
            margin-left: 180px;
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
                            <p>No. 1/CABUT/SIP-MEN/AREA.JPR/2015</p>
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
        	<p>KETERANGN : Pemutusan KWH Meter Sementara Kode SIP-MEN/09.</p>
        </div>

        <div id="content">
        	<div id="paragraf-satu">
        		<p>Sehubungan dengan permohonan pelanggan untuk penyambungan sementara maka, telah dilakukan pemasangan kwh sementara :</p>
        	</div>

        	<table>
    			<tr>
    				<td class="two-hundred">Tanggal Pemasangan</td>
    				<td>: 9 Agustus 2015</td>
    			</tr>
    			<tr>
    				<td>Tanggal Pemutusan</td>
    				<td>: 9 Agustus 2015</td>
    			</tr>
    		</table>

    		<p>Dengan rincian pemakaian kwh sebagai berikut :</p>

    		<table id="table-two">
    			<tr>
    				<td class="two-hundred">ID. Pelanggan</td>
    				<td>: 12345</td>
    			</tr>
    			<tr>
    				<td>Nama Pelanggan</td>
    				<td>: Adon</td>
    			</tr>
                <tr>
                    <td>Stand Awal</td>
                    <td>: 0</td>
                </tr>
                <tr>
                    <td>Stand Akhir</td>
                    <td>: 50</td>
                </tr>
                <tr>
                    <td>Tarif</td>
                    <td>: B1T</td>
                </tr>
                <tr>
                    <td>Pemakaian kWh</td>
                    <td>: 50</td>
                </tr>
                <tr>
                    <td>Rupaiah per kWh</td>
                    <td>: 10000</td>
                </tr>
                <tr>
                    <td>Total Biaya</td>
                    <td>: RP 520000 *termasuk PPJ 9%</td>
                </tr>
                <tr>
                    <td>Terbilang</td>
                    <td>: lima ratus dua puluh ribu rupiah</td>
                </tr>
    		</table>

            <p>Pelanggan bersedia membayar sesuai dengan jumlah pemakaian yang tertera di kwh meter</p>

    		<div id="tanggal">
    			<p>Jayapura, 9 Agustus 2015</p>
    		</div>

    		<div id="tanda-tangan">
                <table id="table-tanda-tangan">
                    <tr>
                        <td>
                            <div id="tanda-pelanggan">
                                <p>Pelanggan</p>
                                <p class="spasi-ttd"><u>Adon</u></p>
                            </div>
                        </td>
                        <td>
                            <div id="tanda-petugas">
                                <p>Petugas Pelaksana</p>
                                <p class="spasi-ttd"><u>Waliyem</u></p>
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
