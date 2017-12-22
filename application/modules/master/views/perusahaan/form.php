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
	<div class="container-fluid">
        <div class="row">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('perusahaan') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('NAMA PERUSAHAAN','perusahaan');
                            $data = array('class'=>'form-control','name'=>'perusahaan','id'=>'perusahaan','type'=>'text','value'=>set_value('perusahaan', $record->perusahaan));
                            echo form_input($data);
                            echo form_error('perusahaan') ? form_error('perusahaan', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('alamat') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('ALAMAT LENGKAP','alamat');
                            $data = array('class'=>'form-control','name'=>'alamat','id'=>'alamat','type'=>'text','value'=>set_value('alamat', $record->alamat));
                            echo form_input($data);
                            echo form_error('alamat') ? form_error('alamat', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('telpon') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('TELPON','telpon');
                            $data = array('class'=>'form-control','name'=>'telpon','id'=>'telpon','type'=>'text','value'=>set_value('telpon', $record->telpon));
                            echo form_input($data);
                            echo form_error('telpon') ? form_error('telpon', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('fax') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('FAX','fax');
                            $data = array('class'=>'form-control','name'=>'fax','id'=>'fax','type'=>'text','value'=>set_value('fax', $record->fax));
                            echo form_input($data);
                            echo form_error('fax') ? form_error('fax', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('email') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('EMAIL','email');
                            $data = array('class'=>'form-control','name'=>'email','id'=>'telpon','type'=>'email','value'=>set_value('email', $record->email));
                            echo form_input($data);
                            echo form_error('email') ? form_error('email', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('website') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('WEBSITE','website');
                            $data = array('class'=>'form-control','name'=>'website','id'=>'website','type'=>'text','value'=>set_value('website', $record->website));
                            echo form_input($data);
                            echo form_error('website') ? form_error('website', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('logo') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('LOGO','logo');
                            echo ' <div class="input-group input-group">';
                            $data = array('class'=>'form-control','name'=>'logo','id'=>'logo','type'=>'text','value'=>set_value('logo', $record->logo));
                            echo form_input($data);
                            echo '<span class="input-group-btn"><a data-toggle="modal"  href="javascript;" data-target="#modal-logo" class="btn btn-info btn-flat" type="button">Pilih Logo</a></span>';
                            echo form_error('logo') ? form_error('logo', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                </div>        
            </div>
            <!-- /. row body -->
            <div class="box-footer">
				<button type="button" class="btn btn-sm btn-flat btn-success" onclick="save()"><i class="fa fa-save"></i> Simpan</button>
				<button type="reset" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-refresh"></i> Reset</button>
			</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </form>
</div>
<!-- /#page-wrapper -->
<style type="text/css">
@media screen and (min-width: 460px) {
  #modal-gambar .modal-dialog  {width:940px;}
  #modal-tautan .modal-dialog  {width:940px;}
}
</style>
<div class="file-modal">
  <div class="modal fade" id="modal-logo">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Pilih Logo Perusahaan</h4>
        </div>
        <div class="modal-body">
					<div class="frame">
          <iframe height="500" src="<?php echo base_url('filemanager/dialog.php?type=1&field_id=logo&relative_url=3'); ?>" frameborder="0" style="overflow: scroll !important; overflow-x: hidden; overflow-y: scroll auto; min-width: 460px; width: 910px; "></iframe>
					</div>
				</div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div><!-- /.example-modal -->