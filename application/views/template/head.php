<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url() . 'assets/bower_components/font-awesome/css/font-awesome.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'assets/bower_components/Ionicons/css/ionicons.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'assets/dist/css/skins/_all-skins.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'assets/bower_components/bootstrap/dist/css/bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'assets/bower_components/select2/dist/css/select2.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/iCheck/square/blue.css' ?>">

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <span class="logo-mini"><b>E</b>YS</span>
        <span class="logo-lg"><b>EVAL</b>YS</span>
      </a>
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <?php if (isset($this->session->nik)) { ?>
              <li class="dropdown user user-menu">
                <a href="<?= site_url('logout') ?>">Sign Out
                  <i class="fa fa-arrow-circle-right"></i>
                </a>
              </li>
            <?php } else { ?>

              <li class="dropdown user user-menu" style="font-size: 18px">
                <a href="<?= site_url('login') ?>" class="fa fa-sign-in"> Sign In
                </a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <?php if (isset($this->session->nik)) { ?>
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?= base_url() . 'assets/dist/img/user2-160x160.jpg' ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?= $this->session->nik ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
        <?php } ?>
        <ul class="sidebar-menu" data-widget="tree">
          <li>
            <a href="<?= site_url('home') ?>">
              <i class="fa fa-home"></i> <span>Home</span>
              <span class="pull-right-container">
                <i class=" fa fa-pull-right"></i>
              </span>
            </a>
          </li>
          <?php if (isset($this->session->nik)) {
            # code...
          ?>

            <li>
              <a href="<?= site_url('eval') ?>">
                <i class="fa fa-wpforms"></i> <span>Evaluation Form</span>
                <span class="pull-right-container">
                  <i class=" fa fa-pull-right"></i>
                </span>
              </a>
            </li>

            <li>
              <a href="<?= site_url('eval/view-data') ?>">
                <i class="fa fa-credit-card"></i> <span>myLicense</span>
                <span class="pull-right-container">
                  <i class=" fa fa-pull-right"></i>
                </span>
              </a>
            </li>

            <?php if ($this->session->role == 'admin') { ?>
              <li>
                <a href="<?= site_url('ojt') ?>">
                  <i class="fa fa-list-alt"></i> <span>Unit of Competency</span>
                  <span class="pull-right-container">
                    <i class=" fa fa-pull-right"></i>
                  </span>
                </a>
              </li>

              <li>
                <a href="<?= site_url('user') ?>">
                  <i class="fa fa-user"></i> <span>User</span>
                  <span class="pull-right-container">
                    <i class=" fa fa-pull-right"></i>
                  </span>
                </a>
              </li>

              <li>
                <a href="<?= site_url('telegram') ?>">
                  <i class="fa fa-telegram"></i> <span>Telegram ID</span>
                  <span class="pull-right-container">
                    <i class=" fa fa-pull-right"></i>
                  </span>
                </a>
              </li>

          <?php }
          } ?>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>