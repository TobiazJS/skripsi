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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-select.css">
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
        <div class="alert alert-success">Berhasil update data kegiatan</div>
        <?php elseif($this->session->flashdata('edit') == FALSE): ?>
          <div class="alert alert-danger">Gagal update data kegiatan</div>
        <?php endif; ?>
      <?php endif; ?>

      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-user"></i>
          Ubah Data Kegiatan</div>
          <div class="card-body">

            <form method="post" action="<?php echo base_url(). '/kajur/kegiatan/edit/'.$kegiatan->id; ?>">
              <input type="hidden" name="id" id="id" value="<?php echo $kegiatan->id; ?>" class="form-control" placeholder="id" required="required">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="nama" id="nama" value="<?php echo $kegiatan->nama; ?>" class="form-control" placeholder="Nama Kegiatan" required="required">
                  <label for="nama">Nama Kegiatan</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="tanggal_mulai" id="awal" value="<?php echo date('M d, Y', strtotime($kegiatan->tanggal_mulai)); ?>" class="form-control" placeholder="Tanggal Mulai(Bulan/Tanggal/Tahun)" required="required">
                  <label for="awal">Tanggal Mulai(Bulan/Tanggal/Tahun)</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="tanggal_akhir" id="akhir" value="<?php echo date('M d, Y', strtotime($kegiatan->tanggal_akhir)); ?>" class="form-control" placeholder="Tanggal Selesai(Bulan/Tanggal/Tahun)" required="required">
                  <label for="akhir">Tanggal Selesai(Bulan/Tanggal/Tahun)</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="tempat" id="tempat" value="<?php echo $kegiatan->tempat; ?>" class="form-control" placeholder="Tempat" required="required">
                  <label for="tempat">Tempat</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="deskripsi" id="deskripsi" value="<?php echo $kegiatan->deskripsi; ?>" class="form-control" placeholder="Deskripsi" required="required">
                  <label for="deskripsi">Deskripsi</label>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect1">Jenis Kegiatan</label>
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                </span>
                <select class="form-control" id="jenis" name="jenis">
                  <option value="<?=$kegiatan->konfirmasi?>" selected>
                    <?php if ($kegiatan->jenis == 0) :  ?>
                      <?php echo "kegiatan Internal"?>
                    <?php endif; ?>

                    <?php if ($kegiatan->jenis == 1) :  ?>
                      <?php echo "Kegiatan Eksternal"?>
                    <?php endif; ?>
                  </option>
                  <option value="0" id="" name="0">Kegiatan Internal</option>
                  <option value="1" id="" name="1">Kegiatan Eksternal</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">Apakah kegiatan ini berkolaborasi dengan instansi lain?</label>
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
              </span>
              <select class="form-control" id="colab" name="colab">
                <option value="<?=$kegiatan->jenis?>" selected>
                  <?php if ($kegiatan->instansilain == 0) :  ?>
                    <?php echo "Tidak"?>
                  <?php endif; ?>

                  <?php if ($kegiatan->instansilain == 1) :  ?>
                    <?php echo "Ya"?>
                  <?php endif; ?>
                </option>
                <option value="0" id="" name="0">Tidak</option>
                <option value="1" id="" name="1">Ya</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Apakah kegiatan ini melibatkan mahasiswa?</label>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
            </span>
            <select class="form-control" id="mhs" name="mhs">
              <option value="<?=$kegiatan->melibatkanmahasiswa?>" selected>
                <?php if ($kegiatan->melibatkanmahasiswa == 0) :  ?>
                  <?php echo "Tidak"?>
                <?php endif; ?>

                <?php if ($kegiatan->melibatkanmahasiswa == 1) :  ?>
                  <?php echo "Ya"?>
                <?php endif; ?>
              </option>
              <option value="0" id="" name="0">Tidak</option>
              <option value="1" id="" name="1">Ya</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Sumber biaya kegiatan ini</label>
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
          </span>
          <select class="form-control" id="sumberbiaya" name="sumberbiaya">
            <option value="<?=$kegiatan->sumberbiaya?>" selected>
              <?php if ($kegiatan->sumberbiaya == 0) :  ?>
                <?php echo "Perguruan Tinggi Mandiri"?>
              <?php endif; ?>

              <?php if ($kegiatan->sumberbiaya == 1) :  ?>
                <?php echo "Lembaga Dalam Negeri (di luar Perguruan Tinggi)"?>
              <?php endif; ?>

              <?php if ($kegiatan->sumberbiaya == 2) :  ?>
                <?php echo "Lembaga Luar Negeri"?>
              <?php endif; ?>
            </option>
            <option value="0" id="0" name="0">Perguruan Tinggi Mandiri</option>
            <option value="1" id="1" name="1">Lembaga Dalam Negeri (di luar Perguruan Tinggi)</option>
            <option value="2" id="2" name="2">Lembaga Luar Negeri</option>
          </select>
        </div>
      </div>

      <?php if ($kegiatan->status == 0) :?>

        <input id="submit" name="submit" type="submit" class="btn btn-primary" value="SIMPAN" /> | 
        <?php echo anchor('kajur/kegiatan/delete/'.$kegiatan->id,'Hapus', array('onclick' => "return confirm('Yakin ingin menghapus?')") ); ?> |

        <?php echo anchor('kajur/kegiatan/selesai/'.$kegiatan->id,'<h3 class="form-group btn btn-primary">Selesai</h3>', array('onclick' => "return confirm('Kegiatan sudah selesai?')")); ?>
      <?php endif; ?>
    </form>

  </div>

</div>

<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-user"></i>
  Penugasan Dosen</div>
  <div class="card-body">
    <?php if ($kegiatan->status == 0) :?>
      <div class="pb-3">
        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#penugasan">Tambah Penugasan</a>
      </div>
    <?php endif; ?>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Kegiatan</th>
              <th>Dosen</th>
              <th>Jabatan</th>
              <th>Tanggal Awal Menjabat</th>
              <th>Tanggal Akhir Menjabat</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Kegiatan</th>
              <th>Dosen</th>
              <th>Jabatan</th>
              <th>Tanggal Awal Menjabat</th>
              <th>Tanggal Akhir Menjabat</th>
              <th>Detail</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach($penugasankegiatan as $row): ?>
              <tr>
                <td><?php echo $row->namakegiatan ?></td>
                <td><?php echo $row->namadosen ?></td>
                <td><?php echo $row->namajabatan ?></td>
                <td><?=  date ("M d, Y",strtotime($row->periode_awal)); ?></td>
                <td><?=  date ("M d, Y",strtotime($row->periode_akhir)); ?></td>
                <td>
                  <?php if ($kegiatan->status == 0) :?>
                    <?php echo anchor('penugasan/detil/'.$row->idpenugasan,'Detail'); ?> | 
                    <?php echo anchor('penugasan/delete/'.$row->idpenugasan,'<i class="fa fa-trash"></i>', array('onclick' => "return confirm('Yakin ingin menghapus?')")); ?>
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

<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-user"></i>
  Dokumen</div>
  <div class="card-body">
    <?php if ($kegiatan->status == 0) :?>
      <div class="pb-3">
        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#dokumen">Tambah Dokumen</a>
      </div>
    <?php endif; ?>
    <div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Dokumen</th>
              <th>Jenis Dokumen</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Nama Kegiatan</th>
              <th>Jenis Dokumen</th>
              <th>Detail</th>
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
                <td>
                  <?php if ($kegiatan->status == 0) :?> 
                    <?php echo anchor('dokumen/delete/'.$row->id,'<i class="fa fa-trash"></i>', array('onclick' => "return confirm('Yakin ingin menghapus?')")); ?>
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

<?php if ($kegiatan->instansilain == 1) :?>
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-user"></i>
    Kerjasama Dengan Instansi Lain</div>
    <div class="card-body">
      <?php if ($kegiatan->status == 0) :?>
        <div class="pb-3">
          <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#kerjasama">Tambah Kerjasama</a>
        </div>
      <?php endif; ?>

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Kegiatan</th>
              <th>Instansi Lain</th>
              <th>Jenis Instansi</th>
              <th>Jenis Kolaborasi</th>
              <th></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Nama Kegiatan</th>
              <th>Instansi Lain</th>
              <th>Jenis Instnasi</th>
              <th>Jenis Kolaborasi</th>
              <th></th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach($kerjasama as $row): ?>
              <tr>
                <td><?php echo $row->namakegiatan ?></td>
                <td><?php echo $row->namainstansi ?></td>
                <td>
                  <?php if ($row->jenisinstansi == 0) {
                    echo "Instansi Dalam Negeri";
                  }else{
                    echo "Instansi Luar Negeri";
                  }?>
                </td>
                <td>
                  <?php if ($row->idketerlibatan == 0) {
                    echo anchor('kajur/kerjasama/detil/'.$row->id,'Tambah jenis keterlibatan');
                  }else{
                    echo $row->namaketerlibatan;
                  }?>
                </td>
                <td>
                  <?php if ($kegiatan->status == 0) :?>
                    <?php echo anchor('kajur/kerjasama/delete/'.$row->id,'<i class="fa fa-trash"></i>' , array('onclick' => "return confirm('Yakin ingin menghapus?')")); ?>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>

  </div>
<?php endif; ?>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-user"></i>
  Kategori Kegiatan</div>
  <div class="card-body">
    <?php if ($kegiatan->status == 0) :?>
      <div class="pb-3">
        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#kategorikegiatan">Tambah Kategori Kegiatan</a>
      </div>
    <?php endif; ?>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama Kegiatan</th>
            <th>Kategori</th>
            <th>Jenis Kategori</th>
            <th></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama Kegiatan</th>
            <th>Kategori</th>
            <th>Jenis Kategori</th>
            <th></th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach($kategorikegiatan as $row): ?>
            <tr>
              <td><?php echo $row->namakegiatan ?></td>
              <td><?php echo $row->namakategori ?></td>
              <td>
                <?php if ($row->jenis == 0) {
                  echo "Kategori Berdasarkan DIKTI";
                }else{
                  echo "Kategori Biasa";
                }?>
              </td>
              <td>
                <?php if ($kegiatan->status == 0) :?>
                  <?php echo anchor('kajur/kategorikegiatan/delete/'.$row->id,'<i class="fa fa-trash"></i>', array('onclick' => "return confirm('Yakin ingin menghapus?')")); ?>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>


  </div>

</div>

<!-- end kerjasama -->
<!-- kategori -->

<!-- end katttegori -->
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

<!-- modals dokumen -->
<div class="modal fade" id="dokumen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Dokumen</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form -->
        <form method="post" action="<?php echo base_url(). 'dokumen/upload/'.$kegiatan->id; ?>" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id" value="<?php echo $kegiatan->id; ?>" class="form-control" placeholder="id" required="required">

          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="namakegiatan" id="namakegiatan" value="<?php echo $kegiatan->nama; ?>" class="form-control" placeholder="Nama Kegiatan" required="required" disabled>
              <label for="nama">Nama Kegiatan</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="file" name="input_gambar" id="nama" value="" class="form-control" placeholder="File Dokumen" required="required">
              <label for="nama">File Dokumen</label>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Jenis Dokumen</label>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
            </span>
            <select class="form-control" id="jenis" name="jenis">
              <option value="0" id="0" name="0">Undangan Kegiatan</option>
              <option value="1" id="1" name="1">Proposal Kegiatan</option>
              <option value="2" id="2" name="2">Laporan Kegiatan</option>
              <option value="3" id="3" name="3">Dokumentasi Kegiatan</option>
            </select>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <input id="submit" name="submitupload" type="submit" class="btn btn-primary" value="SUBMIT" />
      </div>
    </form>
  </div>
</div>
</div>
<!-- end modals dokumen -->

<!-- modals penugasan -->
<div class="modal fade" id="penugasan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Penugasan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form -->
        <form method="post" action="<?php echo base_url(). 'penugasan/insert'; ?>" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id" value="<?php echo $kegiatan->id; ?>" class="form-control" placeholder="id" required="required">

          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="namakegiatan" id="namakegiatan" value="<?php echo $kegiatan->nama; ?>" class="form-control" placeholder="Nama Kegiatan" required="required" disabled>
              <label for="nama">Nama Kegiatan</label>
            </div>
          </div>

          

          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="periode_akhir" id="pakhir" value="<?php echo date('M d, Y', strtotime($kegiatan->tanggal_akhir)); ?>" class="form-control" placeholder="Tanggal Selesai Penugasan(Bulan/Tanggal/Tahun)" required="required">
              <label for="pakhir">Tanggal Selesai Penugasan(Bulan/Tanggal/Tahun)</label>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Dosen</label>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
            </span>
            <select class="form-control" id="dosen" name="dosen">
              <?php foreach ($dosen as $row) :?>
                <option value="<?php echo $row->id;?>"><?php echo $row->nama;?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Jabatan</label>
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
          </span>
          <select class="form-control" id="jabatan" name="jabatan">
            <?php foreach ($jabatan as $row) :?>
              <option value="<?php echo $row->id;?>"><?php echo $row->nama;?></option>
            <?php endforeach;?>
          </select>
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <input id="submit" name="submitupload" type="submit" class="btn btn-primary" value="SUBMIT" />
    </div>
  </form>
</div>
</div>
</div>
<!-- end modals penugasan -->

<!-- modals kerjasama -->
<div class="modal fade" id="kerjasama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kerjasama Dengan Instansi Lain</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form -->
        <form method="post" action="<?php echo base_url(). 'kajur/kerjasama/insert'; ?>">
          <input type="hidden" name="id" id="id" value="<?php echo $kegiatan->id; ?>" class="form-control" placeholder="id" required="required">

          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="nama" id="nama" value="<?php echo $kegiatan->nama; ?>" class="form-control" placeholder="Nama Kegiatan" required="required" disabled>
              <label for="nama">Nama Kegiatan</label>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Instansi Lain</label>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
            </span>
            <select id="bootstrap-select-instansi" class="bootstrap-select-instansi form-control selectpicker" name="instansi[]" data-width="100%" data-live-search="true" multiple required>
              <?php foreach ($instansi->result() as $row) :?>
                <option value="<?php echo $row->id;?>"><?php echo $row->nama;?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <input id="submitkerjasama" name="submit" type="submit" class="btn btn-primary" value="SUBMIT" />
      </div>
    </form>
  </div>
</div>
</div>
<!-- end modals kerjasama -->

<!-- modals kategori kegiatan -->
<div >
  <div class="modal fade" id="kategorikegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Kegiatan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <form method="post" action="<?php echo base_url(). 'kajur/kategorikegiatan/insert'; ?>">
            <input type="hidden" name="id" id="id" value="<?php echo $kegiatan->id; ?>" class="form-control" placeholder="id" required="required">

            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="nama" id="nama" value="<?php echo $kegiatan->nama; ?>" class="form-control" placeholder="Nama Kegiatan" required="required" disabled>
                <label for="nama">Nama Kegiatan</label>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">Kategori Kegiatan</label>
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
              </span>
              <select id="bootstrap-select-kategori" class="bootstrap-select-kateori form-control selectpicker" name="kategori[]" data-width="100%" data-live-search="true" multiple required>
                <?php foreach ($kategori as $row) :?>
                  <option value="<?php echo $row->id;?>"><?php echo $row->nama ;?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input id="submitkerjasama" name="submit" type="submit" class="btn btn-primary" value="SUBMIT" />
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- end modals kategori kegiatan -->


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

  <script type="text/javascript" src="<?php echo base_url('js/jquery-3.4.1.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('js/bootstrap.bundle.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('js/bootstrap-select.js');?>"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js.map"></script>
  <!-- <script type="text/javascript">
    $(document).ready(function(){
      $('#slct').selectpicker();
    });
  </script> -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('#bootstrap-select-instansi').selectpicker();

            //GET UPDATE
            $('.update-record').on('click',function(){
              var id_kegiatan = $(this).data('id');
              var nama_kegiatan = $(this).data('nama');
              $(".strings").val('');
              //$('#UpdateModal').modal('show');
              $('[name="edit_id"]').val(id_kegiatan);
              $('[name="package_edit"]').val(nama_kegiatan);
                //AJAX REQUEST TO GET SELECTED PRODUCT
                $.ajax({
                  url: "<?php echo site_url('package/get_product_by_package');?>",
                  method: "POST",
                  data :{package_id:package_id},
                  cache:false,
                  success : function(data){
                    var item=data;
                    var val1=item.replace("[","");
                    var val2=val1.replace("]","");
                    var values=val2;
                    $.each(values.split(","), function(i,e){
                      $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
                      $(".strings").selectpicker('refresh');

                    });
                  }

                });
                return false;
              });

            //GET CONFIRM DELETE
            $('.delete-record').on('click',function(){
              var package_id = $(this).data('package_id');
              $('#DeleteModal').modal('show');
              $('[name="delete_id"]').val(package_id);
            });

          });

    $(document).ready(function(){
      $('#bootstrap-select-kategori').selectpicker();

            //GET UPDATE
            $('.update-record').on('click',function(){
              var id_kegiatan = $(this).data('id');
              var nama_kegiatan = $(this).data('nama');
              $(".strings").val('');
              //$('#UpdateModal').modal('show');
              $('[name="edit_id"]').val(id_kegiatan);
              $('[name="package_edit"]').val(nama_kegiatan);
                //AJAX REQUEST TO GET SELECTED PRODUCT
                $.ajax({
                  url: "<?php echo site_url('package/get_product_by_package');?>",
                  method: "POST",
                  data :{package_id:package_id},
                  cache:false,
                  success : function(data){
                    var item=data;
                    var val1=item.replace("[","");
                    var val2=val1.replace("]","");
                    var values=val2;
                    $.each(values.split(","), function(i,e){
                      $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
                      $(".strings").selectpicker('refresh');

                    });
                  }

                });
                return false;
              });

            //GET CONFIRM DELETE
            $('.delete-record').on('click',function(){
              var package_id = $(this).data('package_id');
              $('#DeleteModal').modal('show');
              $('[name="delete_id"]').val(package_id);
            });

          });
        </script>

        <script type="text/javascript">

        </script>




        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"
        type="text/javascript"></script>
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
        rel="Stylesheet"type="text/css"/>
        <script type="text/javascript">
          $(function () {
            $("#awal").datepicker({
              numberOfMonths: 2,
              minDate :1,
              onSelect: function (selected) {
                var dt = new Date(selected);
                dt.setDate(dt.getDate() + 0);
                $("#akhir").datepicker("option", "minDate", dt);
              }
            });
            $("#akhir").datepicker({
              numberOfMonths: 2,
              minDate :1,
              onSelect: function (selected) {
                var dt = new Date(selected);
                dt.setDate(dt.getDate() - 0);
                $("#awal").datepicker("option", "maxDate", dt);
              }
            });
            
            $("#pakhir").datepicker({
              numberOfMonths: 2,
              minDate :1,
              onSelect: function (selected) {
                var dt = new Date(selected);
                dt.setDate(dt.getDate() - 0);
                $("#akhir").datepicker("option", "maxDate", dt);
              }
            });
          });
        </script>

      </body>

      </html>
