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
                        <img class="profile-user-img img-responsive img-square" src="<?= $record->avatar; ?>" onerror="this.src='<?= base_url('asset/dist/img/boxed-bg.jpg'); ?>'" alt="User profile picture">
                        <h3 class="profile-username text-center"><?= $record->nama; ?></h3>
                        <p class="text-muted text-center">
                        <?= level($record->level_id); ?></p>
                    </div>
                    <div class="col-md-8">
                        <dl class="dl-horizontal">
                        <dt>TEMPAT LAHIR</dt>
                        <dd><?= $record->tmlahir ? $record->tmlahir : '-'; ?></dd>
                        <dt>TANGGAL LAHIR</dt>
                        <dd><?= $record->tglahir ? ddMMMyyyy($record->tglahir) : '-'; ?></dd>
                        <dt>JENIS KELAMIN</dt>
                        <dd><?= $record->sex ? sex($record->sex) : '-'; ?></dd>
                        <dt>PENDIDIKAN</dt>
                        <dd><?= $record->pendidikan_id ? pendidikan($record->pendidikan_id):'-'; ?></dd>
                        <dt>ALAMAT</dt>
                        <dd><?= $record->alamat ? $record->alamat : '-'; ?></dd>
                        <dt>TELPON</dt>
                        <dd><?= $record->telpon ? $record->telpon : '-'; ?></dd>
                        <dt>EMAIL</dt:>
                        <dd> <?= $record->email ? $record->email : '-'; ?></dd>
                        <dt>STATUS</dt:>
                        <dd> <?= active($record->active); ?></dd>
                        <dt>LOKASI PERUMAHAN</dt>
                        <dd>
                        <?php if(users_perumahan($record->id)): ?>
                        <ul>
                        <?php foreach(users_perumahan($record->id) as $row): ?>
                        <li><?= perumahan($row->perumahan_id); ?></li>
                        <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        </dd>
                        </dl>
                    </div>
                    <div class="col-md-12">
                        <a class="btn btn-flat btn-default btn-sm" href="<?php echo site_url('master/pengguna')?>"  title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a> 
                        <a class="btn btn-flat btn-info btn-sm" onclick="edit_data();" href="<?php echo site_url('master/password/updated/'.$record->id) ?>" data-toggle="tooltip" title="Ganti Password"><i class="fa fa-key"></i> Password</a>
                        <a class="btn btn-flat btn-warning btn-sm" onclick="edit_data();" href="<?php echo site_url('master/pengguna/updated/'.$record->id) ?>" data-toggle="tooltip" title="Ubah Data"><i class="fa fa-edit"></i> Ubah</a>
                    <?php if(group(array('1'))): ?>
                        <a class="btn btn-flat btn-danger btn-sm" href="<?php echo site_url('master/pengguna/deleted/'.$record->id) ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
                    <?php endif; ?>
                    </div>
                <!-- /.box-body -->
             </div>
            <!-- /.box -->
    </div>
</div>