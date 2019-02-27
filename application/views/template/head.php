<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.7 -->
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url().'assets/bower_components/font-awesome/css/font-awesome.min.css' ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url().'assets/bower_components/Ionicons/css/ionicons.min.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url().'assets/dist/css/AdminLTE.min.css' ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url().'assets/dist/css/skins/_all-skins.min.css' ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= base_url().'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' ?>">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url().'assets/bower_components/bootstrap/dist/css/bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url().'assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/bower_components/select2/dist/css/select2.min.css'?>">
  <link rel="stylesheet" href="<?= base_url().'assets/plugins/iCheck/square/blue.css'?>">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>YS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>EVAL</b>YS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
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
          <?php if(isset($this->session->nik)) { ?> 
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url().'assets/dist/img/user2-160x160.jpg' ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= $this->session->name ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url().'assets/dist/img/user2-160x160.jpg' ?>" class="img-circle" alt="User Image">

                  <p>
                    <?= $this->session->name ?>
                    <small><?= $this->session->role ?></small>
                  </p>
                </li>
                     <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= site_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
                
              </ul>
            </li>
            <?php 
              } else {
            ?>
          <li>
            <a href="<?= site_url('login') ?>"><i class="fa fa-sign-in"></i><span>&nbsp; Sign In</span> </a>
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
      <?php if(isset($this->session->nik)) { ?> 
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url().'assets/dist/img/user2-160x160.jpg' ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?= $this->session->nik ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
      <?php } ?>
      <ul class="sidebar-menu" data-widget="tree">
       <?php if(isset($this->session->nik)) { ?>      
        <li>
          <a href="<?= site_url('ojt') ?>">
            <i class="fa fa-dashboard"></i> <span>Unit of Competency</span>
            <span class="pull-right-container">
              <i class=" fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>

        <li>
          <a href="<?= site_url('eval') ?>">
            <i class="fa fa-bank"></i><span>Evaluation Form</span>
            <span class="pull-right-container">
              <i class=" fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>

        <li>
          <a href="<?= site_url('eval/view-data') ?>">
            <i class="fa fa-database"></i><span>myLicence</span>
            <span class="pull-right-container">
              <i class=" fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>

      <?php } else { ?>
        <li >
          <a href="<?= site_url('login') ?>">
            <i class="fa fa-sign-in"></i><span>sign In</span>
            <span class="pull-right-container">
              <i class=" fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
      <?php } ?>
      </ul>

      
    </section>
    <!-- /.sidebar -->
  </aside>
