@extends('master.app')

@section('title', 'HFC APPLICATION SYSTEM')

@section('content')
  <div id="akomodasi-add">
    <div class="nav-tabs-flat">
      <a href="{{ route('karyawan_biodata.karyawan_data') }}">
        
      </a>
    </div>


    <div class="container mt-4">
      @include('template.flash')
      <div class="card">
        <center><h6 class="card-title">Selamat Datang <b>{{ $data->Nama }}</b></h6></center>
        <div class="card-body"><center>
          <h3 class="card-title">BIODATA OPERATOR</h3></center></br></br>

          
         <form action="{{ route('karyawan_biodata.karyawan_data.update', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-6">

                  <div class="form-group">
                  <label>NOMOR INDUK PEGAWAI(NIP)</label>
                  <input type="number" class="form-control{{$errors->has('nik')?' is-invalid':''}}" name="nik" value="{{ $data->NIK }}" placeholder="" required autofocus>
                  @if ($errors->has('nik'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('nik') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>NAMA LENGKAP</label>
                  <input type="text" 
                        class="form-control{{ $errors->has('nama') ? ' is-invalid':''}}" name="nama" 
                        value="{{ $data->Nama }}" 
                        placeholder="" 
                        required autofocus>
                  @if ($errors->has('nama'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('nama') }}</strong>
                      </span>
                  @endif
                </div>

               


               

             
              

               <div class="form-group">
                  <label>TEMPAT LAHIR</label>
                  <input type="text" class="form-control{{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}" name="tempat_lahir" value="{{ $data->Tempat_Lahir }}" placeholder="" required autofocus>
                  @if ($errors->has('tempat_lahir'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('tempat_lahir') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label>TANGGAL LAHIR</label>
                  <input type="date" class="form-control{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}" name="tanggal_lahir" value="{{ $data->Tanggal_Lahir}}" placeholder="" required autofocus>
                  @if ($errors->has('tanggal_lahir'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                      </span>
                  @endif
                </div>

                  <div class="form-group">
                  <label>ALAMAT</label>
                   <input type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ $data->Alamat }}" placeholder="Alamat" required autofocus>
                  @if ($errors->has('alamat'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('alamat') }}</strong>
                      </span>
                  @endif
                </div>


               

               
               

                
               
               
                  
                 
               
              

               
                
              </div>

              <div class="col-6">


               

                 <div class="form-group">
                  <label>NO KTP</label>
                  <input type="number" class="form-control{{ $errors->has('ktp') ? ' is-invalid' : '' }}" name="ktp" value="{{ $data->No_KTP }}" placeholder="" autofocus>
                  
                  @if ($errors->has('ktp'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('ktp') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label>NOMOR HANDPHONE</label>
                  <input type="number" class="form-control{{ $errors->has('no_handphone') ? ' is-invalid' : '' }}" name="no_handphone"  value="{{ $data->No_Handphone }}" placeholder=""  autofocus> 
                  

                  @if ($errors->has('no_handphone'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('no_handphone') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label>STATUS NIKAH</label>
                  <input type="text" class="form-control{{ $errors->has('status_nikah') ? ' is-invalid' : '' }}" name="status_nikah" value="{{ $data->Status_Nikah }}" placeholder="" autofocus>
                  @if ($errors->has('status_nikah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('status_nikah') }}</strong>
                      </span>
                  @endif
                </div>

                


                  <div class="form-group">
                  <label>EMAIL</label>
                  <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $data->Email }}" placeholder=""  autofocus>
                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>


                <div class="form-group">
                  <label>DOKUMEN</label>
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
            <button type="submit" class="btn btn-primary float-right">UPDATE</button>
          </form>




        </div>
      </div>
    </div>
  </div>
@endsection
