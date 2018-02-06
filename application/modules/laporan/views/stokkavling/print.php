<input type="text" name="type" id="typex">
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>NO KAVLING</th>
                            <th>TIPE</th>
                            <th>LT</th>
                            <th>LB</th>
                            <th>HARGA</th>
                            <th width="240px">STATUS PENJUALAN</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                          $no = 1;
                          foreach ($record as $row) {
                        ?>
                        <tr>
                           <td><?php echo $row->kavling ?></td>
                           <td><?php echo $row->type ?></td>
                           <td><?php echo $row->tanah ?>m<sup>2</sup></td>
                           <td><?php echo $row->bangunan ?> m<sup>2</sup></td>
                           <td><?php echo rupiah($row->harga) ?></td>
                           <td><?php echo status_penjualan1($row->status) ?></td>
                        </tr>

                 <?php } ?>
                    </tbody>
                </table>
        </div>
        <!-- /.col -->
      </div>


      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?= site_url('laporan/stokkavling/cetak'); ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        </div>
      </div>