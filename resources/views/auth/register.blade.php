@extends('master.blank')


{{-- 2 SECTION INI AKAN DISERAP PADA EXTENDS MASTER.BLANK DIATASNYA --}}

@section('title', 'ULKP')

@section('content')
  {{-- AWAL LOGIN CARD 1 KOLOM --}}
  <div class="login-card">
    <div class="card">
      <div class="card-body">
        
        {{-- AWAL LOGO DIATAS FORM DAN --}}
        {{-- DIREKTORI ASSET = PUBLIC --}}
        <div class="image-logo">
         <img src="{{ asset('images/pancacita.png') }}" alt="Card image cap"> 
        </div>
        {{-- AKHIR LOGO DIATAS FORM  --}}


        {{-- AWAL FORM --}}
        <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
          @csrf

           {{-- AWAL BARIS 2 KOLOM --}}
          <div class="row">

             {{-- AWAL KOLOM 1 --}}
            <div class="col-md-6">
              
              {{-- Teks Nama --}}
              <div class="form-group">
                <label for="email">Nama</label>
                <input type="text" 
                       class="form-control{{$errors->has('nama')?'is-invalid':''}}" 
                       id="nama" 
                       name="nama" 
                       placeholder="Nama" 
                       value="{{old('nama')}}" 
                       required>

                @if ($errors->has('nama'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                @endif
              </div>

              {{-- Numerik NIK --}}
              <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" id="nik" name="nik" value="{{ old('nik') }}" placeholder="NIK" required>
                @if ($errors->has('nik'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nik') }}</strong>
                    </span>
                @endif
              </div>

              {{-- Radio Kelamin --}}
              <div class="form-group">
                <label>Jenis Kelamin</label><br>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="jenis_kelamin1" name="jenis_kelamin" class="custom-control-input" value="1" {{ old('jenis_kelamin') == 1 ? 'selected' : '' }} required>
                  <label class="custom-control-label" for="jenis_kelamin1">Laki-Laki</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="jenis_kelamin2" name="jenis_kelamin" class="custom-control-input" value="0" {{ old('jenis_kelamin') == 0 ? 'selected' : '' }} required>
                  <label class="custom-control-label" for="jenis_kelamin2">Perempuan</label>
                </div>
                @if ($errors->has('jenis_kelamin'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                    </span>
                @endif
              </div>

              {{-- Teks Tempat Lahir --}}

              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control{{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir" required>
                @if ($errors->has('tempat_lahir'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                    </span>
                @endif
              </div>

              {{-- Teks Tanggal Lahir --}}

              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="date-picker form-control{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Tanggal Lahir" required>
                @if ($errors->has('tanggal_lahir'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                    </span>
                @endif
              </div>


              {{-- File Img KTP --}}
              <div class="form-group">
                <label>Upload KTP</label>
                <div class="custom-file">
                  <input type="file" 
                         name="ktp" 
                        class="custom-file-input" 
                           id="doc-upload" 
                      accept="image/*">
                      
                  <label class="custom-file-label form-control" for="doc-upload">Upload KTP</label>
                </div>
              </div>

              {{-- Seleksi-Option Unsur --}}
              <div class="form-group">
                <label>Unsur</label>
                <select class="form-control{{ $errors->has('unsur') ? ' is-invalid' : '' }}" name="unsur" id="unsur" required>
                  <option value="">Pilih Unsur</option>
                  @foreach ($unsur as $value)
                    <option value="{{ $value->id }}" {{ old('unsur') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
                  @endforeach
                </select>
                @if ($errors->has('unsur'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('unsur') }}</strong>
                    </span>
                @endif
              </div>


              {{-- Seleksi-Option Kabupaten --}}
              <div class="form-group">
                <label>Kabupaten</label>
                <select class="form-control{{$errors->has('kabupaten')?'is-invalid':''}}"         name="kabupaten" 
                           id="kabupaten">

                  //OPTION PERTAMA
                  <option value="" 
                          class="default">Pilih Kabupaten
                  </option>

                  //OPTION KEDUA DAN SETERUSNYA
                  @foreach($alamat['kabupaten'] as $value)
                  <option value="{{$value->id}}"
                          {{old('kabupaten')==$value->id?'selected':''}}>{{$value->nama}}
                  </option>
                  @endforeach
                </select>
                
                @if($errors->has('kabupaten'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$errors->first('kabupaten') }}</strong>
                    </span>
                @endif
              </div>
            </div>
             {{-- AKHIR KOLOM 1 --}}




            {{-- AWAL KOLOM 2 --}}
            <div class="col-md-6">

              {{-- Seleksi-Option Kecamatan --}}
              <div class="form-group">
                <label>Kecamatan</label>
                <select class="form-control{{$errors->has('kecamatan')?'is-invalid':''}}"
                         name="kecamatan" 
                           id="kecamatan">

                  <option value="" 
                          class="default">Pilih Kecamatan
                  </option>
                </select>
                @if ($errors->has('kecamatan'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('kecamatan') }}</strong>
                    </span>
                @endif
              </div>


              <div class="form-group">
                <label>Kemukiman</label>
                <select class="form-control{{ $errors->has('kemukiman') ? ' is-invalid' : '' }}" name="kemukiman" id="kemukiman">
                  <option value="" class="default">Pilih Kemukiman</option>
                </select>
                @if ($errors->has('kemukiman'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('kemukiman') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-group">
                <label>Gampong</label>
                <select class="form-control{{ $errors->has('gampong') ? ' is-invalid' : '' }}" name="gampong" id="gampong">
                  <option value="" class="default">Pilih Gampong</option>
                </select>
                @if ($errors->has('gampong'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$errors->first('gampong')}}</strong>
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

              <div class="form-group">
                <label for="email">Username(Email/Nama)</label>
                <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                id="email" name="email" placeholder="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label for="password-confirm">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Konfirmasi Password" required>
              </div>
            </div>
            {{-- AKHIR KOLOM 2 --}}

          </div>
          {{-- AKHIR BARIS 2 KOLOM --}}

          {{-- <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
          </div> 
          --}}

          <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </form>
        {{-- AKHIR FORM --}}

        <p class="mt-3 text-center">Sudah punya akun? silahkan 
          <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
        </p>
      </div>
    </div>
  </div>
   {{-- AKHIR LOGIN CARD 1 KOLOM --}}



  {{-- AWAL CARD 1 KOLOM UNTUK PERGANTIAN SLIDE --}}
  <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      @for ($i=0; $i < 5; $i++)
        <div class="carousel-item {{ $i == 0 ? 'active' : ''}}">
          <img class="d-block" src="{{ asset('images/slides/background'.$i.'.jpg') }}" alt="Slide {{$i}}">
        </div>
      @endfor
    </div>
  </div>
  {{-- AKHIR CARD 1 KOLOM UNTUK PERGANTIAN SLIDE --}}

@endsection
