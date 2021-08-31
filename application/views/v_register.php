<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>  
<head>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

 <link href="<?php echo base_url('assets/login/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/login/css/sb-admin.css');?>" rel="stylesheet">
  
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><a></a><b>Daftar TERLEBIH DAHULU</b></div>
      <div class="card-body">
              <div class="form-group">
           

<?php echo form_open('register');?>

  
<div class="form-label-group">
 <label class="sr-only">Nama</label>
<input class="form-control" type="text" name="user_name" value="<?php echo set_value('user_name'); ?>"/>
 <?php echo form_error('user_name'); ?>
<label>Nama</label>
</div>
</div>

<div class="form-label-group">
 <label class="sr-only">E-mail</label>
<input class="form-control" type="text" name="user_email" value="<?php echo set_value('user_email'); ?>"/>
 <?php echo form_error('user_email'); ?>
<label>E-mail</label>
</div>


<div class="form-label-group">
 <label class="sr-only">Password</label>
<input class="form-control" type="password" name="user_password" value="<?php echo set_value('user_password'); ?>"/>
 <?php echo form_error('user_password'); ?>
<label>Password</label>
</div>



<div class="form-label-group">
 <label class="sr-only">Level</label>
<input class="form-control" type="hidden" name="user_level" value="user"/>
 <?php echo form_error('user_level'); ?>
</div>

</div>
<p><input class="btn btn-lg btn-primary btn-block" type="submit" name="btnSubmit" value="Daftar" /></p>
<?php echo form_close();?>

<p>Kembali ke beranda, Silakan klik <?php echo anchor(site_url().'page/index','di sini..'); ?></p>
</div>
 <script src="<?php echo base_url('assets/assets/js/bootstrap.min.js');?>"></script>
 
</body>
</html>
