@extends('view_admin_karyawan.karyawan')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" action="" method="get">
      <div class="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan NIK" value="{{ app('request')->input('search') }}">
        </div>

        <button type="submit" class="btn btn-primary" name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button>
      </div>
      <div class="filter">
       
       <!--  <div class="filter__input__sub">
          <div class="form-group">
            <label for="filter1">KABUPATEN</label>
            <select class="form-control" id="filter1" name="kabupaten">
              <option value="0">Semua</option>
               @foreach ($filter['kabupaten'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('kabupaten') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
               @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="filter2">KECAMATAN</label>
            <select class="form-control" id="filter2" name="kecamatan" {{ count($filter['kecamatan']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['kecamatan'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('kecamatan') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

         
          <div class="form-group">
            <label for="filter3">KEMUKIMAN</label>
            <select class="form-control" id="filter3" name="kemukiman" {{ count($filter['kemukiman']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['kemukiman'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('kemukiman') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>
 -->
        </div>
        <div class="filter__input__sub">
           <div class="form-group">
            <label for="filter6">DEPARTEMEN</label>
            <select class="form-control" id="filter6" name="sektoral">
              <option value="0">Semua</option>
              @foreach ($filter['sektoral'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('sektoral') == $value->id  ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>
     
          <div class="form-group">
            <label for="filter5">TIPE</label>
            <select class="form-control" id="filter5" name="hal">
              <option value="0">Semua</option>
              @foreach ($filter['hal'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('hal') == $value->id  ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>
         
          <div class="form-group">
            <label for="filter9">JUMLAH BARIS</label>
            <select class="form-control" id="filter9" name="pagination">
              @foreach ([15,30,50] as $key => $value)
                <option value="{{ $value}}" {{ app('request')->input('pagination') == $value  ? 'selected' : '' }}>{{ $value }}</option>
              @endforeach
              <option value="0">Semua</option>
            </select>
          </div>

          
        </div>
       
      </div>
    </form>

    {{-- Table --}}
    <br>
    <form id="delete-form" action="{{ route('admin.karyawan.delete') }}" method="POST">
      @csrf
      <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
          Hapus
        </button>
        <a class="btn btn-dark" href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['export' => 1])) }}">
          <i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;
          Export PDF
        </a>
      </div>
      <br>
      <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">
                    <input type="checkbox" class="check-all">
                  </th>
                  <th scope="col">NIK</th>
                  <th scope="col">NAMA</th>
                  <th scope="col">DEPARTEMEN</th>
                  <th scope="col">TIPE</th>
               <!--   <th scope="col">Jumlah Delegasi</th> -->
                  <th scope="col">DETAIL</th>
                  <th scope="col">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                  </th>
                  <th scope="col">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                  </th>
                </tr>
              </thead>
              
              <tbody>
                @foreach ($data as $key => $value)
                  <tr>
                    <td><input type="checkbox" name="check[]" value="{{ $value->id }}" class="check"></td>
                    <td>{{ $value->umum['nik'] }}</td>
                    <td>{{ $value->umum['nama'] }}</td>
                    <td>{{ $value->umum->bagian['nama'] }}</td>
                    <td>{{ $value->umum->hal['nama'] }}</td>
                   <td>{{ $value->jurnalKonsultasi->last()['waktu'] }}</td> 
                   <!--  <td>{{ $value->jurnalKonsultasi->last()['jumlah_delegasi'] }}</td> -->
                    <td>
                      <a href="" data-toggle="modal" data-target="#detail-modal-{{ $value->id }}">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('admin.karyawan.verifikasi', $value->id) }}">
                        <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('admin.karyawan.decline', $value->id) }}">
                        <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
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
    @if (method_exists($data,'links'))
      <div class="pagination-wrapper">
        {{ $data->links() }}
      </div>
    @endif
  </div>
  @foreach ($data as $key => $value)
    <div class="modal fade" id="detail-modal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="detailModalTitle">{{ $value->no_registrasi }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <p class="font-weight-bold h4">Data Pemohon</p>
          <p class="font-weight-bold m-0">Nama</p>
          <p>{{ $value->umum['nama'] }}</p>

          <p class="font-weight-bold m-0">NIK</p>
          <p>{{ $value->umum['nik'] }}</p>

          <p class="font-weight-bold m-0">Jenis Kelamin</p>
          <p>{{ $value->umum->jenis_kelamin }}</p>

          <p class="font-weight-bold m-0">Unsur</p>
          <p>{{ $value->umum->unsur['nama'] }}</p>

            <p class="font-weight-bold m-0">Bagian</p>
          <p>{{ $value->umum->bagian['nama'] }}</p>

          <p class="font-weight-bold m-0">Email/Username</p>
          <p>{{ $value->umum->user['email'] }}</p>

          <p class="font-weight-bold m-0">No Handphone</p>
          <p>{{ $value->umum->no_handphone }}</p>
          <hr>
          <p class="font-weight-bold h4">Data Konsultasi</p>
          <p class="font-weight-bold m-0">No Registrasi</p>
          <p>{{ $value->no_registrasi }}</p>

          <p class="font-weight-bold m-0">Hal</p>
          <p>{{ $value->hal['nama'] }}</p>

          <p class="font-weight-bold m-0">Risalah Masalah</p>
          <p>{{ $value->risalah }}</p>

          <p class="font-weight-bold m-0">Sektoral</p>
          <p>{{ $value->sektoral['nama'] }}</p>

          <p class="font-weight-bold m-0">Waktu Konsultasi</p>
          <p>{{ $value->jurnalKonsultasi->last()['waktu'] }}</p>

          <p class="font-weight-bold m-0">Jumlah Delegasi</p>
          <p>{{ $value->jurnalKonsultasi->last()['jumlah_delegasi'] }}</p>

          <p class="font-weight-bold m-0">Dokumen</p>
          <ol class="pl-4">
            @foreach ($value->dokumen as $i => $dokumen)
              <li>
                <a href="{{ asset('uploads/'.$dokumen->lokasi_file) }}" target="_blank">{{ $dokumen->nama }}</a>
              </li>
            @endforeach
          </ol>

          </div>
        </div>
      </div>
    </div>
  @endforeach

@endsection
