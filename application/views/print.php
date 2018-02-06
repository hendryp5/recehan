<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SAKA SISTEM</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href= "<?= base_url('asset/plugins/bootstrap/dist/css/bootstrap.min.css');?>" >
  <link rel="stylesheet" href= "<?= base_url('asset/plugins/font-awesome/css/font-awesome.min.css');?>" >
  <link rel="stylesheet" href= "<?= base_url('asset/plugins/Ionicons/css/ionicons.min.css'); ?>" >
  <link rel="stylesheet" href= "<?= base_url('asset/dist/css/AdminLTE.min.css'); ?>" >
  <link rel="stylesheet" href= "<?= base_url('asset/dist/css/skins/_all-skins.min.css'); ?>" >
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
</head>
<body onload="window.print()">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
    <section class="invoice">
      <?php $this->load->view($content); ?>
    </section>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?= base_url('asset/plugins/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?= base_url('asset/plugins/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('asset/plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('asset/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"> </script>
<script src="<?= base_url('asset/dist/js/adminlte.min.js'); ?>"> </script>
<script src="<?= base_url('asset/js/app.js'); ?>"> </script>
<?= isset($js) ? $this->load->view($js) : ''; ?>

</body>
</html>