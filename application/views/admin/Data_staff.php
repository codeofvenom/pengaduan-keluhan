<!--Counter Inbox-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Pengaduan Keluhan Pegawai | Data Admin</title>
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
          <img src="<?php echo base_url().'assets/img/avatar/admin/'.$fotok; ?>" class="lazyload img-circle" alt="User Image">
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
      
		<li class="active">
          <a href="<?php echo base_url().'admin/data_staff'; ?>">
            <i class="fa fa-user"></i> <span> Data Staff</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        
		<li class="treeview">
          <a href="#">
            <i class="fa fa-shield"></i>
             <span>Keamanan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?php echo base_url().'admin/security'; ?>"><i class="fa fa-ban"></i> Data Block IP</a></li>
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
        Data Staff
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Staff</a></li>
        <li class="active">Data Staff</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Staff</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="stafftable" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                <tr>
										<th style="width:5%;">#</th>
										<th>Foto</th>
                    					<th>NIS</th>
										<th>Nama</th>
										<th>Nama Group</th>
										<th>Level</th>
										<th>Status</th>
										<th>Terdaftar pada</th>
										<th>Didaftarkan oleh</th>
										<th>Terakhir login</th>
										<th>IP Address</th>
                    <th style="width:10%;text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
            $no = 0;
            foreach ($data->result_array() as $i) :
                $no++;
                $id_staff = $i['id_staff'];
                $nis = $i['nis'];
                $nama = $i['nama'];
                $jk = $i['gender'];
                $foto = $i['foto'];
                $level = $i['nama_level'];
                $group = $i['nama_group'];
                $last_login = $i['last_login'];
                $created_by = $i['created_by'];
                $created_on = $i['created_on'];
                $active = $i['active'];
                $ip = $i['IP'];
            ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><img width="90" height="80" class="lazyload img-circle" src="<?php echo base_url().'assets/img/avatar/staff/'.$foto; ?>"></td>
 									<td><?php echo $nis; ?></td>
									<td><?php echo $nama; ?></td>
									<td><?php echo $group; ?></td>
									<td><?php echo $level; ?></td>
									<td><?php if ($active == 1) :  echo 'Aktif'; ?>
										<?php else : echo 'Non-Aktif'; ?>
										<?php endif; ?>
									</td>
									<td><?php echo $created_on; ?></td>
									<td><?php echo $created_by; ?></td>
									<td><?php echo $last_login; ?></td>
									<td><?php echo $ip; ?></td>
				   <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id_staff; ?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id_staff; ?>"><span class="fa fa-trash"></span></a>
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
                        <h4 class="modal-title" id="myModalLabel">Tambah Staff</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/data_staff/simpan_staff'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">NIS</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnis" class="form-control" id="xnis" placeholder="Nomor Induk Staff" required>	
												<span id="nis_result"></span>
										</div>
                                    </div> 
									<div class="form-group">
                                        <label for="inputNama" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnama" class="form-control" id="xnama" placeholder="Nama Staff" required>	
										</div>
                                    </div> 
									<div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-7">
                                           <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="Laki-laki" name="xjenkel" checked>
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="Perempuan" name="xjenkel">
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword" class="form-control" id="xpassword" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword2" class="form-control" id="xpassword2" placeholder="Ulangi Password" required>
                                        <span id="password_result"></span>
										</div>
                                    </div>  
									<div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Grup</label>
                                <div class="col-sm-7">
                                   <select class="form-control select2" name="xgroup" style="width: 100%;" required>
																			<option value="">-Pilih-</option>
																			 <?php
                                                                            foreach ($grp->result_array() as $i) :
                                                                            $id_group = $i['id_group'];
                                                                            $nama_group = $i['nama_group'];
                                                                            ?>
                  										<option value="<?php echo $id_group; ?>"><?php echo $nama_group; ?></option>
				  														<?php endforeach; ?>
               											 </select>
                                </div>
                            </div>
									 <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="xlevel" required>
												<option value="" required>-Pilih-</option>
                                                <option value="2"> Kepala Biro</option>
                                                <option value="3"> Staff</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="xstatus" required>
												<option value="" required>-Pilih-</option>
                                                <option value="1"> Aktif</option>
                                                <option value="2"> Non-aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Foto</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto">
                                        </div>
                                    </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan" $submited><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

		<?php
        $no = 0;
        foreach ($data->result_array() as $i) :
        $no++;
        $id_staff = $i['id_staff'];
        $nis = $i['nis'];
        $nama = $i['nama'];
        $jk = $i['gender'];
        $foto = $i['foto'];
        $level = $i['nama_level'];
        $group = $i['nama_group'];
        $idg = $i['id_group'];
        $idl = $i['id_level'];
        $last_login = $i['last_login'];
        $created_by = $i['created_by'];
        $created_on = $i['created_on'];
        $active = $i['active'];
        $ip = $i['IP'];
        ?>
	<div class="modal fade" id="ModalEdit<?php echo $id_staff; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Staff</h4>
                    </div>
                      <form class="form-horizontal" action="<?php echo base_url().'admin/data_staff/update_staff'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">NIS</label>
                                        <div class="col-sm-7">
										<input type="hidden" name="kode" value="<?php echo $id_staff; ?>"/>
										<input type="text" name="xnis" class="form-control"  value=<?php echo $nis; ?> id="xnis" placeholder="Nomor Induk Staff" required>	
										<br>
											<span id="nis_result"></span>
										</div>
                                    </div> 
									<div class="form-group">
                                        <label for="inputNama" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnama" class="form-control" id="xnama" value="<?php echo $nama; ?>" placeholder="Nama Staff" required>	
										</div>
                                    </div> 
									    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-7">
										<?php if ($jk == 'Laki-laki') : ?>
                                           <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="Laki-laki" name="xjenkel" checked>
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="Perempuan" name="xjenkel">
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
										<?php else : ?>
											<div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="Laki-laki" name="xjenkel">
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="Perempuan" name="xjenkel" checked>
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
										<?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword" class="form-control" id="xpassword" placeholder="Password" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword2" class="form-control" id="xpassword2" placeholder="Ulangi Password">
                                        <span id="password_result"></span>
										</div>
                                    </div>  
									<div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Grup</label>
                                <div class="col-sm-7">
                                   <select class="form-control select2" name="xgroup" style="width: 100%;" required>
												<?php
                                            foreach ($grp->result_array() as $i) {
                                                $id_group = $i['id_group'];
                                                $nama_group = $i['nama_group'];
                                                if ($idg == $id_group) {
                                                    echo "<option value='$id_group' selected>$nama_group</option>";
                                                } else {
                                                    echo "<option value='$id_group'>$nama_group</option>";
                                                }
                                            } ?>					
               											 </select>
                                </div>
                            </div>
									 <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="xlevel">
										<?php if ($idl == 2) : ?>
												<option value="2" selected > Kepala Biro</option>   
												<option value="3" > Staff</option>
										<?php else : ?>
												<option value="3" selected > Staff</option>    
												<option value="2" > Kepala Biro</option>
												                                            
										<?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-7">
                                        <select class="form-control" name="xstatus">   
										   <?php if ($active == '1') : ?>
												<option value="1" selected >Aktif</option>   
												<option value="0" >Non-aktif</option>
										<?php else : ?>
												<option value="0" selected > Non-aktif</option>    
												<option value="1" > Aktif</option>
												                                            
										<?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Foto</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto">
                                        </div>
                                    </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan" $submited><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach; ?>



	 	<?php foreach ($data->result_array() as $i) :
        $id_staff = $i['id_staff'];
        $nis = $i['nis'];
        $nama = $i['nama'];
        ?>
        <div class="modal fade" id="ModalHapus<?php echo $id_staff; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Admin</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/data_staff/hapus_staff'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							<input type="hidden" name="kode" value="<?php echo $id_staff; ?>"/>
                            <p>Apakah Anda yakin mau menghapus staff <b><?php echo $nama; ?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-danger btn-flat" ><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach; ?>

	
	

<script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/popper.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/lazysizes.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/app.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/demo.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'; ?>"></script>

<script>
 $(function () {
    $('#stafftable').DataTable({
      "paging": true,
	  "scrollX": true
    });
  });
 $(document).ready(function(){  
		$('#xpassword2').on('keyup', function() {
			 if ($('#xpassword').val() == $('#xpassword2').val()) {
					$('#password_result').html("<i class='fa fa-check' style='color:green'></i>"+
					' Password sesuai').css('color', 'green');
					document.getElementById("simpan").disabled = false;
			 }else{
				 		$('#password_result').html('Konfirmasi Password tidak sesuai').css('color', 'red');
						 
			 }	
			});		
});	
 $(document).ready(function(){  
      $('#xnis').change(function(){  
           var xnis = $('#xnis').val();  
           if(xnis != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>admin/data_staff/check_nis_avalibility",  
                     method:"POST",  
                     data:{xnis:xnis},  
                     success:function(data){  
                          $('#nis_result').html(data);  
                     }  
								});  			
           }else{
						 $.ajax({  
						data:{xnis:xnis},  
                     success:function(data){  
													document.getElementById('nis_result').innerHTML = "<label class='text-warning'><b>"
													+"<i class='fa fa-exclamation-triangle' style='color:orange'></i> "+
													'Mohon isi data NIS kembali'+"</b></label>";
													$('#simpan').attr('disabled', 'disabled');
										 }  
									});  				 
					 }
      });  
 }); 

</script>
<?php if ($this->session->flashdata('msg') == 'error') : ?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    position: 'bottom-right',
                    bgColor: '#FF4859',
					hideAfter: 5000 
                });
        </script>
    <?php elseif ($this->session->flashdata('msg') == 'warning') : ?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Warning',
                    text: "Gambar yang Anda masukan terlalu besar.",
                    showHideTransition: 'slide',
                    icon: 'warning',
                    hideAfter: 5000,
                    position: 'bottom-right',
                    bgColor: '#FFC017'
                });
        </script>
    <?php elseif ($this->session->flashdata('msg') == 'success') : ?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data Staff Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif ($this->session->flashdata('msg') == 'info') : ?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Data Staff berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: 5000,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif ($this->session->flashdata('msg') == 'success-hapus') : ?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data Staff Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else : ?>

    <?php endif; ?>

</body>
</html>
