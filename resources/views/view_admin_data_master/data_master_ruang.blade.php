@extends('view_admin_data_master.data_master')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" action="{{ route('admin.master.ruang') }}" method="get">
      <div class="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan nama" value="{{ app('request')->input('search') }}">
        </div>

        <button type="submit" class="btn btn-primary" name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button>
      </div>
    </form>

    {{-- Table --}}
    <br>
    <form id="delete-form" action="{{ route('admin.master.ruang.delete') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger">
        <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
        Hapus
      </button>
      <a class="btn btn-primary" href="{{ route('admin.master.ruang.tambah') }}">
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
                  <th scope="col">Instansi</th>
                  <th scope="col">Gedung</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Lantai</th>
                  <th scope="col">Detail</th>
                  <th scope="col"><i class="fa fa-pencil" aria-hidden="true"></i></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $value)
                  <tr>
                    <td><input type="checkbox" name="check[]" value="{{ $value->id }}" class="check"></td>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->instansi }}</td>
                    <td>{{ $value->gedung }}</td>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->lantai }}</td>
                    <td>
                      <a href="" data-toggle="modal" data-target="#detail-modal-{{ $value->id }}">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('admin.master.ruang.edit', $value->id) }}" class="text-dark">
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
  @foreach ($data as $key => $value)
    <div class="modal fade" id="detail-modal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <p class="m-0"><b>{{ $value->nama }}</b></p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="font-weight-bold m-0">Instansi</p>
            <p>{{ $value->instansi }}</p>

            <p class="font-weight-bold m-0">Gedung</p>
            <p>{{ $value->gedung }}</p>

            <p class="font-weight-bold m-0">Nama</p>
            <p>{{ $value->nama }}</p>

            <p class="font-weight-bold m-0">Lantai</p>
            <p>{{ $value->lantai }}</p>

            <p class="font-weight-bold m-0">Alamat</p>
            <p>{{ $value->alamat }}</p>
          </div>
        </div>
      </div>
    </div>
  @endforeach

@endsection
