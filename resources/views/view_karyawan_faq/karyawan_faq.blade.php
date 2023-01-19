@extends('master.app')

@section('title', 'Data FAQ')

@section('content')
  <div id="akomodasi-add">
    <div class="nav-tabs-flat">
      <a href="{{ route('pengguna.permohonan') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
        Back
      </a>
    </div>
    <div class="container mt-4">
      <form id="search-form" action="" method="get">
        <div class="search">
          <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan pertanyaan" value="{{ app('request')->input('search') }}">
          </div>

          <button type="submit" class="btn btn-primary">
            <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
            Cari
          </button>
        </div>
      </form>
      <div class="accordion" id="accordionExample">
        @foreach ($data as $key => $value)
          <div class="card">
            <div class="card-header" id="heading-{{$key}}">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{$key}}" aria-expanded="true" aria-controls="collapse-{{$key}}">
                  {{ $value->pertanyaan }}
                </button>
              </h2>
            </div>
            <div id="collapse-{{$key}}" class="collapse show" aria-labelledby="heading-{{$key}}" data-parent="#accordionExample">
              <div class="card-body">
                {!! $value->jawaban !!}
              </div>
            </div>
          </div>
        @endforeach
      </div>
      {{-- <div class="card">
        <div class="card-body">
          <h3 class="card-title">FAQ</h3>

        </div>
      </div> --}}
    </div>
  </div>
@endsection
