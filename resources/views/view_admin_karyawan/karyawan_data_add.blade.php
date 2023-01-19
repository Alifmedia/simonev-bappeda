@extends('master.app')

@section('title', 'ULKP Tambah Permohonan')

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
          <h3 class="card-title">TAMBAH REKAM MEDIK</h3>
          <form action="{{ route('karyawan_biodata.karyawan_data.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-6">

                 <div class="form-group">
                  <label>Tinggi Badan</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Berat Badan</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>
               
                 <div class="form-group">
                  <label>Hemoglobin</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Leukosit</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Trombosit</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Hematokrit</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Eritrosit</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>LED</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Glukosa Puasa</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>HbA1C</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Ureum</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group">
                  <label>Keluhan Medis</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required>{{ old('risalah') }}</textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>

                
              </div>

              <div class="col-6">

                 <div class="form-group">
                  <label>Creatinin</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>


                 <div class="form-group">
                  <label>Asam Urat</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Kolesterol Total</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>HDL Kolesterol</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>LDL Kolesterol</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Trigliserida</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>SGOT</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>SGPT</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Gamma GT</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Sistole</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Diastole</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="delegasi" value="{{ old('delegasi') }}" placeholder="" required autofocus>
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
                      <span class="invalid-feedback d-block" role="alert">
                          <strong>{{ $errors->first('dokumen') }}</strong>
                      </span>
                  @endif
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
