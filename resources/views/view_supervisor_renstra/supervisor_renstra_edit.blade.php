@extends('master.app')

@section('title', 'E-MONEV APLIKASI')

@section('content')
  <div id="akomodasi-add">
   

    <div class="nav-tabs-flat">
      <a href="{{ route('karyawan.renstra.kegiatan') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
        Back
      </a>
    </div>



    <div class="container mt-4" align="center">
      @include('template.flash')
      <div class="card">
        <div class="card-body">
          <h3 align="center" class="card-title">EDIT KEGIATAN RENSTRA</h3><br><br>


      <form action="{{ route('karyawan_renstra.kegiatan.update',10) }}" method="post" enctype="multipart/form-data">
            @csrf
       


     


  
        <div class="row">

          <div class="col-12">

         @foreach ($data as $key => $value)
           
             <div class="form-group" >
            <td align="margin-left">
              <label class="col-sm-1.5">KEGIATAN </label>
              
              <input type="text" class="form-control-sm col-sm-12 " name="kegiatan" value="{{ $value->gampong->nama }}" >
           
            </td>

          </div>

             @foreach ($value->indikatorrenssasarprogkeg as $key => $vali)
                   <br>      <br>

              <td><label >INDIKATOR</label></td><br><br>
             
              <div class="form-group" >
              <td align="margin-left">
              <label class="col-sm-1.5">Indikator </label>
              <input type="text" class="form-control-sm col-sm-6 " name="indikator[]" 
              value="{{ $vali->indikatorrenssasarprogkeg_indikator}}" >
           
               </td>

            </div>

               <div class="form-group" >
            <td align="margin-left">
              <label class="col-sm-1.5 col-form-label-sm">Satuan</label>
              <input type="text" class="form-control-sm col-sm-1 " name="satuan[]" value="{{ $vali->indikatorrenssasarprogkeg_satuan }}" >
            </td>
          </div>


             <div class="form-group" >
             <td align="margin-left">
              <label class="col-sm-1.5 col-form-label-sm">Nilai Awal </label>
              <input type="number" class="form-control-sm col-sm-1 " name="nilaiawal[]" value="{{ $vali->indikatorrenssasarprogkeg_nilaiawal }}" >
            </td>
          </div>

            <br> 
              <tr>  
          
             <div class="form-group" >
          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-1 " name="tahun1[]" value="{{ $vali->indikatorrenssasarprogkeg_tahun1 }}" disabled></font>
         </td>
       </div>

            <div class="form-group" >
          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-2 " name="target1[]" value="{{ $vali->indikatorrenssasarprogkeg_target1 }}" ></font>
         </td>

       </div>
          
            <div class="form-group" >
          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan1[]" value="{{ $vali->indikatorrenssasarprogkeg_targetkeuangan1 }}" >
                                  </font></td>
                                </div>


         
         <div class="form-group" >
         <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-1 " name="tahun2[]" value="{{ $vali->indikatorrenssasarprogkeg_tahun2 }}" disabled></font>
         </td>
       </div>


            <div class="form-group" >
          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-2 " name="target2[]" value="{{ $vali->indikatorrenssasarprogkeg_target2 }}" ></font>
         </td>
       </div>
          


            <div class="form-group" >
          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan2[]" value="{{ $vali->indikatorrenssasarprogkeg_targetkeuangan2 }}" ></font>
        </td>
      </div>


           <div class="form-group" >
          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-1 " name="tahun3[]" value="{{ $vali->indikatorrenssasarprogkeg_tahun3 }}" disabled></font>
         </td>
       </div>


            <div class="form-group" >

          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-2 " name="target3[]" value="{{ $vali->indikatorrenssasarprogkeg_target3 }}" ></font>
         </td>
       </div>
          
            <div class="form-group" >
          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan3[]" value="{{ $vali->indikatorrenssasarprogkeg_targetkeuangan3 }}" ></font>
        </td>
      </div>


             <div class="form-group" >
          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-1 " name="tahun4[]" value="{{ $vali->indikatorrenssasarprogkeg_tahun4 }}" disabled></font>
         </td>
       </div>


            <div class="form-group" >

          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-2 " name="target4[]" value="{{ $vali->indikatorrenssasarprogkeg_target4 }}" ></font>
         </td>
       </div>
          


            <div class="form-group" >
          <td align="margin-left"><font size="1">
          <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan4[]" value="{{ $vali->indikatorrenssasarprogkeg_targetkeuangan4 }}" ></font>
        </td>
      </div>


          
          @endforeach

                 @endforeach

        </tr>
           </div>

        </div>

          <div class="col-12" > 
            <br>
            <td>
             
            
              <div id="form-kegiatan-renstra"></div>
              <button type="button" class="btn btn-light" id="tambah-kegiatan-renstra-btn">
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
