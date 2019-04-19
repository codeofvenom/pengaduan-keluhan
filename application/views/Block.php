<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/ico/banned.ico">	
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/block.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/blocker.css" rel="stylesheet">
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jam.js"></script>
		
	<title>BLOCKED ACCESS</title>
  </head>
	  <body style="">
    <div class="container">
    <div class="row">
    <div class="col-md-8 top-margin">
        	<?php
                foreach ($block->result_array() as $i) :
                    $tanggal_mulai = $i['tanggal_mulai'];
                    $alasan = $i['alasan'];
                    $CP = $i['CP'];
                                ?>        
        <div class="container">
    <div class="row">
    <div class="col-md-5 center-block-e">
<br><br><br><br><br><br><br><br>
<div class="login-page-header">
 <i class="fa fa-ban" aria-hidden="true" style="font-size:22px;color:red;"></i>&emsp; Error 	
</div>
<div class="login-page">
<center>
<b>Peringatan Anda telah diblokir karena : </b><br> <?php echo $alasan; ?><br>
 <?php echo $tanggal_mulai; ?>&nbsp; <br>
 Untuk itu silahkan hubungi &nbsp;<i class="fa fa-phone" style="font-size:18px;color:green;"></i> : <?php echo $CP; ?>
</center>
</div>

</div>
</div>
</div>
    </div>
    </div>
    </div>

 <?php endforeach; ?>

    
</body></html>
