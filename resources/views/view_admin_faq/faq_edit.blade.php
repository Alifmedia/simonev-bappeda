@extends('master.app')

@section('title', 'Sunting FAQ')

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
                <h3 class="card-title">Sunting FAQ</h3>
                <form action="{{ route('admin.faq.update', $data->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Pertanyaan</label>
                        <input class="form-control" name="pertanyaan" value="{{ $data->pertanyaan }}" placeholder="Pertanyaan">
                    </div>
                    <div class="form-group">
                        <label>Jawaban</label>
                        <div id="editor-container">
                          <div id="editor" class="form-control{{ $errors->has('jawaban') ? ' is-invalid' : '' }}">
                            {!! $data->jawaban !!}
                          </div>
                        </div>
                        <textarea name="jawaban" class="d-none" id="markdown-result">{{ $data->jawaban }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Sunting</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
