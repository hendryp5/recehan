<div class="row">
    <div class="col-md-12">
            <!-- Profile Image -->
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $head; ?></h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    </div>
                </div>      
                <div class="box-body box-profile">
                    <div class="col-md-4">
                        <img class="img-responsive" src="<?php echo $record->gambar; ?>" onerror="this.src='<?= base_url('asset/dist/img/boxed-bg.jpg'); ?>'" alt="User profile picture">
                        <h3 class="profile-username text-center"></h3>
                        <p class="text-muted text-center"></p>
                    </div>
                    <div class="col-md-8">
                        <dl class="dl-horizontal">
                        <dt>LOKASI PERUMAHAN</dt>
                        <dd><?= perumahan($record->perumahan_id); ?></dd>
                        <dt>KODE KAVLING</dt>
                        <dd><?= $record->kode; ?></dd>
                        <dt>NOMOR KAVLING</dt>
                        <dd><?= $record->kavling; ?></dd>
                        <dt>TIPE RUMAH</dt>
                        <dd><?= $record->type; ?></dd>
                        <dt>LUAS TANAH</dt>
                        <dd><?= $record->tanah; ?> m<sup>2</sup></dd>
                        <dt>LUAS BANGUNAN</dt>
                        <dd><?= $record->bangunan; ?> m<sup>2</sup></dd>
                        <dt>HARGA KAVLING</dt>
                        <dd><?= rupiah($record->harga); ?></dd>
                        <dt>TAMBAHAN TANAH</dt>
                        <dd><?= $record->tambahtanah; ?> m<sup>2</sup></dd>
                        <dt>HARGA PERMETER</dt>
                        <dd><?= rupiah($record->permeter); ?></dd>
                        <dt>STATUS PENJUALAN</dt>
                        <dd><?= status_penjualan1($record->status); ?></dd>
                        <dt>NOMOR SERTIFIKAT</dt>
                        <dd><?= $record->sertifikat; ?></dd>
                        <dt>STATUS SERTIFIAKAT</dt>
                        <dd><?= status_sertifikat($record->status_sertifikat); ?></dd>
                        <dt>NOMOR IMB</dt>
                        <dd><?= $record->imb; ?></dd>
                        </dl>
                    </div>
                    <div class="col-md-12">
                       <a class="btn btn-flat btn-default btn-sm" href="<?php echo site_url('penjualan/daftarkavling')?>"  title="Keluar"><i class="fa fa-arrow-left"></i> KEMBALI</a>
                        <?php if ($record->status == '1') { ?>
                      <a class="btn btn-flat btn-info btn-sm" onclick="add_data();" href="<?= site_url('penjualan/daftarkavling/pesanunit/'.$record->id); ?>"><i class="glyphicon glyphicon-plus"></i> Pesan Unit</a>
                      <?php } else {} ?>
                      <a class="btn btn-flat btn-warning btn-sm" onclick="edit_data();" href="<?php echo site_url('penjualan/daftarkavling/updated/'.$record->id)?>" data-toggle="tooltip" title="Ubah Data"><i class="fa fa-edit"></i> Ubah</a>
                        <a class="btn btn-flat btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="<?php echo site_url('penjualan/daftarkavling/deleted/'.$record->id) ?>" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
                    </div>
                <!-- /.box-body -->
             </div>
            <!-- /.box -->
    </div>
</div>