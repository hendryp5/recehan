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
                <li><a href="#data">Langkah 1<br /><small>Data Nasabah</small></a></li>
                <li><a href="#unit">Langkah 2<br /><small>Unit Di Pesan</small></a></li>
                <li><a href="#kelebihan">Langkah 3<br /><small>Kelebihan Tanah dan Bangunan</small></a></li>
                </ul>
            <br>
            <div>
                <div id="data">
                    <div class="row">
                         <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nama') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('NAMA NASABAH','nama');
                                if ($this->session->userdata('method')=='followup') {
                                 $data = array('class'=>'form-control','name'=>'nama','id'=>'nama','placeholder'=>'Masukkan Nama Nasabah / Contoh : Saka','type'=>'text','value'=>set_value('nama', $followup->nama));
                                } else {
                                $data = array('class'=>'form-control','name'=>'nama','id'=>'nama','placeholder'=>'Masukkan Nama Nasabah / Contoh : Saka','type'=>'text','value'=>set_value('nama', $record->nama));
                                }
                                echo form_input($data);
                                echo form_error('nama') ? form_error('nama', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('ktp') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('NOMOR KTP','ktp');
                                if ($this->session->userdata('method')=='followup') {
                                $data = array('class'=>'form-control','name'=>'ktp','id'=>'ktp','type'=>'text','placeholder'=>'Masukkan Nomor KTP','value'=>set_value('ktp', $followup->ktp));
                                } else {
                                $data = array('class'=>'form-control','name'=>'ktp','id'=>'ktp','type'=>'text','placeholder'=>'Masukkan Nomor KTP','value'=>set_value('ktp', $record->ktp));
                                }
                                echo form_input($data);
                                echo form_error('ktp') ? form_error('ktp', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group <?php echo form_error('alamat1') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('ALAMAT KTP','alamat1');
                                if ($this->session->userdata('method')=='followup') {
                                $data = array('class'=>'form-control','name'=>'alamat1','id'=>'alamat1','type'=>'text','placeholder'=>'Masukkan Alamat Asal Lengkap','value'=>set_value('alamat1', $followup->alamat));
                                } else { 
                                $data = array('class'=>'form-control','name'=>'alamat1','id'=>'alamat1','type'=>'text','placeholder'=>'Masukkan Alamat Asal Lengkap','value'=>set_value('alamat1', $record->alamat1));
                                }
                                echo form_input($data);
                                echo form_error('alamat1') ? form_error('alamat1', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('alamat2') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('ALAMAT SURAT','alamat2');
                                $data = array('class'=>'form-control','name'=>'alamat2','id'=>'alamat2','type'=>'text','placeholder'=>'Masukkan Alamat Sekarang Lengkap ','value'=>set_value('alamat2', $record->alamat2));
                                echo form_input($data);
                                echo form_error('alamat2') ? form_error('alamat2', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('telpon1') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('NOMOR TELEPON ','telpon1');
                                if ($this->session->userdata('method')=='followup') {
                                $data = array('class'=>'form-control','name'=>'telpon1','id'=>'telpon1','type'=>'text','placeholder'=>'Masukkan Nomor Telepon / Contoh : 0812xxxxxxx','value'=>set_value('telpon1', $followup->telpon));
                                } else {
                                $data = array('class'=>'form-control','name'=>'telpon1','id'=>'telpon1','type'=>'text','placeholder'=>'Masukkan Nomor Telepon / Contoh : 0812xxxxxxx','value'=>set_value('telpon1', $record->telpon1));
                                }
                                echo form_input($data);
                                echo form_error('telpon1') ? form_error('telpon1', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('wa') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('WHATSAPP','wa');
                                $data = array('class'=>'form-control','name'=>'wa','id'=>'wa','type'=>'text','placeholder'=>'Masukkan Nomor WHATSAPP / Contoh : 0812xxxxxxx','value'=>set_value('wa', $record->wa));
                                echo form_input($data);
                                echo form_error('wa') ? form_error('wa', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('email') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('EMAIL','email');
                                if ($this->session->userdata('method')=='followup') {
                                $data = array('class'=>'form-control','name'=>'email','id'=>'email','type'=>'text','placeholder'=>'Masukkan Email Anda / Contoh : saka@example.com','value'=>set_value('email', $followup->email));
                                } else {
                                $data = array('class'=>'form-control','name'=>'email','id'=>'email','type'=>'text','placeholder'=>'Masukkan Email Anda / Contoh : saka@example.com','value'=>set_value('email', $record->email));
                                }
                                echo form_input($data);
                                echo form_error('email') ? form_error('email', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                
                 <div id="unit" class="">
                    <div class="row">
                         <div class="col-md-12">
                            <div class="form-group <?php echo form_error('perumahan_id') ? 'has-error' : null; ?>">
                                <?php 
                                echo form_label('PERUMAHAN','perumahan_id');
                                if ($this->session->userdata('method')=='kavling') {
                                $selected = set_value('perumahan_id', $kavling->perumahan_id);
                                echo form_dropdown('perumahan_id', $group, $selected, "class='form-control select2' name='perumahan_id' id='perumahan_id' ");
                                } else if ($this->session->userdata('method')=='followup')  {
                                $selected = set_value('perumahan_id', $followup->perumahan_id);
                                echo form_dropdown('perumahan_id', $group, $selected, "class='form-control select2' name='perumahan_id' id='perumahan_id' ");    
                                } else {
                                $selected = set_value('perumahan_id', $record->perumahan_id);
                                echo form_dropdown('perumahan_id', $group, $selected, "class='form-control select2' name='perumahan_id' id='perumahan_id' ");
                                }
                                echo form_error('perumahan_id') ? form_error('perumahan_id', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                            <div class="form-group <?php echo form_error('kavling_id') ? 'has-error' : null; ?>">
                                <?php 
                                echo form_label('NOMOR KAVLING','kavling_id');
                                if ($this->session->userdata('method')=='kavling') {
                                $selected = set_value('kavling_id', $kavling->id);
                                echo form_dropdown('kavling_id',$group_kav, $selected, "class='form-control select2' name='kavling_id' id='kavling_id' ");
                                } else {   
                                $selected = set_value('kavling_id', $record->kavling_id);
                                echo form_dropdown('kavling_id',$group_kav, $selected, "class='form-control select2' name='kavling_id' id='kavling_id' ");
                                }
                                echo form_error('kavling_id') ? form_error('kavling_id', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>  
                            <div class="form-group">
                                <?php
                                echo form_label('LUAS TANAH','tanah');
                                 $data = array('readonly class'=>'form-control','name'=>'tanah','id'=>'tanah','type'=>'text');
                                 echo form_input($data);
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                echo form_label('LUAS BANGUNAN','bangunan');
                                 $data = array('readonly class'=>'form-control','name'=>'bangunan','id'=>'bangunan','type'=>'text');
                                 echo form_input($data);
                               ?>
                            </div>
                            <div class="form-group">
                                <?php
                                echo form_label('HARGA','harga');
                                $data = array('readonly class'=>'form-control','name'=>'harga','id'=>'harga','type'=>'text');
                                echo form_input($data);
                                ?>
                            </div>
                        </div> 
                    </div>  
                </div>

                 <div id="kelebihan" class="">
                    <div class="row">
                         <div class="col-md-12">
                            <div class="form-group <?php echo form_error('tambahtanah') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('LUAS TAMBAHAN TANAH','tambahtanah');
                                $data = array('class'=>'form-control','name'=>'tambahtanah','id'=>'tambahtanah','type'=>'text','placeholder'=>'Masukkan Luas Penambahn Tanah','value'=>set_value('tambahtanah', $record->tambahtanah));
                                echo form_input($data);
                                echo form_error('tambahtanah') ? form_error('tambahtanah', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('permeter') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('HARGA PERMETER','permeter');
                                $data = array('class'=>'form-control','name'=>'permeter','id'=>'permeter','type'=>'text','placeholder'=>'Masukkan Harga Permeter','value'=>set_value('permeter', $record->permeter));
                                echo form_input($data);
                                echo form_error('pendapatan_pasangan') ? form_error('pendapatan_pasangan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('permeter') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('TOTAL HARGA TANAH','permeter');
                                $data = array('class'=>'form-control','name'=>'permeter','id'=>'permeter','type'=>'text','placeholder'=>'Masukkan Harga Permeter','value'=>set_value('permeter', $record->permeter));
                                echo form_input($data);
                                echo form_error('pendapatan_pasangan') ? form_error('pendapatan_pasangan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                      
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('tambahbangun') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('LUAS TAMBAHAN BANGUNAN','tambahbangun');
                                $data = array('class'=>'form-control','name'=>'tambahbangun','id'=>'tambahbangun','type'=>'text','placeholder'=>'Masukkan Tambah Bangun','value'=>set_value('tambahbangun', $record->tambahbangun));
                                echo form_input($data);
                                echo form_error('tambahbangun') ? form_error('tambahbangun', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('bangunpermeter') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('HARGA PERMETER','bangunpermeter');
                                $data = array('class'=>'form-control','name'=>'bangunpermeter','id'=>'bangunpermeter','type'=>'text','placeholder'=>'Masukkan Harga Permeter Bangunan','value'=>set_value('bangunpermeter', $record->bangunpermeter));
                                echo form_input($data);
                                echo form_error('bangunpermeter') ? form_error('bangunpermeter', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('pendapatan_pasangan') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('TOTAL HARGA BANGUNAN','pendapatan_pasangan');
                                $data = array('class'=>'form-control','name'=>'pendapatan_pasangan','id'=>'pendapatan_pasangan','type'=>'text','placeholder'=>'Masukkan Pendapatan Pasangan','value'=>set_value('pendapatan_pasangan', $record->pendapatan_pasangan));
                                echo form_input($data);
                                echo form_error('pendapatan_pasangan') ? form_error('pendapatan_pasangan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                    </div>  
                </div>


            </div> 
            </div>      
            <!-- /. row body -->
            <div class="box-footer">
				<button type="button" class="btn btn-sm btn-flat btn-info" onclick="saveout();"><i class="fa fa-save"></i> Simpan & Keluar</button>
				<button type="reset" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-refresh"></i> Reset</button>
				<button type="button" class="btn btn-sm btn-flat btn-danger" onclick="back();"><i class="fa fa-close"></i> Keluar</button>
			</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </form>
</div>


