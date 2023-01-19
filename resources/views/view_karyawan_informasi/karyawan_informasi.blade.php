@extends('master.app')

@section('title', 'Data & Informasi')

@section('content')
  <div id="data">
    <div class="nav-tabs-flat">
      <a href="{{ route('pengguna.permohonan') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
      </a>
    </div>
    <div class="container mt-4">
      @include('template.flash')
      <form id="search-form" action="" method="get">
        <div class="search">
          <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan no registrasi" value="{{ app('request')->input('search') }}">
          </div>

          <button type="submit" class="btn btn-primary" name="button">
            <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
            Cari
          </button>
        </div>
        <div class="filter">
          <div class="filter__input__sub">
            <div class="form-group">
              <label for="filter2">Jenis</label>
              <select class="form-control" id="filter2" name="jenis">
                <option value="0">Semua</option>
                @foreach ($filter['jenis'] as $key => $value)
                  <option value="{{ $value->id }}" {{ app('request')->input('jenis') == $value->id  ? 'selected' : '' }}>{{ $value->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="filter1">Perihal</label>
              <select class="form-control" id="filter1" name="hal">
                <option value="0">Semua</option>
                @foreach ($filter['hal'] as $key => $value)
                  <option value="{{ $value->id }}" {{ app('request')->input('hal') == $value->id  ? 'selected' : '' }}>{{ $value->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">

            </div>
          </div>
        </div>
      </form>

      {{-- Table --}}
      <br>
      <div>
        <div class="card card__table">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Pengesahan</th>
                    <th scope="col"><i class="fa fa-file-archive-o" aria-hidden="true"></i> File</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $key => $value)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $value->jenisPeraturan['nama'] }}</td>
                      <td>{{ $value->hal['nama'] }}</td>
                      <td>{{ $value->nama }}</td>
                      <td>{{ $value->tanggal_pengesahan }}</td>
                      <td>
                        <a href="{{ asset('peraturan/'.$value->lokasi_file) }}" class="text-dark text-decoration-none" target="_blank">
                          <i class="fa fa-file-archive-o" aria-hidden="true"></i> File
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="pagination-wrapper">
        {{ $data->links() }}
      </div>
    </div>

  </div>

@endsection
