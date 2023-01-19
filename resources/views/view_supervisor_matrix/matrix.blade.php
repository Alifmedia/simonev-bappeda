@extends('master.app')

@section('title', 'MATRIX')

@section('content')
  <div id="pengguna">
    <ul class="nav nav-tabs" id="myTab" role="tablist">

       <li class="nav-item">
        <a class="nav-link" href="{{ route('supervisor.matrix.rfk') }}">MATRIX RFK</a>
        <h3></h3>
      </li>


        <li class="nav-item">
        <a class="nav-link" href="{{ route('supervisor.matrix.renja') }}">MATRIX RENJA</a>
        <h3></h3>
      </li>
     

     <!--   <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan_rekammedik.karyawan_rm_pending') }}">PENDING</a>
        <h3></h3>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan_rekammedik.karyawan_rm') }}">DISETUJUI</a>
        <h3></h3>
      </li> -->

   <!--    <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan_matrix.karyawan_matrix_tertolak') }}">REKAPITULASI</a>
        <h3></h3>
      </li> -->

   
     
    </ul>

    <div class="container mt-4">
      @yield('main-content')
    </div>
  </div>



@endsection
