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
        
          <!--  <div class="form-group">
            <label for="filter7" class="col-sm-6  col-form-label-sm">SUBKEGIATAN</label>
            <select class="form-control-sm col-sm-6" id="filter7" name="dusun" {{ count($filter['dusun']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['dusun'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('dusun') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div> -->


        <!--  <div class="form-group" >
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
            <label for="filter4" class="col-sm-2">SUBKEGIATAN</label>
            <select class="form-control-sm col-sm-9" id="filter4" name="dusun" {{ count($filter['dusun']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['dusun'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('dusun') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div> -->
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
                 
                  <th scope="col" ><font size="1">NO.REK</font></th>             
                  <th scope="col" ><font size="1">SUBKEGIATAN</font></th>
                  <th scope="col" ><font size="1">OPERASI</font></th>
                  <th scope="col" ><font size="1">MODAL</font></th>
                  <!-- <th scope="col" ><font size="1">T.TERDUGA</font></th>
                  <th scope="col" ><font size="1">TRANSFER</font></th> -->
                  
                   <th scope="col" ><font size="1">TOTAL</font></th>
                    <th scope="col" ><font size="1">REALISASI</font></th>
                 <!--  <th scope="col" ><font size="1">PERSENTASE</font></th> -->
                  <th scope="col" ><font size="1">DETAIL</font></th>
          
              
                  
                </tr>
              </thead>

              <tbody>


              
               
                @foreach($data as $key => $value)
                
                  <tr>
                   
                  <td><font size="1">{{ $value->dusun->dusun_kode }}</font></td>  
                  <td><font size="1">{{ $value->dusun->nama }}</font></td>            
                  <td><font size="1">{{ $value->bel_operasi }}</font></td>
                  <td><font size="1">{{ $value->bel_modal }}</font></td>
                 <!--  <td><font size="1">{{ $value->bel_takterduga }}</font></td>
                  <td><font size="1">{{ $value->bel_transfer}}</font></td> -->
                  <td><font size="1">{{ $value->bel_operasi+ 
                         $value->bel_modal+
                         $value->bel_takterduga+ 
                         $value->bel_transfer}} </font></td>

               @php
            
               $realisasi_total=0;
               $target_realisasi=0;

               @endphp 


             @foreach($value->konsultasi as $key => $valu)



               @foreach ($valu->item as $key => $valus)


                  @foreach ($valus->jurnalKonsultasi as $key => $val)
                 

                  @php
              
                  $realisasi_total +=$val->realisasi_keuangan;
                 

                  @endphp 

                   
               
                  @endforeach
                  @php

                  $target_realisasi +=$valu->item_targetkeuangan;

                  @endphp

              @endforeach

              <td><font size="1">{{ $realisasi_total }}</font></td>
           
              
                  <td>
                     <a href="" data-toggle="modal" data-target="#detail-modal-{{ $value->id }}">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                      </a>
                    </td>

                   <td>
                     <a class="btn btn-primary" href="{{ route('karyawan_rekammedik.karyawan_rm.create',
                                                               [
                                                                $value->id, 
                                                                $value->renssasarprogkegsubkeg->dusun->id, 
                                                                $value->renssasarprogkegsubkeg->dusun->dusun_kode, 
                                                                $value->renssasarprogkegsubkeg->dusun->nama
                                                               ]
                                                              ) 
                                                      }}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                   </td>
                   
                  
                   
                  </tr>
                @endforeach


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
   
    <div class="modal fade" id="detail-modal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
         
          <div class="modal-header" >
            <h5 class="modal-title font-weight-bold" id="detailModalTitle">DETAIL SUBKEGIATAN
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


        <div class="modal-body" align="center">
      
          <div class="card" >
           <div class="card-body" >

            <div class="table-responsive">
              <table class="table">
              

              <thead>
                <tr >
                  <th width="10%"  ><font size="1">REK.BELANJA</font></th> 
                  <th  width="25%"><font size="1">ITEM</font></th>             
                  <th  ><font size="1">LINGKUP</font></th>
                  <th  ><font size="1">KOEFISIEN</font></th>
                  <th ><font size="1">HARGA</font></th>
                  <th  ><font size="1">TOTAL</font></th>
                  <th  ><font size="1">PPN</font></th>
                  <th  ><font size="1">T.FISIK</font></th>
                   <th ><font size="1">T.KEUANGAN</font></th>
                    <th  ><font size="1">(%)</font></th>
                    <th  ><font size="1">R.FISIK</font></th>
                   <th  ><font size="1">R.KEUANGAN</font></th>
                    <th  ><font size="1">R.PERSENTASE</font></th>
                  
                  
                </tr>
              </thead>

              <tbody>

               @php

               $biaya_subtot=0;
               $realisasi_tot =0;

          @endphp           

    @foreach ($value->konsultasi as $key => $valus)

       @foreach ($valus->item as $key => $val)
        <tr>
          <td><font size="1">{{ $val->id }}                                    </font></td>
          <td><font size="1">{{ $val->item_nama }}                             </font></td>
          <td><font size="1">{{ $val->item_lingkup }}                          </font></td>
          <td><font size="1">{{ $val->item_koefisien }} {{ $val->item_satuan }}</font></td>
          <td><font size="1">{{ $val->item_harga }}                            </font></td>
          <td><font size="1">{{ $val->item_harga * $val->item_koefisien }}     </font></td>
          <td><font size="1">{{ $val->item_ppn }}                              </font></td>
          <td><font size="1">{{ $val->item_targetfisik }}                      </font></td>
          <td><font size="1">{{ $val->item_harga * $val->item_targetfisik }}   </font></td> 
          <td><font size="1">{{ (($val->item_harga * $val->item_targetfisik)/
                               ($val->item_harga * $val->item_koefisien))*100 }}</font></td>

           @php

               $biaya_subtotal   = 0;
               $target_total     = 0;
               $realisasi_total  =0;

          @endphp                     

          @foreach ($val->jurnalKonsultasi as $key => $valu)
          
          <td><font size="1">{{ $valu->realisasi_fisik }}</font></td>
          <td><font size="1">{{ $valu->realisasi_fisik * $valu->item->item_harga}}</font></td>
          <td><font size="1">{{ (($valu->realisasi_fisik * $valu->item->item_harga)/($valu->item->item_harga * $valu->item->item_targetfisik))*100 }}</font></td>


          @php
          $realisasi_total += ($valu->realisasi_fisik * $valu->item->item_harga);

          $biaya_subtotal += ($valu->item->item_koefisien * $valu->item->item_harga);
          @endphp

          @endforeach

        </tr>

       
         @php


          $realisasi_tot += $realisasi_total;
          $biaya_subtot   +=$biaya_subtotal;



          @endphp
        @endforeach

      @endforeach 



           <tr>
                  <th scope="col" ><font size="1"></font></th> 
                  <th scope="col" ><font size="1">TOTAL</font></th>             
                  <th scope="col" ><font size="1"></font></th>
                  <th scope="col" ><font size="1"></font></th>
                  <th scope="col" ><font size="1"></font></th>
                  <th scope="col" ><font size="1">{{ $biaya_subtot }}</font></th>
                  <th scope="col" ><font size="1"></font></th>
                  <th scope="col" ><font size="1"></font></th>
                   <th scope="col" ><font size="1"></font></th>
                    <th scope="col" ><font size="1"></font></th>
                    <th scope="col" ><font size="1"></font></th>
                   <th scope="col" ><font size="1">{{ $realisasi_tot }}</font></th>
                    
                  
                  
                </tr>
        </tbody>
      </table>
    
           </div>




           
        </div>
      </div>
     
      </div>


      </div>
      </div>
    </div>
   @endforeach

@endsection
