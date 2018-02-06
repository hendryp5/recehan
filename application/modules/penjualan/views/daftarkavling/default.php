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
                <a class="btn btn-sm btn-flat btn-success" onclick="add_data();" href="<?= site_url('penjualan/daftarkavling/created'); ?>"><i class="glyphicon glyphicon-plus"></i> Tambah Kavling</a>
                <button class="btn btn-sm btn-flat btn-default" data-toggle="tooltip" title="Reload Data" data-placement="right" id="btn-reset1""><i class="glyphicon glyphicon-refresh"></i></button>
                 <form id="form-filter" class="form-horizontal">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                <br>
                <div class="col-md-12">
                    <div class="form-group <?php echo form_error('perumahan_id') ? 'has-error' : null; ?>">
                        <?php 
                        echo form_label('PERUMAHAN','type');
                        $selected = set_value('type', $new->perumahan_id);
                        echo form_dropdown('type', $group2, $selected, "class='form-control select2' id='perumahan_id' name='perumahan_id' style='width: 100%;'");
                        ?>
                    </div> 
                </div>
                 <div class="col-md-12">
                    <div class="form-group <?php echo form_error('type') ? 'has-error' : null; ?>">
                        <?php 
                        echo form_label('TIPE UNIT','type');
                        $selected = set_value('type', $new->type);
                        echo form_dropdown('type', $group1, $selected, "class='form-control select2' id='type' name='type' style='width: 100%;'");
                        ?>
                    </div> 
                </div>
                <div class="col-md-12">
                        <div class="form-group <?php echo form_error('status') ? 'has-error' : null; ?>">
                            <?php 
                            echo form_label('STATUS PENJUALAN','status');
                            $selected = set_value('status', $new->status);
                            $status1 = array('0'=>'Pilih Status Kavling','1'=>'Tersedia','2'=>'Terpesan','3'=>'Terjual');
                            echo form_dropdown('status', $status1, $selected, "class='form-control select2' name='status' id='status' style='width: 100%;'");
                            ?>
                        </div>
                    </div>
                     <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                    <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                </form>
                
                <span id="key" style="display: none;"><?= $this->security->get_csrf_hash(); ?></span>
                <table id="tableID2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="100px">NO KAVLING</th>
                            <th>TIPE</th>
                            <th>LT</th>
                            <th>LB</th>
                            <th>HARGA</th>
                            <th width="50px">STATUS PENJUALAN</th>
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
</div>



<!-- /#page-wrapper -->

<!-- Page Content -->


 <div class="row">
         <?php foreach($info as $row){ ?>
         <div class="col-md-4">
          <div class="box box-solid  box-success">
            <div class="box-header with-border">
               <h4 class="box-title"><?php echo perumahan($row->perumahan_id); ?> - <?php echo $row->type; ?>  </h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl>
                <dt>TOTAL UNIT</dt>
                <dd> <?php echo total_unit($row->type,$row->perumahan_id); ?>  UNIT</dd>
                <dt>TERSEDIA</dt>
                <dd><?php echo total_tersedia($row->type,$row->perumahan_id); ?>  UNIT</dd>
                <dt>TERJUAL</dt>
                <dd><?php echo total_terjual($row->type,$row->perumahan_id); ?>  UNIT</dd>
                <dt>TERPESAN</dt>
                <dd><?php echo total_terpesan($row->type,$row->perumahan_id); ?>  UNIT</dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <?php } ?>

        <!-- /.col -->
        
        <!-- /.col -->
       
        <!-- /.col -->
      </div>