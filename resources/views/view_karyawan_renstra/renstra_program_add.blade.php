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
          <h3 align="center" class="card-title">TAMBAH PROGRAM</h3><br><br>


      <form action="{{ route('karyawan_renstra.program.save',$id ) }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row" >
          <div class="col-12" >

         
            <div class="form-group" >
            <label class="col-sm-8 col-form-label-sm">SASARAN DAN INDIKATOR </label>
            <select class="form-control-sm col-sm-10"  name="indikatorrenssasar_id" >
              <option value="0" >Semua</option>
              @foreach ($indikatorrenssasar as $key => $valu)
                <option value="{{ $valu->id }}">{{ $valu->renssasar->renssasar_teks }}--{{ $valu->indikatorrenssasar_indikator }}</option>
              @endforeach
            </select>
           </div>


          
            
            <div class="form-group">
                  <label class="col-sm-8 col-form-label-sm">PROGRAM</label>
                  <input type="text"
                         name="program" 
                        class="form-control-sm col-sm-10 " 
                        value="{{ $kemukiman_kode}}---{{ $nama }}" 
                        placeholder="" 
                        disabled >
                        
                 
            </div> 

        </div>
      </div>

<br>


  <div class="filter"  >

        <div class="filter__input__sub">

         <!--   <div class="form-group">
            <label for="filter5" class="col-sm-5  col-form-label-sm">TAHUN APBK</label>
            <select class="form-control-sm col-sm-6"  name="hal" >
              <option value="0">Semua</option>
              @foreach ($hal as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('hal') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div> -->

         <!--   <div class="form-group">
            <label for="filter6" class="col-sm-5  col-form-label-sm">JENIS APBK</label>
            <select class="form-control-sm col-sm-6"  name="unsur" >
              <option value="0">Semua</option>
              @foreach ($unsur as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('unsur') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div> -->


          <!--  <div class="form-group">
            <label for="filter7" class="col-sm-6  col-form-label-sm">SUMBER DANA</label>
            <select class="form-control-sm col-sm-6"  name="bagian" >
              <option value="0">Semua</option>
              @foreach ($bagian as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('bagian') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div> -->

        </div>

        </div>

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


  
        <div class="row">

          <!-- <div class="col-12">


            <td align="margin-left">
              <label class="col-sm-1.5">Indikator Program</label>
              
              <input type="text" class="form-control-sm col-sm-9 " name="indikator" value="" >
              </textarea>
            </td>
            <br>


            <td align="margin-left">
              <label class="col-sm-1.5 col-form-label-sm">Satuan</label>
              <input type="text" class="form-control-sm col-sm-2 " name="satuan" value="" >
            </td>

             <td align="margin-left">
              <label class="col-sm-1.5 col-form-label-sm">Nilai Awal Tahun</label>
              <input type="number" class="form-control-sm col-sm-2 " name="nilaiawal" value="" >
            </td>


          </div>
 -->
       
         
           <div class="col-12" > 
            <br>
            <td>
             
              <label >INDIKATOR</label>
              <div id="form-program-renstra"></div>
              <button type="button" class="btn btn-light" id="tambah-program-renstra-btn">
                <i class="fa fa-plus" aria-hidden="true"></i> Tambah Indikator
              </button>
           
            </td>

          </div>

          
        </div>

          <button type="submit" class="btn btn-primary float-right">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
