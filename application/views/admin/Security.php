<!--Counter Inbox-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Pengaduan Keluhan Pegawai | Data Block IP</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 	<link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/img/ico/favicon.png'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-theme.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/_all-skins.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css'; ?>">
	<style>
		.datepicker{z-index:1151;}
	    </style>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'; ?>"/>

</head>

<body class="skin-blue sidebar-mini wysihtml5-supported">
<div class="wrapper">

	<?php 

$this->load->view('admin/header');
?>

 <aside class="main-sidebar" >

    <section class="sidebar">
        <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().'assets/img/avatar/admin/'.$fotok; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
					<p><?php echo ucfirst($usernamenow); ?></p>
					<a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" >
        <li>
          <a href="<?php echo base_url().'admin/dashboard'; ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Pengumuman</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/pengumuman'; ?>"><i class="fa fa-list"></i> Data Pengumuman</a></li>
            <li><a href="<?php echo base_url().'admin/kategori'; ?>"><i class="fa fa-tags"></i> Kategori</a></li>
          </ul>
        </li>
        <li class="treeview">
				<a href="#">
            <i class="fa fa-user-circle-o"></i>
						 <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
				 <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/admin/edit_profilku'; ?>"><i class="fa fa-wrench"></i> Edit Profil</a></li>
					</ul>
        </li>
				<li>
          <a href="<?php echo base_url().'admin/group'; ?>">
            <i class="fa fa-users"></i> <span>Group</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
      
				<li>
          <a href="<?php echo base_url().'admin/data_staff'; ?>">
            <i class="fa fa-user"></i> <span> Data Staff</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
				
         <li class="active treeview">
          <a href="#">
            <i class="fa fa-shield"></i>
            <span>Keamanan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
						<li class="active"><a href="<?php echo base_url().'admin/security'; ?>"><i class="fa fa-ban"></i> Data Block IP</a></li>
						<li><a href="<?php echo base_url().'admin/security/log_admin'; ?>"><i class="fa fa-id-card"></i> Data Acktivitas Admin</a></li>
						<li><a href="<?php echo base_url().'admin/security/log_staff'; ?>"><i class="fa fa-id-card"></i> Data Aktivitas Staff</a></li>
          </ul>
        </li>

         <li>
          <a href="<?php echo base_url().'login/logout'; ?>">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        
       
      </ul>

    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data IP Address yang diblokir
        <small></small>
      </h1>
      <ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li>Keamanan</li>
        <li class="active">Data IP Address yang diblokir</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah IP Address yang diblokir</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped table-bordered" style="font-size:13px;">
                <thead>
                <tr>
										<th >#</th>
										<th style="width:15%;">IP Address</th>
										<th>Tanggal Mulai Blokir</th>
										<th style="width:25%;">Alasan</th>
										<th>Contact Person untuk mematikan mode blokir</th>
										<th>Mode Blokir</th>
                    <th style="width:10%;text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
            $no = 0;
            foreach ($data->result_array() as $i) :
                $no++;
                $id_ip_block = $i['id_ip_block'];
                $ip = $i['IP'];
                $tanggal_mulai = $i['tanggal_mulai'];
                $alasan = $i['alasan'];
                $cp = $i['CP'];
                $otmc = $i['automatic'];

            ?>
                <tr>
                  <td><?php echo $no; ?></td>
									<td><?php echo $ip; ?></td>
									<td><?php echo $tanggal_mulai; ?></td>
									<td><?php echo $alasan; ?></td>
									<td><?php echo $cp; ?></td>
									<?php if ($otmc == 0):?>
									<td><?php echo '<b>Manual</b>'; ?></td>
									<?php else :?>
									<td><?php echo '<b>Otomatis Aktif setelah 3 hari</b>'; ?></td>
									<?php endif; ?>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id_ip_block; ?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id_ip_block; ?>"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
				<?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b><?php echo $online; ?> user online</b> 
    </div>
    <strong> Copyright &copy; 2018  <a href="">Reinhart Joshua Utama - 672015116</strong></a>. All rights reserved.
	</footer>

 <aside class="control-sidebar control-sidebar-dark">
    <div class="tab-content">
      <div class="tab-pane" id="control-sidebar-home-tab">
			</div>	
		</div>
</aside>		

 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah IP Address yang diblokir</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/security/simpan_ip'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">IP Address yang hendak diblokir</label>
                                <div class="col-sm-7">
                                  <input type="text" name="xip" class="form-control" id="xip" placeholder="IP Address" required>
															 	<span id="ip_result"></span>
																</div>
														</div>
														<div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Alasan diblokir</label>
                                <div class="col-sm-7">
																	   <input type="text" name="xalasan"  class="form-control"  placeholder="Masukkan Alasan memblokir karena..." required>
                                </div>
														</div>
														<div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Hubungi</label>
                                <div class="col-sm-7">
                                  <input type="text" name="xcp" class="form-control" placeholder="No Telp/Email untuk mematikan pemblokiran..." >
                                </div>
														</div>
														<div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Mode Blokir</label>
                                <div class="col-sm-7">
                                   <select class="form-control select2" name="xotmc" style="width: 100%;" required>
																			<option value="">-Pilih-</option>
                                      <option value="0"> Manual</option>
                                      <option value="1"> Otomatis Aktif setelah 3 hari<</option>
               											 </select>
                                </div>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>



				<?php
            $no = 0;
            foreach ($data->result_array() as $i) :
            $no++;
            $id_ip_block = $i['id_ip_block'];
            $ip = $i['IP'];
            $tanggal_mulai = $i['tanggal_mulai'];
            $alasan = $i['alasan'];
            $cp = $i['CP'];
            $otmc = $i['automatic'];

            ?>
        <div class="modal fade" id="ModalEdit<?php echo $id_ip_block; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Data IP yang diblokir</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/security/update_ip'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
																	<input type="hidden" name="kode" value="<?php echo $id_ip_block; ?>"/>
                                  <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">IP Address yang hendak diblokir</label>
                                <div class="col-sm-7">
                                  <input type="text" name="xip" class="form-control" id="xip" placeholder="IP Address" value=<?php echo $ip; ?>  required>
																</div>
														</div>
														<div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Alasan diblokir</label>
                                <div class="col-sm-7">
																	<input type="text" name="xalasan"  value="<?php echo $alasan; ?>" class="form-control" id="xalasan" placeholder="Masukkan Alasan memblokir karena..." required>
                                </div>
														</div>
														<div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Hubungi</label>
                                <div class="col-sm-7">
                                  <input type="text" name="xcp" class="form-control" id="inputUserName" value=<?php echo $cp; ?> placeholder="No Telp/Email untuk mematikan pemblokiran..." >
                                </div>
														</div>
													<div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Mode Blokir</label>
                                <div class="col-sm-7">
                                   <select class="form-control select2" name="xotmc" style="width: 100%;" required>
																			<?php if ($otmc == '0') : ?>
                                      <option value="0" selected> Manual</option>
																			<option value="1"> Otomatis Aktif setelah 3 hari<</option>
																			<?php else : ?>
																			<option value="1" selected> Otomatis Aktif setelah 3 hari<</option>
																			<option value="0"> Manual</option>
																			<?php endif; ?>
               											 </select>
                                </div>
														</div>	

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan"><i class="fa fa-save"></i> Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach; ?>









	
<?php foreach ($data->result_array() as $i) :
            $id_ip_block = $i['id_ip_block'];
            $ip = $i['IP'];
?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id_ip_block; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus IP Address yang diblokir</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/security/hapus_ip'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
														<input type="hidden" name="kode" value="<?php echo $id_ip_block; ?>"/>
                            <p>Apakah Anda yakin mau menghapus IP Address ini :  <b><?php echo $ip; ?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-danger btn-flat" id="simpan"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach; ?>

	
	

<script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap-datepicker.js'; ?>"></script>

<script src="<?php echo base_url().'assets/js/popper.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/app.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/demo.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'; ?>"></script>






<script>
$(function(){
		    $("#tanggal").datepicker({
			format:'yyyy/dd/mm'
		    });
                });

$(document).ready(function() {
   $('#example1').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
$(document).ready(function(){  
      $('#xip').change(function(){  
           var xip = $('#xip').val();  
           if(xip != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>admin/security/check_ip_avalibility",  
                     method:"POST",  
                     data:{xip:xip},  
                     success:function(data){  
                          $('#ip_result').html(data);  
                     }  
								});  			
           }else{
						 $.ajax({  
							  data:{xip:xip},  
                     success:function(data){  
													document.getElementById('ip_result').innerHTML = "<label class='text-warning'><b>"
													+"<i class='fa fa-exclamation-triangle' style='color:orange'></i> "+
													'Mohon isi data IPkembali'+"</b></label>";
													$('#simpan').attr('disabled', 'disabled');
											
										 }  
									});  				 
					 }
      });  
 }); 
</script>

</body>
</html>
