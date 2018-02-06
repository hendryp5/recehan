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
    <form id="formID" role="form" action="" method="post">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
    <br>
            <div id="smartwizard">
            <ul>
                <li><a href="#data">Langkah 1<br /><small>Data Kavling</small></a></li>
                <li><a href="#tapem">Langkah 2<br /><small>Data Kelebihan Tanah</small></a></li>
                <li><a href="#legal">Langkah 3<br /><small>Data Legalitas</small></a></li>
            </ul>
            <br>
            <div>
                <div id="data">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('perumahan_id') ? 'has-error' : null; ?>">
                            <?php 
                            echo form_label('LOKASI PERUMAHAN*','perumahan_id');
                            $selected = set_value('perumahan_id', $record->perumahan_id);
                            echo form_dropdown('perumahan_id', $group, $selected, "class='form-control select2' style='width: 100%;' name='perumahan_id' id='perumahan_id'");
                            echo form_error('perumahan_id') ? form_error('perumahan_id', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('kode') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('KODE KAVLING*','kode');
                            $data = array('class'=>'form-control','name'=>'kode','id'=>'kode','type'=>'text','placeholder'=>'Masukkan Kode Kavling / Contoh : 001','value'=>set_value('kode', $record->kode));
                            echo form_input($data);
                            echo form_error('kode') ? form_error('kode', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('kavling') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('NOMOR KAVLING*','kavling');
                            $data = array('class'=>'form-control','name'=>'kavling','id'=>'kavling','type'=>'text','placeholder'=>'Masukkan Blok dan NO Kavling / Contoh : A01','value'=>set_value('kavling', $record->kavling));
                            echo form_input($data);
                            echo form_error('kavling') ? form_error('kavling', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('type') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('TIPE RUMAH*','type');
                            $data = array('class'=>'form-control','name'=>'type','id'=>'type','type'=>'text','placeholder'=>'Masukkan Tipe Rumah / Contoh : 32/64','value'=>set_value('type', $record->type));
                            echo form_input($data);
                            echo form_error('type') ? form_error('type', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('tanah') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('LUAS TANAH*','tanah');
                            $data = array('class'=>'form-control','name'=>'tanah','id'=>'tanah','type'=>'number','placeholder'=>'Masukkan Luas Tanah Standar/ Contoh : 100/120','value'=>set_value('tanah', $record->tanah));
                            echo form_input($data);
                            echo form_error('tanah') ? form_error('tanah', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('bangunan') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('LUAS BANGUNAN*','bangunan');
                            $data = array('class'=>'form-control','name'=>'bangunan','id'=>'bangunan','type'=>'number','placeholder'=>'Masukkan Luas Bangunan/ Contoh : 100/200','value'=>set_value('bangunan', $record->bangunan));
                            echo form_input($data);
                            echo form_error('bangunan') ? form_error('bangunan', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('harga') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('HARGA*','harga');
                            $data = array('class'=>'form-control','name'=>'harga','id'=>'price','type'=>'text','placeholder'=>'Masukkan Harga Standar Kavling/ Contoh : 1.000.000','value'=>set_value('harga', $record->harga));
                            echo form_input($data);
                            echo form_error('harga') ? form_error('harga', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('status') ? 'has-error' : null; ?>">
                            <?php 
                            echo form_label('STATUS PENJUALAN*','status');
                            $selected = set_value('status', $record->status);
                            $status1 = array('0'=>'Pilih Status Kavling','1'=>'Tersedia','2'=>'Terpesan','3'=>'Terjual');
                            echo form_dropdown('status', $status1, $selected, "style='width: 100%;' class='form-control select2' name='status' id='status'");
                            echo form_error('status') ? form_error('status', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    </div>
                </div>

                <div id="tapem">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('tambahtanah') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('LUAS TAMBAHAN TANAH','tambahtanah');
                                $data = array('class'=>'form-control','name'=>'tambahtanah','id'=>'tambahtanah','type'=>'text','placeholder'=>'Masukkan Luas Tambah Tanah','value'=>set_value('tambahtanah', $record->tambahtanah));
                                echo form_input($data);
                                echo form_error('tambahtanah') ? form_error('tambahtanah', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('permeter') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('HARGA PERMETER','permeter');
                                $data = array('class'=>'form-control','name'=>'permeter','id'=>'permeter','type'=>'text','placeholder'=>'Masukkan Harga Permeter','value'=>set_value('pendapatan_pasangan', $record->permeter));
                                echo form_input($data);
                                echo form_error('pendapatan_pasangan') ? form_error('pendapatan_pasangan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php
                                echo form_label('TOTAL HARGA TANAH','totaltanah');
                                $data = array('readonly class'=>'form-control','name'=>'totaltanah','id'=>'totaltanah','type'=>'text');
                                echo form_input($data);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="legal">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group <?php echo form_error('sertifikat') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('NOMOR SERTIFIKAT','status');
                            $data = array('class'=>'form-control','name'=>'sertifikat','id'=>'sertifikat','type'=>'text','placeholder'=>'Masukkan Nomor Sertifikat/ Contoh : SHM001/SHGB001','value'=>set_value('sertifikat', $record->sertifikat));
                            echo form_input($data);
                            echo form_error('sertifikat') ? form_error('sertifikat', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('status_sertifikat') ? 'has-error' : null; ?>">
                            <?php 
                            echo form_label('STATUS SERTIFIKAT','status_sertifikat');
                            $selected = set_value('status_sertifikat', $record->status_sertifikat);
                            $status = array('0'=>'Pilih Status Sertifikat','1'=>'Pecahan','2'=>'Induk');
                            echo form_dropdown('status_sertifikat', $status, $selected, "class='form-control select2' name='status_sertifikat' id='status_sertifikat' style='width: 100%;'");
                            echo form_error('status_sertifikat') ? form_error('status_sertifikat', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('imb') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('NOMOR IMB','imb');
                            $data = array('class'=>'form-control','name'=>'imb','id'=>'imb','type'=>'text','placeholder'=>'Masukkan Nomor IMB','value'=>set_value('imb', $record->imb));
                            echo form_input($data);
                            echo form_error('imb') ? form_error('imb', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                </div>

                    <div class="col-md-16">
                        <div class="form-group <?php echo form_error('avatar') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('GAMBAR KAVLING','avatar');
                            $data = array('class'=>'form-control','name'=>'avatar','id'=>'avatar','type'=>'file', 'accept'=>'image/*','placeholder'=>'Masukkan Password yang sama kembali','value'=>set_value('avatar', $record->gambar));
                            echo form_input($data);
                            echo form_error('avatar') ? form_error('avatar', '<p class="help-block">','</p>') : '';
                            ?>
                            <input type="hidden" name="gambar" id="url-gambar" value="<?= set_value('gambar', $record->gambar); ?>" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <img id="upload-avatar" src="<?= $record->gambar; ?>">
                    </div>  
                </div>
                </div>
            </div>
            </div>
     
            <!-- /. row body -->
            <div class="box-footer">
                <button type="button" class="btn btn-sm btn-flat btn-info" onclick="saveoutupload();"><i class="fa fa-save"></i> Simpan & Keluar</button>
                <button type="reset" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-refresh"></i> Reset</button>
                <button type="button" class="btn btn-sm btn-flat btn-danger" onclick="back();"><i class="fa fa-close"></i> Keluar</button>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </form>
</div>


<!-- /#page-wrapper -->

