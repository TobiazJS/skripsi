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
            <i class="fas fa-table"></i>
            Data Dosen Informatika UNPAR
            <a class="btn btn-primary " href="#" data-toggle="modal" data-target="#insert">Tambah Dosen</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Email</th>
                    <th>Jabatan Dosen</th>
                    <th>Penugasan Belum Selesai</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Email</th>
                    <th>Jabatan Dosen</th>
                    <th>Penugasan Belum Selesai</th>
                    <th>Detail</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php $i = 0; ?>
                  <?php foreach ($dosen as $row) : ?>
                    <?php $idDosen = $row->id ?>
                    <tr>
                      <td><?= $row->nama ?></td>
                      <td><?= $row->NIK ?></td>
                      <td><?= $row->email ?></td>
                      <td>
                        <?php if ($row->role == 0) :  ?>
                          <?php echo "Ketua Jurusan" ?>
                        <?php endif; ?>

                        <?php if ($row->role == 1) :  ?>
                          <?php echo "Dosen" ?>
                        <?php endif; ?>

                      </td>
                      <td><?= $cnt[$i].' penugasan' ?></td>
                      <td>
                        <?php echo anchor('kajur/detildosen/' . $row->id, 'Detail'); ?> |
                        <?php echo anchor('kajur/dosen/delete/' . $row->id, '<i class="fa fa-trash" aria-hidden=""></i>', array('onclick' => "return confirm('Yakin ingin menghapus?')")); ?>
                      </td>
                    </tr>
                    <?php $i++ ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Dosen</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <form method="post" action="<?php echo base_url() . '/kajur/dosen/insert'; ?>">


            <div class="form-group">
              <div class="form-label-group">
                <input type="text" maxlength="10" name="nik" id="nik" class="form-control" placeholder="NIK" required="required">
                <label for="nik">NIK</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" maxlength="40" name="nama"  id="nama" class="form-control" placeholder="Nama" required="required">
                <label for="nama">Nama</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" maxlength="50" name="email" id="email" class="form-control" placeholder="Email" required="required">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" maxlength="10" name="password" id="password" class="form-control" placeholder="Password" required="required">
                <label for="password">Password</label>
              </div>




              <div class="form-group">
                <label for="exampleFormControlSelect1">Peran</label>
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                  </span>
                  <select class="form-control" id="status" name="role">
                    <option value="1" id="2" name="1">Dosen</option>
                    <option value="0" id="1" name="0">Ketua Jurusan</option>
                  </select>
                </div>
              </div>
            </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input id="submit" name="submit" type="submit" class="btn btn-primary" value="SUBMIT" />
        </div>
        </form>
      </div>
    </div>
  </div>

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