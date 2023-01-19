@extends('master.app')

@section('title', 'ULKP Penjadwalan Konsultasi')

@section('content')
<div id="akomodasi-add">
    <div class="nav-tabs-flat">
        <a href="{{ route('admin.konsultasi.terverifikasi') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
            Back
        </a>
    </div>
    <div class="container mt-4">
        @include('template.flash')
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Penjadwalan Konsultasi</h3>
                <form action="{{ route('admin.konsultasi.prosesPenjadwalan', $data->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Registrasi</label>
                                <input class="form-control" value="{{ $data->no_registrasi }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Fasilitator Konsultasi</label>
                                <select class="custom-select" name="administrator">
                                    <option value="">Pilih Fasilitator</option>
                                    @foreach ($admins as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                              <label>Ruangan</label>
                              <select class="custom-select" name="ruangan">
                                  <option value="">Pilih Ruangan</option>
                                  @foreach ($ruang as $key => $value)
                                  <option value="{{ $value->id }}">{{ $value->instansi }}, {{ $value->nama }}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Konsultasi</label>
                                <input type="date" class="form-control" value="{{ $data->tanggal_konsultasi }}" name="tanggal_konsultasi">
                            </div>
                            <div class="form-group">
                              <label>Pukul Konsultasi</label>
                              <input type="time" class="form-control" value="{{ $data->pukul_konsultasi }}" name="pukul_konsultasi">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Jumlah Delegasi</label>
                              <input type="number" class="form-control" value="{{ $data->jumlah_delegasi }}" name="jumlah_delegasi">
                          </div>
                          <div class="form-group">
                            <label>Pemangku Kepentingan</label>
                            <ul class="list-group" id="selected-pemangku"></ul>
                            <button type="button" class="btn btn-light mt-3" data-toggle="modal" data-target="#pemangkuModal">
                              <i class="fa fa-plus" aria-hidden="true"></i> Pilih Pemangku Kepentingan
                            </button>

                            <div class="modal fade" id="pemangkuModal" tabindex="-1" role="dialog" aria-labelledby="pemangkuModalTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="pemangkuModalTitle">Pemangku Kepentingan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    @foreach ($pemangku as $key => $value)
                                      <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                          <input type="checkbox" name="pemangku[]" class="custom-control-input pemangku-checkbox" value="{{ $value->id }}" data-value="{{ $value->nama }} - {{ $value->nik }}" id="pemangku-{{ $value->id }}">
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

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Jadwalkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
