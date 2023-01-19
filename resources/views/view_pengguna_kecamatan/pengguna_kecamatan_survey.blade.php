@extends('master.app')

@section('title', 'Pertanyaan')

@section('content')
  <div id="akomodasi-add">
    <div class="nav-tabs-flat">
      <a href="{{ route('pengguna.kecamatan') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
        Back
      </a>
    </div>
    <div class="container mt-4">
      @include('template.flash')
      <div class="card">
        <div class="card-body">


          <form action="{{ route('pengguna.kecamatan.survey.save', $data->id) }}" 
                method="post">
            @csrf
            <div class="row justify-content-center">
              <div class="col-11">
                <h3 class="card-title"><center>INDIKATOR-INDIKATOR PENILAIAN 
                  </center></h3>
                <hr>
                
                 <center><h4 class="m-0"> <b>ASPEK</b> : {{ $data->tema}}({{$data->bobot }})%</h4></center>

               
                <hr>
                 <br>
                @foreach ($data->soal as $key => $value)
                  <div class="form-group">
                    <label><h5><b>{{$key+1}}. {{ $value->soal }}(Bobot : {{ $value->bobot }}%)</b></h5></label>
                    
                    <input type="hidden" 
                           name="soal[{{$key}}]" 
                          value="{{ $value->id }}">

                    <div class="row">
                   
                    <div class="col-md-4">
                   
                    <select class="form-control{{$errors->has('jawaban')?'is-invalid':''}}" name="jawaban[{{$key}}]" required>
                      
                      <option value="">Pilih Jawaban</option>
                        @foreach ($value->jawaban as $jawaban)
                      
                      <option value="{{ $jawaban->id }}" {{ count($value->jawabanSoalKecamatan) && 
                                                                  $value->jawabanSoalKecamatan[0]['jawaban_id'] == $jawaban->id ? 'selected' : '' }}>{{ $jawaban->jawaban }} {{ $value->satuan }}
                      </option>
                      
                        @endforeach
                    </select>
                  </div>


                  <div class="col-md-4">
                  
                  <input type="file" name="dokumen" class="custom-file-input" id="doc-upload" accept="file/*">
                    <label class="custom-file-label form-control" for="doc-upload">Upload Dokumen Pendukung</label>
                    <span>
                      <h7>FILE : Pdf,Zip,Rar | MAX: 1 MB</h7>
                    </span>
                  </div>

                   <div class="col-md-4">
                 
                     <label><h6>DOKUMEN : {{$value->dokumen_pendukung}}</h6>
                     </label>
                  </div>

                  </div>
                  <hr>


                    @if ($errors->has('jawaban['.$key.']'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('jawaban['.$key.']') }}</strong>
                      </span>
                    @endif

                      @if ($errors->has('dokumen'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('dokumen') }}</strong>
                      </span>
                    @endif
                  </div>
                  <br>
                @endforeach
                <button type="submit" class="btn btn-primary float-right">Simpan Jawaban</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
