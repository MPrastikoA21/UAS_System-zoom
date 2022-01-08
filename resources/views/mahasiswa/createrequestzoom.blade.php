@extends('Layout.main')

@section('head')

@endsection

@section('sidebar')
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="/mahasiswa" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{route('Request Zoom Mhs')}}" class="nav-link active">
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
           
            <body>
                <nav class="container mt-4 bg-priamry text-center">
                    <h3> <strong> TAMBAH REQUEST AKUN ZOOM FAKULTAS TEKNIK DAN KEJURUAN UNDIKSHA</strong></h3>
                </nav>
                <div class="container mt-4">
                    <a href="/data-akun-zoom"><button type="button" class="btn btn-warning">Kembali</button></a>
                </div>
                <div class="container">
                    <form action="/insert-request-zoom" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            {{-- <label for="id_zoom">Id Zoom</label> --}}
                            <input type="hidden" class="form-control" id="id_peminjaman" name="id_peminjaman" placeholder="Masukkan ID Peminjaman" autocomplete="off" autofocus>
                            <label for="Nama Akun"><br/>Nama User</label>
                            <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Masukkan Nama User" autocomplete="off">
                            <label for="Nama Akun"><br/>Nama Akun</label>
                            <input type="text" class="form-control" id="nama_akun" name="nama_akun" placeholder="Masukkan Nama Akun" autocomplete="off">
                            <label for="Nama Kegiatan"><br/>Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukkan Nama Kegiatan" autocomplete="off">
                            <div class="input-group">
                              <span class="input-group-text">Deskripsi Kegiatan</span>
                              <textarea class="form-control" id="deskripsi" name="deskripsi" aria-label="Deskripsi"></textarea>
                            </div>
                            <label for="Tanggal"><br/>Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal" autocomplete="off">
                            <label for="Jam"><br/>Jam</label>
                            <input type="number" class="form-control" id="jam" name="jam" placeholder="Masukkan Jam Pelaksanaan, Contoh '16'" autocomplete="off">
                            <label for="Durasi"><br/>Durasi</label>
                            <input type="number" class="form-control" id="durasi" name="durasi" placeholder="Masukkan Durasi per Jam, Contoh '3'" autocomplete="off">
                            
                            {{-- Input Hidden --}}
                            <input type="hidden" id="status" name="status" value="0">
                            
                        </div>
            
                        <button type="submit" class="btn btn-primary float-right">Request</button>
                    </form>
                </div>
            </body>
        </div>
    </section>
@endsection