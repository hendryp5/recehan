<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-money"></i> RENCANA ANGGARAN BIAYA
            <small class="pull-right">Date: <?= date('d-M-Y'); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
          Perumahan
          <address>
            <strong><?= perumahan($record->perumahan_id); ?></strong><br>
            <?= detail_perumahan($record->perumahan_id)->lokasi; ?><br>
            Telpon: <?= detail_perumahan($record->perumahan_id)->telpon; ?><br>
            Email: <?= detail_perumahan($record->perumahan_id)->email; ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 invoice-col">
          
        </div>
        <!-- /.col -->
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>URAIAN</th>
              <th>BIAYA</th>
              <th class="text-center" width="80px">#</th>
            </tr>
            </thead>
            <tbody>
            <?php $master_rab = $this->db->where('deleted_at',NULL)->order_by('id', 'ASC')->get('master_rab')->result(); ?>
            <?php 
            $penerimaan = 0;
            $pengeluaran = 0;
            $jumlahplus = 0;
            $jumlahminus = 0;
            if($master_rab): 
            foreach($master_rab as $x):
            ?>
            <tr>
              <td><?= '<b>'.$x->kode.'</b>'; ?></td>
              <td><?= '<b>'.$x->kategori.'</b>'; ?></td>
              <td></td>
              <td></td>
            </tr>
                <?php $kategori_rab = $this->db->where('deleted_at',NULL)->where('group_id', $x->id)->order_by('id', 'ASC')->get('rab_kategori')->result(); ?>
                <?php 
                if($kategori_rab): 
                foreach($kategori_rab as $y):
                ?>
                <tr>
                <td><?= $y->kode; ?></td>
                <td><?= $y->kategori; ?></td>
                <td></td>
                <td></td>
                </tr>
                        <?php $rab = $this->db->where('deleted_at',NULL)->where('kategori_id', $y->id)->where('perumahan_id', $record->perumahan_id)->where('code', $this->session->userdata('code'))->order_by('id', 'ASC')->get('rab')->result(); ?>
                        <?php 
                        if($rab): 
                        foreach($rab as $z):
                        ?>
                        <tr>
                        <td><i class="fa fa-check-circle"></i></td>
                        <td><?= $z->uraian; ?></td>
                        <td class="text-right"><?= rupiah($z->biaya); ?></td>
                        <td class="text-center"><a href="<?= site_url('master/rab/updated/'.$z->id); ?>" class="btn btn-xs btn-flat btn-warning"><i class="fa fa-edit"></i></a> <a class="btn btn-xs btn-flat btn-danger" href="<?php echo site_url('master/rab/deleted/'.$z->id) ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" ><i class="fa fa-trash"></i></a></td>
                        </tr>
                        
                        <?php
                        if($x->notasi === '+'){
                            if($z->kategori_id == $y->id){
                                $jumlahplus =+ $z->biaya;
                            }
                            $penerimaan += $jumlahplus;
                        }

                        if($x->notasi === '-'){
                            if($z->kategori_id == $y->id){
                                $jumlahminus =+ $z->biaya;
                            }
                            $pengeluaran += $jumlahminus;
                        }
                        endforeach;
                        endif; 
                        ?>
                <?php 
                endforeach;
                endif; 
                ?>
            <?php 
            endforeach;
            endif; 
            ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <!-- /.col -->
        <div class="col-xs-12 table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">TOTAL PENERIMAAN:</th>
                <td class="text-right"><b><?php echo rupiah($penerimaan); ?></b></td>
                <td class="text-center" width="80px">#</td>
              </tr>
              <tr>
                <th>TOTAL BIAYA</th>
                <td class="text-right"><b><?php echo rupiah($pengeluaran); ?></b></td>
                <td class="text-center" width="80px">#</td>
              </tr>
              <tr>
                <th>LABA/RUGI</th>
                <td class="text-right"><b><?php echo rupiah($penerimaan-$pengeluaran); ?></b></td>
                <td class="text-center" width="80px">#</td>
              </tr>
            </tbody></table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?= site_url('master/rab/cetak/'.$record->perumahan_id); ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        </div>
      </div>
    </section>