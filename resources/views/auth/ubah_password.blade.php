@extends('master.app')

@section('title', 'Ubah Password')

@section('content')
  <div id="admin-add">
    <div class="nav-tabs-flat">
      <a href="{{ route('karyawan_rekammedik.karyawan_rm') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
        Back
      </a>
    </div>
    <div class="container mt-4">
      @include('template.flash')
      <div class="card">
        <div class="card-body">
          <form class="" action="{{ route('user.ubahPassword') }}" method="post">
            @csrf
            <div class="row justify-content-center">
              <div class="col-md-6">
                <h3 class="card-title">Ubah Password</h3>
               
                <div class="form-group">
                  <label for="password">Password Baru</label>
                  <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                           id="password"  name="password" placeholder="Password" required>
                           
                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="password-confirm">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Konfirmasi Password" required>
                </div>


                <div class="form-group">
                  <label for="password-current">Password Sekarang</label>
                  <input type="password" class="form-control{{ $errors->has('password_current') ? ' is-invalid' : '' }}" id="password-current" name="password_current" placeholder="Password Sekarang" required>
                  @if ($errors->has('password_current'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password_current') }}</strong>
                      </span>
                  @endif
                </div>
                <button type="submit" class="btn btn-primary float-right">Ubah</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
