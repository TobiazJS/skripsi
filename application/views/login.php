<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Dashboard</title>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/sb-admin.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/datatables/dataTables.bootstrap4.css">
  <script type='text/javascript' src="<?php echo base_url(); ?>js/jquery.min.js"></script>

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <?php if ($this->session->flashdata('failed')) : ?>
        <?php if ($this->session->flashdata('failed') == TRUE) : ?>
          <div class="alert alert-success">Username atau Password Salah</div>
        <?php elseif ($this->session->flashdata('failed') == FALSE) : ?>
          <div class="alert alert-danger">Gagal update data kegiatan</div>
        <?php endif; ?>
      <?php endif; ?>
      <div class="card-header">Login SI Pengelolaan Kegiatan IF UNPAR</div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url() . 'login' ?>">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>

          <input type="submit" id="submit" class="btn btn-primary btn-block" name="submit" value="LOGIN">
        </form>

      </div>
    </div>
  </div>

  <script type='text/javascript' src="<?php echo base_url(); ?>js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url(); ?>vendor/chart.js/Chart.min.js"></script>
  <!--   <script src="<?php echo base_url(); ?>vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>vendor/datatables/dataTables.bootstrap4.js"></script> -->

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url(); ?>js/demo/datatables-demo.js"></script>
  <script src="<?php echo base_url(); ?>js/demo/chart-area-demo.js"></script>
</body>

</html>