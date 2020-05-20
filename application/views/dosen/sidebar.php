<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/sb-admin.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/datatables/dataTables.bootstrap4.css">
  <script type='text/javascript' src="<?php echo base_url(); ?>js/jquery.min.js"></script>


  <!-- Custom fonts for this template-->
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->

  <!-- Page level plugin CSS-->
  <!-- <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
  <!-- <link href="css/sb-admin.css" rel="stylesheet"> -->

</head>

<ul class="sidebar navbar-nav">
  <li class="nav-item <?= ($nama_hal == 'kegiatan')?'active':'' ?>">
    <a class="nav-link  " href="<?php echo base_url(); ?>dosen/kegiatan">
      <i class="fas fa-fw fa-user-md"></i>
      <span>Kegiatan</span>
    </a>
  </li>

  
  <li class="nav-item <?= ($nama_hal == 'jabatan')?'active':'' ?>">
    <a class="nav-link  " href="<?php echo base_url(); ?>dosen/jabatan">
      <i class="fas fa-fw fa-user-md"></i>
      <span>Jabatan Panitia</span>
    </a>
  </li>

  <li class="nav-item <?= ($nama_hal == 'kolaborasi')?'active':'' ?>">
    <a class="nav-link  " href="<?php echo base_url(); ?>dosen/kolaborasi">
      <i class="fas fa-fw fa-layer-group"></i>
      <span>Jenis Keterlibatan</span>
    </a>
  </li>

  <li class="nav-item dropdown <?= ($nama_hal == 'instansi')?'active':'' ?>">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-building"></i>
      <span>Instansi Luar</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <a class="dropdown-item" href="<?php echo base_url(); ?>dosen/instansidalam">Instansi Dalam Negeri</a>
      <a class="dropdown-item" href="<?php echo base_url(); ?>dosen/instansiluar">Instansi Luar Negeri</a>
    </div>
  </li>
</ul>

<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url(); ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="<?php echo base_url(); ?>js/demo/datatables-demo.js"></script>
<script src="<?php echo base_url(); ?>js/demo/chart-area-demo.js"></script>