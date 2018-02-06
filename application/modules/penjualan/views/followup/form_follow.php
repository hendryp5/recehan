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
    <form id="formID" role="form" action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
    <br>
            <div id="smartwizard">
            <ul>
                
                <li><a href="#follow">Langkah<br /><small>Menambah Riwayat Follow up</small></a></li>
            </ul>
            <br>
            <div>
                <div id="data">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group <?php echo form_error('nama') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('NAMA *','nama');
                            $data = array('class'=>'form-control','name'=>'nama','id'=>'nama','type'=>'text','placeholder'=>'Masukkan Nama Nasabah Followup','autocomplete'=>'off','value'=>set_value('nama', $record->nama));
                            echo form_input($data);
                            echo form_error('nama') ? form_error('nama', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('ktp') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('NOMOR KTP','ktp');
                            $data = array('class'=>'form-control','name'=>'ktp','id'=>'ktp','type'=>'text','placeholder'=>'Masukkan Nomor KTP','value'=>set_value('kavling', $record->ktp));
                            echo form_input($data);
                            echo form_error('kavling') ? form_error('kavling', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('email') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('EMAIL','email');
                            $data = array('class'=>'form-control','name'=>'email','id'=>'email','type'=>'text','placeholder'=>'Masukkan Email','value'=>set_value('type', $record->email));
                            echo form_input($data);
                            echo form_error('email') ? form_error('email', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('telpon') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('NOMOR TELEPON *','telpon');
                            $data = array('class'=>'form-control','name'=>'telpon','id'=>'telpon','type'=>'number','placeholder'=>'Masukkan Nomor Telepon/ Contoh : 08123344325675','value'=>set_value('tanah', $record->telpon));
                            echo form_input($data);
                            echo form_error('telpon') ? form_error('telpon', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('alamat') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('ALAMAT *','alamat');
                            $data = array('class'=>'form-control','name'=>'alamat','id'=>'alamat','type'=>'text','placeholder'=>'Masukkan Alamat','value'=>set_value('alamat', $record->alamat));
                            echo form_textarea($data);
                            echo form_error('alamat') ? form_error('alamat', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('pekerjaan') ? 'has-error' : null; ?>">
                            <?php 
                            echo form_label('PEKERJAAN *','pekerjaan');
                            $selected = set_value('pekerjaan', $record->pekerjaan);
                            echo form_dropdown('pekerjaan', $group_pkj, $selected, "class='form-control select2' name='pekerjaan' id='pekerjaan'");
                            echo form_error('pekerjaan') ? form_error('pekerjaan', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    </div>
                </div>

                <div id="follow">
                    <div class="row">
                         <div class="col-md-12">
                        <div class="form-group <?php echo form_error('tanggal') ? 'has-error' : null; ?>">
                            <?php 
                            echo form_label('TANGGAL FOLLOW UP','tanggal');
                            $selected = set_value('status', $record->tanggal);
                            $data = array('class'=>'form-control','name'=>'tanggal','id'=>'tanggal','type'=>'text','placeholder'=>'Masukkan Tanggal','value'=>set_value('tanggal', $new->tanggal));
                            echo form_input($data);
                            echo form_error('tanggal') ? form_error('tanggal', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('melalui') ? 'has-error' : null; ?>">
                            <?php 
                            echo form_label('MELALUI','melalui');
                            $selected = set_value('melalui', $new->melalui);
                            $status = array('0'=>'Pilih Melalui Apa?','1'=>'TELEPON','2'=>'BERTEMU','3'=>'KEKANTOR','4'=>'KELOKASI','5'=>'CLOSING/PESAN UNIT');
                            echo form_dropdown('melalui', $status, $selected, "class='form-control select2' name='melalui' id='melalui' style='width: 100%;' ");
                            echo form_error('melalui') ? form_error('melalui', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('keterangan') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('KETERANGAN','keterangan');
                            $data = array('class'=>'form-control','name'=>'keterangan','id'=>'keterangan','type'=>'text','placeholder'=>'Masukkan Keterangan','value'=>set_value('keterangan', $new->keterangan));
                            echo form_textarea($data);
                            echo form_error('keterangan') ? form_error('keterangan', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('hasil') ? 'has-error' : null; ?>">
                            <?php 
                            echo form_label('KESIMPULAN','hasil');
                            $selected = set_value('hasil', $new->hasil);
                            $status = array('0'=>'--KESIMPULAN--','1'=>'Belum Berminat','2'=>'Pikir-pikir','3'=>'Berminat','4'=>'Deal');
                            echo form_dropdown('hasil', $status, $selected, " style='width: 100%;' class='form-control select2' name='hasil' id='hasil'");
                            echo form_error('hasil') ? form_error('hasil', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                </div>
                    <div class="col-md-16">
                        <div class="form-group <?php echo form_error('perumahan_id') ? 'has-error' : null; ?>">
                            <?php 
                            echo form_label('LOKASI PERUMAHAN','perumahan_id');
                            $selected = set_value('perumahan_id', $record->perumahan_id);
                            echo form_dropdown('perumahan_id', $group, $selected, " style='width: 100%;' class='form-control select2' name='perumahan_id' id='perumahan_id'");
                            echo form_error('perumahan_id') ? form_error('perumahan_id', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                     </div>
                    </div>
                </div>
            </div>       
            <!-- /. row body -->
            <div class="box-footer">
				<button type="button" class="btn btn-sm btn-flat btn-info" onclick="saveoutfollowup();"><i class="fa fa-save"></i> Simpan & Keluar</button>
				<button type="button" class="btn btn-sm btn-flat btn-danger" onclick="back();"><i class="fa fa-close"></i> Keluar</button>
			</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </form>
</div>


<!-- /#page-wrapper -->

