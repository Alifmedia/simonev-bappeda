@extends('master.app')

@section('title', 'Penilaian Kecamatan')

@section('content')
  <div id="pengguna">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.kecamatan') }}">JOHAN PAHLAWAN</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.kecamatan') }}">PANTE CEUREMEN</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.kecamatan') }}">JEUMPA</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.kecamatan') }}">PEUSANGAN</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.kecamatan') }}">PINTO RIME GAYO</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.kecamatan') }}">BUKIT</a>
      </li>
       
        
      
    </ul>

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>

 

@endsection
