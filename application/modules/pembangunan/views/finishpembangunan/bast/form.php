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
	<div class="container-fluid">
        <div class="row">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group <?php echo form_error('perumahan_id') ? 'has-error' : null; ?>">
                        <?php 
                        echo form_label('LOKASI PERUMAHAN','perumahan_id');
                        $selected = set_value('perumahan_id', $record->perumahan_id);
                        echo form_dropdown('perumahan_id', $group, $selected, "class='form-control select2' name='perumahan_id' id='perumahan_id'");
                        echo form_error('perumahan_id') ? form_error('perumahan_id', '<p class="help-block">','</p>') : '';
                        ?>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('kode') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('KODE KAVLING','kode');
                            $data = array('class'=>'form-control','name'=>'kode','id'=>'kode','type'=>'text','placeholder'=>'Masukkan Kode Kavling / Contoh : 001','value'=>set_value('kode', $record->kode));
                            echo form_input($data);
                            echo form_error('kode') ? form_error('kode', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('kavling') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('NOMOR KAVLING','kavling');
                            $data = array('class'=>'form-control','name'=>'kavling','id'=>'kavling','type'=>'text','placeholder'=>'Masukkan Blok dan NO Kavling / Contoh : A01','value'=>set_value('kavling', $record->kavling));
                            echo form_input($data);
                            echo form_error('kavling') ? form_error('kavling', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('type') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('TIPE RUMAH','type');
                            $data = array('class'=>'form-control','name'=>'type','id'=>'type','type'=>'text','placeholder'=>'Masukkan Tipe Rumah / Contoh : 32/64','value'=>set_value('type', $record->type));
                            echo form_input($data);
                            echo form_error('type') ? form_error('type', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('tanah') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('LUAS TANAH','tanah');
                            $data = array('class'=>'form-control','name'=>'tanah','id'=>'tanah','type'=>'number','placeholder'=>'Masukkan Luas Tanah/ Contoh : 100/120','value'=>set_value('tanah', $record->tanah));
                            echo form_input($data);
                            echo form_error('tanah') ? form_error('tanah', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('bangunan') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('LUAS BANGUNAN','bangunan');
                            $data = array('class'=>'form-control','name'=>'bangunan','id'=>'bangunan','type'=>'number','placeholder'=>'Masukkan Luas Bangunan/ Contoh : 100/200','value'=>set_value('bangunan', $record->bangunan));
                            echo form_input($data);
                            echo form_error('bangunan') ? form_error('bangunan', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('harga') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('HARGA','harga');
                            $data = array('class'=>'form-control','name'=>'harga','id'=>'price','type'=>'text','placeholder'=>'Masukkan Harga Kavling/ Contoh : 1.000.000','value'=>set_value('harga', $record->harga));
                            echo form_input($data);
                            echo form_error('harga') ? form_error('harga', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('status') ? 'has-error' : null; ?>">
                            <?php 
                            echo form_label('STATUS PENJUALAN','status');
                            $selected = set_value('status', $record->status);
                            $status1 = array('0'=>'Pilih Status Kavling','1'=>'Tersedia','2'=>'Terjual','3'=>'Terpesan');
                            echo form_dropdown('status', $status1, $selected, "class='form-control select2' name='status' id='status'");
                            echo form_error('status') ? form_error('status', '<p class="help-block">','</p>') : '';
                            ?>
                        </div>
                    </div>
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
                            echo form_dropdown('status_sertifikat', $status, $selected, "class='form-control select2' name='status_sertifikat' id='status_sertifikat'");
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
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('gambar') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('GAMBAR','gambar');
                            echo ' <div class="input-group input-group">';
                            $data = array('class'=>'form-control','name'=>'gambar','id'=>'gambar','type'=>'text','value'=>set_value('gambar', $record->gambar));
                            echo form_input($data);
                            echo '<span class="input-group-btn"><a data-toggle="modal"  href="javascript;" data-target="#modal-gambar" class="btn btn-info btn-flat" type="button">Pilih Gambar</a></span>';
                            echo form_error('gambar') ? form_error('gambar', '<p class="help-block">','</p>') : '';
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

