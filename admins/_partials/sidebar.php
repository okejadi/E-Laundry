<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $working_dir;?>/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Laundry <sup>v1</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php echo $res == '/dashboard' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo $working_dir;?>/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Administrasi
      </div>

      <li class="nav-item <?php echo $res == '/transaksi' || $res == '/transaksi/tambah' || $res == '/transaksi/detail' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo $working_dir;?>/transaksi">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Transaksi</span></a>
      </li>

      <li class="nav-item <?php echo $res == '/paket' || $res == '/paket/tambah' || $res == '/paket/edit' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo $working_dir;?>/paket">
          <i class="fas fa-fw fa-cube"></i>
          <span>Paket Laundry</span></a>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li> -->

      <!-- Nav Item - Utilities Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Paket Laundry</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Akun
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php echo $res == '/customer' || $res == '/customer/edit' || $res == '/customer/tambah' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo $working_dir;?>/customer">
          <i class="fas fa-fw fa-user"></i>
          <span>Customer</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item <?php echo $res == '/admin'  || $res =='/admin/tambah' || $res == '/admin/edit' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo $working_dir;?>/admin">
          <i class="fas fa-fw fa-user-cog"></i>
          <span>Admin</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item <?php //echo $link == '/karyawan/' ? 'active': '' ?>">
        <a class="nav-link" href="<?php //echo $working_dir;?>/karyawan/">
          <i class="fas fa-fw fa-users"></i>
          <span>Karyawan</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block my-0">

      <!-- Nav Item - Laporan -->
      <li class="nav-item <?php echo $link == '/laporan/' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo $working_dir;?>/laporan">
          <i class="fas fa-fw fa-info"></i>
          <span>Laporan</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->