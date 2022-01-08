
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
    <section class="content">
        <div class="container-fluid">
            
            <nav class="container mt-5 bg-whtie text-dark text-center">
                <h3>DATA AKUN ZOOM SISTEM FAKULTAS TEKNIK DAN KEJURUAN UNDIKSHA</h3>
            </nav>
        
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-2">
                        <a href="/create"><button type="button" class="btn btn-primary float-right">+ Tambah Data</button></a>
                    </div>
                </div>
            </div>
        
            <div class="container mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Akun</th>
                            <th scope="col">Password</th>
                            <th scope="col">Kapasitas</th>
                            <th scope="col">Masa Berlaku</th>
                            <th scope="col">Availability</th>
                            <th scope="col">Token</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;?>
                        @foreach($zoom as $m)
                        <tr>
                            <td><?php echo($i); $i++; ?></td>
                            <td>{{$m->nama_akun}}</td>
                            <td>{{$m->password}}</td>
                            <td>{{$m->kapasitas}}</td>
                            <td> 
                                <?php
                                date_default_timezone_set('Asia/Singapore'); 
                                $date1 = new datetime($m->masa_berlaku);
                                $date2 = new datetime();
                                $diff= date_diff($date1, $date2); 
                                echo $diff->days ;
                                echo " Hari";
                                ?>
                            </td>
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
                            <td width="200px">
                                <a href="/edit/{{$m->id}}"><button type="button" class="btn btn-success" {{ $_hiddenAvailable }}>Ubah</button></a>
                                <a href="/hapus/{{$m->id}}"><button type="button" class="btn btn-danger" {{ $_hiddenAvailable  }}>Hapus</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </section>
@endsection


