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
    <div class="container-fluid">
        <div class="row">
            <div class="box-body">
                <button class="btn btn-sm btn-flat btn-default" data-toggle="tooltip" title="Reload Data" data-placement="right" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button>
                <span id="key" style="display: none;"><?= $this->security->get_csrf_hash(); ?></span>
                <table id="tableID" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>NAMA</th>
                            <th>NO TELEPON</th>
                            <th>ALAMAT</th>
                            <th>KAVLING</th>
                            <th>TIPE</th>
                            <th>PERUMAHAN</th>
                            <th>PENGAJUAN</th>
                            <th>TINJAUAN ULANG</th>
                            <th>PEMBATALAN</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>           
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Tinjauan</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" value="" name="id" id="id" />
                    <input type="hidden" value="" name="kavling_id" id="kavling_id" /> 
                    <input type="hidden" value="" name="pesanunit_id" id="pesanunit_id" />  
                    <div class="form-body">
                       <div class="form-group">
                            <label class="control-label col-md-3">TINJAUAN ULANG</label>
                            <div class="col-md-9">
                                <textarea name="catatan" placeholder="Tinjauan Kemabali" class="form-control" type="text"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                       
                    </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal_form2" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Pembatalan</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form2" class="form-horizontal">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" value="" name="id" id="id" />
                    <input type="hidden" value="" name="kavling_id" id="kavling_id" /> 
                    <input type="hidden" value="" name="pesanunit_id" id="pesanunit_id" />
                    <div class="form-body">
                       <div class="form-group">
                            <label class="control-label col-md-3">ALASAN PEMBATALAN</label>
                            <div class="col-md-9">
                                <textarea name="keterangan" placeholder="Alasan Pembatalan" class="form-control" type="text"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                       
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_pembatalan()" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>