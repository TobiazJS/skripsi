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
      <?php if ($this->session->flashdata('tambah')) : ?>
        <?php if ($this->session->flashdata('tambah') == TRUE) : ?>
          <div class="alert alert-success">Berhasil menambahkan kegiatan baru</div>
        <?php elseif ($this->session->flashdata('tambah') == FALSE) : ?>
          <div class="alert alert-danger">Gagal menambahkan Kegiatan baru</div>
        <?php endif; ?>
      <?php endif; ?>

      <div id="content-wrapper">
        <?php if ($this->session->flashdata('delete')) : ?>
          <?php if ($this->session->flashdata('delete') == TRUE) : ?>
            <div class="alert alert-success">Berhasil hapus data kegiatan</div>
          <?php elseif ($this->session->flashdata('delete') == FALSE) : ?>
            <div class="alert alert-danger">Gagal hapus data kegiatan</div>
          <?php endif; ?>
        <?php endif; ?>

        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Penugasan Kegiatan
              <a class="btn btn-primary " href="#" data-toggle="modal" data-target="#insert">Mengajukan Kegiatan</a>
            </div>
            <div class="card-body">
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
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($kegiatan as $row) : ?>
                      <?php $idKegiatan = $row->idkegiatan ?>
                      <tr>
                        <td><?= $row->namakegiatan ?></td>
                        <td><?= date("M d, Y", strtotime($row->tanggal_mulai)); ?></td>
                        <td><?= date("M d, Y", strtotime($row->tanggal_akhir)); ?></td>
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
                        <td><?php echo anchor('dosen/detilkegiatan/' . $row->idkegiatan, 'Detail'); ?>
                          <?php if ($row->idjabatan == 1 || $row->idjabatan == 5) : ?>
                            <?php if ($row->status == 0) : ?>
                              |
                              <?php echo anchor('dosen/kegiatan/delete/' . $row->idkegiatan, '<i class="fa fa-trash"></i>', array('onclick' => "return confirm('Yakin ingin menghapus?')")); ?>
                            <?php endif; ?>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Pengajuan Kegiatan
              <!-- <a class="btn btn-primary " href="#" data-toggle="modal" data-target="#insert">Tambah Kegiatan</a> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Kegiatan</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Tempat</th>
                      <th>Jenis Kegiatan</th>
                      <th>Konfirmasi</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama Kegiatan</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Tempat</th>
                      <th>Jenis Kegiatan</th>
                      <th>Konfirmasi</th>
                      <th>Detail</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($pengajuan as $row) : ?>
                      <?php $idKegiatan = $row->id ?>
                      <tr>
                        <td><?= $row->nama ?></td>
                        <td><?= date("M d, Y", strtotime($row->tanggal_mulai)); ?></td>
                        <td><?= date("M d, Y", strtotime($row->tanggal_akhir)); ?></td>
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
                          <?php if ($row->konfirmasi == 0) :  ?>
                            <?php echo "Belum Dikonfirmasi" ?>
                          <?php endif; ?>

                          <?php if ($row->konfirmasi == 1) :  ?>
                            <?php echo "Sudah Dikonfirmasi" ?>
                          <?php endif; ?>

                          <?php if ($row->konfirmasi == 2) :  ?>
                            <?php echo "Pengajuan Ditolak" ?>
                          <?php endif; ?>

                        </td>
                        <td><?php echo anchor('dosen/detilkegiatan/' . $row->id, 'Detail'); ?>
                          <?php if ($row->konfirmasi == 0) :  ?>
                            |
                            <?php echo anchor('dosen/kegiatan/delete/' . $row->id, '<i class="fa fa-trash"></i>', array('onclick' => "return confirm('Yakin ingin menghapus?')")); ?>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Pengajuan yang Ditolak
              <!-- <a class="btn btn-primary " href="#" data-toggle="modal" data-target="#insert">Tambah Kegiatan</a> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Kegiatan</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Tempat</th>
                      <th>Jenis Kegiatan</th>
                      <th>Konfirmasi</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama Kegiatan</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Tempat</th>
                      <th>Jenis Kegiatan</th>
                      <th>Konfirmasi</th>
                      <th>Detail</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($ditolak as $row) : ?>
                      <?php $idKegiatan = $row->id ?>
                      <tr>
                        <td><?= $row->nama ?></td>
                        <td><?= date("M d, Y", strtotime($row->tanggal_mulai)); ?></td>
                        <td><?= date("M d, Y", strtotime($row->tanggal_akhir)); ?></td>
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
                          <?php if ($row->konfirmasi == 0) :  ?>
                            <?php echo "Belum Dikonfirmasi" ?>
                          <?php endif; ?>

                          <?php if ($row->konfirmasi == 1) :  ?>
                            <?php echo "Sudah Dikonfirmasi" ?>
                          <?php endif; ?>

                          <?php if ($row->konfirmasi == 2) :  ?>
                            <?php echo "Pengajuan Ditolak" ?>
                          <?php endif; ?>

                        </td>
                        <td><?php echo anchor('dosen/detilkegiatan/' . $row->id, 'Detail'); ?>

                          |
                          <?php echo anchor('dosen/kegiatan/delete/' . $row->id, '<i class="fa fa-trash"></i>', array('onclick' => "return confirm('Yakin ingin menghapus?')")); ?>

                        </td>
                      </tr>
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
            <h5 class="modal-title" id="exampleModalLabel">Mengajukan Kegiatan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- form -->
            <form method="post" action="<?php echo base_url() . '/dosen/kegiatan/insert'; ?>">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" maxlength="60" name="nama" id="nama" class="form-control" placeholder="Nama" required="required">
                  <label for="nama">Nama</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" maxlength="10" name="tanggal_mulai" id="awal" class="form-control" placeholder="Tanggal Mulai" required="required">
                  <label for="awal">Tanggal Mulai</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" maxlength="10" name="tanggal_akhir" id="akhir" class="form-control" placeholder="Tanggal Selesai" required="required">
                  <label for="akhir">Tanggal Selesai</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" maxlength="50" name="tempat" id="tempat" class="form-control" placeholder="Tempat" required="required">
                  <label for="tempat">Tempat</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi" required="required">
                  <label for="deskripsi">Deskripsi</label>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect1">Apakah kegiatan ini berkolaborasi dengan instansi lain?</label>
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                  </span>
                  <select class="form-control" id="colab" name="colab">
                    <option value="0" id="0" name="0">Tidak</option>
                    <option value="1" id="1" name="1">Ya</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect1">Apakah kegiatan ini melibatkan mahasiswa?</label>
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                  </span>
                  <select class="form-control" id="mhs" name="mhs">
                    <option value="0" id="0" name="0">Tidak</option>
                    <option value="1" id="1" name="1">Ya</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect1">Sumber biaya kegiatan ini</label>
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                  </span>
                  <select class="form-control" id="sumberbiaya" name="sumberbiaya">
                    <option value="0" id="0" name="0">Perguruan Tinggi Mandiri</option>
                    <option value="1" id="1" name="1">Lembaga Dalam Negeri (di luar Perguruan Tinggi)</option>
                    <option value="2" id="2" name="2">Lembaga Luar Negeri</option>
                  </select>
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




    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script type="text/javascript">
      $(function() {
        $("#awal").datepicker({
          numberOfMonths: 2,
          minDate: 0,
          onSelect: function(selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() + 0);
            $("#akhir").datepicker("option", "minDate", dt);
          }
        });
        $("#akhir").datepicker({
          numberOfMonths: 2,
          minDate: 0,
          onSelect: function(selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 0);
            $("#awal").datepicker("option", "maxDate", dt);
          }
        });

        $("#pakhir").datepicker({
          numberOfMonths: 2,
          minDate: 0,
          onSelect: function(selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 0);
            $("#akhir").datepicker("option", "maxDate", dt);
          }
        });
      });
    </script>

</body>

</html>