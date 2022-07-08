<body class="dark-mode hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="../mobil" class="btn btn-warning mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
            <h1 class="m-0">Daftar Mobil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Merek Mobil</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
                <form action="<?= base_url()?>index.php/mobil/store" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="nopol">Nomor Polisi</label>
                  <input type="text" class="form-control" name="nopol" required>
                </div>
                <div class="form-group">
                  <label for="warna">Warna</label>
                  <input type="text" class="form-control" name="warna" required>
                </div>
                <div class="form-group">
                  <label for="biaya_sewa">Biaya Sewa</label>
                  <input type="number" class="form-control" name="biaya_sewa" required>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <input type="text" class="form-control" name="deskripsi" required>
                </div>
                <div class="form-group">
                  <label for="foto">Foto</label>
                  <input type="file" class="form-control" name="foto" required>
                </div>
                <div class="form-group">
                  <label for="cc">CC</label>
                  <input type="text" class="form-control" name="cc" required>
                </div>
                <div class="form-group">
                  <label for="tahun">Tahun</label>
                  <input type="number" class="form-control" name="tahun" required>
                </div>
                <div class="form-group">
                  <label for="merk_id">Pilih Merk Mobil</label>
                  <select name="merk_id" id="merk_id" class="form-control">
                    <option value="">-</option>
                    <?php foreach($merk_data as $m) :?>
                      <option value="<?= $m->id;?>"><?= $m->nama;?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

