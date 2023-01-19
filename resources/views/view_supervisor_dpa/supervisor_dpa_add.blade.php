@extends('master.app')

@section('title', 'E-MONEV APLIKASI')

@section('content')

       
<!-- <div id="data">-->

   <div class="nav-tabs-flat">
      <a href="{{ route('supervisor.dpa.renja') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
        Back
      </a>
    </div>
<!--
<div class="container mt-4" align="center">
 @include('template.flash') 
 <div class="card">
<div class="card-body">
<form id="search-form" action="" method="post">   
     @csrf --> 

     <!--  <div class="search">

        <div class="form-group">
          <input type="text" class="form-control"  name="search" placeholder="Cari berdasarkan Nomor Rekening" value="{{ app('request')->input('search') }}">

           <button type="submit" class="btn btn-primary" name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button>

        </div>

       
      </div>
 -->

     
<!--  </form>
</div>
</div>
</div>
</div> -->




<div id="akomodasi-add">
     @include('template.flash')

   


    <div class="container mt-4" align="center">
      <!-- @include('template.flash') -->
      <div class="card">
        <div class="card-body">
          <h3 align="center" class="card-title">TAMBAH BELANJA SUBKEGIATAN</h3><br><br>


      <form action="{{ route('supervisor_dpa.dpa.save', $id) }}" method="post" enctype="multipart/form-data">
            @csrf
       



        <div class="row" >
          <div class="col-12" >

                    
            <div class="form-group">
                  <label class="col-sm-8 col-form-label-sm">SUBKEGIATAN</label>
                  <input type="text" 
                        class="form-control-sm col-sm-10 " 
                        value="{{$dusun_kode}}---{{ $nama }}" disabled >
                        
                 
            </div>


           

        </div>
      </div>


        <div class="row" align="margin-left" >

         <div class="col-12" align="center" >

           <div class="form-group">
            <label for="filter6" class="col-sm-2  col-form-label-sm">JENIS</label>
            <select class="form-control-sm col-sm-2"  name="unsur" >
              <option value="0">Semua</option>
              @foreach ($unsur as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('unsur') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>


           <div class="form-group">
            <label for="filter7" class="col-sm-2  col-form-label-sm">SUMBER DANA</label>
            <select class="form-control-sm col-sm-2"  name="bagian" >
              <option value="0">Semua</option>
              @foreach ($bagian as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('bagian') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

        </div>

      </div>









       <div class="row">
          <div class="col-12">


            <td align="margin-left">
              <input type="text" class="form-control-sm col-sm-3 " name="danasubkegiatan" value="" placeholder="danasubkegiatan">
            </td>

            <td align="margin-left">
              <input type="text" class="form-control-sm col-sm-3 " name="lokasi" value="" placeholder="Lokasi">
            </td>

            <td align="margin-left">
              <input type="text" class="form-control-sm col-sm-3 " name="waktu" value="" placeholder="Waktu ">
            </td>
            
              <br><br>
          
          

          </div>
        </div>


<br>












 <div class="row">


  
          <div class="col-12">
            <div class="form-group">
              <label>BELANJA</label>

            </div>

             <div class="form-group">
            <label for="filter5" class="col-sm-3.5"><font size="2">SUBRINOB</font></label>
            <select class="form-control-sm col-sm-9" id="filter5" name="subrinob" >
              <option value="0">Semua</option>
              @foreach ($subrinob as $key => $value)
                <option value="{{ $value->id }}" >
                 {{ $value->subrinob_kode }}--{{ $value->subrinob_nama }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-12">


            <td align="margin-left">
              <input type="text" class="form-control-sm col-sm-3 " name="danabelanja" value="" placeholder="dana belanja">
            </td>

           
            
              <br><br>
          
          

          </div>


      </div>
  </div>    

  
  <div class="row">
  
          <div class="col-12"> 
                  
                  <div id="form-tahapan"></div>
                  
                    <button type="button" class="btn btn-light" id="tambah-tahapan-btn">
                              <i class="fa fa-plus" aria-hidden="true"></i> Tambah Uraian Belanja 
                    </button>
           
           </div>

</div>


   

<!-- </div>  -->
       
          <button type="submit" class="btn btn-primary float-right">Simpan</button>
         
       
    </form>


    



        </div>
      </div>
    </div>
  </div>
@endsection
