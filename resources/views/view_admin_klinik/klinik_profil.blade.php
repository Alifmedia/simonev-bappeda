@extends('view_admin_klinik.klinik')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" action="" method="get">
       

            
     

      <div class="container mt-4">
      @include('template.flash')
      <div class="card">
        <div class="card-body"><center>
          <h3 class="card-title">PROFIL KLINIK</h3></center><br>
          <form action="{{ route('admin.klinik.profil') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              

              <div class="col-6">
               
                <div class="form-group">
                  <label>SEJARAH SINGKAT</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required></textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>


                <div class="form-group">
                  <label>FASILITAS</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required></textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>


                
              </div>

              <div class="col-6">

              
                    <div class="form-group">
                  <label>JAM KERJA KLINIK</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required></textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>

                    <div class="form-group">
                  <label>HUBUNGI KAMI</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required></textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>
               <button type="submit" class="btn btn-primary float-right">SIMPAN</button>
              </div>



            </div>


            
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
