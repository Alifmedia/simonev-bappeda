@extends('master.app')

@section('title', 'E-MONEV APLIKASI')

@section('content')
  <div id="akomodasi-add">
    <div class="nav-tabs-flat">
      <a href="{{ route('supervisor.dpa.pending') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
        Back
      </a>
    </div>



    <div class="container mt-4" align="center">
      @include('template.flash')
      <div class="card">
        <div class="card-body">
          <h3 align="center" class="card-title">EDIT DPA</h3><br><br>


      <form action="{{ route('supervisor_dpa.dpa.update', [$data->id,$data->dusun_id]) }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row" >
          <div class="col-12" >
            
            <div class="form-group">
                  <label class="col-sm-8 col-form-label-sm">SUBKEGIATAN</label>
                  <input type="text" 
                        class="form-control-sm col-sm-10 " 
                        value="{{ $data->dusun->dusun_kode}}---{{ $data->dusun->nama }}" disabled >
                        
                 
                </div>


            <div class="form-group" >
            <label class="col-sm-8 col-form-label-sm">OPD</label>
            <select class="form-control-sm col-sm-10"  name="sektoral" >
              <option value="0" >Semua</option>
              @foreach ($sektoral as $key => $value)
                <option value="{{ $value->id }}">{{ $value->nama }}</option>
              @endforeach
            </select>
           </div>





        </div>
      </div>


      <div class="row">
        <div class="col-6">
          
          <div class="form-group">
            <label  class="col-form-label-sm">TAHUN APBK</label>
            <select class="form-control-sm col-sm-3"  name="hal">
              <option value="0">Semua</option>
              @foreach ($hal as $key => $value)
                <option value="{{ $value->id }}" >{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>
          <br>

       

             <div class="form-group">
                  <label class="col-sm-8 col-form-label-sm">BELANJA OPERASI(RP)</label>
                  <input class="form-control-lg col-sm-9" type="number" class="form-control{{ $errors->has('bel_operasi') ? ' is-invalid' : '' }}" name="bel_operasi" value="{{ $data->bel_operasi }}" placeholder="" >
                  @if ($errors->has('bel_operasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('bel_operasi') }}</strong>
                      </span>
                  @endif
                </div>


              
                 <div class="form-group">
                  <label class="col-sm-8 col-form-label-sm">BELANJA MODAL(RP)</label>
                  <input class="form-control-lg col-sm-9" type="number" class="form-control{{ $errors->has('bel_modal') ? ' is-invalid' : '' }}" name="bel_modal" value="{{ $data->bel_modal }}" placeholder=""  >
                  @if ($errors->has('bel_modal'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('bel_modal') }}</strong>
                      </span>
                  @endif
                </div>

                 <div class="form-group">
                  <label class="col-sm-8 col-form-label-sm">LOKASI</label>
                  <input class="form-control-lg col-sm-9" type="text" class="form-control{{ $errors->has('lokasi') ? ' is-invalid' : '' }}" name="lokasi" value="{{ $data->lokasi }}" placeholder=""  >
                  @if ($errors->has('lokasi'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('lokasi') }}</strong>
                      </span>
                  @endif
                </div>

              </div>

          <div class="col-6">

           <div class="form-group">
            <label  class="col-form-label-sm">JENIS APBK</label>
            <select class="form-control-sm col-sm-3"  name="unsur" >
              <option value="0">Semua</option>
              @foreach ($unsur as $key => $value)
                <option value="{{ $value->id }}">{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>
          <br>
                 <div class="form-group">
                  <label class="col-sm-8 col-form-label-sm">BELANJA TIDAK TERDUGA(RP)</label>
                  <input class="form-control-lg col-sm-9" type="number" class="form-control{{ $errors->has('bel_takterduga') ? ' is-invalid' : '' }}" name="bel_takterduga" value="{{ $data->bel_takterduga }}" placeholder=""  >
                  @if ($errors->has('bel_takterduga'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('bel_takterduga') }}</strong>
                      </span>
                  @endif
                </div>

               
                 <div class="form-group">
                  <label class="col-sm-8 col-form-label-sm">BELANJA TRANSFER(RP)</label>
                  <input class="form-control-lg col-sm-9"  type="number" class="form-control{{ $errors->has('bel_transfer') ? ' is-invalid' : '' }}" name="bel_transfer" value="{{ $data->bel_transfer}}" placeholder=""  >
                  @if ($errors->has('bel_transfer'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('bel_transfer') }}</strong>
                      </span>
                  @endif
                </div>

               
                <div class="form-group">
                  <label class="col-sm-8 col-form-label-sm">SUMBER DANA</label>
                    <select class="form-control-lg col-sm-9" class="custom-select" name="bagian">
                      <option value=""></option>
                         @foreach ($bagian as $key => $value)
                      <option value="{{ $value->id }}"> {{ $value->nama }}</option>
                         @endforeach
                    </select>
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
