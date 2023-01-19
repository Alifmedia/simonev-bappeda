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
          <h3 align="center" class="card-title">EDIT TUJUAN & INDIKATOR</h3><br><br>


   
    
      <form action="{{ route('karyawan_renstra.tujuansasaran.update',[$renstra_id, $tujuan_id]) }}" method="post" enctype="multipart/form-data">
            @csrf
       <br>



        </div>
<br><br>



        <div class="row">
          <div class="col-12">
          
          
       
        

           
            
              <br>
          
                  
            <div class="form-group">
              <label></label>
          
              

       
      
         @foreach($data as $key => $value)

         <div class="form-group" align="center"> 
           
            <tr>
            <td align="margin-left">
             
                <label for="filter3">PERIODE</label>
                <select class="form-control-sm col-sm-2 " id="filter3" name="periode">
                  <option value="0">Semua</option>
                  @foreach ($periode as $key => $vale)
                    <option value="{{ $vale->id }}" {{ app('request')->input('periode') == $vale->id ? 'selected' : '' }}>{{ $vale->periode_rentang }}</option>
                  @endforeach
                </select>
           
            </td>

            </tr>

            <br><br>



            <tr>
            <td align="margin-left">
             
                <textarea name="tujuan_nama" cols="90" rows="3" value="{{ $value->tujuan_nama }}" placeholder="">{{ $value->tujuan_nama }}</textarea>
            </td>

            </tr>

            <br><br>
              @foreach($value->indikatortujuan as $key =>$val)
              
              <tr>
              
              <td align="margin-left">
              <input type="text" class="form-control-sm col-sm-8 " name="indikator[]" value="{{ $val->indikatortujuan_nama }}" >
              </td>

              <td>
              <label class="col-sm-1.5 col-form-label-sm">Satuan</label>
              <input type="text" class="form-control-sm col-sm-1 " name="satuan[]" value="{{ $val->indikatortujuan_satuan }}" placeholder="">
              </td>

              <td>
              <label class="col-sm-1.5 col-form-label-sm">Data Awal</label>
              <input type="text" class="form-control-sm col-sm-1 " name="nilaiawal[]" value="{{ $val->indikatortujuan_nilaiawal }}" placeholder="">
              </td>

              </tr>

               <tr>
                <td>
                                          
                <input type="text" class="form-control-sm col-sm-1" name="tahun1[]"   value="2023" placeholder="2023" disabled>
                </td>

                <td>
                <input type="text" class="form-control-sm col-sm-1 " name="target1[]" value="{{ $val->indikatortujuan_target1 }}" placeholder="target" >
                </td>

                <td>
                <input type="text" class="form-control-sm col-sm-1 " name="tahun2[]" value="2024" placeholder="2024" disabled>
                </td>

                <td>
                <input type="text" class="form-control-sm col-sm-1 " name="target2[]" value="{{ $val->indikatortujuan_target2 }}" placeholder="target">
                </td>

                <td>
                <input type="text" class="form-control-sm col-sm-1 " name="tahun3[]" value="2025" placeholder="2025" disabled>
                </td>

                <td>
                  <input type="text" class="form-control-sm col-sm-1 " name="target3[]" value="{{$val->indikatortujuan_target3 }}" placeholder="target">
                </td>

                                         
                                           
                <td>
                <input type="text" class="form-control-sm col-sm-1 " name="tahun4[]" value="2026" placeholder="2026" disabled>
                </td>

                <td>
                <input type="text" class="form-control-sm col-sm-1 " name="target4[]" value="{{ $val->indikatortujuan_tahun4 }}" placeholder="target">
                </td>

                </tr>


              <br> <br>

              @endforeach

              @endforeach

              </div>




              <div class="form-group" align="center"> 
              <br>
              <br>
              <br>   
                  <div id="form-sasaran-renstra"></div>
                  
                    <button type="button" class="btn btn-light" id="tambah-sasaran-renstra-btn">
                              <i class="fa fa-plus" aria-hidden="true"></i> Tambah INDIKATOR
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
