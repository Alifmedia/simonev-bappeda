@extends('master.app')

@section('title', 'Penginputan Rekam Medik')

@section('content')
  <div id="pengguna">
    <ul class="nav nav-tabs" id="myTab" role="tablist">

    
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dpa.setuju') }}">DPA</a>
        <h3></h3>
      </li>


       <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dpa.rekapitulasi') }}">REKAPITULASI</a>
        <h3></h3>
      </li>
    .
    </ul>

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>



@endsection
