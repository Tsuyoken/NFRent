<body class="dark-mode hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
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
        <div class="mb-3 d-flex justify-content-end">
          <a href="mobil/create" class="btn btn-primary">Tambah Mobil</a>
        </div>
        <?php if(isset($_SESSION['sukses'])) { ?>
        <div class="alert alert-success">
           <span><?php echo @$_SESSION['sukses'];?></span> 
        </div>
        <?php } ?>
        <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead class="table-dark">
                  <tr>
                    <th>#</th>
                    <th>Merk Mobil</th>
                    <th>Nomor Polisi</th>
                    <th>Warna</th>
                    <th>Biaya sewa</th>
                    <th>CC</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($mobil_data as $m) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $m->nama; ?></td>
                    <td><?= $m->nopol; ?></td>
                    <td><?= $m->warna; ?></td>
                    <td><?= $m->biaya_sewa; ?></td>
                    <td><?= $m->cc; ?></td>
                    <td><?= $m->tahun; ?></td>
                    <td>
                      <a href="mobil/detail?id=<?= $m->id; ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                      <a href="mobil/edit?id=<?= $m->id; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                      <a href="mobil/delete?id=<?= $m->id; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
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

