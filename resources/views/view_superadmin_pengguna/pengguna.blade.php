@extends('master.app')

@section('title', 'Halaman Admin')

@section('content')
  <div id="pengguna">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('superadmin.pengguna.administrator') }}">ADMIN BAPPEDA</a>
      </li>


       <li class="nav-item">
        <a class="nav-link" href="{{ route('superadmin.pengguna.supervisor') }}">SUPERVISOR OPD</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('superadmin.pengguna.umum') }}">OPERATOR OPD</a>
      </li>
    </ul>

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>



@endsection
