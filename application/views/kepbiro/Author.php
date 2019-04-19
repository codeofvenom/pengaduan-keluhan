
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Pengaduan Keluhan Pegawai | Home - Author</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/img/ico/favicon.png'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-theme.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/_all-skins.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/toast/	jquery.toast.min.css'; ?>">
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
        <li class="active">
          <a href="<?php echo base_url().'staff/home'; ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li >
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
       Author
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
				<li class="active">Author</li>
      </ol>
    </section>


	<section class="content">
      	<div class="row">
				<div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-newspaper-o"></i>&nbsp; Posting Berita</h3>
            </div>
						
            <div class="box-body">
						 <form class="form-horizontal" action="<?php echo base_url().'kepbiro/home/simpan_pengumuman'; ?>" method="post" enctype="multipart/form-data">
							 		<p class="text-muted text-center">Judul Pengumuman</p>
										<div class="form-group">
												<div class="col-sm-6-center">
												<input type="text" name="xjudul" class="form-control" id="inputUserName" style="width:98%;" placeholder="Judul Pengumuman..." required>
												</div>
										</div>
									<p class="text-muted text-center">Kategori Pengumuman</p>
										<div class="form-group">
												<div class="col-sm-6-center">
											 <select class="form-control select2" name="xkategori" style="width:98%;" required>
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
									<p class="text-muted text-center">Judul Pengumuman</p>
										<div class="form-group">
												<div class="col-sm-6-center">
												 <textarea class="form-control" rows="4" style="width:98%;" name="xisi" placeholder="Isi Pengumuman..." required></textarea>
												</div>
										</div>	
 									<div class="footer">
									   		<button type="reset" class="pull-left btn btn-default" id="simpan"><i class="fa fa-refresh"></i> Reset</button>
                        <button type="submit" class="pull-right btn btn-success" id="simpan"><i class="fa fa-save"></i> Simpan</button>
                  </div>
								</form>		
						</div>
					</div>



					<div class="box box-primary">
            <div class="box-body box-profile"> 
              <h3 class="profile-username text-center">Kategori Pengumuman</h3>
							<br>
              <ul class="list-group list-group-unbordered">
										 <?php foreach ($pengumuman->result() as $ktg) : ?>
                <li class="list-group-item">
									<i><a class="pull" 
									href="<?php echo base_url().'kepbiro/home/detail/'.$ktg->id_kategori; ?>"><?php echo $ktg->nama_kategori; ?></a><a class="pull-right"><b>
										 <?php
                                        foreach ($jml->result() as $i) :
                                            if ($i->id_kategori == $ktg->id_kategori) {
                                                echo $i->jumlah;
                                            } else {
                                                echo '';
                                            }
                                        ?>	<?php endforeach; ?>
									</a></b></i>
                </li>
								<?php endforeach; ?>
              </ul>
            </div>
				</div>
		</div>
		

					


			 

       	 	<div class="col-md-8">
          	<ul class="timeline">
							 <?php foreach ($posts->result() as $post) : ?>
            	<li class="time-label">
                 	 <span class="bg-red"><?php echo $post->tanggal.'&nbsp;'.$post->bulan.'&nbsp;'.$post->tahun; ?></span>
            	</li>
           		 <li>
              <i class="fa fa-newspaper-o bg-blue"></i>
						  <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $post->jam; ?></span>
                <h3 class="timeline-header"><a><?php echo $post->judul; ?></a></h3>
                <div class="timeline-body">
             				<?php echo $post->pengumuman; ?><br><br>
                </div>
                <div class="timeline-footer">
								<?php if ($post->nis == $niss && !empty($post->nis)) : ?>	
                  <a class="btn btn-info btn-xs" href="<?php echo base_url().'kepbiro/home/detail/'.$ktg->id_kategori; ?>"># 	<?php echo $post->nama_kategori; ?></a>
                  <a class="btn btn-primary btn-xs" href="<?php echo base_url().'kepbiro/home/authors/'.$post->nis; ?>"><i class="fa fa-user"></i> <?php echo $post->author; ?></a>
			 	
									<a class="btn pull-right" data-toggle="modal" data-target="#ModalHapus<?php echo $post->id_pengumuman; ?>"><span class="fa fa-trash" style="color:red;"></span></a>
									<a class="btn  pull-right" data-toggle="modal" data-target="#ModalEdit<?php echo $post->id_pengumuman; ?>	"><span class="fa fa-pencil"></span></a>
                <?php elseif (!empty($post->nis)) : ?>	
                  <a class="btn btn-info btn-xs" href="<?php echo base_url().'kepbiro/home/detail/'.$ktg->id_kategori; ?>"> # 	<?php echo $post->nama_kategori; ?></a>
                  <a class="btn btn-primary btn-xs" href="<?php echo base_url().'kepbiro/home/authors/'.$post->nis; ?>"><i class="fa fa-user"></i> <?php echo $post->author; ?></a>
									<?php else : ?>
									<a class="btn btn-info btn-xs" href="<?php echo base_url().'kepbiro/home/detail/'.$ktg->id_kategori; ?>"># 	<?php echo $post->nama_kategori; ?></a>
                  <a class="btn btn-primary btn-xs" href="<?php echo base_url().'kepbiro/home/author/'.$post->author; ?>"><i class="fa fa-user"></i> <?php echo $post->author; ?></a>
									<?php endif; ?>
								</div>
              </div>
            </li>
							<?php endforeach; ?>

					<div class="col-md-12 text-center">
						<?php echo $page; ?>		
						<br>		
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
      <div class="tab-pane" id="control-sidebar-home-tab">
			</div>	
		</div>
</aside>	

		 <?php foreach ($posts->result() as $post) : ?>
				<div class="modal fade" id="ModalHapus<?php echo $post->id_pengumuman; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Pengumuman</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'kepbiro/home/hapus_pengumuman_staff'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
										<input type="hidden" name="kode" value="<?php echo $post->id_pengumuman; ?>"/>
										<input type="hidden" name="nis" value="<?php echo $niss; ?>"/>
                            <p>Apakah Anda yakin mau menghapus pengumuman dengan judul <b><?php echo $post->judul; ?></b> ?</p>

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
													<form class="form-horizontal" action="<?php echo base_url().'kepbiro/home/update_pengumuman'; ?>" method="post" enctype="multipart/form-data">
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






<script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/app.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/demo.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'; ?>"></script>

</body>
</html>
