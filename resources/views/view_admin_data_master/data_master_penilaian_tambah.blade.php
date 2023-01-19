@extends('master.app')

@section('title', 'Tambah Soal')

@section('content')
<div id="akomodasi-add">
    <div class="nav-tabs-flat">
        <a href="{{ route('admin.master.penilaian') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
            Back
        </a>
    </div>
    <div class="container mt-4">
        @include('template.flash')
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Tambah Soal</h3>
                <form action="{{ route('admin.master.penilaian.simpanSoal') }}" 
                      method="get" 
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Tema</label>
                              <select class="custom-select" 
                                       name="tema">
                                  <option value="">Pilih Tema</option>
                                  @foreach ($tema as $key => $value)
                                  <option value="{{ $value->id }}" 
                                        {{ $value->id == old('tema') ? 'selected' : '' }}>
                                        {{ $value->tema }}
                                  </option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Soal</label>
                              <textarea class="form-control" name="soal"  placeholder="soal"></textarea>
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
