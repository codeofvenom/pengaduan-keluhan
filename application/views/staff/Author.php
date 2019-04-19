
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
            $this->load->view('staff/header');
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
       <li>
          <a href="<?php echo base_url().'staff/keluhan'; ?>">
            <i class="fa fa-newspaper-o"></i> <span>Keluhan Awal-Proses</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
					<li>
          <a href="<?php echo base_url().'staff/keluhan_lanjut'; ?>">
            <i class="fa fa-clock-o"></i> <span>Keluhan Lanjut</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
			<li>
          <a href="<?php echo base_url().'staff/keluhan_selesai'; ?>">
            <i class="fa fa-flag-checkered"></i> <span>Keluhan Selesai</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
      </li>
		<li>
          <a href="<?php echo base_url().'staff/keluhan_reject'; ?>">
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
        Home 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      </ol>
    </section>


	<section class="content">
      	<div class="row">
				<div class="col-md-3">
         


					<div class="box box-primary">
            <div class="box-body box-profile"> 
              <h3 class="profile-username text-center">Kategori Pengumuman</h3>
							<br>
              <ul class="list-group list-group-unbordered">
										 <?php foreach ($pengumuman->result() as $ktg) : ?>
                <li class="list-group-item">
									<i><a class="pull" 
									href="<?php echo base_url().'staff/home/detail/'.$ktg->id_kategori; ?>"><?php echo $ktg->nama_kategori; ?></a><a class="pull-right"><b>
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
                  <a class="btn btn-info btn-xs" href="<?php echo base_url().'staff/home/detail/'.$ktg->id_kategori; ?>"># 	<?php echo $post->nama_kategori; ?></a>
                  <a class="btn btn-primary btn-xs" href="<?php echo base_url().'staff/home/authors/'.$post->nis; ?>"><i class="fa fa-user"></i> <?php echo $post->author; ?></a>
			 	
                <?php elseif (!empty($post->nis)) : ?>	
                  <a class="btn btn-info btn-xs" href="<?php echo base_url().'staff/home/detail/'.$ktg->id_kategori; ?>"> # 	<?php echo $post->nama_kategori; ?></a>
                  <a class="btn btn-primary btn-xs" href="<?php echo base_url().'staff/home/authors/'.$post->nis; ?>"><i class="fa fa-user"></i> <?php echo $post->author; ?></a>
									<?php else : ?>
									<a class="btn btn-info btn-xs" href="<?php echo base_url().'staff/home/detail/'.$ktg->id_kategori; ?>"># 	<?php echo $post->nama_kategori; ?></a>
                  <a class="btn btn-primary btn-xs" href="<?php echo base_url().'staff/home/author/'.$post->author; ?>"><i class="fa fa-user"></i> <?php echo $post->author; ?></a>
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
