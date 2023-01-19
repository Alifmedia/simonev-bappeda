@extends('view_admin_data_master.data_master')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" 
      action="{{ route('admin.master.penilaian') }}" 
      method="get">

      <div class="search">
        <div class="form-group">
          <input type="text" 
                class="form-control" 
                 name="search" 
          placeholder="Cari berdasarkan soal" 
                value="{{ app('request')->input('search') }}"
          >
        </div>
        <button type="submit" 
               class="btn btn-primary" 
                name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button>
      </div>
    </form>


    {{-- Table --}}
    <br>
    <form id="delete-form" 
      action="{{ route('admin.master.penilaian.deleteSoal') }}" 
      method="POST">
     
      @csrf
      <button type="submit" 
             class="btn btn-danger">
          <i class="fa fa-trash" 
       aria-hidden="true"></i>&nbsp;
        Hapus
      </button>

        {{-- ICON TAMBAH --}}
      <a class="btn btn-primary" 
          href="{{ route('admin.master.penilaian.tambahSoal') }}">
        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
        Tambah Soal
      </a>
      <a class="btn btn-primary" 
          href="{{ route('admin.master.penilaian.tambahSoal') }}">
        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
        Tambah Jawaban
      </a>
      <br><br>
      <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            
            <table class="table">
              <thead>
                <tr>
                  <center>
                  <th scope="col">
                    <input type="checkbox" class="check-all">
                  </th>
                  <th scope="col" align="center">No</th>
                  <th scope="col" align="center">Soal</th>
                  <th scope="col" align="center">Tema Soal</th>
                  <th scope="col" align="center">Edit Soal</th>
                  <th scope="col" align="center">Pilih Jawaban</th>
                  <th scope="col" align="center">Detail Soal</th>
                  
                  </center>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $value)
                  <tr>
                    <td><input type="checkbox" name="check[]" value="{{ $value->id }}" class="check"></td>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->soal }}</td>
                    <td>{{ $value->temaSoal->tema }}</td>
                    <td>
                      <a href="{{ route('admin.master.penilaian.editSoal', $value->id) }}" 
                        class="text-dark">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('admin.master.penilaian.pilihJawaban', $value->id) }}" 
                        class="text-dark">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                      </a>
                    </td>
                    <td>
                      <a href="" data-toggle="modal" data-target="#detail-modal-{{ $value->id }}">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
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

    {{--Modal--}}

    @foreach ($data as $key => $value)
    <div class="modal fade" id="detail-modal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="detailModalTitle">Soal No. {{ $value->id }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <p class="font-weight-bold h4">Data Soal</p>
          <p class="font-weight-bold m-0">Soal :</p>
          <p>{{ $value->soal }}</p>

          <!-- <p class="font-weight-bold m-0">Jawaban : </p> -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Jawaban</th>
                <th scope="col">Bobot</th>
              </tr>
            </thead>
            <tbody>
              @foreach($value->jawaban as $jawaban)
              <tr>
                <td>{{$jawaban->jawaban}}</td>
                <td>{{$jawaban->bobot}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

          {{--<p class="font-weight-bold m-0">Bobot Jawaban</p>
          <p>{{ $value->soal }}</p>

          <p class="font-weight-bold m-0">Unsur</p>
          <p>{{ $value->umum->unsur['nama'] }}</p>

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

          <p class="font-weight-bold m-0">Fasilitator Konsultasi</p>
          <p>{{ $value->terekap->administrator['nama'] }}</p>

          <p class="font-weight-bold m-0">Ruangan</p>
          <p>{{ $value->terekap->ruang['instansi'] }}, {{ $value->terekap->ruang['nama'] }}</p>

          <p class="font-weight-bold m-0">Pemangku Kepentingan</p>
          <ol class="pl-4">
            @foreach ($value->pemangku as $i => $pemangku)
              <li>{{ $pemangku->nama }} - {{ $pemangku->nik }}</li>
            @endforeach
          </ol>

          <p class="font-weight-bold m-0">Dokumen</p>
          <ol class="pl-4">
            @foreach ($value->dokumen as $i => $dokumen)
              <li>
                <a href="{{ asset('uploads/'.$dokumen->lokasi_file) }}" target="_blank">{{ $dokumen->nama }}</a>
              </li>
            @endforeach
          </ol>

          <hr>
          <p class="font-weight-bold h4">Notulensi</p>
          <a href="{{ asset('notulensi/'.$value->terekap->notulensi) }}" class="btn btn-light"><i class="fa fa-file" aria-hidden="true"></i> Download File</a>

          @if (count($value->tahapan))
            <hr>
            <p class="font-weight-bold h4">Tahapan</p>
            <form class="" action="{{ route('admin.konsultasi.prosesTahapan', $value->id) }}" method="post">
              @csrf
              @foreach ($value->tahapan as $i => $tahapan)
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="tahapan[]" value="{{ $tahapan->no }}" id="tahapan_{{$i}}" {{ $tahapan->selesai ? 'checked' : '' }}>
                    <label class="custom-control-label" for="tahapan_{{$i}}">{{$i+1}}. {{ $tahapan->nama }}</label>
                    <br>
                    <small>{{ $tahapan->keterangan }}</small>
                  </div>
                </div>
              @endforeach
              <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </form>
          @endif
          </div>
        </div>
      </div>
    </div>--}}
  @endforeach
  </div>

@endsection
