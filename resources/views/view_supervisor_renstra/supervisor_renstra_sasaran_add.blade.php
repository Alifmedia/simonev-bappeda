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
          <h3 align="center" class="card-title">TAMBAH SASARAN & INDIKATOR </h3><br><br>


      <form action="{{ route('karyawan_renstra.sasaran.save',$indikatortujuan_id) }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row" >
          <div class="col-12" >

           
            
         

            <div class="form-group" >
            <label class="col-sm-8 col-form-label-sm">INDIKATOR TUJUAN</label>
             <select class="form-control-sm col-sm-8"  name="indikatortujuan" >
                   @foreach ($indikatortujuan as $key => $valu)
                 <option value="{{ $valu->id }}">{{ $valu->indikatortujuan_nama }}</option>
                  @endforeach
            </select>
                        
                 
            </div> 

           

        </div>
      </div>




 
<br>

 <div class="row">
          <div class="col-12">

                     
                               
          </div>
  </div>

        <div class="row" align="center">
           <div class="col-12">

              <label>SASARAN</label><br>
          <tr> 
            <td align="margin-left">
             
            <textarea name="renssasar_teks" cols="90" rows="4" value="" placeholder=""></textarea>
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
