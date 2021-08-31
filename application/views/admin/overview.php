<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("admin/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">

    <div class="card mb-3">
      <div class="card-header">
      <i class="fas fa-chart-area"></i>
     KESEMPURNAAN HANYA MILIK TUHAN</div>
      <div class="card-body">
      <canvas id="myAreaChart" width="100%" height="30"></canvas>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM  ----------------by dhanu, bicky, akbar iuc malam-----------------</div>
    </div>

    </div>
    <?php $this->load->view("admin/_partials/footer.php") ?>

  </div>
  
</div>

<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>