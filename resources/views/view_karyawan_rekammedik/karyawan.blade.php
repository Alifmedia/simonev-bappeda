@extends('master.app')

@section('title', 'Penginputan Rekam Medik')

@section('content')
  <div id="pengguna">
    <ul class="nav nav-tabs" id="myTab" role="tablist">

       <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan_rekammedik.karyawan_rm') }}"><font size="2">BELANJA</font></a>
        <h3></h3>
      </li>
     

       <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan_rekammedik.karyawan_rm_pending') }}"><font size="2">PENDING</font></a>
        <h3></h3>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan_rekammedik.karyawan_rm') }}"><font size="2">DISETUJUI</font></a>
        <h3></h3>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan_rekammedik.karyawan_rm_tertolak') }}"><font size="2">REKAPITULASI</font></a>
        <h3></h3>
      </li>

   
     
    </ul>

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>



@endsection
