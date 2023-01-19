@extends('master.app')

@section('title', 'Ubah Email')



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
          <form class="" action="{{ route('user.ubahEmail') }}" method="post">
            @csrf
            <div class="row justify-content-center">
              <div class="col-md-6">
                <h3 class="card-title">Ubah Username</h3>
                <div class="form-group">
                  <label for="username">Email atau Namauser</label>
                  <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="email" required>
                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
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
