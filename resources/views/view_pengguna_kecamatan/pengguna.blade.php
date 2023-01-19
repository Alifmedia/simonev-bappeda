@extends('master.app')

@section('title', 'Penilaian Kecamatan')

@section('content')
  <div id="pengguna">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('pengguna.kecamatan') }}">Aspek & Indikator Penilaian</a>
      </li>
       
        <li class="nav-item">
        <a class="nav-link" href="{{ route('pengguna.kecamatan_hasil') }}">Rekapitulasi & Hasil Penilaian</a>
      </li> 
      
    </ul>

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>



@endsection
