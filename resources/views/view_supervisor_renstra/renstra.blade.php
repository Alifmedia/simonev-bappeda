@extends('master.app')

@section('title', 'RENSTRA')

@section('content')
  <div id="pengguna">
    <ul class="nav nav-tabs" id="myTab" role="tablist">

       <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.renstra.tujuansasaran') }}"><font size="2">TUJUAN & SASARAN</font></a>
        <h3></h3>
      </li>

     
      <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.renstra.program') }}"><font size="2">PROGRAM</font></a>
        <h3></h3>
      </li> 

       <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.renstra.kegiatan') }}"><font size="2">KEGIATAN</font></a>
        <h3></h3>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.renstra.setujuopd') }}"><font size="2">RENSTRA</font></a>
        <h3></h3>
      </li>


       <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.renstra.rekapitulasi') }}"><font size="2">REKAPITULASI</font></a>
        <h3></h3>
      </li>
    .
    </ul>

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>



@endsection
