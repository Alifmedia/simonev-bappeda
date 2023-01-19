@extends('view_admin_faq.data')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" action="{{ route('admin.master.faq') }}" method="get">
      <div class="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan pertanyaan" value="{{ app('request')->input('search') }}">
        </div>

        <button type="submit" class="btn btn-primary" name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button>
      </div>
    </form>

    {{-- Table --}}
    <br>
    <div>
      <a class="btn btn-primary" href="{{ route('admin.master.faq.tambah') }}">
        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
        Tambah
      </a>
      <br><br>
      <div class="card card__table">
        <div class="card-body">
          <div class="accordion" id="accordionExample">

            @foreach ($data as $key => $value)
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" id="heading-{{$key}}">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{$key}}" aria-expanded="true" aria-controls="collapse-{{$key}}">
                      {{ $value->pertanyaan }}
                    </button>
                  </h2>
                  <div class="">
                    <a href="{{ route('admin.master.faq.delete', $value->id) }}" class="btn btn-danger">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('admin.master.faq.edit', $value->id) }}" class="btn btn-dark">
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>

                <div id="collapse-{{$key}}" class="collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="heading-{{$key}}" data-parent="#accordionExample">
                  <div class="card-body">
                    {!! $value->jawaban !!}
                  </div>
                </div>
              </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
    <div class="pagination-wrapper">
      {{ $data->links() }}
    </div>
  </div>

@endsection
