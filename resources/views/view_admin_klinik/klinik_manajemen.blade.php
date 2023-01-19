@extends('view_admin_klinik.klinik')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" action="" method="get">
       

               

      <div class="container mt-4">
      @include('template.flash')
      <div class="card">
        <div class="card-body"><center>
          <h3 class="card-title">MANAJEMEN</h3></center><br>
          <form action="{{ route('admin.klinik.manajemen') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              

              <div class="col-6">
               
                <div class="form-group">
                  <label>FOTO</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required></textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>

                  <div class="form-group">
                  <label>FOTO</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required></textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>

                  <div class="form-group">
                  <label>FOTO</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required></textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>

                  <div class="form-group">
                  <label>FOTO</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required></textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>

                  <div class="form-group">
                  <label>FOTO</label>
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
                  <label>PROFIL dr. SUFRI HALWI</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required></textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>PROFIL dr. X</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required></textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>PROFIL dr. Y</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required></textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>PROFIL dr. Z</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required></textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label>PROFIL dr. D</label>
                  <textarea class="form-control{{ $errors->has('risalah') ? ' is-invalid' : '' }}" name="risalah" rows="5" required></textarea>
                  @if ($errors->has('risalah'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('risalah') }}</strong>
                      </span>
                  @endif
                </div>
              
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
