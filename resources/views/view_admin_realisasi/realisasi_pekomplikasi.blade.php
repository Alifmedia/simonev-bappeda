@extends('master.app')

@section('title', 'LEVEL KOMPLIKASI')

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
                <h3 class="card-title">PENANGANAN DAN TINDAKAN LEVEL KOMPLIKASI</h3> <br><br>
                <form action="{{ route('admin.rekammedik.prosesPekomplikasian', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NOMOR REKAM MEDIK</label>
                                <input class="form-control" value="{{ $data->no_registrasi }}" disabled>
                            </div>

                            <div class="form-group">
                            <label>DAFTAR KOMORBID</label>
                            <ul class="list-group" id="selected-pemangku">
                              @foreach ($data->pemangku as $key => $value)
                                <li class="list-group-item d-flex justify-content-between align-items-center py-2" data-id="{{ $value->id }}">
                                  {{ $value->nama }} 
                                  <button type="button" class="btn btn-link p-0 hapus-pemangku-btn">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                  </button>
                                </li>
                              @endforeach
                            </ul>
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
                                          <input type="checkbox" name="pemangku[]" class="custom-control-input pemangku-checkbox" value="{{ $value->id }}"
                                                 data-value="{{ $value->nama }} - {{ $value->nik }}" id="pemangku-{{ $value->id }}"
                                                 {{ in_array($value->id ,$data->pemangku->pluck('id')->toArray()) ? 'checked' : '' }}>
                                          <label class="custom-control-label" for="pemangku-{{ $value->id }}">{{ $value->nama }} - {{ $value->nik }}</label>
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
                                <label>INSTRUKSI MEDIS KOMPLIKASI</label>
                                                           
                                <textarea class="form-control" name="instruksikompli" rows="5"></textarea>
                            </div>

                          
                           
                        </div>
                        <div class="col-md-6">
                           <h5 align="center"><b>REKAM MEDIK SELANJUTNYA</b></h5>
                            <div class="form-group">
                                <label>TANGGAL</label>
                                <input type="date" class="form-control" value="{{ $data->tanggal_konsultasi }}" name="tanggal_konsultasi">
                            </div>
                            <div class="form-group">
                              <label>JAM</label>
                              <input type="time" class="form-control" value="{{ $data->pukul_konsultasi }}" name="pukul_konsultasi">
                            </div>


                          
                         <!--  <div class="form-group">
                              <label>Notulensi</label>
                              <div class="custom-file">
                                <input type="file" name="notulensi" class="custom-file-input" id="doc-upload">
                                <label class="custom-file-label form-control" for="doc-upload">Upload Dokumen</label>
                              </div>
                              <small class="text-muted">File berupa pdf, zip, atau rar</small>
                          </div>
                          <div class="form-group">
                            <label>Tahapan</label>
                            <div id="form-tahapan"></div>
                            <button type="button" class="btn btn-light" id="tambah-tahapan-btn">
                              <i class="fa fa-plus" aria-hidden="true"></i> Tambah Tahapan
                            </button>

                          </div> -->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> KOMPLIKASI</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
