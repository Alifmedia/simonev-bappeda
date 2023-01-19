@extends('view_pengguna_kecamatan.pengguna')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <div class="list-group">

      @foreach($data as $key => $value)

      
   
        <a href="{{ route('pengguna.kecamatan.survey', $value->id) }}" 
          class="list-group-item list-group-item-action">
          <p class="m-0"> ASPEK : {{ $value->tema }}</p>
          <small class="text-muted">BOBOT PENILAIAN: {{ $value->bobot }} % | </small>
          <small class="text-muted">JUMLAH INDIKATOR: {{ $value->jmlsoal }} | </small>
        
        </a>
        
      @endforeach

    </div>
  </div>
@endsection
