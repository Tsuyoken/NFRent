<style>
    tr,td{
        padding:8px;
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="../mobil" class="btn btn-warning mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
            <h1 class="m-0">Detail Mobil</h1>
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
                <h2 class="card-title">Detail data</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="">
                <img src="<?= base_url() ?>image/<?= $mobil_data->foto ?>" class="elevation-2 mb-4 rounded" width="320" class="mb-4" alt="Foto">
                <table class="table-hover">
                    <tr>
                        <td><h4>Merk Mobil</h4></td>
                        <td><h4> : </h4></td>
                        <td><h4><?= $mobil_data->nama ?></h4></td>
                    </tr>
                    <tr>
                        <td><h4>Nomor Polisi</h4></td>
                        <td><h4> : </h4></td>
                        <td><h4> <?= $mobil_data->nopol ?></h4></td>
                    </tr>
                    <tr>
                        <td><h4>Warna</h4></td>
                        <td><h4> : </h4></td>
                        <td><h4> <?= $mobil_data->warna ?></h4></td>
                    </tr>
                    <tr>
                        <td><h4>Biaya Sewa</h4></td>
                        <td><h4> : </h4></td>
                        <td><h4> <?= $mobil_data->biaya_sewa ?></h4></td>
                    </tr>
                    <tr>
                        <td><h4>CC</h4></td>
                        <td><h4> : </h4></td>
                        <td><h4> <?= $mobil_data->cc ?></h4></td>
                    </tr>
                    <tr>
                        <td><h4>Tahun</h4></td>
                        <td><h4> : </h4></td>
                        <td><h4> <?= $mobil_data->tahun ?></h4></td>
                    </tr>
                </table>
                </div>
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

