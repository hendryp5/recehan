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
    <br>
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
    <input type="hidden" name="perumahan_idx" id="perumahan_idx" value="<?= set_value('perumahan_idx', $record->perumahan_id); ?>"/>
    <input type="hidden" name="carapembelianx" id="carapembelianx" value="<?= set_value('carapembelianx', $record->carapembelian); ?>"/>
    <input type="hidden" name="kavling_idx" id="kavling_idx" value="<?= set_value('kavling_idx', $record->kavling_id); ?>"/>
            <div id="smartwizard">
            <ul>
                <li><a href="#data">Langkah 1<br /><small>Data Nasabah</small></a></li>
                <li><a href="#unit">Langkah 2<br /><small>Unit Di Pesan</small></a></li>
                <li><a href="#kelebihan">Langkah 3<br /><small>Kelebihan Tanah dan Bangunan</small></a></li>
                <li><a href="#cara">Langkah 4<br /><small>Cara Pembelian</small></a></li>
                </ul>
            <br>
            <div>
                <div id="data">
                    <div class="row">
                         <div class="col-md-12">
                            <div class="form-group">
                                <dl class="dl-horizontal">
                                    <dt>NAMA NASABAH</dt>
                                    <dd><?= $record->nama; ?></dd>
                                    <dt>NOMOR KTP</dt>
                                    <dd><?= $record->ktp; ?></dd>
                                    <dt>ALAMAT KTP</dt>
                                    <dd><?= $record->alamat1; ?></dd>
                                    <dt>ALAMAT SURAT</dt>
                                    <dd><?= $record->alamat2; ?></dd>
                                    <dt>NOMOR TELEPON</dt>
                                    <dd><?= $record->telpon1; ?> m<sup>2</sup></dd>
                                    <dt>WA</dt>
                                    <dd><?= $record->wa; ?></dd>
                                    <dt>EMAIL</dt>
                                    <dd><?= $record->email; ?> m<sup>2</sup></dd>
                                </dl>
                            </div>
                        </div>
                      
                    </div>
                </div>

                
                 <div id="unit" class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <dl class="dl-horizontal">
                                    <dt>PERUMAHAN</dt>
                                    <dd><?= perumahan($record->perumahan_id); ?></dd>
                                    <dt>KAVLING</dt>
                                    <dd><?= nama_kavling($record->kavling_id); ?></dd>
                                    <!-- <dt>ALAMAT KTP</dt>
                                    <dd><?= $record//->alamat1; ?></dd>
                                    <dt>ALAMAT SURAT</dt>
                                    <dd><?= $record//->alamat2; ?></dd>
                                    <dt>NOMOR TELEPON</dt>
                                    <dd><?= $record//->telpon1; ?> m<sup>2</sup></dd>
                                    <dt>WA</dt>
                                    <dd><?= $record//->wa; ?></dd>
                                    <dt>EMAIL</dt>
                                    <dd><?= $record//->email; ?> m<sup>2</sup></dd> -->
                                </dl>
                            </div>
                        </div>
                    </div>  
                </div>

                 <div id="cara" class="">
                    <div class="row">
                         <div class="col-md-12">
                            <div class="form-group">
                               <dl class="dl-horizontal">
                                    <dt>TOTAL HARGA</dt>
                                    <dd> - </dd>
                                    <dt>CARA PEMBELIAN</dt>
                                    <dd><?= $record->carapembelian; ?></dd>
                                </dl>



                            <div id="dvkpr" style="display: none">
                                <div class="form-group">
                                    <dl class="dl-horizontal">
                                    <dt>BANK</dt>
                                    <dd><?= $record->bank_id; ?></dd>
                                    <dt>DP</dt>
                                    <dd><?= rupiah($record->dp); ?></dd>
                                    <dt>DISKON</dt>
                                    <dd></dd>
                                    <dt>SISA</dt>
                                    <dd> - </dd>
                                    <dt>JANGKA WAKTU</dt>
                                    <dd><?= $record->jangka_waktu; ?> </dd>
                                    <dt>ANGSURAN</dt>
                                    <dd><?= $record->angsuran_pembayaran; ?> </dd>
                                    </dl>
                                </div>
                            </div>



                            <div id="dvcashbertahap" style="display: none">
                                <div class="form-group">
                                    <dl class="dl-horizontal">
                                    <dt>DP</dt>
                                    <dd><?= rupiah($record->dp); ?></dd>
                                    <dt>DISKON</dt>
                                    <dd></dd>
                                    <dt>SISA</dt>
                                    <dd> - </dd>
                                    <dt>JANGKA WAKTU</dt>
                                    <dd><?= $record->jangka_waktu; ?> </dd>
                                    <dt>ANGSURAN</dt>
                                    <dd><?= $record->angsuran_pembayaran; ?></dd>
                                    </dl>
                                </div>
                            </div>



                            <div id="dvcashkeras" style="display: none">
                                <div class="form-group">
                                    <dl class="dl-horizontal">
                                   <dt>DP</dt>
                                    <dd><?= rupiah($record->dp); ?></dd>
                                    <dt>DISKON</dt>
                                    <dd></dd>
                                    <dt>SISA</dt>
                                    <dd> - </dd>
                                    <dt>JANGKA WAKTU</dt>
                                    <dd><?= $record->jangka_waktu; ?> </dd>
                                    <dt>ANGSURAN</dt>
                                    <dd><?= $record->angsuran_pembayaran; ?> </dd>
                                    </dl>
                                </div>
                            </div>
                            
                        </div> 
                    </div>  
                </div>
            </div>

                 <div id="kelebihan" class="">
                    <div class="row">
                         <div class="col-md-12">
                            <dl class="dl-horizontal">
                                    <dt>KELEBIHAN TANAH</dt>
                                    <dd><?= $record->tambahtanah; ?></dd>
                                    <dt>HARGA PERMETER</dt>
                                    <dd><?= rupiah($record->permeter); ?></dd>
                                    <dt>TOTAL HARGA</dt>
                                    <dd> - </dd>
                                    <dt>KELEBIHAN BANGUNAN</dt>
                                    <dd><?= $record->tambahbangun; ?></dd>
                                    <dt>HARGA PERMETER</dt>
                                    <dd><?= rupiah($record->bangunpermeter); ?></dd>
                                    <dt>TOTAL HARGA</dt>
                                    <dd> - </dd>
                                    
                                </dl>
                        </div>
                    </div>  
                </div>


            </div> 
            </div>      
            <!-- /. row body -->
            <div class="box-footer">
               <a class="btn btn-flat btn-default btn-sm" href="<?php echo site_url('penjualan/pengajuanunit')?>"  title="Keluar"><i class="fa fa-arrow-left"></i> KEMBALI</a>
             
            </div>
        </div>
        <!-- /.row -->
    </div>
 
</div>
