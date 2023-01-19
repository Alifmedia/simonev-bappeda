@extends('master.app')

@section('title', 'Edit Ruang')

@section('content')
<div id="akomodasi-add">
    <div class="nav-tabs-flat">
        <a href="{{ route('admin.master.ruang') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
            Back
        </a>
    </div>
    <div class="container mt-4">
        @include('template.flash')
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Edit Ruang</h3>
                <form action="{{ route('admin.master.ruang.update', $data->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Instansi</label>
                              <input class="form-control" name="instansi" value="{{ $data->instansi }}" placeholder="Instansi">
                          </div>
                          <div class="form-group">
                              <label>Gedung</label>
                              <input class="form-control" name="gedung" value="{{  $data->gedung }}" placeholder="Gedung">
                          </div>
                          <div class="form-group">
                              <label>Nama</label>
                              <input class="form-control" name="nama" value="{{  $data->nama }}" placeholder="Nama">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Lantai</label>
                              <input class="form-control" name="lantai" value="{{  $data->lantai }}" placeholder="Lantai">
                          </div>
                          <div class="form-group">
                              <label>Alamat</label>
                              <input class="form-control" name="alamat" value="{{  $data->alamat }}" placeholder="Alamat">
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
