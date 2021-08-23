<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>     
    </ul>    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">     
        
        <!-- Profile -->
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            {{ Auth::user()->name }} <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">                        
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="dropdown-item text-center">
            <i class="fas fa-power-off mr-2"></i>Logout            
            </a>         
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>   
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
        </a>
        </li>
    </ul>
</nav>