@extends('view_admin_verifikasi.admin')



@section('main-content')
  <div id="data">
    @include('template.flash')
    <div class="list-group">

      @foreach($data as $key => $value)

      
        <a href="{{ route('admin.kecamatan.survey', $value->id) }}" 
          class="list-group-item list-group-item-action">
          {{ $value->id }}-{{ $value->nam }}
         
        </a>
        
      @endforeach

    </div>
  </div>
@endsection
