<!DOCTYPE html>
<html>

@include('layouts.partials._head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
       @include('layouts.partials._navbar')
        <!-- /.navbar -->
      
        <!-- Main Sidebar Container -->
        @include('layouts.partials._sidebar')
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          @include('layouts.partials._header')
          <!-- /.content-header -->
      
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->        
      
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
      </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  @include('layouts.partials._script')
  @stack('script')
</body>

</html>