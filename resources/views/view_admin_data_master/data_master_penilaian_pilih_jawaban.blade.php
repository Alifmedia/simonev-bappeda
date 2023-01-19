@extends('master.app')

@section('title', 'Pilih Jawaban')

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
                <h3 class="card-title">Pilih Jawaban</h3>
                
                <form action="{{route('admin.master.penilaian.updateJawaban', $soal->id) }}" 
                      method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Soal</label>
                              <input class="form-control" 
                                      name="soal"  
                               placeholder="Soal" 
                                     value="{{$soal->soal}}">
                          </div>
                          
                          <div class="form-group">
                            <label>Jawaban</label>
                            <table class="table">
                              
                              <thead>
                                <tr>
                                  <th scope="col">Jawaban</th>
                                  <th scope="col">Bobot</th>
                                  <th scope="col">Pilihan</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($jawaban as $key =>$value)
                                <tr>
                                  <td>{{$value->jawaban}}</td>
                                  <td>{{$value->bobot}}</td>
                                  <td><input type="checkbox" 
                                             name="check[]" 
                                            value="{{$value->id}}" 
                                            class="check">
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>


                            </table>     
                          </div>
                          
                        </div>
                        <div class="col-md-6">

                          
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Pilih</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
