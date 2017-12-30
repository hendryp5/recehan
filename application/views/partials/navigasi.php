<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if ($this->session->userdata('gambar') == NULL) { ?>
          <img src="<?= base_url('asset/dist/img/avatar5.png'); ?>" class="img-circle" alt="User Image">
          
          <?php } else{ ?>
          <img src="<?= $this->session->userdata('gambar'); ?>" class="img-circle" alt="User Image">
          <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('username'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

		<ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU UTAMA</li>
          <li>
              <a href= "<?= site_url('dashboard');?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                </span>
              </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-database"></i> <span>Master Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= site_url('master/pengguna'); ?>"><i class="fa fa-circle-o"></i> Pengguna</a></li>
              <li><a href="<?= site_url('master/perusahaan'); ?>"><i class="fa fa-circle-o"></i> Perusahaan</a></li>
              <li><a href="<?= site_url('master/perumahan'); ?>"><i class="fa fa-circle-o"></i> Perumahan</a></li>
              <li><a href="<?= site_url('master/bank'); ?>"><i class="fa fa-circle-o"></i> Bank</a></li>
              <li><a href="<?= site_url('master/rab'); ?>"><i class="fa fa-circle-o"></i> RAB Proyek</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-shopping-cart"></i> <span>Penjualan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= site_url('penjualan/daftarkavling'); ?>"><i class="fa fa-circle-o"></i> Daftar Kavling</a></li>
              <li><a href="<?= site_url('penjualan/followup'); ?>"><i class="fa fa-circle-o"></i> Data Followup</a></li>
              <li><a href="<?= site_url('penjualan/nasabah'); ?>"><i class="fa fa-circle-o"></i> Nasabah</a></li>
              <li><a href="<?= site_url('penjualan/pesanunit'); ?>"><i class="fa fa-circle-o"></i> Pesan Unit</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Akad Jual Beli</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Kartu Kontrol Transaksi</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-university"></i> <span>Pembangunan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Order Pembangunan</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Kontrak Pembangunan</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Serah Terima Pembangunan</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> BAST</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Progres Pembangunan Rumah</a></li>
            </ul>
          </li>
          <li class="treeview">
                    <a href="#">
                      <i class="fa fa-money"></i> <span>Keuangan</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="#"><i class="fa fa-circle-o"></i> Kas </a></li>
                      <li><a href="#"><i class="fa fa-circle-o"></i> Penjualan </a></li>
                  </ul>
          </li>
          <li class="treeview">
                    <a href="#">
                      <i class="fa fa-gears"></i> <span>Pengaturan</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="<?= site_url('pengaturan/kategorirab'); ?>"><i class="fa fa-circle-o"></i>Kategori RAB</a></li>
                      <li><a href="#"><i class="fa fa-circle-o"></i> Pengaturan Pengguna </a></li>
                      <li><a href="#"><i class="fa fa-circle-o"></i> Berita dan Informasi </a></li>
                      <li><a href="#"><i class="fa fa-circle-o"></i> Backup Database </a></li>
                  </ul>
          </li>
          <li>
              <a href= "<?= site_url('logout');?>">
                <i class="fa fa-sign-out"></i> <span>Keluar</span>
                <span class="pull-right-container">
                </span>
              </a>
          </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

  