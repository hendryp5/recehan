<div class="box box-success box-solid">
<div class="box-header with-border">
    <h3 class="box-title"><?= $head; ?></h3>
    <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
    <i class="fa fa-minus"></i></button>
    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
    <i class="fa fa-times"></i></button>
    </div>
</div>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
          <div class="box-body">  
            <div class="user-block">
                    <img class="img-circle img-bordered-m" src="<?= base_url('asset/dist/img/avatar5.png'); ?>" alt="user image">
                        <span class="username">
                          <h4><?php echo $info->nama; ?></h5>
                        </span>
                        <div class="col-md-8">
                        <dl class="dl-horizontal">
                        <dt>ALAMAT</dt>
                        <dd><?php echo $info->alamat; ?></dd>
                        <dt>TELEPON</dt>
                        <dd><?php echo $info->telpon; ?></dd>
                        <dt>EMAIL</dt>
                        <dd><?php echo $info->email; ?></dd>
                        <dt>STATUS PEMBELIAN</dt>
                        <dd><?php echo status_pemesanan($info->ktp); ?></dd>
                        </dl>
                    </div>
                  </div>        
              <br>
              <br>

              <?php foreach ($record as $row) { ?>
              <div class="row">
              <div class="col-md-12">
                <!-- The time line -->
                <ul class="timeline">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          <?php echo ddMMMyyyy($row->tanggal); ?>
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      

                      <h3 class="timeline-header"></h3>
                      <span class="time"><i class="fa fa-clock-o"></i> <?php echo hari($row->created_at); ?></span>
                          
                      <div class="timeline-body">
                         <div class="form-group">
                          <dl>
                          <dt>MELALUI</dt>
                          <dd><?= melalui($row->melalui); ?></dd>
                          </dl>
                        </div>
                        <div class="form-group">
                          <dl>
                          <dt>KETERANGAN</dt>
                          <dd><?= $row->keterangan; ?></dd>
                          </dl>
                        </div>
                        <div class="form-group">
                          <dl>
                          <dt>KESIMPULAN</dt>
                          <dd><?= hasil($row->hasil); ?></dd>
                          </dl>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
                <br>
                <br>
              </div>
            </div>
              <?php } ?> 
               <div class="col-md-12">
                <a class="btn btn-flat btn-default btn-sm" href="<?php echo site_url('penjualan/followup')?>"  title="Keluar"><i class="fa fa-arrow-left"></i> Kembali</a>
                <?php if (status_pemesanan($info->ktp) == "Pemesanan Unit") {
                  
                } else { ?>
                      <a class="btn btn-flat btn-success btn-sm" onclick="add_data();" href="<?= site_url('penjualan/followup/pesanunit/'.$info->ktp); ?>"><i class="glyphicon glyphicon-plus"></i> Pesan Unit</a>
                      <a class="btn btn-flat btn-warning btn-sm" href="<?php echo site_url('penjualan/followup/created_followup/'.$info->ktp) ?>"><i class="glyphicon glyphicon-pencil"></i> Ubah Jejak</a>
                <?php } ?>
                    </div>
            </div>


            <!-- /.box-body -->
          </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->