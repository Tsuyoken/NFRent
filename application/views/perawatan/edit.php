<body class="dark-mode hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="../perawatan" class="btn btn-warning mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
            <h1 class="m-0">Edit Merek Mobil</h1>
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
                <h3 class="card-title">Edit data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
                <?= form_open('perawatan/update',['action'=>'POST']);?>
                    <div class="form-group">
                      <label for="tanggal_mulai">Tanggal Perawatan</label>
                      <input type="date" class="form-control" name="tanggal" value="<?= $perawatan_data->tanggal ?>" required>
                      <input type="hidden" class="form-control" name="id" value="<?= $perawatan_data->id ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="biaya">Biaya</label>
                        <input type="number" class="form-control" name="biaya" value="<?= $perawatan_data->biaya ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" value="<?= $perawatan_data->deskripsi ?>" name="deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="mobil_id">Pilih Mobil</label>
                        <select name="mobil_id" id="mobil_id" class="form-control">
                          <option value="">-</option>
                          <?php foreach($mobil_data as $m) :?>
                            <option <?= ($m->id) ? 'selected' :''?> value="<?= $m->id;?>"><?= $m->nopol;?> - <?= $m->nama;?></option>
                          <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_perawatan_id">Pilih Jenis Perawatan</label>
                        <select name="jenis_perawatan_id" id="jenis_perawatan_id" class="form-control">
                          <option value="">-</option>
                          <?php foreach($jenis_perawatan_data as $j) :?>
                            <option <?= ($j->id) ? 'selected' :''?>  value="<?= $j->id;?>"><?= $j->nama;?></option>
                          <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                <?= form_close();?>
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

