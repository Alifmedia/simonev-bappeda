@extends('master.app')

@section('title', 'E-MONEV APLIKASI')

@section('content')
  <div id="akomodasi-add">
    <div class="nav-tabs-flat">
      <a href="{{ route('karyawan.renstra.tujuansasaran') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
        Back
      </a>
    </div>



    <div class="container mt-4" align="center">
      @include('template.flash')
      <div class="card">
        <div class="card-body">
          <h3 align="center" class="card-title">TAMBAH TARGET SASARAN</h3><br><br>


      <form action="{{ route('karyawan_renstra.tujuansasarantarget.save',$id) }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row" >
          <div class="col-12" >

           
           

        </div>
      </div>

<br>


 
          <div class="form-group">
                  <label class="col-sm-1.5 col-form-label-sm">SASARAN</label>
                  <input type="text" size="8px" 
                        class="form-control-sm col-sm-9 " 
                        value="{{ $id }}{{ $nama }}" disabled >
                        
                 
            </div>
<br>

 <div class="row">
          <div class="col-20">

            <td align="margin-left">
              <label class="col-sm-1.5 col-form-label-sm">INDIKATOR</label>
              <input type="text" class="form-control-sm col-sm-4 " name="nama" value="" placeholder="">
            </td>

            <td align="margin-left">
              <label class="col-sm-1.5 col-form-label-sm">SATUAN</label>
              <input type="text" class="form-control-sm col-sm-2 " name="satuan" value="" placeholder="">
            </td>

            <td align="margin-left">
            <label class="col-sm-1.5 col-form-label-sm">NILAI AWAL</label>
              <input type="text" class="form-control-sm col-sm-2 " name="nilaiawal" value="" placeholder="">
            </td>

          
            <br>
                               
          </div>
  </div>

        <div class="row">
          <div class="col-12">

                         
              <br><br>
          
                  
            <div class="form-group">
              <label>TARGET</label>
                  
                  <div id="form-sasaran-renstra-target"></div>
                  
                    <button type="button" class="btn btn-light" id="tambah-sasaran-renstra-target-btn">
                              <i class="fa fa-plus" aria-hidden="true"></i> Tambah Target
                    </button>
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
