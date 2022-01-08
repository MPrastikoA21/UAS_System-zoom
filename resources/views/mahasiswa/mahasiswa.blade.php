@extends('Layout.main')

@section('head')
    <h1 class="m-0"> <strong> Dashboard</strong></h1>
@endsection

@section('sidebar')
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="/mahasiswa" class="nav-link active">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{route('Request Zoom Mhs')}}" class="nav-link">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>
              Request Zoom
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{route('List Jadwal Mhs')}}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              List Jadwal
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
    <form action="{{route('logout')}}" method="POST"> @csrf <button type="submit" class="btn btn-danger">Logout</button></form>
  </div>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $requestzoom }}</h3>
  
                  <p>Data Request</p>
                </div>
                <div class="icon">
                  <i class="fas fa-envelope-square"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $zoomDipinjam }}</h3>
                  <p>Data Peminjaman Zoom</p>
                </div>
                <div class="icon">
                  <i class="fas fa-columns"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $zoomTersedia }}</h3>
                  <p>Data Zoom Tersedia</p>
                </div>
                <div class="icon">
                  <i class="far fa-window-restore"></i>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->


      </section>
      <!-- /.content -->
@endsection