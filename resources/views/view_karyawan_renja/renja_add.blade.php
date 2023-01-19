@extends('master.app')

@section('title', 'E-MONEV APLIKASI')

@section('content')
  <div id="akomodasi-add">
    <div class="nav-tabs-flat">
      <a href="{{ route('karyawan.renja.setujuopd') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
        Back
      </a>
    </div>



    <div class="container mt-4" align="center">
      @include('template.flash')
      <div class="card">
        <div class="card-body">
          <h3 align="center" class="card-title">TAMBAH SUBKEGIATAN</h3><br><br>


      <form action="{{ route('karyawan_renja.subkegiatan.save', $renssasarprogkeg_id) }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row" >
          <div class="col-12" >

          
            
            <div class="form-group">
                  <label class="col-sm-8 col-form-label-sm">KEGIATAN</label>
                  <input type="text" 
                        class="form-control-sm col-sm-10 " 
                        value="{{ $kegiatan_kode}}---{{ $kegiatan_nama }}" disabled >
                        
                </div>


                 <div class="form-group" >
            <label class="col-sm-8 col-form-label-sm">INDIKATOR KEGIATAN</label>
            <select class="form-control-sm col-sm-10"  name="subkegiatan" >
              <option value="0" >Semua</option>
              @foreach ($indikator_kegiatan as $key => $value)
                <option value="{{ $value->id }}">{{ $value->id }}--{{ $value->indikatorrenssasarprog_indikator }}</option>
              @endforeach
            </select>
           </div>


                 <div class="form-group" >
            <label class="col-sm-8 col-form-label-sm">SUBKEGIATAN</label>
            <select class="form-control-sm col-sm-10"  name="subkegiatan" >
              <option value="0" >Semua</option>
              @foreach ($list_subkegiatan as $key => $value)
                <option value="{{ $value->id }}">{{ $value->dusun_kode }}--{{ $value->nama }}</option>
              @endforeach
            </select>
           </div>

        </div>
      </div>

<br>


  <div class="filter"  >

        <div class="filter__input__sub">

           <div class="form-group">
            <label for="filter5" class="col-sm-5  col-form-label-sm">TAHUN</label>
            <select class="form-control-sm col-sm-6"  name="hal" >
              <option value="0">Semua</option>
              @foreach ($hal as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('hal') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

            

             <div class="form-group">
            <label for="filter7" class="col-sm-6  col-form-label-sm">SUMBER DANA</label>
            <select class="form-control-sm col-sm-6"  name="sumberdana" >
              <option value="0">Semua</option>
              @foreach ($bagian as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('bagian') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
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

        <div class="row">
          <div class="col-12">

            <tr>
             <td align="margin-left">
              <input type="text" class="form-control-sm col-sm-10 " name="indikator" value="" placeholder="Indikator ">
            </td>
          </tr>
          <br>


            <td align="margin-left">
              <input type="number" class="form-control-sm col-sm-3 " name="target" value="" placeholder="Target">
            </td>
           

             <td align="margin-left">
              <input type="number" class="form-control-sm col-sm-3 " name="pagu" value="" placeholder="Pagu Indikatif ">
            </td>

             <td align="margin-left">
              <input type="text" class="form-control-sm col-sm-3 " name="lokasi" value="" placeholder="Lokasi">
            </td>

           


         
            
              <br><br>
          
                  
           <!--  <div class="form-group">
              <label>BELANJA</label>
                  
                  <div id="form-tahapan"></div>
                  
                    <button type="button" class="btn btn-light" id="tambah-tahapan-btn">
                              <i class="fa fa-plus" aria-hidden="true"></i> Tambah Item
                    </button>
            </div> -->

          </div>
        </div>

          <button type="submit" class="btn btn-primary float-right">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
