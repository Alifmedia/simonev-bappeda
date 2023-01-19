@extends('master.app')

@section('title', 'HFC Perubahan Rekam Medik')

@section('content')
  <div id="akomodasi-add">
    <div class="nav-tabs-flat">
      <a href="{{ route('karyawan_rekammedik.karyawan_rm') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
        Back
      </a>
    </div>
    <div class="container mt-4">
      @include('template.flash')
      <div class="card">
        <div class="card-body"><center>
          <h3 class="card-title">EDIT REKAM MEDIK</h3></center>

          
          <form action="{{ route('karyawan_rekammedik.karyawan_rm.update', $data->id ) }}" method="post" enctype="multipart/form-data">
            @csrf
                            
            <div class="row">
              <div class="col-6">
                 <div class="form-group">
                  <label>Tinggi Badan</label>
                  <input type="number" class="form-control{{ $errors->has('tinggibadan') ? ' is-invalid' : '' }}" name="TinggiBadan" value="{{ $data->RM_TinggiBadan }}" placeholder="TinggiBadan">
                  @if ($errors->has('tinggibadan'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('tinggibadan') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Berat Badan</label>
                  <input type="number" class="form-control{{ $errors->has('beratbadan') ? ' is-invalid' : '' }}" name="BeratBadan" value="{{ $data->RM_BeratBadan }}" placeholder="beratbadan" >
                  @if ($errors->has('beratbadan'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('beratbadan') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Lingkar Perut</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="LingkarPerut" value="{{ $data->RM_LingkarPerut }}" placeholder="lingkarperut" >
                  @if ($errors->has('lingkarperut'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('perut') }}</strong>
                      </span>
                  @endif
                </div>
               
                 <div class="form-group">
                  <label>Hemoglobin</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="Hemoglobin" value="{{ $data->RM_Hemoglobin }}" placeholder="Hemoglobin"  >
                  @if ($errors->has('hemoglobin'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('hemoglobin') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Leukosit</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="Leukosit" value="{{ $data->RM_Leukosit }}" placeholder="Leukosit" >
                  @if ($errors->has('Leukosit'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('Leukosit') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Trombosit</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="Trombosit" value="{{ $data->RM_Trombosit }}" placeholder="Trombosit"  >
                  @if ($errors->has('trombosit'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('trombosit') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Hematokrit</label>
                  <input type="number" class="form-control{{ $errors->has('Hematokrit') ? ' is-invalid' : '' }}" name="Hematokrit" value="{{ $data->RM_Hematokrit}}" placeholder="Hematokrit"  >
                  @if ($errors->has('Hematokrit'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('hematokrit') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Eritrosit</label>
                  <input type="number" class="form-control{{ $errors->has('eritrosit') ? ' is-invalid' : '' }}" name="Eritrosit" value="{{ $data->RM_Eritrosit }}" placeholder=""  >
                  @if ($errors->has('eritrosit'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('eritrosit') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>LED</label>
                  <input type="number" class="form-control{{ $errors->has('led') ? ' is-invalid' : '' }}" name="LED" value="{{ $data->RM_LED }}" placeholder="LED"  >
                  @if ($errors->has('led'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('led') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Glukosa Puasa</label>
                  <input type="number" class="form-control{{ $errors->has('Glukosapuasa') ? ' is-invalid' : '' }}" name="GlukosaPuasa" value="{{ $data->RM_GlukosaPuasa }}" placeholder="glukosapuasa"  >
                  @if ($errors->has('glukosapuasa'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('glukosapuasa') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>HbA1C</label>
                  <input type="number" class="form-control{{ $errors->has('hba1c') ? ' is-invalid' : '' }}" name="HbA1C" value="{{ $data->RM_HbA1C }}" placeholder="HbA1C"  >
                  @if ($errors->has('hba1c'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('hba1c') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Ureum</label>
                  <input type="number" class="form-control{{ $errors->has('ureum') ? ' is-invalid' : '' }}" name="Ureum" value="{{ $data->RM_Ureum }}" placeholder="Ureum"  >
                  @if ($errors->has('ureum'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('ureum') }}</strong>
                      </span>
                  @endif
                </div>
               

                
              </div>

              <div class="col-6">

                 <div class="form-group">
                  <label>Creatinin</label>
                  <input type="number" class="form-control{{ $errors->has('creatinin') ? ' is-invalid' : '' }}" name="Creatinin" value="{{ $data->RM_Creatinin }}" placeholder="Creatinin"  >
                  @if ($errors->has('creatinin'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('creatinin') }}</strong>
                      </span>
                  @endif
                </div>


                 <div class="form-group">
                  <label>Asam Urat</label>
                  <input type="number" class="form-control{{ $errors->has('asamurat') ? ' is-invalid' : '' }}" name="AsamUrat" value="{{ $data->RM_AsamUrat }}" placeholder="Asam Urat"  >
                  @if ($errors->has('asamurat'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('asamurat') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Kolesterol Total</label>
                  <input type="number" class="form-control{{ $errors->has('Kolesteroltotal') ? ' is-invalid' : '' }}" name="KolesterolTotal" value="{{ $data->RM_KolesterolTotal }}" placeholder="Kolesterol Total"  >
                  @if ($errors->has('kolesteroltotal'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('kolesteroltotal') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>HDL Kolesterol</label>
                  <input type="number" class="form-control{{ $errors->has('hdlkolesterol') ? ' is-invalid' : '' }}" name="HDLKolesterol" value="{{ $data->RM_HDLKolesterol}}" placeholder="HDLKolesterol" >
                  @if ($errors->has('hdlkolesterol'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('hdlkolesterol') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>LDL Kolesterol</label>
                  <input type="number" class="form-control{{ $errors->has('ldlkolesterol') ? ' is-invalid' : '' }}" name="LDLKolesterol" value="{{ $data->RM_LDLKolesterol}}" placeholder="LDLKolesterol" >
                  @if ($errors->has('ldlkolesterol'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('ldlkolesterol') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Trigliserida</label>
                  <input type="number" class="form-control{{ $errors->has('Trigliserida') ? ' is-invalid' : '' }}" name="Trigliserida" value="{{ $data->RM_Trigliserida }}" placeholder="Trigliserida"  >
                  @if ($errors->has('trigliserida'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('trigliserida') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>SGOT</label>
                  <input type="number" class="form-control{{ $errors->has('sgot') ? ' is-invalid' : '' }}" name="SGOT" value="{{ $data->RM_SGOT }}" placeholder="SGOT"  autofocus>
                  @if ($errors->has('sgot'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('sgot') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>SGPT</label>
                  <input type="number" class="form-control{{ $errors->has('sgpt') ? ' is-invalid' : '' }}" name="SGPT" value="{{ $data->RM_SGPT }}" placeholder="SGPT"  >
                  @if ($errors->has('sgpt'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('sgpt') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Gamma GT</label>
                  <input type="number" class="form-control{{ $errors->has('Gammagt') ? ' is-invalid' : '' }}" name="GammaGT" value="{{ $data->RM_GammaGT }}" placeholder="GammaGT"  >
                  @if ($errors->has('gammagt'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('gammagt') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Sistole</label>
                  <input type="number" class="form-control{{ $errors->has('sistole') ? ' is-invalid' : '' }}" name="Sistole" value="{{ $data->RM_Sistole }}" placeholder="Sistole"  >
                  @if ($errors->has('sistole'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('sistole') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Diastole</label>
                  <input type="number" class="form-control{{ $errors->has('Diastole') ? ' is-invalid' : '' }}" name="Diastole" value="{{ $data->RM_Diastole }}" placeholder="Diastole"  >
                  @if ($errors->has('diastole'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('diastole') }}</strong>
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
                <button type="submit" class="btn btn-primary float-right">EDIT</button>
                
              </div>
            </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
