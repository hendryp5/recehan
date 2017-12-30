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
                        <div class="form-group <?php echo form_error('perumahan') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('PERUMAHAN','perumahan');
                            $data = array('class'=>'form-control','name'=>'perumahan','id'=>'perumahan','type'=>'text','value'=>set_value('perumahan', $record->perumahan));
                            echo form_input($data);
                            echo form_error('perumahan') ? form_error('perumahan', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('lokasi') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('LOKASI','lokasi');
                            $data = array('class'=>'form-control','name'=>'lokasi','id'=>'lokasi','type'=>'text','value'=>set_value('lokasi', $record->lokasi));
                            echo form_input($data);
                            echo form_error('lokasi') ? form_error('lokasi', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('gambar') ? 'has-error' : null; ?>">
                            <?php
                            $this->load->view('upload_view');
                            // echo form_label('GAMBAR','gambar');
                            // echo ' <div class="input-group input-group">';
                            // $data = array('class'=>'form-control','name'=>'gambar','id'=>'gambar','type'=>'text','value'=>set_value('gambar', $record->gambar));
                            // echo form_input($data);
                            // echo '<span class="input-group-btn"><a data-toggle="modal"  href="javascript;" data-target="#modal-gambar" class="btn btn-info btn-flat" type="button">Pilih Gambar</a></span>';
                            // echo form_error('gambar') ? form_error('gambar', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                </div>        
            </div>
            <!-- /. row body -->
            <div class="box-footer">
				<button type="button" class="btn btn-sm btn-flat btn-success" onclick="save()"><i class="fa fa-save"></i> Simpan</button>
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
<!-- /#page-wrapper -->

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