<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Profil Pengguna</h1>
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
                <?php echo $this->session->userdata('nama'); ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            	<table>
            		<tr>
            			<td>Username</td>
            			<td>:</td>
            			<td><?php echo $this->session->userdata('username'); ?></td>
            		</tr>
            		<tr>
            			<td>Nama</td>
            			<td>:</td>
            			<td><?php echo $this->session->userdata('nama'); ?></td>
            		</tr>
            	</table>

            	<div>
            	<hr/>
            	<a href="<?php echo site_url('pengguna/change'); ?>">Ubah Data</a>
            	</div>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>