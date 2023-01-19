@extends('master.app')

@section('title', 'Tambah Pemangku Kepentingan')

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
                <h3 class="card-title">Tambah Pemangku Kepentingan</h3>
                <form action="{{ route('admin.master.pemangku.tambah') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Nama</label>
                              <input class="form-control" name="nama" value="{{ old('nama') }}" placeholder="Nama">
                          </div>
                          <div class="form-group">
                              <label>NIK</label>
                              <input type="number" class="form-control" name="nik" value="{{ old('nik') }}" placeholder="NIK">
                          </div>
                          <div class="form-group">
                              <label>No Handphone</label>
                              <input type="number" class="form-control" name="no_handphone" value="{{ old('no_handphone') }}" placeholder="No Handphone">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Tempat Lahir</label>
                              <input class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir">
                          </div>
                          <div class="form-group">
                              <label>Tanggal Lahir</label>
                              <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Tanggal Lahir">
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
