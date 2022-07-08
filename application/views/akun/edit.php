<body class="dark-mode hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="../akun" class="btn btn-warning mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
            <h1 class="m-0">Edit Akun</h1>
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
                <?= form_open('akun/update',['action'=>'POST']);?>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="hidden" class="form-control" name="id" value="<?= $akun_data->id ;?>" >
                  <input type="text" class="form-control" name="username" value="<?= $akun_data->username ;?>"readonly>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email" value="<?= $akun_data->email ;?>" readonly>
                </div>
                <div class="form-group">
                  <label for="Role">Role</label>
                  <select name="role" class="form-control" id="role" required>
                    <option value="">- pilih role -</option>
                    <option value="administrator" <?php echo ($akun_data->role == "administrator") ? 'selected' : ' '  ?>>Admin</option>
                    <option value="public" <?php echo ($akun_data->role == "public") ? 'selected' : ' '  ?>>Public</option>
                </select>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Simpan</button>
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

