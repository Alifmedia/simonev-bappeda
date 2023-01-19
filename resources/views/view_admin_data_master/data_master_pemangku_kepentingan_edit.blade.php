@extends('master.app')

@section('title', 'Edit Pemangku Kepentingan')

@section('content')
<div id="akomodasi-add">
    <div class="nav-tabs-flat">
        <a href="{{ route('admin.master.pemangku') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
            Back
        </a>
    </div>
    <div class="container mt-4">
        @include('template.flash')
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Edit Pemangku Kepentingan</h3>
                
                <form action="{{ route('admin.master.pemangku.update', $data->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Nama</label>
                              <input class="form-control" name="nama" value="{{ $data->nama }}" placeholder="Nama">
                          </div>
                          <div class="form-group">
                              <label>NIK</label>
                              <input type="number" class="form-control" name="nik" value="{{ $data->nik }}" placeholder="NIK">
                          </div>
                          <div class="form-group">
                              <label>No Handphone</label>
                              <input type="number" class="form-control" name="no_handphone" value="{{ $data->no_handphone }}" placeholder="No Handphone">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Tempat Lahir</label>
                              <input class="form-control" name="tempat_lahir" value="{{ $data->tempat_lahir }}" placeholder="Tempat Lahir">
                          </div>
                          <div class="form-group">
                              <label>Tanggal Lahir</label>
                              <input type="date" class="form-control" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" placeholder="Tanggal Lahir">
                          </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
