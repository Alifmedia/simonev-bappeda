@extends('view_pengguna_kecamatan.pengguna')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <center><small class="text-muted">TOTAL HASILNYA ADALAH:<br><br><h1> {{$data->totalhasil}}<h1> </small></center>
    <div class="list-group">

      @foreach ($data as $key => $value)
        <a href="{{--route('pengguna.kecamatan.survey', $value->id)--}}" 
          class="list-group-item list-group-item-action">
          <p class="m-0">{{ $value->tema }}</p>
          <small class="text-muted">NILAI ASPEK: {{$value->subhasil}}</small>
        </a>
      @endforeach

      
    </div>
  </div>
@endsection
