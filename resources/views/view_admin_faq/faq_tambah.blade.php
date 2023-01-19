@extends('master.app')

@section('title', 'Tambah FAQ')

@section('content')
<div id="akomodasi-add">
    <div class="nav-tabs-flat">
        <a href="{{ route('admin.faq') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
            Back
        </a>
    </div>
    <div class="container mt-4">
        @include('template.flash')
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Tambah FAQ</h3>
                <form action="{{ route('admin.faq.tambah') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Pertanyaan</label>
                        <input class="form-control" name="pertanyaan" value="{{ old('pertanyaan') }}" placeholder="Pertanyaan">
                    </div>
                    <div class="form-group">
                        <label>Jawaban</label>
                        <div id="editor-container">
                          <div id="editor" class="form-control{{ $errors->has('jawaban') ? ' is-invalid' : '' }}">
                            {!! old('jawaban') !!}
                          </div>
                        </div>
                        <textarea name="jawaban" class="d-none" id="markdown-result">{{ old('jawaban') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
