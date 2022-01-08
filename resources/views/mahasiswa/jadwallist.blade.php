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
          <a href="{{route('Request Zoom Mhs')}}" class="nav-link">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>
              Request Zoom
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{route('List Jadwal Mhs')}}" class="nav-link active">
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
    <section class="content">
        <div class="container-fluid">
            
            <nav class="container mt-5 bg-whtie text-dark text-center">
                <h3> <strong> DATA REQUEST ZOOM SISTEM FAKULTAS TEKNIK DAN KEJURUAN UNDIKSHA</strong></h3>
            </nav>
        
            <div class="container mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Nama Akun</th>
                            <th scope="col">Nama Kegiatan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Durasi</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;?>
                        @foreach($peminjaman as $m)
                        <tr>
                            <td><?php echo($i); $i++; ?></td>
                            <td>{{$m->user->name}}</td>
                            <td>{{$m->zoom->nama_akun}}</td>
                            <td>{{$m->nama_kegiatan}}</td>
                            <td>{{$m->tanggal}}</td>
                            <td>{{$m->jam}}</td>
                            <td>{{$m->durasi}} Jam</td>
                            <td>
                                <?php 
                                $_value = ($m->status);
                                if ($_value == 0){
                                    $_keterangan = "Request";
                                    $_hiddenAvailable = "";
                                    echo $_keterangan;
                                } elseif ($_value == 1){
                                    $_keterangan = "Accepted";
                                    $_hiddenAvailable = "";
                                    echo $_keterangan;
                                } else {
                                    $_keterangan = "Refused";
                                    $_hiddenAvailable = "hidden";
                                    echo $_keterangan;
                                } 
                                ?>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container-fluid">
            
          <nav class="container mt-5 bg-whtie text-dark text-center">
              <h3> <strong> DATA AKUN ZOOM YANG BISA DIPAKAI </strong></h3>
          </nav>
      
          <div class="container mt-4">
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Akun</th>
                          <th scope="col">Availability</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php $i=1;?>
                      @foreach($zoom as $m)
                      <tr>
                          <td><?php echo($i); $i++; ?></td>
                          <td>{{$m->nama_akun}}</td>
                          <td>
                              <?php 
                              $_value = ($m->availability);
                              if ($_value == 0){
                                  $_keterangan = "Available";
                                  $_hiddenAvailable = "";
                                  echo $_keterangan;
                              } else {
                                  $_keterangan = "Unavailable";
                                  $_hiddenAvailable = "hidden";
                                  echo $_keterangan;
                              } 
                              ?>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>

      </section>

        

@endsection