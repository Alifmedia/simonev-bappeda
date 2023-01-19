@extends('master.app')

@section('title', 'Sunting Penilaian')

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
                <h3 class="card-title">Sunting Penilaian</h3>
                <form action="{{ route('admin.master.penilaian.updateSoal', $data->id) }}" 
                      method="post" 
                     enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Tema</label>
                              <select class="custom-select" name="tema"required>
                                  <option value="">Pilih Tema</option>
                                  @foreach ($temaSoal as $opt)
                                  <option value="{{ $opt->id }}" {{ $opt->id == $data->temaSoal->id ? 'selected' : '' }}>{{ $opt->tema }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Soal</label>
                              <textarea class="form-control{{ $errors->has('soal') ? ' is-invalid' : '' }}" rows="4" placeholder="Soal" name="soal" required>{{ $data->soal}}</textarea>
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
