<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Perpus</b>Tian</span>      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
          
          </li>                      
          <li class="nav-header">MENU</li>                
          <li class="nav-item">
          <a href="{{route('dashboard')}}" class="nav-link @if ($aktif == 'dashboard'){{'active'}}@endif">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
          </a>
          </li>
          <li class="nav-item">
          <a href="{{route('student.index')}}" class="nav-link @if ($aktif == 'student'){{'active'}}@endif">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>Murid</p>
          </a>
          </li>                
          <li class="nav-item">
          <a href="{{route('studentclass.index')}}" class="nav-link @if ($aktif == 'class'){{'active'}}@endif">
              <i class="nav-icon fas fa-school"></i>
              <p>Kelas</p>
          </a>
          </li>                
          <li class="nav-item has-treeview @if ($aktif == 'category' || $aktif == 'book'){{'menu-open'}}@endif"> 
            <a href="#" class="nav-link">           
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Manajemen Buku
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link @if ($aktif == 'category'){{'active'}}@endif">
                  <i class="fas fa-th-large nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('book.index')}}" class="nav-link @if ($aktif == 'book'){{'active'}}@endif">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Buku</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @if ($aktif == 'borrow' || $aktif == 'onBorrow'){{'menu-open'}}@endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Peminjaman Buku
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('borrow.create') }}" class="nav-link @if ($aktif == 'borrow'){{'active'}}@endif">
                  <i class="fas fa-handshake nav-icon"></i>
                  <p>Pinjam Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('borrow.index') }}" class="nav-link @if ($aktif == 'onBorrow'){{'active'}}@endif">
                  <i class="fas fa-upload nav-icon"></i>
                  <p>Buku Sedang Dipinjam</p>
                </a>
              </li>                   
            </ul>
          </li>
          <li class="nav-item has-treeview @if ($aktif == 'top-book' || $aktif == 'top-student' || $aktif == 'report'){{'menu-open'}}@endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('top-book') }}" class="nav-link @if ($aktif == 'top-book'){{'active'}}@endif">
                  <i class="fas fa-star nav-icon"></i>
                  <p>Buku Favorit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('top-student') }}" class="nav-link @if ($aktif == 'top-student'){{'active'}}@endif">
                  <i class="fas fa-child nav-icon"></i>
                  <p>Murid Teraktif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('report') }}" class="nav-link @if ($aktif == 'report'){{'active'}}@endif">
                  <i class="fas fa-hockey-puck nav-icon"></i>
                  <p>Seluruh Peminjaman</p>
                </a>
              </li>                   
            </ul>
          </li>
      
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>