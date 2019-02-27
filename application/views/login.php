<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="<?= base_url().'assets/bower_components/bootstrap/dist/css/bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url().'assets/bower_components/font-awesome/css/font-awesome.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url().'assets/bower_components/Ionicons/css/ionicons.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url().'assets/dist/css/AdminLTE.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url().'assets/dist/css/skins/_all-skins.min.css' ?>">
 <link rel="stylesheet" href="<?= base_url().'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/bower_components/select2/dist/css/select2.min.css'?>">
  <link rel="stylesheet" href="<?= base_url().'assets/plugins/iCheck/square/blue.css'?>">
  <meta charset="utf-8">
  <title>LICENSE | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>EVA</b>LYS</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <!-- <p class="login-box-msg">Sign In</p> -->

    <form action="<?= site_url('/auth') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="Text" class="form-control" name="NIK" placeholder="NIK">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script src="<?= base_url().'assets/bower_components/jquery/dist/jquery.min.js' ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url().'assets/bower_components/jquery-ui/jquery-ui.min.js '?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url().'assets/bower_components/bootstrap/dist/js/bootstrap.min.js' ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url().'assets/bower_components/moment/min/moment.min.js' ?>"></script>
<script src="<?= base_url().'assets/bower_components/bootstrap-daterangepicker/daterangepicker.js'?>"></script>
<!-- datepicker -->
<script src="<?= base_url().'assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url().'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'?>"></script>
<!-- Slimscroll -->
<script src="<?= base_url().'assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?= base_url().'assets/bower_components/fastclick/lib/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url().'assets/dist/js/adminlte.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url().'assets/dist/js/demo.js'?>"></script>
<!-- DataTables -->
<script src="<?= base_url().'assets/bower_components/datatables.net/js/jquery.dataTables.min.js' ?>"></script>
<script src="<?= base_url().'assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?= base_url().'assets/bower_components/select2/dist/js/select2.full.min.js'?>"></script>
<script src="<?= base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
