@extends('master.app')

@section('title', 'Halaman Admin')

@section('content')
  <div id="pengguna">
   <!--  <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.master.pemangku') }}">Pemangku Kepentingan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.master.ruang') }}">Ruangan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.master.peraturan') }}">Peraturan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.master.faq') }}">FAQ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.master.penilaian') }}">Penilaian Kecamatan</a>
      </li>
    </ul> -->

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>



@endsection
