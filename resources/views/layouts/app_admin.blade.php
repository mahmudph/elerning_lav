<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name')}} @yield('title')</title>
  @include('layouts.partials.header');
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

   @include('layouts.partials.navbar')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp8fwACQDt5ts7-34BcC0SGsyFs0YiY9uxxg&usqp=CAU" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Str::upper(Auth::user()->name) }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.home.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.users.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('admin.guru.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.siswa.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.kelas.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.pelajaran.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pelajaran</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Pengajaran</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('admin.pengajaran-siswa-kelas.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Data Siswa (Kelas)</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.pengajaran-pelajaran-kelas.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Data Pelajaran (Kelas)</p>
                  </a>
                </li>
                 <li class="nav-item">
                  <a href="{{ route('admin.pengajaran-guru-kelas.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Data Pengajar (Kelas)</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.new-pengajaran.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>New Pengajaran</p>
                  </a>
                </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" style="padding-top:45px !important">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('halaman')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home.index')}}">Home</a></li>
              <li class="breadcrumb-item active">@yield('halaman')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="container">

      {{-- template from blade --}}
      @isset($msg)
        <div role="alert" class="alert alert-{{ ($type == 'error') ? 'warning' : 'info'}} alert-dismissible fade show" id="msg-content">
          <h4 class="alert-heading">{{($type == 'error') ? "Wops!": "Success!"}}</h4>
          {{ $msg }}
          {{-- dismis alert --}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position:relative;top:-30px;">
              <span>&times;</span>
          </button>
        </div>
      @endisset

      {{-- template from ajax jqurry --}}
      <div class="alert alert-success hidden" id="msg-app-content">
        <p id="msg-app-data"></p>
         {{-- dismis alert --}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position:relative;top:-30px;">
            <span>&times;</span>
        </button>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    {{-- modal section --}}
      @include('layouts.partials.modal')
    {{-- end modal --}}
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@include("layouts.partials.footer")

@stack('javascript')

</body>
</html>
