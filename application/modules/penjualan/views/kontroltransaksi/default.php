<div class="box box-success box-solid">
<div class="box-header with-border">
    <h3 class="box-title"><?= $judul; ?></h3>
</div>
</div>
<div class="box box-success box-solid">
<div class="box-header with-border">
    <h3 class="box-title"><?= $head; ?></h3>
    <div class="box-tools pull-right">
    <button class="btn btn-sm btn-flat btn-default" data-toggle="tooltip" title="Reload Data" data-placement="right" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button>
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
                 <span id="key" style="display: none;"><?= $this->security->get_csrf_hash(); ?></span>
                <table id="tableID1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>NO KAVLING</th>
                            <th>TIPE UNIT</th>
                            <th>NASABAH</th>
                            <th>TANGGAL PAJB</th>
                            <th>TANGGAL PROSES BANK</th>
                            <th>TANGGAL ACC KPR</th>
                            <th>TANGGAL PROSES BANK</th>
                            <th>TANGGAL KBR</th>
                            <th>TANGGAL BAST</th>
                            <th>TANGGAL AKAD KPR</th>

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

<div class="box box-success box-solid">
<div class="box-header with-border">
    <h3 class="box-title"><?= $head2; ?></h3>
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
                <span id="key" style="display: none;"><?= $this->security->get_csrf_hash(); ?></span>
                <table id="tableID2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                             <th>NO KAVLING</th>
                            <th>TIPE UNIT</th>
                            <th>NASABAH</th>
                            <th>TANGGAL PAJB</th>
                            <th>TANGGAL KBR</th>
                            <th>TANGGAL BAST</th>
                            <th>TANGGAL AKAD KPR</th>
                            
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

<div class="box box-success box-solid">
<div class="box-header with-border">
    <h3 class="box-title"><?= $head3; ?></h3>
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
                <span id="key" style="display: none;"><?= $this->security->get_csrf_hash(); ?></span>
                <table id="tableID3" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>NO KAVLING</th>
                            <th>TIPE UNIT</th>
                            <th>NASABAH</th>
                            <th>TANGGAL PAJB</th>
                            <th>TANGGAL KBR</th>
                            <th>TANGGAL BAST</th>
                            <th>TANGGAL AKAD KPR</th>
                           
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