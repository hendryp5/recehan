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
                <a class="btn btn-sm btn-flat btn-success" onclick="add_data();" href="<?= site_url('penjualan/nasabah/created'); ?>"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
                <button class="btn btn-sm btn-flat btn-danger" onclick="deleted_all();"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                <button class="btn btn-sm btn-flat btn-default" data-toggle="tooltip" title="Reload Data" data-placement="right" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button>
                <span id="key" style="display: none;"><?= $this->security->get_csrf_hash(); ?></span>
                <table id="tableID" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5px"><input type="checkbox" id="check-all"></th>
                            <th>KTP</th>
                            <th>NAMA</th>
                            <th>EMAIL</th>
                            <th>PENDIDIKAN</th>
                            <th>INSTANSI</th>
                            <th>PENDAPATAN</th>
                            <th>ANGSURAN</th>
                            <th>TEMPAT LAHIR</th>
                            <th>TANGGAL LAHIR</th>
                            <th>JENIS KELAMIN</th>
                            <th>PEKERJAAN</th>
                            <th>ALAMAT KANTOR</th>
                            <th>TELPON KANTOR</th>
                            <th>PASANGAN</th>
                            <th>PEKERJAAN PASANGAN</th>
                            <th width="30px"></th>
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