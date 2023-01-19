@extends('view_pengguna_kecamatan.pengguna')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <center><small class="text-muted">TOTAL HASILNYA ADALAH:<br><br> {{$data->totalhasil}} </small></center>
    <div class="list-group">

      @foreach ($data as $key => $value)
        <a href="{{ route('admin.kecamatan.survey', $value->id) }}" 
          class="list-group-item list-group-item-action">
          <p class="m-0">{{ $value->tema }}</p>
          <small class="text-muted">PROGRES: %----</small>
          <small class="text-muted">SUB HASIL: {{$value->subhasil}}</small>
        </a>
      @endforeach

      
    </div>
  </div>
@endsection
