
@extends('Layout.main')

@section('head')

@endsection

@section('sidebar')
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="/" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{route('Data Peminjaman Adm')}}" class="nav-link">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>
              Data Peminjaman Zoom
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{route('List Jadwal Adm')}}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              List Jadwal
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{route('Data Akun Zoom Adm')}}" class="nav-link active">
            <i class="nav-icon far fa-window-restore"></i>
            <p>
              Data Akun Zoom
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
           
            <body>
                <nav class="container mt-4 bg-priamry text-center">
                    <h3>TAMBAH DATA AKUN ZOOM FAKULTAS TEKNIK DAN KEJURUAN UNDIKSHA</h3>
                </nav>
                <div class="container mt-4">
                    <a href="/data-akun-zoom"><button type="button" class="btn btn-warning">Kembali</button></a>
                </div>
                <div class="container">
                    <form action="/insert" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            {{-- <label for="id_zoom">Id Zoom</label> --}}
                            <input type="hidden" class="form-control" id="id_zoom" name="id_zoom" placeholder="Masukkan ID Zoom" autocomplete="off" autofocus>
                            <label for="nama_akun"></label>
                            <input type="text" class="form-control" id="nama_akun" name="nama_akun" placeholder="Masukkan Nama Akun" autocomplete="off">
                            <label for="Password"></label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password" autocomplete="off">
                            <label for="kapasitas"></label>
                            <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukkan Kapasitas" autocomplete="off">
                            <label for="masa_berlaku"></label>
                            <input type="date" class="form-control" id="masa_berlaku" name="masa_berlaku" placeholder="Masukkan Masa Berlaku" autocomplete="off">
                            {{-- Input Hidden --}}
                            <input type="hidden" id="availability" name="availability" value="0">
                            
                        </div>
            
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </body>
        </div>
    </section>
@endsection


