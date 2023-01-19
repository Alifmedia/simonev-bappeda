@extends('master.app')

@section('title', 'RENSTRA')

@section('content')
  <div id="pengguna">
    <ul class="nav nav-tabs" id="myTab" role="tablist">

      

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.renstra.setujuopd') }}"><font size="2">RENSTRA SKPD/OPD</font></a>
        <h3></h3>
      </li>


       <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.renstra.rekapitulasi') }}"><font size="2">REKAPITULASI</font></a>
        <h3></h3>
      </li>
    .
    </ul>

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>



@endsection
