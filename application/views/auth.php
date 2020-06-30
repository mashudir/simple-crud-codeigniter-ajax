<?php $this->load->view('layout/head.php') ?>
<body class="hold-transition skin-blue layout-top-nav">
 <div class="content-wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#!" class="navbar-brand"><b>BELAJAR CODEIGNITER</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <br><br><br><br>

  <div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Login Pengguna</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/auth/login') ?>">
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Username</label>

              <div class="col-sm-10">
                <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

              <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right">Login</button>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
  <footer>
    <br>
    <div class="container">
      <p>Belajar Codeigniter - AJAX - Bootstrap - MySQL</p>
    </div>
  </footer>
</body>
<?php $this->load->view('layout/js.php') ?>
