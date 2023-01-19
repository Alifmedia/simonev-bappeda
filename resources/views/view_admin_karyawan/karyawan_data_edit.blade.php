@extends('master.app')

@section('title', 'ULKP Sunting Permohonan')

@section('content')
  <div id="akomodasi-add">
    <div class="nav-tabs-flat">
      <a href="{{ route('karyawan_biodata.karyawan_data') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
        Back
      </a>
    </div>
    <div class="container mt-4">
      @include('template.flash')
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Sunting Permohonan</h3>

          
          <form action="{{ route('karyawan_biodata.karyawan_data.update', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Hal</label>
                  <select class="form-control{{ $errors->has('hal') ? ' is-invalid' : '' }}" name="hal" id="hal" required>
                    <option value="">Pilih Hal</option>
                    @foreach ($hal as $value)
                      <option value="{{ $value->id }}" {{ $data->hal['id'] == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('hal'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('hal') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label>Risalah Masalah</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required>{{ $data->risalah }}</textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label>Sub Bagian</label>
                  <select class="form-control{{ $errors->has('sektoral') ? ' is-invalid' : '' }}" name="sektoral" id="sektoral" required>
                    <option value="">Pilih Sub Bagian</option>
                    @foreach ($sektoral as $value)
                      <option value="{{ $value->id }}" {{ $data->sektoral['id'] == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('sektoral'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('sektoral') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label>Tanggal Konsultasi</label>
                  <input type="date" class="form-control{{ $errors->has('tanggal_konsultasi') ? ' is-invalid' : '' }}" name="tanggal_konsultasi" value="{{ $data->tanggal_konsultasi }}" required>
                  @if ($errors->has('tanggal_konsultasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('tanggal_konsultasi') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label>Pukul Konsultasi</label>
                  <input type="time" class="form-control{{ $errors->has('pukul_konsultasi') ? ' is-invalid' : '' }}" name="pukul_konsultasi" value="{{ $data->pukul_konsultasi }}" required>
                  @if ($errors->has('pukul_konsultasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('pukul_konsultasi') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label>Jumlah Delegasi</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ $data->jumlah_delegasi }}" placeholder="Delegasi" required>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label>Dokumen</label>
                  <div class="custom-file">
                    <input type="file" name="dokumen[]" class="custom-file-input" id="doc-upload" accept="application/pdf" multiple>
                    <label class="custom-file-label form-control" for="doc-upload">Upload Dokumen</label>
                  </div>
                  @if ($errors->has('dokumen'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('dokumen') }}</strong>
                      </span>
                  @endif
                  <ul class="list-group mt-3">
                    @foreach ($data->dokumen as $key => $value)
                      <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                        <a href="{{ asset('uploads/'.$value->lokasi_file) }}" target="_blank">{{ $value->nama }}</a>
                        <a href="{{ route('karyawan_biodata.karyawan_data.deleteFile', ['file' => $value->lokasi_file]) }}" class="btn btn-link p-0">
                          <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </div>

                
              </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
