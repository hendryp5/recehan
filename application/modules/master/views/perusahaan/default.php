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
                    <div class="col-md-2">
                        <img class="profile-user-img img-responsive img-square" src="<?= $record->logo; ?>" onerror="this.src='<?= base_url('asset/dist/img/boxed-bg.jpg'); ?>'" alt="Logo">
                        <h3 class="profile-username text-center"></h3>
                        <p class="text-muted text-center"></p>
                    </div>
                    <div class="col-md-10">
                        <dl class="dl-horizontal">
                        <dt>PERUSAHAAN</dt>
                        <dd><?= $record->perusahaan ? $record->perusahaan : '-'; ?></dd>
                        <dt>PENGANGGUNG JAWAB</dt>
                        <dd><?= $record->pemilik ? $record->pemilik : '-'; ?></dd>
                        <dt>ALAMAT</dt>
                        <dd><?= $record->alamat ? $record->alamat : '-'; ?></dd>
                        <dt>TELPON</dt>
                        <dd><?= $record->telpon ? $record->telpon : '-'; ?></dd>
                        <dt>FAX</dt>
                        <dd><?= $record->fax ? $record->fax : '-'; ?></dd>
                        <dt>EMAIL</dt>
                        <dd><?= $record->email ? $record->email : '-'; ?></dd>
                        <dt>WEBSITE</dt>
                        <dd><?= $record->website ? $record->website : '-'; ?></dd>
                        </dl>
                    </div>
                    <?php if(group(array('1','2'))): ?>
                    <div class="col-md-12">
                        <a class="btn btn-flat btn-warning btn-sm" onclick="edit_data();" href="<?php echo site_url('master/perusahaan/updated/'.$record->id) ?>" data-toggle="tooltip" title="Ubah Data"><i class="fa fa-edit"></i> Ubah</a>
                    </div>
                    <?php endif; ?>
                <!-- /.box-body -->
             </div>
            <!-- /.box -->
    </div>
</div>