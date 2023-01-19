@extends('view_karyawan_rekammedik.karyawan')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" action="" method="get">
      <div class="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan Nomor Rekam Medik" value="{{ app('request')->input('search') }}">
        </div>

        <button type="submit" class="btn btn-primary" name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button>
      </div>
      <div class="filter">
        <div class="filter__input__sub">
          
          <!--
          <div class="form-group">
            <label for="filter1">Hal</label>
            <select class="form-control" id="filter1" name="hal">
              <option value="0">Semua</option>
              @foreach ($filter['hal'] as $key => $value)
                <option value="{{ $value->id }}" 
                               {{app('request')->input('hal')==$value->id?'selected':''}}
                               >{{ $value->nama }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="filter2">Sub Bagian</label>
            <select class="form-control" id="filter2" name="sektoral">
              <option value="0">Semua</option>
              @foreach ($filter['sektoral'] as $key => $value)
                <option value="{{$value->id}}"
                               {{app('request')->input('sektoral')==$value->id?'selected':'' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>
          -->

          <div class="form-group">
            <label for="filter7">MULAI</label>
            <input type="date" class="form-control date-picker" id="filter7" name="mulai" placeholder="Mulai" value="{{ app('request')->input('mulai') }}">
          </div>
          <div class="form-group">
            <label for="filter8">AKHIR</label>
            <input type="date" class="form-control date-picker" id="filter8" name="akhir" placeholder="Akhir" value="{{ app('request')->input('akhir') }}">
          </div>

          <div class="form-group">
            <label for="filter3">STATUS</label>
            <select class="form-control" id="filter3" name="status_konsultasi">
              <option value="0">Semua</option>
              @foreach ($filter['status'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('status_konsultasi') == $value->id  ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </form>

    {{-- Table --}}
    <br>
    <form id="delete-form" action="{{ route('karyawan_rekammedik.karyawan_rm.delete') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger">
        <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
        Hapus
      </button>
      <a class="btn btn-primary" href="{{ route('karyawan_rekammedik.karyawan_rm.create') }}">
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
                  <th scope="col">N0.RM</th>
                  <th scope="col">WAKTU</th>
                  <th scope="col">STATUS</th>
                  <th scope="col">DETAIL</th>
                  <th scope="col">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $value)
                  @php
                    $status = $value->jurnalKonsultasi->last()['status_konsultasi_id'];
                  @endphp
                  <tr>
                    <td><input type="checkbox" name="check[]" value="{{ $value->id }}" class="check"></td>
                    <td>{{ $value->no_registrasi }}</td>
                    <td>{{ $value->hal['nama'] }}</td>
                    @if ($status > 3)
                      <td>{{ $value->jurnalKonsultasi->last()['waktu'] }}</td>
                      <td>{{ $value->jurnalKonsultasi->last()['jumlah_delegasi'] }}</td>
                    @else
                      <td>{{ $value->jurnalKonsultasi->first()['waktu'] }}</td>
                      <td>{{ $value->jurnalKonsultasi->first()['jumlah_delegasi'] }}</td>
                    @endif
                    <td>{{ $value->jurnalKonsultasi->last()['statusKonsultasi']['nama'] }}</td>
                    <td>
                      <a href="" 
                         data-toggle="modal" data-target="#detail-modal-{{ $value->id }}">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('karyawan_rekammedik.karyawan_rm.edit', $value->id) }}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
    @php
      $status = $value->jurnalKonsultasi->last()['status_konsultasi_id'];
    @endphp
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
          <p class="font-weight-bold m-0">NO. RM</p>
          <p>{{ $value->no_registrasi }}</p>

          <p class="font-weight-bold m-0">DEPARTEMEN</p>
          <p>{{ $value->hal['nama'] }}</p>

          <p class="font-weight-bold m-0">Risalah Masalah</p>
          <p>{{ $value->risalah }}</p>

          <p class="font-weight-bold m-0">Sektoral</p>
          <p>{{ $value->sektoral['nama'] }}</p>

          @if ($status > 3)
            <p class="font-weight-bold m-0">Waktu Konsultasi</p>
            <p>{{ $value->jurnalKonsultasi->last()['waktu'] }}</p>

            <p class="font-weight-bold m-0">Jumlah Delegasi</p>
            <p>{{ $value->jurnalKonsultasi->last()['jumlah_delegasi'] }}</p>
          @else
            <p class="font-weight-bold m-0">Waktu Konsultasi</p>
            <p>{{ $value->jurnalKonsultasi->first()['waktu'] }}</p>

            <p class="font-weight-bold m-0">Jumlah Delegasi</p>
            <p>{{ $value->jurnalKonsultasi->first()['jumlah_delegasi'] }}</p>
          @endif

          @if ($value->terekap)
            <p class="font-weight-bold m-0">Administrator</p>
            <p>{{ $value->terekap->administrator['nama'] }}</p>

            <p class="font-weight-bold m-0">Ruangan</p>
            <p>{{ $value->terekap->ruang['instansi'] }}, {{ $value->terekap->ruang['nama'] }}</p>

          @elseif ($value->terjadwal)
            <p class="font-weight-bold m-0">Administrator</p>
            <p>{{ $value->terjadwal->administrator['nama'] }}</p>

            <p class="font-weight-bold m-0">Ruangan</p>
            <p>{{ $value->terjadwal->ruang['instansi'] }}, {{ $value->terjadwal->ruang['nama'] }}</p>

          @endif

          @if ($value->terjadwal)
            <p class="font-weight-bold m-0">Pemangku Kepentingan</p>
            <ol class="pl-4">
              @foreach ($value->pemangku as $i => $pemangku)
                <li>{{ $pemangku->nama }} - {{ $pemangku->nik }}</li>
              @endforeach
            </ol>
          @endif

          <p class="font-weight-bold m-0">Dokumen</p>
          <ol class="pl-4">
            @foreach ($value->dokumen as $i => $dokumen)
              <li>
                <a href="{{ asset('uploads/'.$dokumen->lokasi_file) }}" target="_blank">{{ $dokumen->nama }}</a>
              </li>
            @endforeach
          </ol>

          <p class="font-weight-bold m-0">Status</p>
          <p>{{ $value->jurnalKonsultasi->last()['statusKonsultasi']['nama'] }}</p>


          @if ($value->terjadwal)
            <a href="{{ route('karyawan.rekammedik.karyawan_rm.undangan', $value->id) }}" class="btn btn-dark float-right">Download Undangan</a>
          @endif

          </div>
        </div>
      </div>
    </div>
  @endforeach

@endsection
