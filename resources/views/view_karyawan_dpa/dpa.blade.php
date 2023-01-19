@extends('master.app')

@section('title', 'Penginputan Rekam Medik')

@section('content')
  <div id="pengguna">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.dpa.renja') }}"><font size="2">RENJA</font></a>
        <h3></h3>
      </li>


       <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.dpa.setuju') }}"><font size="2">REKAP DPA</font></a>
        <h3></h3>
      </li>


        <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.dpa.rincian') }}"><font size="2">RINCIAN DPA</font></a>
        <h3></h3>
      </li>

     





       <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.dpa.rekapitulasi') }}"><font size="2">REKAPITULASI</font></a>
        <h3></h3>
      </li>
    .
    </ul>

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>



@endsection
