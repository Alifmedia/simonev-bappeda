@extends('view_admin_verifikasi.admin')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <div class="list-group">

      <!-- DATA DARI CONTROLLER ADMIN VIA FUNGSI TAMPILKECAMATAN -->
      @foreach($data as $key => $value)
        <a href="{{ route('admin.kecamatan.survey', $value->id) }}" class="list-group-item list-group-item-action">
          <h6>{{ $value->id }}-{{ $value->nama }}aaa</h6>
         
        </a>
        
      @endforeach

    </div>
  </div>
@endsection
