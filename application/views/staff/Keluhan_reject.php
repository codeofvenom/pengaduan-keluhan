
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Pengaduan Keluhan Pegawai | Keluhan Ditolak</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/img/ico/favicon.png'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-theme.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/dist/css/select2.min.css'; ?>">
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
        <li>
          <a href="<?php echo base_url().'staff/home'; ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li >
          <a href="<?php echo base_url().'staff/keluhan'; ?>">
            <i class="fa fa-newspaper-o"></i> <span>Keluhan Awal - Proses</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
				<li >
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
		<li class="active">
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
        Data Keluhan ditolak
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
				<li class="active">Keluhan  telah ditolak</li>
      </ol>
    </section>


			<section class="content">


	

			<div class="row">
				<div class="col-xs-12">     
          <div class="box">
            <div class="box-header">
              <a class="text-black pull-left"><h4>Data Pengaduan Keluhan ditolak</h4></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="width:100%;font-size:12px;">
                <thead>
                <tr>
                    <th style="width:5%">Aksi</th>
                    <th style="width:12%">Judul Keluhan</th>
                    <th>Pengadu Keluhan</th>
										<th style="width:5%">Prioritas</th>
                    <th style="width:20%">Status</th>
										<th style="width:30%">Kesimpulan/Solusi</th>
                    <th style="width:13%">Tanggal Pengaduan</th>
                </tr>
                </thead>
                <tbody>
									<?php foreach ($data->result() as $i) : ?>
                <tr>
                 <td style="text-align:left;">
								 		<span data-toggle="tooltip" data-placement="top" data-original-title="Lihat Detail">
										 <a href="<?php echo base_url().'staff/keluhan/detail/'.$i->id_keluhan; ?>">
												<button type="button" class="btn btn-white btn-xs" title="View Details"><i class="fa fa-eye"></i></button>
											</a>
										</span>	
                </td>
                  <td><?php echo $i->judul; ?></td>
                  <td><?php echo $i->nama; ?></td>
									<td><?php if ($i->priority == 1):?><?php echo '<b>RENDAH<b>'; ?>
									<?php elseif ($i->priority == 2) : ?><?php echo '<p style="color:orange;"><b>SEDANG</b></p>'; ?>
										<?php elseif ($i->priority == 3) : ?><?php echo '<p style="color:red;"><b>TINGGI</b></p>'; ?>
											<?php else : ?>
										<?php endif; ?>
									</td>
                	 <td><?php if ($i->status == 0 && $i->signmark_bykepbiro == 1) : ?><?php echo '<p style="color:red;"><b>KELUHAN DITOLAK </b></p>'; ?>
												<?php else : ?>
									<?php endif; ?>
									</td>
									<td><?php echo $i->notes; ?></td>
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
