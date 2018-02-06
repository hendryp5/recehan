<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SAKA</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?= base_url('asset/dist/img/tulisan.png'); ?>" width="170" height="35"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if ($this->session->userdata('gambar') == NULL) { ?>
              <img src="<?= base_url('asset/dist/img/avatar5.png'); ?>" class="user-image" alt="User Image">
              <?php } else { ?>
              <img src="<?= $this->session->userdata('gambar'); ?>" class="user-image" alt="User Image">
              <?php } ?>
              <span class="hidden-xs">&nbsp;</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php if ($this->session->userdata('gambar') == NULL) { ?>
                <img src="<?= base_url('asset/dist/img/avatar5.png'); ?>" class="img-circle" alt="User Image">
                <?php } else { ?>
                <img src="<?= $this->session->userdata('gambar'); ?>" class="img-circle" alt="User Image">
                <?php } ?>
                <p>
                  <?= $this->session->userdata('nama'); ?> <br>
                  <small><?= level($this->session->userdata('level')); ?> </small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= site_url('master/pengguna/detail/'.$this->session->userdata('userid')); ?>" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?= site_url('logout'); ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>

  