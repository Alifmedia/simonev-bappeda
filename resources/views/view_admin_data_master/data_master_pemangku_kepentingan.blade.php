@extends('view_admin_data_master.data_master')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" 
      action="{{ route('admin.master.pemangku') }}" 
      method="get">
      
      <div class="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan nama dan NIK" value="{{ app('request')->input('search') }}">
        </div>

        <button type="submit" class="btn btn-primary" name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button>
      </div>
      
    </form>



    {{-- Table --}}
    <br>
    <form     id="delete-form" 
          action="{{ route('admin.master.pemangku.delete') }}" 
          method="POST">
      
      @csrf
      <button type="submit" 
             class="btn btn-danger">
          <i class="fa fa-trash" 
       aria-hidden="true"></i>&nbsp;
        Hapus
      </button>

      <a class="btn btn-primary" href="{{ route('admin.master.pemangku.tambah') }}">
        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
        Tambah
      </a>

      <br><br>
      <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">
                    <input type="checkbox" class="check-all">
                  </th>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">NIK</th>
                  <th scope="col">No Handphone</th>
                  <th scope="col">Tempat, Tanggal Lahir</th>
                  <th scope="col"><i class="fa fa-pencil" aria-hidden="true"></i></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $value)
                  <tr>
                    <td><input type="checkbox" name="check[]" value="{{ $value->id }}" class="check"></td>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->nik }}</td>
                    <td>{{ $value->no_handphone }}</td>
                    <td>{{ $value->tempat_lahir }}, {{ $value->tanggal_lahir }}</td>
                    <td>
                      <a href="{{ route('admin.master.pemangku.edit', $value->id) }}" class="text-dark">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>
    <div class="pagination-wrapper">
      {{ $data->links() }}
    </div>
  </div>

@endsection
