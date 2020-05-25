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
            Ubah Data Instansi</div>
          <div class="card-body">
            <?php if (isset($detilInstansi)) : ?>
              <form method="post" action="<?php echo base_url() . 'dosen/instansi/edit/' . $detilInstansi['id']; ?>">
                <input type="hidden" name="id" id="id" value="<?= $detilInstansi['id'] ?>" class="form-control" placeholder="id" required="required">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" maxlength="60" name="nama" id="nama" value="<?= $detilInstansi['nama'] ?>" class="form-control" placeholder="Nama" required="required">
                    <label for="nama">Nama</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Jenis Intansi</label>
                  <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                    </span>
                    <select class="form-control" id="jenis" name="jenis">
                      <option value="<?= $detilInstansi['jenis'] ?>" selected>
                        <?php if ($detilInstansi['jenis'] == 0) :  ?>
                          <?php echo "Instansi Dalam Negeri" ?>
                        <?php endif; ?>

                        <?php if ($detilInstansi['jenis'] == 1) :  ?>
                          <?php echo "Instansi Luar Negeri" ?>
                        <?php endif; ?>
                      </option>
                      <option value="1" id="" name="1">Instansi Luar Negeri</option>


                      <option value="0" id="" name="0">Instansi Dalam Negeri</option>

                    </select>
                  </div>
                </div>
                <input id="submit" name="submit" type="submit" class="btn btn-primary form-group" value="SIMPAN" /> |

                <?php echo anchor('dosen/instansi/delete/' . $detilInstansi['id'], 'Hapus', array('onclick' => "return confirm('Yakin ingin menghapus?')", 'class' => 'form-group btn btn-danger')); ?>
              </form>
            <?php endif; ?>
          </div>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Riwayat Kerjasama Kegiatan
          </div>

          <div class="card-body">

            <div>
              <?php echo 'Total seluruh kerjasama saat ini: ' . $cnt; ?>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Tempat</th>
                    <th>Jenis Kegiatan</th>
                    <th>Status</th>
                    <th>Sebagai</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Tempat</th>
                    <th>Jenis Kegiatan</th>
                    <th>Status</th>
                    <th>Sebagai</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($riwayat as $row) : ?>
                    <?php $idKegiatan = $row->idkegiatan ?>
                    <tr>
                      <td><?= $row->namakegiatan ?></td>
                      <td><?= date("M d, Y", strtotime($row->tanggalmulai)); ?></td>
                      <td><?= date("M d, Y", strtotime($row->tanggalakhir)); ?></td>
                      <td><?= $row->tempat ?></td>
                      <td>
                        <?php if ($row->jenis == 0) :  ?>
                          <?php echo "Kegiatan Internal" ?>
                        <?php endif; ?>

                        <?php if ($row->jenis == 1) :  ?>
                          <?php echo "Kegiatan Eksternal" ?>
                        <?php endif; ?>

                      </td>
                      <td>
                        <?php if ($row->status == 0) :  ?>
                          <?php echo "Belum Terlaksana" ?>
                        <?php endif; ?>

                        <?php if ($row->status == 1) :  ?>
                          <?php echo "Sudah Terlaksana" ?>
                        <?php endif; ?>

                      </td>
                      <td><?= $row->namaketerlibatan ?></td>

                      <td>-</td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
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