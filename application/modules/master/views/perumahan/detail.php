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
                        <img class="img-responsive" src="<?= $record->gambar; ?>" onerror="this.src='<?= base_url('asset/dist/img/boxed-bg.jpg'); ?>'" alt="User profile picture">
                        <h3 class="profile-username text-center"></h3>
                        <p class="text-muted text-center"></p>
                    </div>
                    <div class="col-md-8">
                        <dl class="dl-horizontal">
                        <dt>NAMA PERUMAHAN</dt>
                        <dd><?= $record->perumahan; ?></dd>
                        <dt>LOKASI PERUMAHAN</dt>
                        <dd><?= $record->lokasi; ?></dd>
                        <dt>KANTOR PEMASARAN</dt>
                        <dd><?= $record->alamat; ?></dd>
                        <dt>TELPON</dt>
                        <dd><?= $record->telpon; ?></dd>
                        <dt>EMAIL</dt:>
                        <dd> <?= $record->email; ?></dd>
                        <dt>INFORMASI PERUMAHAN</dt>
                        <dd>
                        <?= $record->informasi; ?>
                        </dd>
                        </dl>
                        <?php 
                        $query = $this->db->group_by('type')->get_where('kavling', array('perumahan_id'=>$this->uri->segment(4), 'deleted_at'=>null,'code'=>$this->session->userdata('code')))->result();
                        if($query):
                        ?>
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">TIPE</th>
                                <th class="text-center">TERSEDIA</th>
                                <th class="text-center">TERPESAN</th>
                                <th class="text-center">TERJUAL</th>
                                <th class="text-center">JUMLAH</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($query as $row): ?>
                            <tr>
                                <td><?= $row->type; ?></td>
                                <td class="text-right"><?= tersedia($this->uri->segment(4), $row->type); ?></td>
                                <td class="text-right"><?= terpesan($this->uri->segment(4), $row->type); ?></td>
                                <td class="text-right"><?= terjual($this->uri->segment(4), $row->type); ?></td>
                                <td class="text-right"><?= jumlah_tipe($this->uri->segment(4), $row->type); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">JUMLAH</th>
                                <th class="text-right"><?= jumlah_tersedia($this->uri->segment(4)); ?></th>
                                <th class="text-right"><?= jumlah_terpesan($this->uri->segment(4)); ?></th>
                                <th class="text-right"><?= jumlah_terjual($this->uri->segment(4)); ?></th>
                                <th class="text-right"><?= jumlah_total($this->uri->segment(4)); ?></th>
                            </tr>
                        </tfoot>
                        </table>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <a class="btn btn-flat btn-default btn-sm" href="<?php echo site_url('master/perumahan')?>"  title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a> 
                        <?php if(group(array('1','2'))): ?>
                        <a class="btn btn-flat btn-warning btn-sm" onclick="edit_data();" href="<?php echo site_url('master/perumahan/updated/'.$record->id) ?>" data-toggle="tooltip" title="Ubah Data"><i class="fa fa-edit"></i> Ubah</a>
                        <?php endif; ?>
                        <?php if(group(array('1'))): ?>
                        <a class="btn btn-flat btn-danger btn-sm" href="<?php echo site_url('master/perumahan/deleted/'.$record->id) ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
                        <?php endif; ?>
                    </div>
                <!-- /.box-body -->
             </div>
            <!-- /.box -->
    </div>
</div>