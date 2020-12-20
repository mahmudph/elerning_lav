<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">{{ ucfirst(Auth::user()->name)}}
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <form action="{{ route('logout') }}" method="post" id="logout-form">
              @csrf
          </form>
          <a 
            href="{{ route('logout') }}" 
            class="dropdown-item" 
            onclick="event.preventDefault();document.getElementById('logout-form').submit();
          ">
            <i class="fas fa-logout mr-2"></i> Keluar
            <span class="float-right text-muted text-sm"></span>
          </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->