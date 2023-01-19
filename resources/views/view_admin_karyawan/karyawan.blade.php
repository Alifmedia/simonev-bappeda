@extends('master.app')

@section('title', 'Halaman Admin')

@section('content')
  <div id="konsultasi">
    <ul class="nav nav-tabs" id="myTab" role="tablist">

       <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.karyawan.pending') }}">SEMUA</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.karyawan.normal') }}">NORMAL</a>
      </li>
   
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.karyawan.prekomorbid') }}">PRE-KOMORBID</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.karyawan.komorbid') }}">KOMORBID</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.karyawan.komplikasi') }}">KOMORBID-KOMPLIKASI</a>
      </li> 
    </ul>

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>



@endsection
