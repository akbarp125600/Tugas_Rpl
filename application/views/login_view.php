<!DOCTYPE html>
<html lang="en">
  <head>
    <head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>
<link href="<?php echo base_url('assets/login/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/login/css/sb-admin.css');?>" rel="stylesheet">
  <!-- Custom fonts for this template-->

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>
 <body class="bg-dark">

      <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><a></a><b>SELAMAT DATANG</b></div>
      <div class="card-body">
         <form class="form-signin" action="<?php echo site_url('login/auth');?>" method="post">
          <div class="form-group">
           <h2 class="form-signin-heading">Silahkan Login</h2>
           <?php echo $this->session->flashdata('msg');?>

 <div class="form-label-group">
           <label for="username" class="sr-only">Username</label>
           <input type="email" name="email" class="form-control"  required autofocus>
           <label for="inputPassword">E-Mail</label>
         </div>
       </div>

 <div class="form-group">
            <div class="form-label-group">
           <label for="password" class="sr-only">Password</label>
           <input type="password" name="password" class="form-control"  required>
           <label for="inputPassword">Password</label>
            <h7 class="form-signin-heading">Design by : Dhanu,Bicky,Akbar</h7>
         </div>
       </div>

           <div class="checkbox">
             <label>
               <input type="checkbox" value="remember-me"> Remember me
             </label>
           </div>

           <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
         </form>
         <div class="text-center">
          <a class="d-block small mt-3"><?php echo anchor('register','Silahkan Daftar Disini');?></a>
          
        </div>

       </div>
       </div> <!-- /container -->

    <script src="<?php echo base_url('assets/assets/js/bootstrap.min.js');?>"></script>
  </body>
</html>




