@extends('master.app')

@section('title', 'RENJA')

@section('content')
  <div id="pengguna">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
   <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.renja.setup') }}"><font size="2"> SUBKEGIATAN</font></a>
        
      </li> 
 
      <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.renja.setujuopd') }}"><font size="2">RENSTRA</font></a>
      
      </li>

       <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.renja.tahunan') }}"><font size="2">RENJA</font></a>
        <h3></h3>
      </li>


       <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.renja.rekapitulasi') }}"><font size="2">REKAPITULASI</font></a>
        <h3></h3>
      </li>
    .
    </ul>

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>



@endsection
