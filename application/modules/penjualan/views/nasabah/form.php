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
    <form id="formID" role="form"  method="post">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
            <br>
            <div id="smartwizard">
            <ul>
                <li><a href="#perumahan">Langkah 1<br /><small>Data Unit Rumah</small></a></li>
                <li><a href="#data">Langkah 2<br /><small>Data Nasabah</small></a></li>
                <li><a href="#kontak">Langkah 3<br /><small>Data Kontak dan Alamat</small></a></li>
                <li><a href="#pasangannb">Langkah 4<br /><small>Data Pasangan</small></a></li>
            </ul>
            <br>
            <div>
                <div id="data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nama') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('NAMA NASABAH','nama');
                                $data = array('class'=>'form-control','name'=>'nama','id'=>'nama','placeholder'=>'Masukkan Nama Nasabah / Contoh : Saka','type'=>'text','value'=>set_value('nama', $record->nama));
                                echo form_input($data);
                                echo form_error('nama') ? form_error('nama', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('ktp') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('NOMOR KTP','ktp');
                                $data = array('class'=>'form-control','name'=>'ktp','id'=>'ktp','type'=>'text','placeholder'=>'Masukkan Nomor KTP','value'=>set_value('ktp', $record->ktp));
                                echo form_input($data);
                                echo form_error('ktp') ? form_error('ktp', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('tmlahir') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('TEMPAT LAHIR','tmlahir');
                            $data = array('class'=>'form-control','name'=>'tmlahir','id'=>'tmlahir','type'=>'text','placeholder'=>'Masukkan Tempat Lahir / Contoh : Banjarbaru','value'=>set_value('tmlahir', $record->tmlahir));
                            echo form_input($data);
                            echo form_error('tmlahir') ? form_error('tmlahir', '<p class="help-block">','</p>') : '';
                            ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('tglahir') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('TANGGAL LAHIR','tglahir');
                                $data = array('class'=>'form-control','name'=>'tglahir','id'=>'tglahir','type'=>'text','value'=>set_value('tglahir', $record->tglahir));
                                echo form_input($data);
                                echo form_error('tglahir') ? form_error('tglahir', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('sex') ? 'has-error' : null; ?>">
                                <?php 
                                echo form_label('JENIS KELAMIN','sex');
                                $selected = set_value('sex', $record->sex);
                                $status = array(''=>'Pilih Jenis Kelamin','1'=>'Laki-laki','2'=>'Perempuan');
                                echo form_dropdown('sex', $status, $selected, "class='form-control select2' name='sex' id='sex'");
                                echo form_error('sex') ? form_error('sex', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('kawin') ? 'has-error' : null; ?>">
                                <?php 
                                echo form_label('STATUS HUBUNGAN','kawin');
                                $selected = set_value('kawin', $record->kawin);
                                echo form_dropdown('kawin', $group_kw, $selected, "class='form-control select2' name='kawin' id='kawin'");
                                echo form_error('kawin') ? form_error('kawin', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('pendidikan') ? 'has-error' : null; ?>">
                                <?php 
                                echo form_label('PENDIDIKAN','pendidikan');
                                $selected = set_value('pendidikan', $record->pendidikan);
                                echo form_dropdown('pendidikan', $group_pd, $selected, "class='form-control select2' name='pendidikan' id='pendidikan'");
                                echo form_error('pendidikan') ? form_error('pendidikan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('agama') ? 'has-error' : null; ?>">
                                <?php 
                                echo form_label('AGAMA','agama');
                                $selected = set_value('agama', $record->agama);
                                echo form_dropdown('agama', $group_agama, $selected, "class='form-control select2' name='agama' id='agama'");
                                echo form_error('agama') ? form_error('agama', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
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

                <div id="kontak">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('alamat1') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('ALAMAT ASAL','alamat1');
                                $data = array('class'=>'form-control','name'=>'alamat1','id'=>'alamat1','type'=>'text','placeholder'=>'Masukkan Alamat Asal Lengkap','value'=>set_value('alamat1', $record->alamat1));
                                echo form_input($data);
                                echo form_error('alamat1') ? form_error('alamat1', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('alamat2') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('ALAMAT SEKARANG','alamat2');
                                $data = array('class'=>'form-control','name'=>'alamat2','id'=>'alamat2','type'=>'text','placeholder'=>'Masukkan Alamat Sekarang Lengkap ','value'=>set_value('alamat2', $record->alamat2));
                                echo form_input($data);
                                echo form_error('alamat2') ? form_error('alamat2', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('telpon1') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('NOMOR TELEPON 1','telpon1');
                                $data = array('class'=>'form-control','name'=>'telpon1','id'=>'telpon1','type'=>'text','placeholder'=>'Masukkan Nomor Telepon / Contoh : 0812xxxxxxx','value'=>set_value('telpon1', $record->telpon1));
                                echo form_input($data);
                                echo form_error('telpon1') ? form_error('telpon1', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('telpon2') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('NOMOR TELEPON 2','telpon2');
                                $data = array('class'=>'form-control','name'=>'telpon2','id'=>'telpon2','type'=>'text','placeholder'=>'Masukkan Nomor Telepon Lainnya (Jika ada) / Contoh : 0812xxxxxxx','value'=>set_value('telpon2', $record->telpon2));
                                echo form_input($data);
                                echo form_error('telpon2') ? form_error('telpon2', '<p class="help-block">','</p>') : '';
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
                                $data = array('class'=>'form-control','name'=>'email','id'=>'email','type'=>'text','placeholder'=>'Masukkan Email Anda / Contoh : saka@example.com','value'=>set_value('email', $record->email));
                                echo form_input($data);
                                echo form_error('email') ? form_error('email', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('pekerjaan') ? 'has-error' : null; ?>">
                                <?php 
                                echo form_label('PEKERJAAN','pekerjaan');
                                $selected = set_value('pekerjaan', $record->pekerjaan);
                                echo form_dropdown('agama', $group_pkj, $selected, "class='form-control select2' name='pekerjaan' id='pekerjaan'");
                                echo form_error('pekerjaan') ? form_error('pekerjaan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('instansi') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('INSTANSI','instansi');
                                $data = array('class'=>'form-control','name'=>'instansi','id'=>'instansi','type'=>'text','placeholder'=>'Masukkan Intansi','value'=>set_value('instansi', $record->instansi));
                                echo form_input($data);
                                echo form_error('instansi') ? form_error('instansi', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('alamat_kantor') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('ALAMAT KANTOR','alamat_kantor');
                                $data = array('class'=>'form-control','name'=>'alamat_kantor','id'=>'alamat_kantor','type'=>'text','placeholder'=>'Masukkan Alamat Lengkap Kantor / Contoh : 0812xxxxxxx','value'=>set_value('alamat_kantor', $record->alamat_kantor));
                                echo form_input($data);
                                echo form_error('alamat_kantor') ? form_error('alamat_kantor', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('telpon_kantor') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('TELEPON KANTOR','telpon_kantor');
                                $data = array('class'=>'form-control','name'=>'telpon_kantor','id'=>'telpon_kantor','type'=>'text','placeholder'=>'Masukkan Nomor Telepon Kantor / Contoh : 0812xxxxxxx','value'=>set_value('telpon_kantor', $record->telpon_kantor));
                                echo form_input($data);
                                echo form_error('telpon_kantor') ? form_error('telpon_kantor', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('status_pegawai') ? 'has-error' : null; ?>">
                                <?php 
                                echo form_label('STATUS PEGAWAI','status_pegawai');
                                $selected = set_value('status_pegawai', $record->status_pegawai);
                                $status = array('0'=>'Pilih Status','1'=>'Tetap','2'=>'Kontrak');
                                echo form_dropdown('status_pegawai', $status, $selected, "class='form-control select2' name='status_pegawai' id='status_pegawai'");
                                echo form_error('status_pegawai') ? form_error('status_pegawai', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('lama_bekerja') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('LAMA BEKERJA','lama_bekerja');
                                $data = array('class'=>'form-control','name'=>'lama_bekerja','id'=>'lama_bekerja','type'=>'text','placeholder'=>'Masukkan Lama Bekerja/ Contoh : 2','value'=>set_value('lama_bekerja', $record->lama_bekerja));
                                echo form_input($data);
                                echo form_error('lama_bekerja') ? form_error('lama_bekerja', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('pendapatan') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('PENDAPATAN','pendapatan');
                                $data = array('class'=>'form-control','name'=>'pendapatan','id'=>'pendapatan','type'=>'text','placeholder'=>'Masukkan Pendapatan / Contoh : 12.000.000,00','value'=>set_value('pendapatan', $record->pendapatan));
                                echo form_input($data);
                                echo form_error('pendapatan') ? form_error('pendapatan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('angsuran') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('ANGSURAN','angsuran');
                                $data = array('class'=>'form-control','name'=>'angsuran','id'=>'angsuran','type'=>'text','placeholder'=>'Masukkan Angsuran / Contoh : 1.000.000,00','value'=>set_value('angsuran', $record->angsuran));
                                echo form_input($data);
                                echo form_error('angsuran') ? form_error('angsuran', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('npwp') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('NPWP','npwp');
                                $data = array('class'=>'form-control','name'=>'npwp','id'=>'npwp','type'=>'text','placeholder'=>'Masukkan Nomor NPWP ','value'=>set_value('npwp', $record->npwp));
                                echo form_input($data);
                                echo form_error('npwp') ? form_error('npwp', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('join_income') ? 'has-error' : null; ?>">
                            <?php 
                            echo form_label('JOIN INCOME','join_income');
                                $selected = set_value('join_income', $record->join_income);
                                $status = array('0'=>'Tidak','1'=>'Ya');
                                echo form_dropdown('active', $status, $selected, "class='form-control select2' name='active' id='active'");
                                echo form_error('active') ? form_error('active', '<p class="help-block">','</p>') : '';
                                ?>
                        </div>
                        </div>
                    </div>
                </div>

                <div id="pasangannb">
                    <div class="row">
                         <div class="col-md-12">
                            <div class="form-group <?php echo form_error('pasangan') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('PASANGAN','pasangan');
                                $data = array('class'=>'form-control','name'=>'pasangan','id'=>'pasangan','type'=>'text','placeholder'=>'Masukkan Nama Pasangan (Jika ada) ','value'=>set_value('pasangan', $record->pasangan));
                                echo form_input($data);
                                echo form_error('pasangan') ? form_error('pasangan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('telpon_pasangan') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('TELEPON PASANGAN','telpon_pasangan');
                                $data = array('class'=>'form-control','name'=>'telpon_pasangan','id'=>'telpon_pasangan','type'=>'text','placeholder'=>'Masukkan Nomor Telepon Pasangan','value'=>set_value('telpon_pasangan', $record->telpon_pasangan));
                                echo form_input($data);
                                echo form_error('telpon_pasangan') ? form_error('telpon_pasangan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('pekerjaan_pasangan') ? 'has-error' : null; ?>">
                                <?php 
                                echo form_label('PEKERJAAN PASANGAN','pekerjaan_pasangan');
                                $selected = set_value('pekerjaan_pasangan', $record->pekerjaan_pasangan);
                                echo form_dropdown('agama', $group_pkj, $selected, "class='form-control select2' name='pekerjaan_pasangan' id='pekerjaan_pasangan'");
                                echo form_error('pekerjaan_pasangan') ? form_error('pekerjaan_pasangan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('instansi_pasangan') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('INSTANSI PASANGAN','instansi_pasangan');
                                $data = array('class'=>'form-control','name'=>'instansi_pasangan','id'=>'instansi_pasangan','type'=>'text','placeholder'=>'Masukkan instansi Pasangan','value'=>set_value('instansi_pasangan', $record->instansi_pasangan));
                                echo form_input($data);
                                echo form_error('instansi_pasangan') ? form_error('instansi_pasangan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('alamat_kantor_pasangan') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('ALAMAT KANTOR PASANGAN','alamat_kantor_pasangan');
                                $data = array('class'=>'form-control','name'=>'alamat_kantor_pasangan','id'=>'alamat_kantor_pasangan','type'=>'text','placeholder'=>'Masukkan Alamat Intansi Pasangan','value'=>set_value('alamat_kantor_pasangan', $record->alamat_kantor_pasangan));
                                echo form_input($data);
                                echo form_error('alamat_kantor_pasangan') ? form_error('alamat_kantor_pasangan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('telpon_kantor_pasangan') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('TELEPON KANTOR PASANGAN','telpon_kantor_pasangan');
                                $data = array('class'=>'form-control','name'=>'telpon_kantor_pasangan','id'=>'telpon_kantor_pasangan','type'=>'text','placeholder'=>'Masukkan Nomor Telepon Kantor Pasangan','value'=>set_value('telpon_kantor_pasangan', $record->telpon_kantor_pasangan));
                                echo form_input($data);
                                echo form_error('telpon_kantor_pasangan') ? form_error('telpon_kantor_pasangan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('status_pegawai_pasangan') ? 'has-error' : null; ?>">
                                <?php 
                                echo form_label('STATUS PEGAWAI PASANGAN','status_pegawai_pasangan');
                                $selected = set_value('status_pegawai_pasangan', $record->status_pegawai_pasangan);
                                $status = array('0'=>'Pilih Status Pegawai','1'=>'Tetap','2'=>'Kontrak');
                                echo form_dropdown('status_pegawai_pasangan', $status, $selected, "class='form-control select2' name='status_pegawai_pasangan' id='status_pegawai_pasangan'");
                                echo form_error('status_pegawai_pasangan') ? form_error('status_pegawai_pasangan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('lama_bekerja_pasangan') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('LAMA BEKERJA PASANGAN','lama_bekerja_pasangan');
                                $data = array('class'=>'form-control','name'=>'lama_bekerja_pasangan','id'=>'lama_bekerja_pasangan','type'=>'text','placeholder'=>'Masukkan Lama Bekerja Pasangan','value'=>set_value('lama_bekerja_pasangan', $record->lama_bekerja_pasangan));
                                echo form_input($data);
                                echo form_error('lama_bekerja_pasangan') ? form_error('lama_bekerja_pasangan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('pendapatan_pasangan') ? 'has-error' : null; ?>">
                                <?php
                                echo form_label('PENDAPATAN PASANGAN','pendapatan_pasangan');
                                $data = array('class'=>'form-control','name'=>'pendapatan_pasangan','id'=>'pendapatan_pasangan','type'=>'text','placeholder'=>'Masukkan Pendapatan Pasangan','value'=>set_value('pendapatan_pasangan', $record->pekerjaan_pasangan));
                                echo form_input($data);
                                echo form_error('pendapatan_pasangan') ? form_error('pendapatan_pasangan', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="perumahan" class="">
                    <div class="row">
                         <div class="col-md-12">
                            <div class="form-group <?php echo form_error('perumahan_id') ? 'has-error' : null; ?>">
                                <?php 
                                echo form_label('PERUMAHAN','perumahan_id');
                                $selected = set_value('perumahan_id', $record->perumahan_id);
                                echo form_dropdown('perumahan_id', $group, $selected, "class='form-control select2' name='perumahan_id' id='perumahan_id' ");
                                echo form_error('perumahan_id') ? form_error('perumahan_id', '<p class="help-block">','</p>') : '';
                                ?>
                            </div>
                            <div class="form-group <?php echo form_error('kavling_id') ? 'has-error' : null; ?>">
                                <?php 

                                echo form_label('NOMOR KAVLING','kavling_id');
                                $selected = set_value('kavling_id', $record->kavling_id);
                                echo form_dropdown('kavling_id', $group_kav, $selected, "class='form-control select2' name='kavling_id' id='kavling_id' ");
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

            </div>
        </div>
            <div class="box-footer">
                    <button type="button" class="btn btn-sm btn-flat btn-info" onclick="saveoutupload();"><i class="fa fa-save"></i> Simpan & Keluar</button>
                    <button type="reset" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-refresh"></i> Reset</button>
                    <button type="button" class="btn btn-sm btn-flat btn-danger" onclick="back();"><i class="fa fa-close"></i> Keluar</button>
            </div>
        </div>
        <!-- /.row -->
        
    </div>
    </form>
    <!-- /.container-fluid -->
    
</div>
</div>

