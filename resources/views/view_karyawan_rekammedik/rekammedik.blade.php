@extends('master.app')

@section('title', 'Halaman Admin')

@section('content')
  <div id="konsultasi">

    
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.rekammedik.pending') }}">MASUK</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.rekammedik.normal') }}">DISETUJUI</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.rekammedik.rekapitulasi') }}">REKAPITULASI</a>
      </li>
    </ul>

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>



@endsection
