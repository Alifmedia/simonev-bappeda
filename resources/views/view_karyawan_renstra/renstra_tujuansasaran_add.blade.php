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
          <h3 align="center" class="card-title">TAMBAH RENSTRA(TUJUAN & INDIKATOR)</h3><br><br>


      <form action="{{ route('karyawan_renstra.tujuansasaran.save') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row" >
          <div class="col-12" >

           
           

        </div>
      </div>

<br>


  <div class="filter" >

        <div class="filter__input__sub" align="center">

           <div class="form-group">
            <label for="filter5" class="col-sm-5  col-form-label-sm">RENSTRA</label>
            <select class="form-control-sm col-sm-6"  name="periode" >
              <option value="0">Semua</option>
              @foreach ($periode as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('periode') == $value->id ? 'selected' : '' }}>{{ $value->periode_rentang }}</option>
              @endforeach
            </select>
          </div>


        </div>

  </div>
<br><br>

 <div class="row">
          <div class="col-12">

           <!--  <td align="margin-left">
              <input type="text" class="form-control-sm col-sm-5 " name="bel_operasi" value="" placeholder="bel operasi">
            </td>

            <td align="margin-left">
              <input type="text" class="form-control-sm col-sm-5 " name="bel_modal" value="" placeholder="bel modal ">
            </td> -->

           <!--  <td align="margin-left">
              <input type="text" class="form-control-sm col-sm-5 " name="bel_takterduga" value="" placeholder="bel takterduga">
            </td>

            <td align="margin-left">
              <input type="text" class="form-control-sm col-sm-5 " name="bel_transfer" value="" placeholder="bel transfer ">
            </td> -->
            
                               
          </div>
  </div>

        <div class="row" align="center">
           <div class="col-12">

              <label>TUJUAN</label><br>
          <tr> 
            <td align="margin-left">
             
            <textarea name="tujuan_nama" cols="90" rows="4" value="" placeholder=""></textarea>
            </td>
          </tr>
       
       

          <!--    <tr>
                                <td>

                                  <label class="col-sm-1.5 col-form-label-sm">Indikator</label>
                                  <input type="text" class="form-control-sm col-sm-7 " name="indikator[]" placeholder="">
                                 </td>                              
                             
                                 <td>
                                  <label class="col-sm-1.5 col-form-label-sm">Satuan</label>
                                  <input type="text" class="form-control-sm col-sm-1 " name="satuan[]" placeholder="">
                                 </td>


                                  <td>
                                  <label class="col-sm-1.5 col-form-label-sm">Data Awal Perencanaan</label>
                                  <input type="text" class="form-control-sm col-sm-1 " name="nilaiawal[]" placeholder="">
                                 </td>

                </tr>
 -->
               <!--   <tr>
                                 <td>
                              
                                 <input type="text" class="form-control-sm col-sm-1" name="tahun[]" value="2023" placeholder="" disabled/>
                                 </td>

                                  <td>
                                  <input type="text" class="form-control-sm col-sm-1 " name="target[]" placeholder="target" >
                                 </td>

                                 <td>
                                 <input type="text" class="form-control-sm col-sm-1 " name="tahun[]" value="2024" placeholder="" disabled/>
                                 </td>

                                  <td>
                                 
                                  <input type="text" class="form-control-sm col-sm-1 " name="target[]" placeholder="target">
                                 </td>

                                  

                                
                                 <td>
                             
                                 <input type="text" class="form-control-sm col-sm-1 " name="tahun[]" value="2025" placeholder="" disabled/>
                                 </td>

                                  <td>
                             
                                  <input type="text" class="form-control-sm col-sm-1 " name="target[]" placeholder="target">
                                 </td>

                             
                               
                                  <td>
                              
                                 <input type="text" class="form-control-sm col-sm-1 " name="tahun[]" value="2026" placeholder="" disabled/>
                                 </td>

                                  <td>
                                
                                  <input type="text" class="form-control-sm col-sm-1 " name="target[]" placeholder="target">
                                 </td>

                                                                                          

                                 </tr>
 -->

           
            
            <br><br>
          
                  
            <div class="form-group">
              <label>INDIKATOR</label>
                  
                  <div id="form-sasaran-renstra"></div>
                  
                    <button type="button" class="btn btn-light" id="tambah-sasaran-renstra-btn">
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah Indikator
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
