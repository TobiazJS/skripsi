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


  <!-- Custom fonts for this template-->
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->

  <!-- Page level plugin CSS-->
  <!-- <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
  <!-- <link href="css/sb-admin.css" rel="stylesheet"> -->

</head>

<body id="page-top">

  <!-- topbar -->
  <?= $topbar ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?= $sidebar ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-user"></i>
          Edit Jenis Keterlibatan</div>
          <div class="card-body">

            <form method="post" action="<?php echo base_url(). 'kajur/kerjasama/masukincolab'; ?>">
              <input type="hidden" name="id" id="id" value="<?php echo $colab->id; ?>" class="form-control" placeholder="id" required="required">

              <input type="hidden" name="idkegiatan" id="id" value="<?php echo $colab->idkegiatan; ?>" class="form-control" placeholder="id" required="required">

              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="nama" id="nama" value="<?php echo $colab->namakegiatan; ?>" class="form-control" placeholder="Kategori" required="required" disabled>
                  <label for="nama">Nama Kegiatan</label>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="nama" id="nama" value="<?php echo $colab->namainstansi; ?>" class="form-control" placeholder="Kategori" required="required" disabled>
                  <label for="nama">Nama Instansi</label>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect1">Jenis Keterlibatan</label>
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                </span>
                <select class="form-control" id="jabatan" name="keterlibatan">
                  <option value="<?=$colab->idketerlibatan?>" selected>
                    <?php echo $colab->namaketerlibatan;?>
                  </option>
                  <?php foreach ($keterlibatan as $row) :?>
                    <option value="<?php echo $row->id;?>"><?php echo $row->nama;?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="form-group">
                <div class="form-label-group">
                  <input type="text" maxlength="100" name="ket" id="ket" value="<?php echo $colab->ket; ?>" class="form-control" placeholder="Keterangan/Kontak" required="required" >
                  <label for="ket">Keterangan/Kontak</label>
                </div>
              </div>

            <input id="submit" name="submit" type="submit" class="btn btn-primary" value="Simpan" />
          </form>
          
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
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
