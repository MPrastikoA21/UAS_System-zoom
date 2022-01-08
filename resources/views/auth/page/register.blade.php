@extends('auth.layout.main')

@section('content')
<div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html">SISTEM ZOOM</a>
    </div>
  
    <div class="card">
      <div class="card-body register-card-body">  
        <form action="{{route('create akun')}}" method="post">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>
                      {{$error}}
                    </li>
                @endforeach
              </ul>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" placeholder="User name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
           <select name="status" id="status" class="form-control">
               <option value="0">Staff Fakultas</option>
               <option value="1">Mahasiswa</option>
           </select>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password2" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary btn-block mb-3">Daftar</button>
            <a href="{{route('login')}}">Saya Sudah Memiliki Akun</a>
          </div>
        </form>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
@endsection

