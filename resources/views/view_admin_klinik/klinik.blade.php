@extends('master.app')

@section('title', 'DATA PRIBADI')

@section('content')
  <div id="pengguna">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.klinik.profil') }}">PROFIL KLINIK </a>
        <h3></h3>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.klinik.manajemen') }}">MANAJEMEN TIM KESEHATAN </a
        <h3></h3>
      </li>
    </ul>

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>



@endsection
