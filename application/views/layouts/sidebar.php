<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/dist/img/logo.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('nama')?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Dashboard</li>
          <?php if ($this->session->userdata('page') == 1) { ?>
          <li class="active">
          <?php }else{ ?>
          <li>
          <?php } ?>
            <a href="<?= site_url('dashboard'); ?>">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
            </a>
          </li>
        <li class="header">Kelola Asset</li>
        <?php if ($this->session->userdata('page') >= 2 && $this->session->userdata('page') < 10) { ?>
        <li class="active treeview">
        <?php }else{ ?>
        <li class="treeview">
        <?php } ?>
          <a href="#">
            <i class="fa fa-suitcase"></i> 
            <span>Asset Tetap</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if ($this->session->userdata('page') == 2) { ?>
            <li class="active">
            <?php }else{ ?>
            <li>
            <?php } ?>
              <a href="<?= site_url('asset/kib_a'); ?>"><i class="fa fa-circle-o"></i> KIB A </a></li>

            <?php if ($this->session->userdata('page') == 3) { ?>
            <li class="active">
            <?php }else{ ?>
            <li>
            <?php } ?>
              <a href="<?= site_url('asset/kib_b'); ?>"><i class="fa fa-circle-o"></i> KIB B </a></li>

            <?php if ($this->session->userdata('page') == 4) { ?>
            <li class="active">
            <?php }else{ ?>
            <li>
            <?php } ?>
              <a href="<?= site_url('asset/kir_kantor'); ?>"><i class="fa fa-circle-o"></i> KIR KANTOR </a></li>
            
            <?php if ($this->session->userdata('page') == 5) { ?>
            <li class="active">
            <?php }else{ ?>
            <li>
            <?php } ?>
              <a href="<?= site_url('asset/kib_c'); ?>"><i class="fa fa-circle-o"></i> KIB C </a></li>
            
            <?php if ($this->session->userdata('page') == 6) { ?>
            <li class="active">
            <?php }else{ ?>
            <li>
            <?php } ?>
              <a href="<?= site_url('asset/kib_d'); ?>"><i class="fa fa-circle-o"></i> KIB D </a></li>
            
            <?php if ($this->session->userdata('page') == 7) { ?>
            <li class="active">
            <?php }else{ ?>
            <li>
            <?php } ?>
              <a href="<?= site_url('asset/kib_e'); ?>"><i class="fa fa-circle-o"></i> KIB E </a></li>
            
            <?php if ($this->session->userdata('page') == 8) { ?>
            <li class="active">
            <?php }else{ ?>
            <li>
            <?php } ?>
              <a href="<?= site_url('asset/kib_f'); ?>"><i class="fa fa-circle-o"></i> KIB F </a></li>
            
            <?php if ($this->session->userdata('page') == 9) { ?>
            <li class="active">
            <?php }else{ ?>
            <li>
            <?php } ?>
              <a href="<?= site_url('asset/atb'); ?>"><i class="fa fa-circle-o"></i> ATB </a></li>
          </ul>
        </li>
        <?php if($this->session->userdata('page') == 10){ ?>
        <li class="active">
        <?php }else{ ?>
        <li>
        <?php } ?>
          <a href="<?= site_url('notifikasi'); ?>">
            <i class="fa fa-bell"></i> <span>Notifikasi</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>