@extends('master.app')

@section('title', 'E-MONEV APLIKASI')

@section('content')
  <div id="akomodasi-add">
   

    <div class="nav-tabs-flat">
      <a href="{{ route('karyawan.renstra.program') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
        Back
      </a>
    </div>



    <div class="container mt-4" align="center">
      @include('template.flash')
      <div class="card">
        <div class="card-body">
          <h3 align="center" class="card-title">EDIT PROGRAM RENSTRA</h3><br><br>


      <form action="{{ route('karyawan_renstra.program.update',$renssasarprog_id) }}" method="post" enctype="multipart/form-data">
            @csrf
       


        <div class="row" >
          <div class="col-12" >

            <div class="form-group" >
            <label class="col-sm-8 col-form-label-sm">INDIKATOR SASARAN</label>
            <select class="form-control-sm col-sm-10"  name="sasaran" >
              <option value="0" >Semua</option>
              @foreach ($indikatorrenssasar as $key => $value)
                <option value="{{ $value->id }}" 
                  placeholder="{{ $value->indikator_teks }}">{{ $value->id }}-{{ $value->indikatorrenssasar_indikator }}
                </option>
              @endforeach
            </select>
           </div>

          
         
 
        </div>
      </div>




  
        <div class="row">

          <div class="col-12">

         @foreach ($data as $key => $value)
           
            <td align="margin-left">
              <label class="col-sm-1.5">PROGRAM </label>
              
              <textarea type="number" class="form-control-sm col-sm-11 " cols="1" rows="1"  name="program" value="{{ $value->kemukiman->id }}" disabled>
              {{ $value->kemukiman->nama }}
            </textarea>
           
            </td>



             @foreach ($value->indikatorrenssasarprog as $key => $vali)
                   <br>      <br>

                   <td>  <label >INDIKATOR</label><td/><br><br>
             

              <td align="margin-left">
              <label class="col-sm-1.5">Indikator </label>
              <input type="text" class="form-control-sm col-sm-6 " name="indikator[]" 
              value="{{ $vali->indikatorrenssasarprog_indikator}}" >
           
            </td>

            
            
            <td align="margin-left">
              <label class="col-sm-1.5 col-form-label-sm">Satuan</label>
              <input type="text" class="form-control-sm col-sm-1 " name="satuan[]" value="{{ $vali->indikatorrenssasarprog_satuan }}" >
            </td>

             <td align="margin-left">
              <label class="col-sm-1.5 col-form-label-sm">Nilai Awal </label>
              <input type="number" class="form-control-sm col-sm-1 " name="nilaiawal[]" value="{{ $vali->indikatorrenssasarprog_nilaiawal }}" >
            </td>

            <br> 
              <tr>  
          

          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-1 " name="tahun1[]" value="{{ $vali->indikatorrenssasarprog_tahun1 }}" disabled></font>
         </td>

          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-2 " name="target1[]" value="{{ $vali->indikatorrenssasarprog_target1 }}" ></font>
         </td>
          

          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan1[]" value="{{ $vali->indikatorrenssasarprog_targetkeuangan1 }}" >
                                  </font>


        </td  <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-1 " name="tahun2[]" value="{{ $vali->indikatorrenssasarprog_tahun2 }}" disabled></font>
         </td>

          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-2 " name="target2[]" value="{{ $vali->indikatorrenssasarprog_target2 }}" ></font>
         </td>
          

          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan2[]" value="{{ $vali->indikatorrenssasarprog_targetkeuangan2 }}" ></font>
        </td>


          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-1 " name="tahun3[]" value="{{ $vali->indikatorrenssasarprog_tahun3 }}" disabled></font>
         </td>

          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-2 " name="target3[]" value="{{ $vali->indikatorrenssasarprog_target3 }}" ></font>
         </td>
          

          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan3[]" value="{{ $vali->indikatorrenssasarprog_targetkeuangan3 }}" ></font>
        </td>

          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-1 " name="tahun4[]" value="{{ $vali->indikatorrenssasarprog_tahun4 }}" disabled></font>
         </td>

          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-2 " name="target4[]" value="{{ $vali->indikatorrenssasarprog_target4 }}" ></font>
         </td>
          

          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan4[]" value="{{ $vali->indikatorrenssasarprog_targetkeuangan4 }}" ></font>
        </td>


          
          @endforeach

                 @endforeach

        </tr>
           </div>

        </div>

          <div class="col-12" > 
            <br>
            <td>
             
            
              <div id="form-program-renstra"></div>
              <button type="button" class="btn btn-light" id="tambah-program-renstra-btn">
                <i class="fa fa-plus" aria-hidden="true"></i> Tambah Indikator
              </button>
           
            </td>

          </div>



          <button type="submit" class="btn btn-primary float-right">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
