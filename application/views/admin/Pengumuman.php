<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Pengaduan Keluhan Pegawai | Data Pengumuman</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/img/ico/favicon.png'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-theme.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/responsive.dataTables.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'; ?>">

	<link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/_all-skins.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'; ?>"/>

</head>
<body class="hold-transition skin-blue sidebar-mini wysihtml5-supported">
<div class="wrapper">

   <?php 
    $this->load->view('admin/header');
  ?>
	
  <aside class="main-sidebar">

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
      <ul class="sidebar-menu">
				<li>
          <a href="<?php echo base_url().'admin/dashboard'; ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Pengumuman</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url().'admin/pengumuman'; ?>"><i class="fa fa-list"></i> Data Pengumuman</a></li>
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

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Pengumuman
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pengumuman</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped" style="width:100%;font-size:12px;">
                <thead>
                <tr>
					          <th style="width:5%;">#</th>
                    <th>Judul Pengumuman</th>
                    <th>Pengumuman</th>
										<th>Kategori Pengumuman</th>
                    <th>Tanggal Post</th>
                    <th>Author</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
            $no = 0;
            foreach ($data->result_array() as $i) :
            $no++;
            $id = $i['id_pengumuman'];
            $judul = $i['judul'];
            $isi = $i['pengumuman'];
            $katg = $i['nama_kategori'];
            $author = $i['author'];
            $tanggal = $i['tanggal'];

            ?>
                <tr>
                  <td ><?php echo $no; ?></td>
                  <td><?php echo $judul; ?></td>
                  <td><?php echo $isi; ?></td>
									<td><?php echo $katg; ?></td>
                  <td><?php echo $tanggal; ?></td>
                  <td><?php echo $author; ?></td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
				<?php endforeach; ?>
                </tbody>
              </table>
             </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b><?php echo $online; ?> user online</b> 
    </div>
    <strong> Copyright &copy; 2018  <a href="">Reinhart Joshua Utama - 672015116</strong></a>. All rights reserved.
	</footer>
  </div>
	
 <aside class="control-sidebar control-sidebar-dark">
    <div class="tab-content">
				<div  id="control-sidebar-home-tab">
			</div>	
		</div>
</aside>		
	

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Pengumuman</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/pengumuman/simpan_pengumuman'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                                <div class="col-sm-7">
                                  <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Judul Pengumuman" required>
                                </div>
														</div>
														<div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Kategori Pengumuman</label>
                                <div class="col-sm-7">
                                   <select class="form-control select2" name="xkategori" style="width: 100%;" required>
																			<option value="">-Pilih-</option>
																			 <?php
                                           $no = 0;
                                           foreach ($kat->result_array() as $i) :
                                           $no++;
                                           $id_kategori = $i['id_kategori'];
                                           $nama_kategori = $i['nama_kategori'];
                                        ?>
                  										<option value="<?php echo $id_kategori; ?>"><?php echo $nama_kategori; ?></option>
				  														<?php endforeach; ?>
               											 </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Isi Pengumuman</label>
                                <div class="col-sm-7">
                                  <textarea class="form-control" rows="3" name="xisi" placeholder="Isi Pengumuman..." required></textarea>
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
            $id = $i['id_pengumuman'];
            $judul = $i['judul'];
            $isi = $i['pengumuman'];
            $idka = $i['id_kategori'];
            $katg = $i['nama_kategori'];
            $author = $i['author'];
            $tanggal = $i['tanggal'];

          ?>
							<div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
											<div class="modal-content">
													<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
															<h4 class="modal-title" id="myModalLabel">Edit Pengumuman</h4>
													</div>
													<form class="form-horizontal" action="<?php echo base_url().'admin/pengumuman/update_pengumuman'; ?>" method="post" enctype="multipart/form-data">
													<div class="modal-body">

																	<div class="form-group">
																			<label for="inputUserName" class="col-sm-4 control-label">Judul</label>
																			<div class="col-sm-7">
																				<input type="hidden" name="kode" value="<?php echo $id; ?>">
																				<input type="text" name="xjudul" class="form-control" value="<?php echo $judul; ?>" id="inputUserName" placeholder="Judul" required>
																			</div>
																	</div>
																<div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Kategori Pengumuman</label>
                                <div class="col-sm-7">
                                   <select class="form-control select2" name="xkategori" style="width: 100%;" required>
																			 <?php
                                         foreach ($kat->result_array() as $i) {
                                             $id_kategori = $i['id_kategori'];
                                             $nama_kategori = $i['nama_kategori'];
                                             if ($idka == $id_kategori) {
                                                 echo "<option value='$id_kategori' selected>$nama_kategori</option>";
                                             } else {
                                                 echo "<option value='$id_kategori'>$nama_kategori</option>";
                                             }
                                         } ?>
               											 </select>
                                </div>
                            		</div>
																	<div class="form-group">
																			<label for="inputUserName" class="col-sm-4 control-label">Isi Pengumuman</label>
																			<div class="col-sm-7">
																				<textarea class="form-control" rows="3" name="xisi" placeholder="Isi Pengumuman ..." required><?php echo $isi; ?></textarea>
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
                    $id = $i['id_pengumuman'];
                    $judul = $i['judul'];
                    $isi = $i['pengumuman'];
                    $katg = $i['nama_kategori'];
                    $author = $i['author'];
                    $tanggal = $i['tanggal'];
                ?>		
				<div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Pengumuman</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/pengumuman/hapus_pengumuman'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							<input type="hidden" name="kode" value="<?php echo $id; ?>"/>
                            <p>Apakah Anda yakin mau menghapus pengumuman dengan judul <b><?php echo $judul; ?></b> ?</p>

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
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.responsive.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/app.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/demo.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'; ?>"></script>
<script>
  $(function () {
    $('#example1').DataTable({
    "paging": true,
	  "scrollX": true,
		 "order": [[ 0, "asc" ]],
	  "responsive" : true
    });
  });
        </script>

</body>
</html>
