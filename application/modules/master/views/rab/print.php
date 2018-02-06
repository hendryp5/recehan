<!DOCTYPE html>
<html>
<head>
  <title>RAB PROYEK</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet" href= "<?= base_url('asset/plugins/bootstrap/dist/css/bootstrap.min.css');?>" >
  <link rel="stylesheet" href= "<?= base_url('asset/plugins/font-awesome/css/font-awesome.min.css');?>" >
  <link rel="stylesheet" href= "<?= base_url('asset/plugins/Ionicons/css/ionicons.min.css'); ?>" >
  <link rel="stylesheet" href= "<?= base_url('asset/dist/css/AdminLTE.min.css'); ?>" >
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        RENCANA ANGGARAN BIAYA
        <small class="pull-right">Date: <?= date('d-M-Y'); ?></small>
      </h2>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-6 invoice-col">
      Perumahan
      <address>
        <strong><?= perumahan($record->perumahan_id); ?></strong><br>
        <?= detail_perumahan($record->perumahan_id)->lokasi; ?><br>
        Telpon: <?= detail_perumahan($record->perumahan_id)->telpon; ?><br>
        Email: <?= detail_perumahan($record->perumahan_id)->email; ?>
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-6 invoice-col">
    </div>
    <!-- /.col -->
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>URAIAN</th>
          <th>BIAYA</th>
        </tr>
        </thead>
        <tbody>
        <?php $master_rab = $this->db->where('deleted_at',NULL)->order_by('id', 'ASC')->get('master_rab')->result(); ?>
        <?php 
        $penerimaan = 0;
        $pengeluaran = 0;
        $jumlahplus = 0;
        $jumlahminus = 0;
        if($master_rab): 
        foreach($master_rab as $x):
        ?>
        <tr>
          <td><?= '<b>'.$x->kode.'</b>'; ?></td>
          <td><?= '<b>'.$x->kategori.'</b>'; ?></td>
          <td></td>
        </tr>
            <?php $kategori_rab = $this->db->where('deleted_at',NULL)->where('group_id', $x->id)->order_by('id', 'ASC')->get('rab_kategori')->result(); ?>
            <?php 
            if($kategori_rab): 
            foreach($kategori_rab as $y):
            ?>
            <tr>
            <td><?= $y->kode; ?></td>
            <td><?= $y->kategori; ?></td>
            <td></td>
            </tr>
                    <?php $rab = $this->db->where('deleted_at',NULL)->where('kategori_id', $y->id)->where('perumahan_id', $record->perumahan_id)->where('code', $this->session->userdata('code'))->order_by('id', 'ASC')->get('rab')->result(); ?>
                    <?php 
                    if($rab): 
                    foreach($rab as $z):
                    ?>
                    <tr>
                    <td>&nbsp;</td>
                    <td><?= $z->uraian; ?></td>
                    <td class="text-right"><?= rupiah($z->biaya); ?></td>
                    </tr>
                    
                    <?php
                    if($x->notasi === '+'){
                        if($z->kategori_id == $y->id){
                            $jumlahplus =+ $z->biaya;
                        }
                        $penerimaan += $jumlahplus;
                    }

                    if($x->notasi === '-'){
                        if($z->kategori_id == $y->id){
                            $jumlahminus =+ $z->biaya;
                        }
                        $pengeluaran += $jumlahminus;
                    }
                    endforeach;
                    endif; 
                    ?>
            <?php 
            endforeach;
            endif; 
            ?>
        <?php 
        endforeach;
        endif; 
        ?>
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <!-- /.col -->
    <div class="col-xs-12 table-responsive">
        <table class="table">
          <tbody><tr>
            <th style="width:50%">TOTAL PENERIMAAN:</th>
            <td class="text-right"><b><?php echo rupiah($penerimaan); ?></b></td>
          </tr>
          <tr>
            <th>TOTAL BIAYA</th>
            <td class="text-right"><b><?php echo rupiah($pengeluaran); ?></b></td>
          </tr>
          <tr>
            <th>LABA/RUGI</th>
            <td class="text-right"><b><?php echo rupiah($penerimaan-$pengeluaran); ?></b></td>
          </tr>
        </tbody></table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- this row will not appear when printing -->
</body>
</html>