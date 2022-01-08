
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
          <a href="{{route('List Jadwal Adm')}}" class="nav-link active">
            <i class="nav-icon fas fa-book"></i>
            <p>
              List Jadwal
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{route('Data Akun Zoom Adm')}}" class="nav-link">
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
                <nav class="container mt-5 bg-white text-dark text-center">
                    <h3>DETAILS DATA REQUEST ZOOM FAKULTAS TEKNIK DAN KEJURUAN UNDIKSHA</h3>
                </nav>
            
                <div class="container mt-4">
                    <a href="/list-jadwal"><button type="button" class="btn btn-warning">Kembali</button></a>
                </div>
            
                <div class="container">
                    @foreach($peminjaman as $m)
                        <form>
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="{{$m->id}}">
                                <label for="Nama Akun"><br/>Nama User</label>
                                <input type="text" class="form-control" id="nama_user" name="nama_user"  value="{{$m->user->name}}" disabled>
                                <label for="Nama Akun"><br/>Nama Akun</label>
                                <input type="text" class="form-control" id="nama_akun" name="nama_akun"  value="{{$m->zoom->nama_akun}}" disabled>
                                <label for="Nama Kegiatan"><br/>Nama Kegiatan</label>
                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"  value="{{$m->nama_kegiatan}}" disabled>
                                <div class="input-group">
                                    <span class="input-group-text">Deskripsi Kegiatan</span>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" aria-label="Deskripsi" value="" disabled>{{$m->deskripsi}}</textarea>
                                </div>
                                <label for="Tanggal"><br/>Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"  value="{{$m->tanggal}}" disabled>
                                <label for="Jam"><br/>Jam</label>
                                <input type="number" class="form-control" id="jam" name="jam"  value="{{$m->jam}}" disabled>
                                <label for="Durasi"><br/>Durasi</label>
                                <input type="number" class="form-control" id="durasi" name="durasi"  value="{{$m->durasi}}" disabled>
                                <label for="Meeting_id"><br/>Meeting Id</label>
                                <input type="number" class="form-control" id="meeting_id" name="meeting_id"  value="{{ $m->meeting_id }}" disabled>
                                <label for="Passcode"><br/>Passcode</label>
                                <input type="number" class="form-control" id="passcode" name="passcode"  value="{{ $m->passcode }}" disabled>
                                <label for="Keterangan"><br/>Keterangan</label>
                                <div class="input-group">
                                    <span class="input-group-text">Keterangan</span>
                                    <textarea class="form-control" id="keterangan" name="keterangan" aria-label="keterangan" disabled> {{ $m->keterangan }}</textarea>
                                </div>
                                <label for="token"><br/>token</label>
                                <input type="text" class="form-control" id="token" name="token"  value="{{ $m->token }}" disabled>
                            </div>
                        </form>
                    @endforeach
                </div>
            </body>
        </div>
      </section>
@endsection