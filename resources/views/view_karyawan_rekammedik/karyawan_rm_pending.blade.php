@extends('view_karyawan_rekammedik.karyawan')

@section('main-content')



  <div id="data">
    @include('template.flash')
   

    <form id="search-form" action="" method="get">
      
      <div class="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan Nomor Rekening" value="{{ app('request')->input('search') }}">
        </div>

        <button type="submit" class="btn btn-primary" name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button>
      </div>

      <div class="filter"  >

        <div class="filter__input__sub">

           <div class="form-group">
            <label for="filter5" class="col-sm-5  col-form-label-sm">TAHUN APBK</label>
            <select class="form-control-sm col-sm-6" id="filter5" name="hal" {{ count($filter['hal']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['hal'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('hal') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

           <div class="form-group">
            <label for="filter6" class="col-sm-5  col-form-label-sm">JENIS APBK</label>
            <select class="form-control-sm col-sm-6" id="filter6" name="unsur" {{ count($filter['unsur']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['unsur'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('unsur') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>


           <div class="form-group">
            <label for="filter7" class="col-sm-6  col-form-label-sm">SUMBER DANA</label>
            <select class="form-control-sm col-sm-6" id="filter7" name="bagian" {{ count($filter['unsur']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['bagian'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('bagian') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
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
     
      <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              

              <thead>
                <tr>
                  <th scope="col" ><font size="2">N0.REK</font></th>             
                  <th scope="col" ><font size="2">SUBKEGIATAN</font></th>
                  <th scope="col" ><font size="2">NAMA ITEM</font></th>
                  <th scope="col" ><font size="2">LINGKUP</font></th>
                  <th scope="col" ><font size="2">TARGET FISIK</font></th>
                  
                 
                  <th scope="col" ><font size="2">DETAIL</font></th>
                  
                </tr>
              </thead>

              <tbody>
                @php 

                $i=0; 

                @endphp

                @foreach ($data as $key => $value)
                

                  <tr>
                   
                    <td><font size="1">{{ $value->item->konsultasi->dusun['dusun_kode'] }}</font></td>                
                    <td><font size="1">{{ $value->item->konsultasi->dusun['nama'] }}</font></td>
                    <td><font size="1">{{ $value->item->item_nama }}</font></td>
                    <td><font size="1">{{ $value->item->item_lingkup}}</font></td>
                    <td><font size="1">{{ $value->item->item_targetfisik}} {{ $value->item->item_satuan}}</font></td>
                    
                   

                  
                   <td>
                   
                      <a href="" data-toggle="modal" 
                                 data-target="#detail-modal-{{ $value->id }}">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
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
 

  @foreach ($data as $key => $value)
   
    <div class="modal fade" id="detail-modal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
      

      <div class="modal-dialog" role="document">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="detailModalTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

       
          <div class="modal-body">
        
         <h4 align="center">REALISASI BELANJA</h4>
          <div class="card" >
              <div class="card-body" >

          <input value=" ID ITEM">
          <input value=" {{ $value->item_id }}   ">
          <input value=" NAMA ITEM ">
          <input value=" {{ $value->item->item_nama }} ">
          <input value=" REALISASI FISIK ">
          <input value=" {{ $value->realisasi_fisik }} {{ $value->item->item_satuan }}">
          <input value=" REALISASI KEUANGAN ">
          <input value=" Rp. {{ $value->realisasi_keuangan }}">
        </div>  
       </div>

          <p class="font-weight-bold m-0" align="center">DOKUMEN </p>
          <div class="card" >
              <div class="card-body" >
          <ol class="pl-4">
            @foreach ($value->item->konsultasi->dokumen as $i => $dokumen)
             
                <a href="{{ asset('uploads/'.$dokumen->lokasi_file) }}" target="_blank">{{ $dokumen->nama }}</a>
              
            @endforeach
          </ol>    
          </div>
        </div>

          <hr>
        </div>

    </div>
    </div>
  </div>

  @endforeach

@endsection