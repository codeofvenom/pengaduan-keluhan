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
						<li><a href="<?php echo base_url().'admin/security'; ?>"><i class="fa fa-ban"></i> Data Block IP</a></li>
						<li ><a href="<?php echo base_url().'admin/security/log_admin'; ?>"><i class="fa fa-id-card"></i> Data Acktivitas Admin</a></li>
						<li class="active"><a href="<?php echo base_url().'admin/security/log_staff'; ?>"><i class="fa fa-id-card"></i> Data Aktivitas Staff</a></li>
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
        Data Aktivitas Staff
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Keamanan</a></li>
        <li class="active">Data Aktivitas Staff</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                <tr>
										<th style="width:3%;">#</th>
										<th style="width:10%;">Foto</th>
                    <th style="width:7%;">Nama</th>
										<th style="width:7%;">Level</th>
										<th style="width:12%;">IP Address</th>
										<th style="width:5%;">Status</th>
										<th style="width:10%;">Terakhir login</th>	
										<th style="width:5%;">Browser</th>
										<th style="width:5%;">Tanggal Kunjungan Pertama</th>
										<th style="width:5%;">Tanggal Kunjungan Terakhir</th>
										<th style="width:10%;text-align:right;">Jumlah Kunjungan ke</th>
										
										
                </tr>
                </thead>
                <tbody>
				<?php
            $no = 0;
            foreach ($data->result_array() as $i) :
                $no++;
                $nama = $i['nama'];
                $foto = $i['foto'];
                $last_login = $i['last_login'];
                $active = $i['active'];
                $level = $i['nama_level'];
                $ip = $i['IP'];
                $browser = $i['browser'];
                $count = $i['kunjungan'];
                $tvp = $i['tanggal_visit'];
                $tvt = $i['tanggal_visit_2'];
            ?>
                <tr>
                  <td><?php echo $no; ?></td>
				  				<td><img width="90" height="80" class="lazyload img-circle" src="<?php echo base_url().'assets/img/avatar/staff/'.$foto; ?>"></td>
 									<td><?php echo $nama; ?></td>
									 <td><?php echo $level; ?></td>
									<td ><?php echo $ip; ?></td>	
									<td><?php if ($active == 1) :  echo 'Aktif'; ?>
										<?php else : echo 'Non-Aktif'; ?>
										<?php endif; ?>
									</td>
									<td ><?php echo $last_login; ?></td>
									<td><?php echo $browser; ?></td>	
									<td><?php echo $tvp; ?></td>
									<td><?php echo $tvt; ?></td>		
									<td style="text-align:right;"><?php echo $count; ?></td>
									
									
		
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
    $('#example1').DataTable({
      "paging"  : true,
	  "scrollX" : true,
	  "responsive" : true
    });
  });
 </script>

</body>
</html>
