@extends('master.app')

@section('title', 'Halaman Admin')

@section('content')
  <div id="pengguna">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('superadmin.opd.badan') }}">BADAN</a>
      </li>


       <li class="nav-item">
        <a class="nav-link" href="{{ route('superadmin.opd.dinas') }}">DINAS</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('superadmin.opd.kantor') }}">KANTOR & SEKRETARIAT</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="{{ route('superadmin.opd.kecamatan') }}">KECAMATAN</a>
      </li>
    </ul>

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>



@endsection
