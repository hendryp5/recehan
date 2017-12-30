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
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $record->logo; ?>" alt="User profile picture">


              <div class="col-md-12">
                        <div class="form-group <?php echo form_error('perusahaan') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('NAMA PERUSAHAAN','perusahaan');
                            $data = array('disabled class'=>'form-control','name'=>'perusahaan','id'=>'perusahaan','type'=>'text','value'=>set_value('perusahaan', $record->perusahaan));
                            echo form_input($data);
                             ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('alamat') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('ALAMAT LENGKAP','alamat');
                            $data = array('disabled class'=>'form-control','name'=>'alamat','id'=>'alamat','type'=>'text','value'=>set_value('alamat', $record->alamat));
                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('telpon') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('TELPON','telpon');
                            $data = array('disabled class'=>'form-control','name'=>'telpon','id'=>'telpon','type'=>'text','value'=>set_value('telpon', $record->telpon));
                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('fax') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('FAX','fax');
                            $data = array('disabled class'=>'form-control','name'=>'fax','id'=>'fax','type'=>'text','value'=>set_value('fax', $record->fax));
                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('email') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('EMAIL','email');
                            $data = array('disabled class'=>'form-control','name'=>'email','id'=>'telpon','type'=>'email','value'=>set_value('email', $record->email));
                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group <?php echo form_error('website') ? 'has-error' : null; ?>">
                            <?php
                            echo form_label('WEBSITE','website');
                            $data = array('disabled class'=>'form-control','name'=>'website','id'=>'website','type'=>'text','value'=>set_value('website', $record->website));
                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group <?php echo form_error('logo') ? 'has-error' : null; ?>">
                            <?php
                            echo ' <div class="input-group input-group">';
                            ?>
                        </div>
                    </div>
              <a class="btn btn-flat btn-warning" onclick="edit_data();" href="<?php echo site_url('master/perusahaan/updated/'.+$record->id) ?>"  title="Edit">EDIT<i class="glyphicon glyphicon-pencil"></i></a>
            </div>
            <!-- /.box-body -->
          </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->