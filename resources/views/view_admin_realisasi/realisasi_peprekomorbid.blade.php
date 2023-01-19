@extends('master.app')

@section('title', 'LEVEL PRE-KOMORBID')

@section('content')
<div id="akomodasi-add">
    <div class="nav-tabs-flat">
        <a href="{{ route('admin.realisasi.pending') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
            Back
        </a>
    </div>
    <div class="container mt-4">
        @include('template.flash')
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">REVISI REALISASI</h3>
                <form action="{{ route('admin.rekammedik.prosesPeprekomorbidan', $data->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>NOMOR REKENING</label>
                                <input class="form-control" value="{{ $data->konsultasi->dusun->dusun_kode }}" disabled>
                            </div>


                           <div class="form-group">
                            <label>DAFTAR PRE-KOMORBID</label>
                            <ul class="list-group" id="selected-pemangku"></ul>
                            <button type="button" class="btn btn-light mt-3" data-toggle="modal" data-target="#pemangkuModal">
                              <i class="fa fa-plus" aria-hidden="true"></i> Pilih Komorbid
                            </button>

                            <div class="modal fade" id="pemangkuModal" tabindex="-1" role="dialog" aria-labelledby="pemangkuModalTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="pemangkuModalTitle">PENYAKIT KOMORBID</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    @foreach ($pemangku as $key => $value)
                                      <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                          <input type="checkbox" 
                                                 name="pemangku[]" 
                                                class="custom-control-input pemangku-checkbox" 
                                                value="{{ $value->id }}" 
                                           data-value="{{ $value->nama }} - {{ $value->nik }}" 
                                                   id="pemangku-{{ $value->id }}">
                                          <label class="custom-control-label" 
                                                   for="pemangku-{{ $value->id }}">
                                                   {{ $value->nama }} - {{ $value->nik }}
                                        </label>
                                        </div>
                                      </div>
                                    @endforeach
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="selesai-pilih-pemangku-btn" data-dismiss="modal">Selesai</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>



                          <div class="form-group">
                              <label>KOREKSI</label>
                              <textarea class="form-control" name="instruksiprekom" rows="5">
                                
                              </textarea>
                             
                           </div>

                             </div>

                        <div class="col-md-6">

                          
                         
                            <div class="form-group">
                                <label>TANGGAL REKAM MEDIK(LANJUTAN)</label>
                                <input type="date" class="form-control" value="{{ $data->tanggal_konsultasi }}" name="tanggal_konsultasi">
                            </div>
                            <div class="form-group">
                              <label>JAM REKAM MEDIK(LANJUTAN)</label>
                              <input type="time" class="form-control" value="{{ $data->pukul_konsultasi }}" name="pukul_konsultasi">
                            </div>
                         
                             </div>

                      
                    </div>
                    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> PRE-KOMORBID</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
