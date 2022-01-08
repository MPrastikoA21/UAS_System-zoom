@extends('auth.layout.main')

@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html">SISTEM ZOOM</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body rounded">
        <form action="{{route('auth')}}" method="post">
            @csrf
          <div class="form-group">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required>
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
            @error('password')
            <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
              <div class="col-12 text-center">
                  <a href="{{route('forgot')}}" >Lupa Sandi?</a>
                  <button type="submit" class="btn btn-primary btn-block mt-4">Masuk</button>
                  <a href="{{route('register')}}" class="col-12 mt-3 btn btn-default">Daftar Sekarang</a>
              </div>
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection