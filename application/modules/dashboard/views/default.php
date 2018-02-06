
<?php if($this->session->flashdata('flashconfirm')): ?>
<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <i class="icon fa fa-check"></i> Sukses! <?php echo $this->session->flashdata('flashconfirm'); ?>.
</div>
<?php endif; ?>
<?php if($this->session->flashdata('flasherror')): ?>
<div class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <i class="icon fa fa-warning"></i> Perhatian! <?php echo $this->session->flashdata('flasherror'); ?>.
</div>
<?php endif; ?>

<div class="row">
<div class="col-md-12">
<div class="callout callout-success">
<h4>Selamat Datang di Saka Sistem</h4>
<p>Selamat beraktivitas tim dari <?= $perusahaan->perusahaan; ?>, untuk melihat profil perusahaan anda silahkan klik tautan berikut ini <a href="<?= site_url('master/perusahaan/detail'); ?>">Profil Perusahaan</a>.</p>
</div>
</div>
</div>

<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?= $count_perumahan; ?></h3>
        <p>Lokasi</p>
      </div>
      <div class="icon">
        <i class="ion ion-location"></i>
      </div>
      <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?= $count_kavling; ?></h3>
        <p>Unit Kavling</p>
      </div>
      <div class="icon">
        <i class="ion ion-home"></i>
      </div>
      <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?= $count_nasabah; ?></h3>
        <p>Nasabah</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-stalker"></i>
      </div>
      <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?= $count_pengguna; ?></h3>
        <p>Pengguna</p>
      </div>
      <div class="icon">
        <i class="ion ion-person"></i>
      </div>
      <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>

<div class="row">
<div class="col-md-6 col-sm-6">
<div class="box box-success">
<div class="box-header with-border">
  <h3 class="box-title">Perumahan</h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<!-- /.box-header -->
<div class="box-body">
  <ul class="products-list product-list-in-box">
    <?php if($perumahan): ?>
    <?php foreach($perumahan as $row): ?>
    <li class="item">
      <div class="product-img">
        <img src="<?= $row->gambar; ?>" alt="Product Image">
      </div>
      <div class="product-info">
        <a href="javascript:void(0)" class="product-title"><?= $row->perumahan; ?>
        <span class="product-description">
          <a href="<?= site_url('master/perumahan/detail/'.$row->id); ?>" class="btn btn-xs btn-flat btn-default pull-right">Detail</a>
        </span>
      </div>
    </li>
    <?php endforeach; ?>
    <?php endif; ?>
    <!-- /.item -->
  </ul>
</div>
<!-- /.box-body -->
<!-- /.box-footer -->
</div>
</div>

<div class="col-md-6 col-sm-6">
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Unit Report</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
        <div class="pad">
            <div class="chart">
              <canvas id="1" width="600" height="230"></canvas>
            </div>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /#page-wrapper -->