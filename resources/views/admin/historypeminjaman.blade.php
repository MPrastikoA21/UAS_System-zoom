
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
          <a href="{{route('Data Peminjaman Adm')}}" class="nav-link active">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>
              Data Peminjaman Zoom
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{route('List Jadwal Adm')}}" class="nav-link ">
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
                            <th scope="col">Action</th>
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
                                
                                if ($m->status == 0){
                                    $_keterangan = "Request";
                                    echo $_keterangan;
                                } elseif ($m->status == 1){
                                    $_keterangan = "Accepted";
                                    echo $_keterangan;
                                } elseif ($m->status == 2){
                                    $_keterangan = "Refused";
                                    echo $_keterangan;
                                } elseif ($m->status == 3){
                                    $_keterangan = "Cancel";
                                    echo $_keterangan;
                                } elseif ($m->status == 4){
                                    $_keterangan = "Done";
                                    echo $_keterangan;
                                } else {
                                    $_keterangan = "Error";
                                    echo $_keterangan;
                                } 
                                ?>
                            </td>
                            <td>
                              <a href="/detailspeminjaman/{{$m->id}}"><button type="button" class="btn btn-success" >Details</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </section>
@endsection


