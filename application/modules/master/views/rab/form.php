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
						<div class="form-group <?php echo form_error('perumahan_id') ? 'has-error' : null; ?>">
							<?php 
							echo form_label('KATEGORI','perumahan_id');
							$selected = set_value('perumahan_id', $record->perumahan_id);
							echo form_dropdown('perumahan_id', $perumahan, $selected, "class='form-control select2' style='width: 100%;' name='perumahan_id' id='perumahan_id'");
							echo form_error('perumahan_id') ? form_error('perumahan_id', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('kategori_id') ? 'has-error' : null; ?>">
							<?php 
							echo form_label('KATEGORI','kategori_id');
							$selected = set_value('kategori_id', $record->kategori_id);
							echo form_dropdown('kategori_id', $group, $selected, "class='form-control select2' style='width: 100%;' name='kategori_id' id='kategori_id'");
							echo form_error('kategori_id') ? form_error('kategori_id', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('uraian') ? 'has-error' : null; ?>">
							<?php
							echo form_label('URAIAN','uraian');
							$data = array('class'=>'form-control','name'=>'uraian','id'=>'uraian','type'=>'text','value'=>set_value('uraian', $record->uraian));
							echo form_input($data);
							echo form_error('uraian') ? form_error('uraian', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('biaya') ? 'has-error' : null; ?>">
							<?php
							echo form_label('BIAYA','kategori');
							$data = array('class'=>'form-control','name'=>'biaya','id'=>'biaya','type'=>'text','value'=>set_value('biaya', $record->biaya));
							echo form_input($data);
							echo form_error('biaya') ? form_error('biaya', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
			
					
					
					
				</div>
			</div>
			<!-- ./box-body -->
			<div class="box-footer">
				<button type="button" class="btn btn-sm btn-flat btn-success" onclick="save()"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" class="btn btn-sm btn-flat btn-info" onclick="saveout();"><i class="fa fa-save"></i> Simpan & Keluar</button>
				<button type="reset" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-refresh"></i> Reset</button>
				<button type="button" class="btn btn-sm btn-flat btn-danger" onclick="back();"><i class="fa fa-close"></i> Keluar</button>
			</div>
			</form>
		</div>
	</div>
</div>