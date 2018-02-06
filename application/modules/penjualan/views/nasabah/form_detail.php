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
            <div class="box-body">
            <div class="user-block">
                <div class="col-md-1">
                        <img class="profile-user-img img-responsive img-square" src="<?= $record->gambar; ?>" onerror="this.src='<?= base_url('asset/dist/img/boxed-bg.jpg'); ?>'" alt="User profile picture">
                        <p class="text-muted text-center">
                       </div>
                       
                            <div class="col-md-10">
                                <dl class="dl-horizontal">
                                <dt>NAMA</dt>
                                <dd><?php echo $record->nama; ?></dd>
                                <dt>TELEPON</dt>
                                <dd><?php echo $record->telpon1; ?></dd>
                                <dt>PERUMAHAN</dt>
                                <dd><?php echo perumahan($record->perumahan_id); ?></dd>
                                <dt>KAVLING</dt>
                                <dd><?php echo nama_kavling($record->kavling_id); ?></dd>
                                <dt>CARA PEMBELIAN</dt>
                                <dd><?php echo carapembelian($record->carapembelian); ?></dd>
                                </dl>
                            </div>
                     
                  </div>  
            </div>
            <input type="hidden" name="carapembelianx" id="carapembelianx" value="<?= set_value('carapembelianx', $record->carapembelian); ?>"/>
    
         
            <br>
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#perumahan" data-toggle="tab">Langkah 1<br /><small>Data Unit Rumah</small></a></li>
                <li><a href="#data" data-toggle="tab">Langkah 2<br /><small>Data Nasabah</small></a></li>
                <li><a href="#pasangannb" data-toggle="tab">Langkah 3<br /><small>Data Pasangan</small></a></li>
                <li><a href="#transaksi" data-toggle="tab">Langkah 4<br /><small>Data Transaksi</small></a></li>
                <li><a href="#pembayaran" data-toggle="tab">Langkah 5<br /><small>Data Pembayaran</small></a></li>
                <li><a href="#pembangunan" data-toggle="tab">Langkah 6<br /><small>Data Pembangunan</small></a></li>
                <li><a href="#berkas" data-toggle="tab">Langkah 7<br /><small>Berkas Nasabah</small></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="data">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <dl class="dl-horizontal">
                                <dt>KTP</dt>
                                <dd><?php echo $record->ktp; ?></dd>
                                <dt>TEMPAT LAHIR</dt>
                                <dd><?php echo $record->tmlahir; ?></dd>
                                <dt>TANGGAL LAHIR LAHIR</dt>
                                <dd><?php echo ddMMMyyyy($record->tglahir); ?></dd>
                                <dt>JENIS KELAMIN</dt>
                                <dd><?php echo $record->sex; ?></dd>
                                <dt>STATUS HUBUNGAN</dt>
                                <dd><?php echo $record->kawin; ?></dd>
                                <dt>PENDIDIKAN</dt>
                                <dd><?php echo $record->pendidikan; ?></dd>
                                <dt>AGAMA</dt>
                                <dd><?php echo $record->agama; ?></dd>
                                <dt>ALAMAT ASAL</dt>
                                <dd><?php echo $record->alamat1; ?></dd>
                                <dt>ALAMAT SEKARANG</dt>
                                <dd><?php echo $record->alamat2; ?></dd>
                                <dt>NOMOR TELEPON 2</dt>
                                <dd><?php echo $record->telpon2; ?></dd>
                                <dt>WA</dt>
                                <dd><?php echo $record->wa; ?></dd>
                                <dt>EMAIL</dt>
                                <dd><?php echo $record->email; ?></dd>
                                <dt>PEKERJAAN</dt>
                                <dd><?php echo $record->pekerjaan; ?></dd>
                                <dt>INSTANSI</dt>
                                <dd><?php echo $record->instansi; ?></dd>
                                <dt>ALAMAT KANTOR</dt>
                                <dd><?php echo $record->alamat_kantor; ?></dd>
                                <dt>TELEPON KANTOR</dt>
                                <dd><?php echo $record->telpon_kantor; ?></dd>
                                <dt>STATUS PEGAWAI</dt>
                                <dd><?php echo $record->status_pegawai; ?></dd>
                                <dt>LAMA BEKERJA</dt>
                                <dd><?php echo $record->lama_bekerja; ?></dd>
                                <dt>PENDAPATAN</dt>
                                <dd><?php echo $record->pendapatan; ?></dd>
                                <dt>ANGSURAN</dt>
                                <dd><?php echo $record->angsuran; ?></dd>
                                <dt>NPWP</dt>
                                <dd><?php echo $record->npwp; ?></dd>
                                <dt>JOIN INCOME</dt>
                                <dd><?php echo $record->join_income; ?></dd>
                            </dl>
                            </div>
                        </div>
                        </div>
                 
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="pasangannb">
                <div class="row">
                         <div class="col-md-12">
                            <div class="form-group">
                            <dl class="dl-horizontal">
                                <dt>NAMA PASANGAN</dt>
                                <dd><?php echo $record->pasangan; ?></dd>
                                <dt>TELEPON PASANGAN</dt>
                                <dd><?php echo $record->telpon_pasangan; ?></dd>
                                <dt>PEKERJAAN PASANGAN</dt>
                                <dd><?php echo $record->pekerjaan_pasangan; ?></dd>
                                <dt>INSTANSI PASANGAN</dt>
                                <dd><?php echo $record->instansi_pasangan; ?></dd>
                                <dt>ALAMAT KANTOR</dt>
                                <dd><?php echo $record->alamat_kantor_pasangan; ?></dd>
                                <dt>TELEPON PASANGAN</dt>
                                <dd><?php echo $record->telpon_kantor_pasangan; ?></dd>
                                <dt>STATUS PEGAWAI</dt>
                                <dd><?php echo $record->status_pegawai_pasangan; ?></dd>
                                <dt>LAMA BEKERJA</dt>
                                <dd><?php echo $record->lama_bekerja_pasangan; ?></dd>
                                <dt>PENDAPATAN PASANGAN</dt>
                                <dd><?php echo $record->pendapatan_pasangan; ?></dd>
                            </dl>
                            </div>
                        </div>       
                    </div>
              </div>

              <div class="tab-pane active" id="perumahan">
                <div class="row">
                         <div class="col-md-12">
                            <div class="form-group">
                                <dl class="dl-horizontal">
                                <dt>PERUMAHAN</dt>
                                <dd><?php echo $record->perumahan_id; ?></dd>
                                <dt>NOMOR KAVLING</dt>
                                <dd><?php echo $record->kavling_id; ?></dd>
                            </dl>
                            </div>
                            
                        </div> 
                    </div>     
              </div>

              <div class="tab-pane" id="transaksi">
                <div class="row">
                    <div class="col-md-12">
                            <div id="dvkpr" style="display: none">
                                <div class="form-group">
                                    <dl class="dl-horizontal">
                                    <dt>PESAN UNIT</dt>
                                    <dd> - </dd>
                                    <dt>PROGRES KPR</dt>
                                    <dd> - </dd>
                                    <dt>ACC KPR</dt>
                                    <dd> - </dd>
                                    <dt>ORDER PEMBANGUNAN</dt>
                                    <dd> - </dd>
                                    <dt>MULAI MEMBANGUN</dt>
                                    <dd> - </dd>
                                    <dt>BAST</dt>
                                    <dd> - </dd>
                                    <dt>AJB kpr</dt>
                                    <dd> - </dd>
                                    </dl>
                                </div>
                            </div>



                            <div id="dvcashbertahap" style="display: none">
                                <div class="form-group">
                                    <dl class="dl-horizontal">
                                    <dt>PESAN UNIT</dt>
                                    <dd> - </dd>
                                    <dt>ORDER PEMBANGUNAN</dt>
                                    <dd> - </dd>
                                    <dt>MULAI MEMBANGUN</dt>
                                    <dd> - </dd>
                                    <dt>BAST</dt>
                                    <dd> - </dd>
                                    <dt>AJB kpr</dt>
                                    <dd> - </dd>
                                    </dl>
                                </div>
                            </div>



                            <div id="dvcashkeras" style="display: none">
                                <div class="form-group">
                                    <dl class="dl-horizontal">
                                    <dt>PESAN UNIT</dt>
                                    <dd> - </dd>
                                    <dt>ORDER PEMBANGUNAN</dt>
                                    <dd> - </dd>
                                    <dt>MULAI MEMBANGUN</dt>
                                    <dd> - </dd>
                                    <dt>BAST</dt>
                                    <dd> - </dd>
                                    <dt>AJB kpr</dt>
                                    <dd> - </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                </div>    
              </div>

              <div class="tab-pane" id="pembayaran">
                <div class="row">
                
                </div>
              </div>

              <div class="tab-pane" id="pembangunan">
                <div class="row">
                
                </div>
              </div>

              <div class="tab-pane" id="berkas">
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
            <div>

     
            <!-- /. row body -->
            <div class="box-footer">
                <a class="btn btn-flat btn-info btn-sm" href="<?php echo site_url('penjualan/nasabah')?>"  title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a> 
               <a class="btn btn-flat btn-warning btn-sm" onclick="edit_data();" href="<?php echo site_url('penjualan/nasabah/updated/'.$record->id) ?>" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
               <a class="btn btn-flat btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')" data-toggle="tooltip" title="Hapus" onclick="deleted('<?php echo $record->id ?>')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
               
            </div>
        </div>     
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

</div>
</div>

