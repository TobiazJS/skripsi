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
      <?php if($this->session->flashdata('edit')): ?>
       <?php if($this->session->flashdata('edit') == TRUE): ?>
        <div class="alert alert-success">Berhasil update data pengguna</div>
        <?php elseif($this->session->flashdata('edit') == FALSE): ?>
          <div class="alert alert-danger">Gagal update data pengguna</div>
        <?php endif; ?>
      <?php endif; ?>

      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-user"></i>
          Ubah Data Kegiatan</div>
          <div class="card-body">

            <form method="post" action="<?php echo base_url(). 'kajur/kegiatan/acc/'.$kegiatan->idkegiatan; ?>">
              <input type="hidden" name="id" id="id" value="<?php echo $kegiatan->idkegiatan; ?>" class="form-control" placeholder="id" required="required">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="nik" id="nama" value="<?php echo $kegiatan->namakegiatan; ?>" class="form-control" placeholder="Nama Kegiatan" required="required" disabled>
                  <label for="nama">Nama Kegiatan</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="date" name="tanggal_mulai" id="tanggalmulai" value="<?php echo date('Y-m-d', strtotime($kegiatan->tanggal_mulai)); ?>" class="form-control" placeholder="Tanggal Mulai(Bulan/Tanggal/Tahun)" required="required" disabled>
                  <label for="tanggalmulai">Tanggal Mulai(Bulan/Tanggal/Tahun)</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="date" name="tanggal_akhir" id="tanggalakhir" value="<?php echo date('Y-m-d', strtotime($kegiatan->tanggal_akhir)); ?>" class="form-control" placeholder="Tanggal Selesai(Bulan/Tanggal/Tahun)" required="required" disabled>
                  <label for="tanggalselesai">Tanggal Selesai(Bulan/Tanggal/Tahun)</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="tempat" id="tempat" value="<?php echo $kegiatan->tempat; ?>" class="form-control" placeholder="Tempat" required="required" disabled>
                  <label for="deskripsi">Tempat</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="deskripsi" id="deskripsi" value="<?php echo $kegiatan->deskripsi; ?>" class="form-control" placeholder="Deskripsi" required="required" disabled>
                  <label for="deskripsi">Deskripsi</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="pengaju" id="pengaju" value="<?php echo $kegiatan->namadosen; ?>" class="form-control" placeholder="Pengaju" required="required" disabled>
                  <label for="Pengaju">Pengaju</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="jenis" id="jenis" value="<?php
                  if($kegiatan->jenis == 0){
                    echo "Kegiatan Internal";
                  }else{
                    echo "Kegiatan Eksternal";
                  }
                   ?>" class="form-control" placeholder="Jenis Kegiatan" required="required" disabled>
                  <label for="jenis">Jenis Kegiatan</label>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="mhs" id="mhs" value="<?php
                  if($kegiatan->mhs == 0){
                    echo "Tidak";
                  }else{
                    echo "Ya";
                  }
                   ?>" class="form-control" placeholder="Apakah kegiatan ini melibatkan mahasiswa?" required="required" disabled>
                  <label for="jenis">Apakah kegiatan ini melibatkan mahasiswa?</label>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="biaya" id="biaya" value="<?php
                  if($kegiatan->biaya == 0){
                    echo "Perguruan Tinggi Mandiri";
                  }else if($kegiatan->biaya == 1){
                    echo "Lembaga Dalam Negeri (di luar Perguruan Tinggi)";
                  }else{
                    echo "Lembaga Luar Negeri";
                  }
                   ?>" class="form-control" placeholder="Sumber biaya kegiatan ini" required="required" disabled>
                  
                  <label for="jenis">Sumber biaya kegiatan ini</label>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect1">Aksi</label>
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                </span>
                <select class="form-control" id="konfirmasi" name="konfirmasi">
                  <option value="<?=$kegiatan->konfirmasi?>" selected>
                    <?php if ($kegiatan->konfirmasi == 0) :  ?>
                      <?php echo "Menunggu konfirmasi"?>
                    <?php endif; ?>

                    <?php if ($kegiatan->konfirmasi == 1) :  ?>
                      <?php echo "Terima kegiatan"?>
                    <?php endif; ?>
                    <?php if ($kegiatan->konfirmasi == 2) :  ?>
                      <?php echo "Tolak kegiatan"?>
                    <?php endif; ?>
                  </option>
                  <option value="1" id="" name="1">Terima Kegiatan</option>
                  <option value="2" id="" name="2">Tolak Kegiatan</option>
                </select>
              </div>
            </div>

            <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" required="required" >
                  <label for="keterangan">Keterangan</label>
                </div>
              </div>

            <input id="submit" name="submit" type="submit" class="btn btn-primary" value="Simpan" />
          </form>

        </div>

      </div>

      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-user"></i>
        Dokumen</div>
        <div class="card-body">
          
          <div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama Dokumen</th>
                    <th>Jenis Dokumen</th>
                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nama Kegiatan</th>
                    <th>Jenis Dokumen</th>
                    
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach($dokumen as $row): ?>
                    <?php 
                    $filename = $row->nama;
                    $filepath = base_url()."upload/".$filename;?>
                    <tr>
                      <td><a target="_blank" href=<?php echo $filepath; ?>> <?php echo $filename ?></a></td>
                      <td>
                        <?php if ($row->jenis == 0) :  ?>
                          <?php echo "Undangan Kegiatan"?>
                        <?php endif; ?>

                        <?php if ($row->jenis == 1) :  ?>
                          <?php echo "Proposal Kegiatan"?>
                        <?php endif; ?>

                        <?php if ($row->jenis == 2) :  ?>
                          <?php echo "Laporan Kegiatan"?>
                        <?php endif; ?>

                        <?php if ($row->jenis == 3) :  ?>
                          <?php echo "Dokumentasi Kegiatan"?>
                        <?php endif; ?>
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
