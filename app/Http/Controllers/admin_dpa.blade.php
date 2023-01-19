@extends('view_admin_dpa.dpa')

@section('main-content')



  <div id="data">
    @include('template.flash')
   

    <form id="search-form" action="" method="get">
      
     <!--  <div class="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan Nomor Rekam Medik" value="{{ app('request')->input('search') }}">
        </div>

        <button type="submit" class="btn btn-primary" name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button>
      </div> -->

      <div class="filter"  >

        <div class="filter__input__sub">

           <div class="form-group">
            <label for="filter5" class="col-sm-4  col-form-label-sm">TAHUN APBK</label>
            <select class="form-control-sm" id="filter5" name="hal" {{ count($filter['hal']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['hal'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('hal') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

           <div class="form-group">
            <label for="filter6" class="col-sm-4  col-form-label-sm">JENIS APBK</label>
            <select class="form-control-sm" id="filter6" name="unsur" {{ count($filter['unsur']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['unsur'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('unsur') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>


           <div class="form-group">
            <label for="filter7" class="col-sm-4  col-form-label-sm">SUMBER DANA</label>
            <select class="form-control-sm" id="filter7" name="bagian" {{ count($filter['unsur']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['bagian'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('bagian') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

           <div class="form-group">
            <label for="filter8" class="col-sm-4  col-form-label-sm">LOKASI</label>
            <select class="form-control-sm" id="filter8" name="satuankerja" {{ count($filter['satuankerja']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['satuankerja'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('satuankerja') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>


        </div>
        <br>

         <div class="form-group" >
            <label for="filter1" class="col-sm-2 " >URUSAN</label>
            <select class="form-control-sm col-sm-9"  id="filter1" name="kabupaten">
              <option value="0" >Semua</option>
              @foreach ($filter['kabupaten'] as $key => $value)
                <option value="{{ $value->kabupaten_id }}" {{ app('request')->input('kabupaten') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

       
          <div class="form-group">
            <label for="filter2" class="col-sm-2">BIDANG</label>
            <select class="form-control-sm col-sm-9" id="filter2" name="kecamatan" {{ count($filter['kecamatan']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['kecamatan'] as $key => $value)
                <option value="{{ $value->kecamatan_id }}" {{ app('request')->input('kecamatan') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

             <div class="form-group">
            <label for="filter3" class="col-sm-2">PROGRAM</label>
            <select class="form-control-sm col-sm-9" id="filter3" name="kemukiman" {{ count($filter['kecamatan']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['kemukiman'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('kemukiman') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>


           <div class="form-group">
            <label for="filter4" class="col-sm-2">KEGIATAN</label>
            <select class="form-control-sm col-sm-9" id="filter4" name="gampong" {{ count($filter['gampong']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['gampong'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('gampong') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

      


        </div>  
        

          

     

           

        

        

          

        


      </div>
    </form>




    {{-- Table --}}
    <br>
    <form id="delete-form" action="{{ route('karyawan_rekammedik.karyawan_rm.delete') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger">
        <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
        Hapus
      </button>
      <a class="btn btn-primary" href="{{ route('karyawan_rekammedik.karyawan_rm.create') }}">
        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
        Tambah
      </a>
      <br><br>
      <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              

              <thead>
                <tr>
                  <th scope="col" >N0.REKENING</th>
                  <th scope="col" >SUBKEGIATAN</th>
                  <th scope="col" >DETAIL</th>
                  <th scope="col">REAL
                  </th>
                </tr>
              </thead>

              <tbody>
                @php 

                $i=0; 

                @endphp

                @foreach ($data as $key => $value)
                

                  <tr>
                   
                    <td>{{ $value->dusun_id }}</td>                       
                    <td>{{ $value->dusun['dusun_nama'] }}</td>
                  
                   

                     <td>
                      <a href="" data-toggle="modal" 
                                 data-target="#detail-modal-{{ $value->dusun_id }}">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                      </a>
                    </td>
                  
                    <td>
                      <a href="{{ route('karyawan_rekammedik.karyawan_rm.edit', $value->dusun_id)
                               }}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach

              </tbody>




            </table>
          </div>
        </div>
      </div>
    </form>
    <div class="pagination-wrapper">
   
    </div>
  </div>


  @foreach ($data as $key => $value)
   
    <div class="modal fade" id="detail-modal-{{ $value->dusun_id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="detailModalTitle">
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body" align="center">
          
        
         <h4 align="center">HASIL REKAM MEDIS</h4>
          <div class="card" >
          <div class="card-body" >

          <input value=" TINGGI BADAN">
          <input value=" {{ $value->RM_TinggiBadan }}   cm">
          <input value=" BERAT BADAN ">
          <input value=" {{ $value->RM_BeratBadan }}   kg">
          <input value=" LINGKAR PERUT ">
          <input value=" {{ $value->RM_LingkarPerut }}   cm">
          <br>
          <input value=" HEMOGLOBIN ">
          <input value=" {{ $value->RM_Hemoglobin }}   gr/dL">
          <input value=" LEUKOSIT  ">
          <input value=" {{ $value->RM_Leukosit}}  ribu/Ul">
          <input value=" TROMBOSIT ">
          <input value=" {{ $value->RM_Trombosit }}  ribu/Ul">
          <input value=" HEMOTOKRIT ">
           <input value=" {{ $value->RM_Hematokrit}} %">
          <input value=" ERITROSIT  ">
          <input value=" {{ $value->RM_Eritrosit }} juta/Ul">
          <br>
          <input value=" LED ">
          <input value=" {{ $value->RM_LED}}  mm/jam">
          <input value=" GLUKOSA PUASA  ">
          <input value=" {{ $value->RM_GlukosaPuasa}}  mg/dL">
          <input value=" HbA1C ">
          <input value=" {{ $value->RM_HbA1C }}  %">
          <input value=" UREUM  ">
          <input value=" {{ $value->RM_Ureum }}  mg/dL">
          <input value=" CREATININ">
          <input value=" {{ $value->RM_Creatinin }}  U/L">
          <input value=" ASAM URAT">
          <input value=" {{ $value->RM_AsamUrat }}  mg/dL">
          <input value=" KOLESTEROL TOTAL ">
          <input value=" {{ $value->RM_KolesterolTotal }}  mg/dL">
          <input value=" HDL KOLESTEROL ">
          <input value=" {{ $value->RM_HDLKolesterol }}  mg/dL">
          <input value=" LDL KOLESTEROL ">
          <input value=" {{ $value->RM_LDLKolesterol }}  mg/dL">
          <input value=" TRIGLISERIDA ">
          <input value=" {{ $value->RM_Trigliserida }}  mg/dL">
          <br>         
          <input value=" SGOT  ">
          <input value=" {{ $value->RM_SGOT }}  U/L">
          <input value=" SGPT ">
          <input value=" {{ $value->RM_SGPT }}  U/L">
          <input value=" GAMMA-GT">
          <input value=" {{ $value->RM_GammaGT }}  U/L">
          <br>
          <input value=" SISTOLE ">
          <input value=" {{ $value->RM_Sistole }}  mmHg">
          <input value=" DIASTOLE ">
          <input value=" {{ $value->RM_Diastole }}  mmHg">
        </div>

        
       </div>

          <h5 align="center" class="font-weight-bold m-0">DOKUMEN REKAM MEDIK</h5>
        <div class="card" >
          <div class="card-body" >
          </div>
          <ol class="pl-4">
           
          </ol>
          </div>

        <h5 align="center" class="font-weight-bold m-0">INSTRUKSI MEDIS</h5>
            <div class="card" >
              <div class="card-body" >


      @php    
      
     
      @endphp  

        </div>
      </div>
        
        
         
                
          
             

          </div>
        </div>
      </div>
    </div>
  @endforeach

@endsection
