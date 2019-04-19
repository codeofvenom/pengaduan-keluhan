
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Pengaduan Keluhan Pegawai | Detail Keluhan </title>
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

	<style type="text/css">
  		.ajax-load{
  			background: #e1e1e1;
		    padding: 10px 0px;
		    width: 100%;
  		}
  	</style>

</head>
<body class="skin-blue sidebar-mini wysihtml5-supported sidebar-collapse">
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
        <li>
          <a href="<?php echo base_url().'kepbiro/keluhan'; ?>">
            <i class="fa fa-newspaper-o"></i> <span>Keluhan Awal-Proses</span>
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
        Detail Keluhan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
				<li class="active">Detail Keluhan</li>
      </ol>
    </section>


	<section class="content">
      	<div class="row">
					<div class="col-md-4">
          	<div class="box box-primary">
            	<div class="box-body box-profile">
								<?php foreach ($data->result() as $i) : ?>
            		<h4 class="profile-username text-left">Detail Keluhan</h4>
									<ul class="list-group  list-group-unbordered">
										<br>		
										<li class="list-group-item striped">
											<b>Judul Keluhan</b><a class="pull-right"><?php echo $i->judul; ?></a>
										</li>
										<li class="list-group-item">
											<b>Nama Staff</b><a class="pull-right"><?php echo $i->nama; ?></a>
										</li>
										<li class="list-group-item">
											<b>Prioritas</b><a class="pull-right"><?php if ($i->priority == 1) : ?>
										<?php echo '<b>RENDAH</b></a>'; ?>
											<?php elseif ($i->priority == 2) : ?><?php echo '<p style="color:orange;"><b>SEDANG</b></p>'; ?>
										<?php elseif ($i->priority == 3) : ?><?php echo '<p style="color:red;"><b>TINGGI</b></p>'; ?>
											<?php else : ?>
										<?php endif; ?>
										</a>
										</li>
										<li class="list-group-item">
											<b>Status</b><a class="pull-right"><?php if ($i->status == 1) : ?><?php echo '<p style="color:green;"><b>KELUHAN DIMULAI </b></p>'; ?></a>
											<?php elseif ($i->status == 2 && $i->signmark_bykepbiro == 0) : ?><?php echo '<p style="color:orange;"><b>KELUHAN DALAM PROSES</b><p>'; ?></a>
											<?php elseif ($i->status == 2 && $i->signmark_bykepbiro == 1) : ?><?php echo '<p style="color:orange;"><b>KELUHAN DALAM PROSES KEPALA BIRO</b><p>'; ?></a>
											<?php elseif ($i->status == 3 && $i->signmark_bykepbiro == 0) : ?><?php echo '<p style="color:blue;"><b>KELUHAN TELAH SELESAI(PENDING) </b></p>'; ?></a>
											<?php elseif ($i->status == 3 && $i->signmark_bykepbiro == 1) : ?><?php echo '<p style="color:blue;"><b>KELUHAN TELAH SELESAI</b></p>'; ?></a>
											<?php elseif ($i->status == 0 && $i->signmark_bykepbiro == 1) : ?><?php echo '<p style="color:red;"><b>KELUHAN DITOLAK</b></p>'; ?></a>
											<?php else:?></a>	
										</li>
										<?php endif; ?>
										<li class="list-group-item">
											<b>Tanggal Pengaduan</b><a class="pull-right"><p><b><?php echo $i->tanggal; ?></p></b></a>
										</li>
									</ul>		
            	</div>
						</div>
          

						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Proses Keluhan</h3>
							</div>
							<div class="box-body">
							<?php if ($i->status == 2 && $i->signmark_bykepbiro == 0) : ?>
								<strong><i class="fa fa-spinner" style="color:orange"></i> Tanggal Proses oleh Staff Pengadu </strong>
								<p>
									<br>	&emsp;&emsp;&emsp;<b><?php echo $i->tgl_proses; ?></b>
								</p>	
								<hr>	
									<strong><i class="fa fa-check margin-r-5" style="color:green"></i> Tanggal Selesai</strong>		
										<p>
											<br>	&emsp;&emsp;&emsp; <b>- &emsp;(Belum diketahui)</b>
										</p>	
								</div>
								<?php elseif ($i->status == 2 && $i->signmark_bykepbiro == 1):?>
								<strong><i class="fa fa-spinner" style="color:orange"></i> Tanggal Proses oleh Kepala Biro  </strong>
								<p>
									<br>	&emsp;&emsp;&emsp;<b><?php echo $i->tgl_proses2; ?></b>
								</p>	
								<hr>	
									<strong><i class="fa fa-check margin-r-5" style="color:green"></i> Tanggal Selesai</strong>		
										<p>
											<br>	&emsp;&emsp;&emsp; <b>- &emsp;(Belum diketahui)</b>
										</p>	
								</div>
								<?php elseif ($i->status == 3 && $i->signmark_bykepbiro == 0) : ?>
									<strong><i class="fa fa-spinner" style="color:orange"></i> Tanggal Proses oleh Kepala Biro  </strong>
													<p>
														<br>	&emsp;&emsp;&emsp;<b><?php echo $i->tgl_proses2; ?></b>
													</p>	
										<hr>	
								<strong><i class="fa fa-check margin-r-5"></i> Tanggal Selesai</strong>
								<p>
									<br>	&emsp;&emsp;&emsp;	<b><?php echo $i->tgl_selesai; ?></b>
								</p>
							</div >		
								<?php elseif ($i->status == 3 && $i->signmark_bykepbiro == 1) : ?>
									<strong><i class="fa fa-spinner" style="color:orange"></i> Tanggal Proses oleh Kepala Biro  </strong>
													<p>
														<br>	&emsp;&emsp;&emsp;<b><?php echo $i->tgl_proses2; ?></b>
													</p>	
													<hr>	
								<strong><i class="fa fa-check margin-r-5"></i> Tanggal Selesai</strong>
								<p>
									<br>	&emsp;&emsp;&emsp;	<b><?php echo $i->tgl_selesai; ?></b>
								</p>
							</div >
							<?php else:?>
							<strong><i class="fa fa-spinner" style="color:orange"></i> Tanggal Proses oleh Staff Pengadu </strong>
													<p>
															<br>	&emsp;&emsp;&emsp; <b>- &emsp;(Belum diketahui)</b>
													</p>	
													<hr>	
								<strong><i class="fa fa-check margin-r-5"></i> Tanggal Selesai</strong>
								<p>
										<br>	&emsp;&emsp;&emsp; <b>- &emsp;(Belum diketahui)</b>
								</p>
							</div>
							<?php endif; ?>
						</div>
						</div>

				<div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#masalah" data-toggle="tab"><i class="fa fa-newspaper-o"></i> Masalah & Solusi Sementara</a></li>
							<li><a href="#comments" data-toggle="tab"><i class="fa fa-comments"></i> Komentar</a></li>
							  <li><a href="#notes" data-toggle="tab"><i class="fa fa-sticky-note"></i> Kesimpulan Akhir Masalah/Alasan Penolakan Keluhan</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="masalah">
							<br>
							<div class="info">
							<strong>Masalah :</strong>
							<br>
              		&emsp;&emsp;<blockquote class="blockquote mb-1 mb-md-0"><p><?php echo $i->masalah; ?></p></blockquote>
							</div>
							<hr>
							<strong>Solusi Sementara :</strong><br><br>
							<blockquote class="blockquote">
										<?php echo $i->solusi_sementara; ?>
							</blockquote>
				
              </div>

              <div class="tab-pane" id="comments">
              	<?php if (($i->status == 3 && $i->signmark_bykepbiro == 1) || ($i->status == 0 && $i->signmark_bykepbiro == 1)) : ?>
							<br>
							<?php else : ?>
							<form class="form-horizontal" action="<?php echo base_url().'kepbiro/keluhan/tambah_komentar'; ?>" method="post" enctype="multipart/form-data">
										<div class="form-group">
								<div class="col-md-12">
									<input type="hidden" name="kode" value="<?php echo $i->id_keluhan; ?>">
									<textarea  class="form-control" name="xcomment"   rows="3" placeholder="Masukkan Komentar tanggapanmu  atau solusi akan masalah ini..." require></textarea>
									<p>
									<br>
									<button type="submit" class="btn btn-primary btn-flat pull-right"><i class="fa fa-save"></i>Bagikan</button>
								</div>	
							</div>
							</form>
								<?php endif; ?>
					
              <table id="komentar2" class="table table-hover table-striped"  style="width:100%;">
                  <thead>
										<tr>
											<th>Semua Komentar</th>
										</tr>
									</thead>	
									<tbody>
										<?php foreach ($comment->result() as $cmt) : ?>
								 <tr>
								 		<td>
										 <div class="user-block">
                    	<img class="img-circle img-bordered-sm" src="<?php echo base_url().'assets/img/avatar/staff/'.$cmt->foto; ?>">
                        <span class="username">
                          <a href="#"><?php echo $cmt->nama; ?></a>
													<?php if ($cmt->id_staff != $idstk && $cmt->id_level == $levls):?>										
													<?php else:?>
													<a data-toggle="modal" data-target="#ModalHapus<?php echo $cmt->id_komentar; ?>" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
													<?php endif; ?>
                          <a href="#" class="pull-right btn-box-tool"></a>
                        </span>
                    <span class="description">  <?php echo $cmt->jam_komentar; ?></span>
										<p>
													&emsp;&emsp;<?php echo $cmt->komentar; ?>
                  </p>
                  </div>
										 </td>
								 </tr>
								 		<?php endforeach; ?>
									</tbody>	 
							
              </table>

              </div>
             

              <div class="tab-pane" id="notes">
							<br>
							<strong> Kesimpulan Akhir/Alasan Penolakan Keluhan	</strong><br><br>
							<blockquote class="blockquote mb-1 mb-md-0">
										<?php echo $i->notes; ?> 
							</blockquote>
							<br>
							<?php if ($levls == '2' && ($i->id_level == $levls && $i->id_staff == $idstk || ($i->id_level != $levls && $i->id_staff != $idstk)) && (($i->status == '3' && $i->signmark_bykepbiro == '0')
                       || ($i->status == '3' && $i->signmark_bykepbiro == '1') || ($i->status == '2' && $i->signmark_bykepbiro == '0')
                       || ($i->status == '0' && $i->signmark_bykepbiro == '1') || ($i->status == '2' && $i->signmark_bykepbiro == '1'))):?>
							<form class="form-horizontal" action="<?php echo base_url().'kepbiro/keluhan_lanjut/update_detail_notes'; ?>" method="post" enctype="multipart/form-data">
							<hr>
							<div class="form-group">
								<div class="col-md-12">
									<input type="hidden" name="kode" value="<?php echo $i->id_keluhan; ?>">
									<textarea  class="form-control" name="xnotes"   rows="3" placeholder="Kesimpulan Akhir/Alasan Penolakan Keluhan..."><?php echo $i->notes; ?></textarea>
									<p>
									<br>
									<button type="submit" class="btn btn-primary btn-flat pull-right"><i class="fa fa-save"></i>Update</button>
								</div>	
							</div>
							</form>
							</div>
							<?php else:?>
              <!-- /.tab-pane -->
						</div>
						<?php endif; ?>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
					

	</section>
	</div>
		<?php endforeach; ?>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b><?php echo $online; ?> user online</b> 
    </div>
    <strong> Copyright &copy; 2018  <a href="">Reinhart Joshua Utama - 672015116</strong></a>. All rights reserved.
	</footer>
  </div>


	
 <aside class="control-sidebar control-sidebar-dark">
    <div class="tab-content">
      <div class="tab-pane" id="control-sidebar-home-tab">
			</div>	
		</div>
</aside>	

					<?php foreach ($comment->result() as $cmt) : ?>
				<div class="modal fade" id="ModalHapus<?php echo $cmt->id_komentar; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Komentar</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'kepbiro/keluhan/hapus_komentar'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
											<input type="hidden" name="kode" value="<?php echo $cmt->id_komentar; ?>"/>
											<p>Apakah Anda yakin mau menghapus komentar dari  <b><?php echo $cmt->nama; ?></b> ?</p>
                            

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
<script src="<?php echo base_url().'assets/js/popper.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.responsive.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/app.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/demo.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'; ?>"></script>

<script>

$(document).ready(function() {
   $('#komentar2').DataTable( {
		  "order": [[ 0, "desc" ]],
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
</script>

</body>
</html>
