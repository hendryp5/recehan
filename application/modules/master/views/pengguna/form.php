<div class="row">
	<div class="col-md-12">
		<div id="message"></div>
		<div class="box box-success box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?= isset($head) ? $head : ''; ?></h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<form id="formID" role="form" action="" method="post">
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
			<!-- box-body -->
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('nama') ? 'has-error' : null; ?>">
							<?php
							echo form_label('NAMA LENGKAP *','nama');
							$data = array('class'=>'form-control','name'=>'nama','id'=>'nama','type'=>'text','placeholder'=>'Masukkan Nama Lengkap','value'=>set_value('nama', $record->nama));
							echo form_input($data);
							echo form_error('nama') ? form_error('nama', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('tmlahir') ? 'has-error' : null; ?>">
							<?php
							echo form_label('TEMPAT LAHIR','tmlahir');
							$data = array('class'=>'form-control','name'=>'tmlahir','id'=>'tmlahir','type'=>'text','placeholder'=>'Masukkan Tempat Lahir','value'=>set_value('tmlahir', $record->tmlahir));
							echo form_input($data);
							echo form_error('tmlahir') ? form_error('tmlahir', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('tglahir') ? 'has-error' : null; ?>">
							<?php
							echo form_label('TANGGAL LAHIR','tglahir');
							$data = array('class'=>'form-control tanggal','name'=>'tglahir','id'=>'tglahir','type'=>'text','placeholder'=>'Masukkan Tanggal Lahir','value'=>set_value('tglahir', $record->tglahir));
							echo form_input($data);
							echo form_error('tglahir') ? form_error('tglahir', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('sex') ? 'has-error' : null; ?>">
							<?php 
							echo form_label('JENIS KELAMIN *','sex');
							$selected = set_value('sex', $record->sex);
							$status = array(''=>'Pilih Jenis Kelamin','1'=>'LAKI-LAKI','2'=>'PEREMPUAN');
							echo form_dropdown('sex', $status, $selected, "class='form-control select2' name='sex' id='sex'");
							echo form_error('sex') ? form_error('jenis_kelamin', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('agama') ? 'has-error' : null; ?>">
							<?php 
							echo form_label('AGAMA / KEPERCAYAAN *','agama');
							$selected = set_value('agama', $record->agama);
							echo form_dropdown('agama', $agama, $selected, "class='form-control select2' name='agama' id='agama'");
							echo form_error('agama') ? form_error('agama', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('pendidikan') ? 'has-error' : null; ?>">
							<?php 
							echo form_label('PENDIDIKAN TERAKHIR','pendidikan');
							$selected = set_value('pendidikan', $record->pendidikan);
							echo form_dropdown('pendidikan', $pendidikan, $selected, "class='form-control select2' name='pendidikan' id='pendidikan'");
							echo form_error('pendidikan') ? form_error('pendidikan', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('alamat') ? 'has-error' : null; ?>">
							<?php
							echo form_label('ALAMAT *','alamat');
							$data = array('class'=>'form-control','name'=>'alamat','id'=>'alamat','type'=>'alamat','placeholder'=>'Masukkan Alamat Tinggal/Domisili','value'=>set_value('alamat', $record->alamat));
							echo form_input($data);
							echo form_error('alamat') ? form_error('alamat', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('telpon') ? 'has-error' : null; ?>">
							<?php
							echo form_label('TELPON *','telpon');
							$data = array('class'=>'form-control','name'=>'telpon','id'=>'telpon','type'=>'text','placeholder'=>'Masukkan Nomor Telepon','value'=>set_value('telpon', $record->telpon));
							echo form_input($data);
							echo form_error('telpon') ? form_error('telpon', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('email') ? 'has-error' : null; ?>">
							<?php
							echo form_label('EMAIL *','email');
							$data = array('class'=>'form-control','name'=>'email','id'=>'email','type'=>'email','placeholder'=>'Masukkan Email yang Valid','value'=>set_value('email', $record->email));
							echo form_input($data);
							echo form_error('email') ? form_error('email', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('password') ? 'has-error' : null; ?>">
							<?php
							echo form_label('PASSWORD *','password');
							$data = array('class'=>'form-control','name'=>'password','id'=>'password','type'=>'password','placeholder'=>'Masukkan Password','value'=>set_value('password', $record->password));
							echo form_input($data);
							echo form_error('password') ? form_error('password', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('repassword') ? 'has-error' : null; ?>">
							<?php
							echo form_label('ULANGI PASSWORD *','repassword');
							$data = array('class'=>'form-control','name'=>'repassword','id'=>'repassword','type'=>'password','placeholder'=>'Masukkan Password yang sama kembali','value'=>set_value('repassword', $record->repassword));
							echo form_input($data);
							echo form_error('repassword') ? form_error('repassword', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('level') ? 'has-error' : null; ?>">
							<?php 
							echo form_label('TINGKAT PENGGUNA *','level');
							$selected = set_value('level', $record->level);
							echo form_dropdown('level', $level, $selected, "class='form-control select2' name='level' id='level'");
							echo form_error('level') ? form_error('level', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
					<div class="form-group <?php echo form_error('perumahan[]') ? 'has-error' : null; ?>">
							<?php
							echo form_label('LOKASI PERUMAHAN *','perumahan');
							$selected = set_value('perumahan[]');
							echo form_dropdown('perumahan[]', $perumahan, $selected, "class='form-control select2' id='perumahan' multiple");
							echo form_error('perumahan[]') ? form_error('perumahan[]', '<p class="help-block">','</p>') : '';
							?>
						</div>
                    </div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('active') ? 'has-error' : null; ?>">
							<?php 
							echo form_label('STATUS *','active');
							$selected = set_value('level', $record->active);
							$status = array('0'=>'TIDAK AKTIF','1'=>'AKTIF');
							echo form_dropdown('active', $status, $selected, "class='form-control select2' name='active' id='active'");
							echo form_error('active') ? form_error('active', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('avatar') ? 'has-error' : null; ?>">
							<?php
							echo form_label('GAMBAR PROFIL','avatar');
							$data = array('class'=>'form-control','name'=>'avatar','id'=>'avatar','type'=>'file', 'accept'=>'image/*','placeholder'=>'Masukkan Password yang sama kembali','value'=>set_value('avatar', $record->avatar));
							echo form_input($data);
							echo form_error('avatar') ? form_error('avatar', '<p class="help-block">','</p>') : '';
							?>
							<input type="hidden" name="gambar" id="url-gambar" value="<?= set_value('gambar', $record->avatar); ?>" />
						</div>
					</div>

					<div class="col-md-12">
						<div id="upload-avatar" style="width:210px"></div>
					</div>
					
				</div>
			</div>
			<!-- ./box-body -->
			<div class="box-footer">
				<button type="button" class="btn btn-sm btn-flat btn-info" onclick="saveoutupload();"><i class="fa fa-save"></i> Simpan & Keluar</button>
				<button type="reset" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-refresh"></i> Reset</button>
				<button type="button" class="btn btn-sm btn-flat btn-danger" onclick="back();"><i class="fa fa-close"></i> Keluar</button>
			</div>
			</form>
		</div>
	</div>
</div>
<style type="text/css">
@media screen and (min-width: 460px) {
  #modal-gambar .modal-dialog  {width:940px;}
  #modal-tautan .modal-dialog  {width:940px;}
}
</style>
<div class="file-modal">
  <div class="modal fade" id="modal-gambar">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Pilih Gambar Perumahan</h4>
        </div>
        <div class="modal-body">
                    <div class="frame">
          <iframe height="500" src="<?php echo base_url('filemanager/dialog.php?type=1&field_id=gambar&relative_url=3'); ?>" frameborder="0" style="overflow: scroll !important; overflow-x: hidden; overflow-y: scroll auto; min-width: 460px; width: 910px; "></iframe>
                    </div>
                </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div><!-- /.example-modal -->