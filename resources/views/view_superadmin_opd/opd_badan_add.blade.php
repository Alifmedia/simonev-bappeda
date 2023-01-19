@extends('master.app')

@section('title', 'E-Monev APP')

@section('content')
  <div id="admin-add">
    <div class="nav-tabs-flat">
      <a href="{{ route('superadmin.opd.badan') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
        Back
      </a>
    </div>
    <div class="container mt-4">
      @include('template.flash')
      <div class="card">
        <div class="card-body">
          <h3 class="card-title" align="center">TAMBAH BADAN</h3>
          <form class="" action="{{ route('superadmin.simpanBadan') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
             
              <div class="col-md-6">
<!-- 
                 <div class="form-group">
                  <label for="email">NAMA</label>
                  <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Email atau Username" value="{{ old('email') }}" required>
                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div> -->
<!-- 
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Password" required>
                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div> -->
               <!--  <div class="form-group">
                  <label for="password-confirm">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Konfirmasi Password" required>
                </div>

                <div class="form-group">
                  <label for="nik">NIP</label>
                  <input type="number" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" id="nik" value="{{ old('nik') }}" name="nik" placeholder="NIK" required>
                  @if ($errors->has('nik'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('nik') }}</strong>
                      </span>
                  @endif
                </div> -->

                <div class="form-group">
                  <label for="email">Nama</label>
                  <input type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" id="nama" value="{{ old('nama') }}" name="nama" placeholder="Nama" required>
                  @if ($errors->has('nama'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('nama') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                <label>OPD</label>
                <select class="form-control{{ $errors->has('sektoral') ? ' is-invalid' : '' }}" name="sektoral" id="sektoral" required>
                  <option value="">Pilih OPD</option>
                  @foreach ($sektoral as $value)
                    <option value="{{ $value->id }}" {{ old('sektoral') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
                  @endforeach
                </select>
                @if ($errors->has('sektoral'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('unsur') }}</strong>
                    </span>
                @endif
              </div>

             
              


              <!--   <div class="form-group">
                  <label>Upload KTP</label>
                  <div class="custom-file">
                    <input type="file" name="ktp" class="custom-file-input" id="doc-upload" accept="image/*">
                    <label class="custom-file-label form-control" for="doc-upload">Upload KTP</label>
                    <span>
                      <strong>Ukuran file tidak boleh lebih dari 100kb</strong>
                    </span>
                  </div>

                </div> -->

               
               


              </div>


              <div class="col-md-6">

                 

               <!--   <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control{{ $errors->has('unsur') ? ' is-invalid' : '' }}" name="unsur" id="unsur" required>
                  <option value="">Pilih Jenis Kelamin</option>
                  @foreach ($unsur as $value)
                    <option value="{{ $value->id }}" {{ old('unsur') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
                  @endforeach
                </select>
                @if ($errors->has('unsur'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('unsur') }}</strong>
                    </span>
                @endif
              </div> -->


              

                <div class="form-group">
                  <label for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" class="form-control{{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir" required>
                  @if ($errors->has('tempat_lahir'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('tempat_lahir') }}</strong>
                      </span>
                  @endif
                </div>


                   <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" class="date-picker form-control{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Tanggal Lahir" required>
                  @if ($errors->has('tanggal_lahir'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                      </span>
                  @endif
                </div>

               
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" id="alamat" value="{{ old('alamat') }}"  name="alamat" placeholder="Alamat" required>
                  @if ($errors->has('alamat'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('alamat') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="no_handphone">No Handphone</label>
                  <input type="number" class="form-control{{ $errors->has('no_handphone') ? ' is-invalid' : '' }}" id="no_handphone" name="no_handphone" value="{{ old('no_handphone') }}" placeholder="No Handphone" required>
                  @if ($errors->has('no_handphone'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('no_handphone') }}</strong>
                      </span>
                  @endif
                </div>

               
                <!-- <div class="form-group">
                  <label>Operator Kecamatan</label>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="1" name="operator_kecamatan" id="operator_kecamatan">
                    <label class="custom-control-label" for="operator_kecamatan">Pengguna merupakan operator kecamatan</label>
                  </div>
                </div>  -->
                <button type="submit" class="btn btn-primary float-right">Tambah</button>
              </div>



            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
