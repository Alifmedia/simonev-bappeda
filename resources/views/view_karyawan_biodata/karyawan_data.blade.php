@extends('view_karyawan_biodata.karyawan')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" action="" method="get">
      
      <div class="container mt-4">
      @include('template.flash')
      <div class="card">
        <div class="card-body">
          <center><h6 class="card-title">Selamat Datang <b>{{ $data->Nama }}</b></h6></center>
          <center>
          <h3 class="card-title">BIODATA KARYAWAN</h3></center><br>
          <br>


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
                        class="form-control{{ $errors->has('delegasi') ? ' is-invalid':''}}" name="nama" 
                        value="{{ $data->Nama }}" 
                        placeholder="" 
                        required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

               


               

             
               
                
              

               <div class="form-group">
                  <label>TEMPAT LAHIR</label>
                  <input type="text" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="tempat_lahir" value="{{ $data->Tempat_Lahir }}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label>TANGGAL LAHIR</label>
                  <input type="date" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="tanggal_lahir" value="{{ $data->Tanggal_Lahir}}" placeholder="" required autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                  <div class="form-group">
                  <label>ALAMAT</label>
                   <input type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ $data->Alamat }}" placeholder="Alamat" required autofocus>
                  @if ($errors->has('alamat'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>


                 <div class="form-group">
                  <label >KECAMATAN</label>
                  <select class="form-control {{ $errors->has('kecamatan') ? ' is-invalid' : '' }}" name="kecamatan" id="kecamatan"  required>
                    <option value="" class="default" >Semua</option>
                     @foreach ($kecamatan as $value)
                    <option value="{{ $value->id }}" 
                                   {{ old('kecamatan') == $value->id?'selected':''}}>{{ $value->nama }} 
                     </option>
                     @endforeach
                  </select>
                   @if ($errors->has('kecamatan'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('kecamatan') }}</strong>
                      </span>
                  @endif
                </div>


               
               

                
               
               
                  
               
                



               
              

               
                
              </div>

              <div class="col-6">


               

                 <div class="form-group">
                  <label>NO KTP</label>
                  <input type="number" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="ktp" value="{{ $data->No_KTP }}" placeholder="" autofocus>
                  
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label>NOMOR HANDPHONE</label>
                  <input type="number" class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="no_handphone"  value="{{ $data->No_Handphone }}" placeholder=""  autofocus> 
                  

                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('no_handphone') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label>STATUS NIKAH</label>
                  <input type="text" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="status_nikah" value="{{ $data->Status_Nikah }}" placeholder="" autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
                      </span>
                  @endif
                </div>

               


                  <div class="form-group">
                  <label>EMAIL</label>
                  <input type="text" class="form-control{{ $errors->has('delegasi') ? ' is-invalid' : '' }}" name="email" value="{{ $data->No_BPJSKerja }}" placeholder=""  autofocus>
                  @if ($errors->has('delegasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('delegasi') }}</strong>
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
      </div>
    </form>

    {{-- Table --}}
    <br>
   
   
  </div>
 

@endsection
