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
                        <div class="form-group <?php echo form_error('kode') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('KODE BANK','kode');
                            $data = array('class'=>'form-control','name'=>'kode','id'=>'kode','placeholder'=>'Masukkan Kode Bank','type'=>'text','value'=>set_value('kode', $record->kode));
                            echo form_input($data);
                            echo form_error('kode') ? form_error('kode', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('bank') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('NAMA BANK','bank');
                            $data = array('class'=>'form-control','name'=>'bank','id'=>'bank','placeholder'=>'Masukkan Nama Bank','type'=>'text','value'=>set_value('bank', $record->bank));
                            echo form_input($data);
                            echo form_error('bank') ? form_error('bank', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('rekening') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('NOMER REKENING','rekening');
                            $data = array('class'=>'form-control','name'=>'rekening','id'=>'rekening','placeholder'=>'Masukkan Rekening Bank','type'=>'text','value'=>set_value('rekening', $record->rekening));
                            echo form_input($data);
                            echo form_error('rekening') ? form_error('rekening', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('nama') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('ATAS NAMA','nama');
                            $data = array('class'=>'form-control','name'=>'nama','id'=>'nama','placeholder'=>'Masukkan Atas Nama Rekening Bank','type'=>'text','value'=>set_value('nama', $record->nama));
                            echo form_input($data);
                            echo form_error('nama') ? form_error('nama', '<p class="help-block">','</p>') : '';
                            ?>
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
<!-- /#page-wrapper -->