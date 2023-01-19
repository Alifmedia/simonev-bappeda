@extends('master.app')

@section('title', 'Sunting Peraturan')

@section('content')
<div id="akomodasi-add">
    <div class="nav-tabs-flat">
        <a href="{{ route('admin.master.peraturan') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
            Back
        </a>
    </div>
    <div class="container mt-4">
        @include('template.flash')
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Sunting Peraturan</h3>
                <form action="{{ route('admin.master.peraturan.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Jenis</label>
                              <select class="custom-select" name="jenis">
                                  <option value="">Pilih Jenis</option>
                                  @foreach ($jenis as $key => $value)
                                  <option value="{{ $value->id }}" {{ $value->id == $data->jenis_peraturan_id ? 'selected' : '' }}>{{ $value->nama }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Perihal</label>
                              <select class="custom-select" name="perihal">
                                  <option value="">Pilih Perihal</option>
                                  @foreach ($perihal as $key => $value)
                                  <option value="{{ $value->id }}" {{ $value->id == $data->hal_id ? 'selected' : '' }}>{{ $value->nama }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Nama</label>
                              <input class="form-control" name="nama" value="{{ $data->nama }}" placeholder="Nama">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Tangga Pengesahan</label>
                              <input type="date" class="form-control date-picker" name="tanggal_pengesahan" value="{{ $data->tanggal_pengesahan }}" placeholder="Tangga Pengesahan">
                          </div>
                          <div class="form-group">
                              <label>Dokumen</label>
                              <div class="custom-file">
                                <input type="file" name="dokumen" class="custom-file-input" id="doc-upload" accept="application/pdf">
                                <label class="custom-file-label form-control" for="doc-upload">Upload Dokumen</label>
                                <a href="{{ asset('peraturan/'.$data->lokasi_file) }}" class="btn btn-light mt-3">
                                  <i class="fa fa-file-archive-o" aria-hidden="true"></i> Download File
                                </a>
                              </div>
                          </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Sunting</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
