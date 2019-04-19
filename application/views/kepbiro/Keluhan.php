
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Pengaduan Keluhan Pegawai | Keluhan</title>
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
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/toast/	jquery.toast.min.css'; ?>">


</head>
<body class="hold-transition skin-blue sidebar-mini wysihtml5-supported sidebar-collapse">
<div class="wrapper">

	<?php 
            $this->load->view('kepbiro/header');
  ?>
  <aside class="main-sidebar" >

    <section class="sidebar">
        <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().'assets/img/avatar/staff/'.$fotok; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
					<p><?php echo ucfirst($namanw); ?></p>
					<a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" >
        <li>
          <a href="<?php echo base_url().'kepbiro/home'; ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="active">
          <a href="<?php echo base_url().'kepbiro/keluhan'; ?>">
            <i class="fa fa-newspaper-o"></i> <span>Keluhan Awal - Proses</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
				<li>
          <a href="<?php echo base_url().'kepbiro/keluhan_lanjut'; ?>">
            <i class="fa fa-clock-o"></i> <span>Keluhan Lanjut</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
      </li>
			<li>
          <a href="<?php echo base_url().'kepbiro/keluhan_selesai'; ?>">
            <i class="fa fa-flag-checkered"></i> <span>Keluhan Selesai</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
      </li>
			<li>
          <a href="<?php echo base_url().'kepbiro/keluhan_reject'; ?>">
            <i class="fa fa-window-close"></i> <span>Keluhan Ditolak</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Keluhan(Dimulai-Dalam proses Awal)
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
				<li class="active">Keluhan(Dimulai-Dalam proses Awal)</li>
      </ol>
    </section>


			<section class="content">
      <div class="row">

			<div class="col-xs-12 collapse" id="tambahkeluhan">     
         <div class="box">
            <div class="box-header with-border">
						  <h3 class="box-title">Form Pengaduan Keluhan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color:white"></i>
                </button>
                <button type="button" class="btn btn-box-tool btn" data-toggle="collapse"  data-target="#tambahkeluhan"><i class="fa fa-times" style="color:red"></i></button>
              </div>
            </div>
						<form action="<?php echo base_url().'kepbiro/keluhan/simpan_keluhan'; ?>" method="post" enctype="multipart/form-data">
            <div class="box-body" style="">
                <div class="row">
									<div class="col-md-6">
											<div class="form-group">
												<label for="text-muted text-center">Judul Keluhan</label>
												<input class="form-control" placeholder="Judul Keluhan" name="xjudul" type="text" value="">
											</div>
									 <div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="priority">Prioritas</label>	
														<select class="form-control " name="xprioritas" style="width: 100%;" required>
															<option value="">-Pilih-</option>
															<option value="1">Rendah</option>
															<option value="2">Sedang</option>
															<option value="3">Tinggi</option>
														</select>
												</div>	
											</div>	
												<div class="col-md-8">
												<div class="form-group">
													<label for="solusi">Solusi sementara dari pihak pengadu</label>	
														<textarea class="form-control" rows="4" name="xsolusi" placeholder="Solusi sementara untuk masalah yang dihadapi..."></textarea>
												</div>	
											</div>	
										</div>		
									</div>	
									
									<div class="col-md-6">
											<div class="form-group">
												<label for="text-muted text-center">Isi Keluhan/masalah yang dihadapi </label>
												<textarea class="form-control" rows="4" name="xmasalah" placeholder="Keluhan/Masalah yang dihadapi..." required></textarea>
											</div>
									</div>	
              </div>
            </div>
						<div class="box-footer clearfix no-border">
              <button type="submit" class="btn btn-info btn-sm pull-right"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </div>
				</form>
      </div>
		</div>			

			<div class="row">
				<div class="col-xs-12">     
          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat btn-sm pull-right" data-toggle="collapse" data-target="#tambahkeluhan" aria-expanded="false" aria-controls="tambahkeluhan"><span class="fa fa-plus"></span> Tambah Data Pengaduan Keluhan</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="width:100%;font-size:12px;">
                <thead>
                <tr>
                    <th style="width:14%">Aksi</th>
                    <th style="width:25%">Judul Keluhan</th>
                    <th>Pengadu Keluhan</th>
										<th style="width:5%">Prioritas</th>
                    <th style="width:20%">Status</th>
                    <th style="width:13%">Tanggal Pengaduan</th>
                </tr>
                </thead>
                <tbody>
									<?php foreach ($data->result() as $i) : ?>
                <tr>
                 <td style="text-align:left;">
								 		<span data-toggle="tooltip" data-placement="top" data-original-title="Lihat Detail">
										 <a href="<?php echo base_url().'kepbiro/keluhan/detail/'.$i->id_keluhan; ?>">
												<button type="button" class="btn btn-white btn-xs" title="View Details"><i class="fa fa-eye"></i></button>
											</a>
										</span>	
										<?php if ($i->id_staff == $idstk && $levls == '2') : ?>
										<span data-toggle="tooltip" data-placement="top" data-original-title="Edit">
										 <a data-toggle="modal" data-target="#ModalEdit<?php echo $i->id_keluhan; ?>">
												<button type="button" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pencil"></i></button>
											</a>
										</span>	
										<span data-toggle="tooltip" data-placement="top" data-original-title="Hapus">
										 <a data-toggle="modal" data-target="#ModalHapus<?php echo $i->id_keluhan; ?>">
												<button type="button" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i></button>
											</a>
										</span>	
										<span data-toggle="tooltip" data-placement="top" data-original-title="Disetujui untuk diproses">
										 <a data-toggle="modal" data-target="#ModalProses<?php echo $i->id_keluhan; ?>">
												<button type="button" class="btn btn-warning btn-xs" title="Keluhan disetujui untuk diproses"><i class="fa fa-clock-o"></i></button>
											</a>
										</span>		
												<?php elseif ($i->id_staff != $idstk && $levls == '2' && $levls != $i->id_level) : ?>
										<span data-toggle="tooltip" data-placement="top" data-original-title="Ditolak">
										 <a data-toggle="modal" data-target="#ModalTolak<?php echo $i->id_keluhan; ?>">
												<button type="button" class="btn btn-danger btn-xs" title="Keluhan ditolak"><i class="fa fa-times"></i></button>
											</a>
										</span>			
										<span data-toggle="tooltip" data-placement="top" data-original-title="Hapus">
										 <a data-toggle="modal" data-target="#ModalHapus<?php echo $i->id_keluhan; ?>">
												<button type="button" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i></button>
											</a>
										</span>
										<span data-toggle="tooltip" data-placement="top" data-original-title="Disetujui untuk diproses">
										 <a data-toggle="modal" data-target="#ModalProses<?php echo $i->id_keluhan; ?>">
												<button type="button" class="btn btn-warning btn-xs" title="Keluhan disetujui untuk diproses"><i class="fa fa-clock-o"></i></button>
											</a>
										</span>	
											<?php elseif ($i->id_staff == $idstk && $levls == '3') : ?>
										<span data-toggle="tooltip" data-placement="top" data-original-title="Edit">
										 <a data-toggle="modal" data-target="#ModalEdit<?php echo $i->id_keluhan; ?>">
												<button type="button" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pencil"></i></button>
											</a>
										</span>		
										<span data-toggle="tooltip" data-placement="top" data-original-title="Hapus">
										 <a data-toggle="modal" data-target="#ModalHapus<?php echo $i->id_keluhan; ?>">
												<button type="button" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i></button>
											</a>
										</span>	
											<?php else : ?>		
                </td>
								<?php endif; ?>		
                  <td><?php echo $i->judul; ?></td>
                  <td><?php echo $i->nama; ?></td>
									<td><?php if ($i->priority == 1):?><?php echo '<b>RENDAH<b>'; ?>
									<?php elseif ($i->priority == 2) : ?><?php echo '<p style="color:orange;"><b>SEDANG</b></p>'; ?>
										<?php elseif ($i->priority == 3) : ?><?php echo '<p style="color:red;"><b>TINGGI</b></p>'; ?>
											<?php else : ?>
										<?php endif; ?>
									</td>
                  <td><?php if ($i->status == 1) : ?><?php echo '<p style="color:green;"><b>KELUHAN DIMULAI </b></p>'; ?>
												<?php else : ?><?php echo '<p style="color:orange;"><b>KELUHAN DALAM PROSES</b><p>'; ?>
									<?php endif; ?>
									</td>
                 	<td><?php echo $i->tanggal; ?></td>
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

 						<?php
                foreach ($data->result_array() as $i) :
                    $id = $i['id_keluhan'];
                    $jdl = $i['judul'];
                    $nama = $i['nama'];
                    $prioritas = $i['priority'];
                    $solusi = $i['solusi_sementara'];
                    $mslh = $i['masalah'];
                    $status = $i['status'];
                    $tgl = $i['tanggal'];
                ?>
							<div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
											<div class="modal-content">
													<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
															<h4 class="modal-title" id="myModalLabel">Edit Keluhan</h4>
													</div>
													<form class="form-horizontal" action="<?php echo base_url().'kepbiro/keluhan/update_keluhan'; ?>" method="post" enctype="multipart/form-data">
													<div class="modal-body">
																	<div class="form-group">
																			<label for="inputUserName" class="col-sm-4 control-label">Judul</label>
																			<div class="col-sm-7">
																				<input type="hidden" name="kode" value="<?php echo $id; ?>">
																				<input type="text" name="xjudul" class="form-control" value="<?php echo $jdl; ?>" placeholder="Judul Keluhan" required>
																			</div>
																	</div>
																<div class="form-group">
																	<label for="inputUserName" class="col-sm-4 control-label">Prioritas Keluhan</label>
																	<div class="col-sm-7">
																		<select class="form-control select2" name="xprioritas" style="width: 100%;" required>
																		<?php if ($prioritas == '1'): ?> 
																					<option value="1" selected>Rendah</option>
																					<option value="2">Sedang</option>
																					<option value="3">Tinggi</option>
																		<?php elseif ($prioritas == '2') : ?> 
																					<option value="1">Rendah</option>
																					<option value="2" selected>Sedang</option>
																					<option value="3">Tinggi</option>
																		<?php elseif ($prioritas == '3') : ?> 	
																					<option value="1">Rendah</option>
																					<option value="2">Sedang</option>
																					<option value="3" selected>Tinggi</option>
																		<?php else : ?>			
																			<option value="1">Rendah</option>
																			<option value="2">Sedang</option>
																			<option value="3">Tinggi</option>
																		}
																	<?php endif; ?>
																		</select>
                                	</div>
                            		</div>
																<div class="form-group">
																	<label for="inputUserName" class="col-sm-4 control-label">Status Keluhan</label>
																	<div class="col-sm-7">
																		<select class="form-control select2" name="xstatus" style="width: 100%;" required>
																		<?php if ($status == '1') : ?> 
																					<option value="1" selected>Keluhan Dimulai</option>
																					<option value="2">Keluhan dalam Proses</option>
																					<option value="3">Keluhan telah Selesai</option>
																		<?php elseif ($status == '2') : ?> 
																					<option value="1">Keluhan Dimulai</option>
																					<option value="2" selected>Keluhan dalam Proses</option>
																					<option value="3">Keluhan telah Selesai</option>
																		<?php elseif ($status == '3') : ?> 	
																					<option value="1">Keluhan Dimulai</option>
																					<option value="2">Keluhan dalam Proses</option>
																					<option value="3" selected>Keluhan telah Selesai</option>
																		<?php else : ?>		
																					<option value="1">Keluhan Dimulai</option>
																					<option value="2">Keluhan dalam Proses</option>
																					<option value="3">Keluhan telah Selesai</option>
																		}
																	<?php endif; ?>
																		</select>
                                	</div>
                            		</div>
																<div class="form-group">
																			<label for="inputUserName" class="col-sm-4 control-label">Solusi sementara dari pihak pengadu</label>
																			<div class="col-sm-7">
																				<textarea class="form-control" rows="3" name="xsolusi" placeholder="Solusi sementara untuk masalah yang dihadapi..." ><?php echo $solusi; ?></textarea>
																			</div>
																	</div>
																	<div class="form-group">
																			<label for="inputUserName" class="col-sm-4 control-label">Isi Keluhan/masalah</label>
																			<div class="col-sm-7">
																				<textarea class="form-control" rows="3" name="xmasalah" placeholder="Isi Keluhan masalah yang dihadapi ..." required><?php echo $mslh; ?></textarea>
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


	
 				<?php
                foreach ($data->result_array() as $i) :
                $id = $i['id_keluhan'];
                $jdl = $i['judul'];
                $nama = $i['nama'];
                $prioritas = $i['priority'];
                $status = $i['status'];
                $tgl = $i['tanggal'];
                ?>
				<div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Keluhan</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'kepbiro/keluhan/hapus_keluhan'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							<input type="hidden" name="kode" value="<?php echo $id; ?>"/>
                            <p>Apakah Anda yakin mau menghapus keluhan dengan judul <b><?php echo $jdl; ?></b> ?</p>

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

	<?php
foreach ($data->result_array() as $i) :
    $id = $i['id_keluhan'];
$jdl = $i['judul'];
$nama = $i['nama'];
?>
				<div class="modal fade" id="ModalProses<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Proses Lanjut Keluhan</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'kepbiro/keluhan/proses_maju'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
											<input type="hidden" name="kode" value="<?php echo $id; ?>"/>
                            <p>Apakah Anda yakin mau memproses keluhan dengan judul <b><?php echo $jdl; ?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-info btn-flat" id="simpan"><i class="fa fa-check"></i> Ok</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach; ?>

 				<?php
                foreach ($data->result_array() as $i) :
                    $id = $i['id_keluhan'];
                $jdl = $i['judul'];
                $nama = $i['nama'];
                $prioritas = $i['priority'];
                $status = $i['status'];
                $tgl = $i['tanggal'];
                ?>
				<div class="modal fade" id="ModalTolak<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Tolak Keluhan</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'kepbiro/keluhan/tolak'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
														<input type="hidden" name="kode" value="<?php echo $id; ?>"/>
                            <p>Apakah Anda yakin mau menolak keluhan dengan judul <b><?php echo $jdl; ?></b> ?</p>
															<div class="form-group">
																<label for="inputUserName" class="col-sm-4 control-label">Alasan menolak</label>
																	<div class="col-sm-7">
																		<textarea class="form-control" rows="3" name="xnotes" placeholder="Alasan menolak keluhan tersebut ..."></textarea>
																	</div>
															</div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-danger btn-flat" id="simpan"><i class="fa fa-check"></i> Tolak</button>
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
		 "order": [[ 4, "desc" ]],
	  "responsive" : true
    });
  });
        </script>

</body>
</html>
