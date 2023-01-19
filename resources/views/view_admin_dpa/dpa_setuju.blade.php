@extends('view_admin_dpa.dpa')

@section('main-content')



  <div id="data">
    @include('template.flash')
   

    <form id="search-form" action="" method="get">
      
    <!--  <div class="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan Nomor Rekening" value="{{ app('request')->input('search') }}">
        </div>

        <button type="submit" class="btn btn-primary" name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button>
      </div> -->

          <div class="filter">
       
       
        <div class="filter__input__sub">

                         
         
        </div>

          <div class="form-group">
            <label for="filter3">OPD</label>
            <select class="form-control " id="filter3" name="sektoral" {{ count($filter['sektoral']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['sektoral'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('sektoral') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>
          

        <div class="filter__input__sub">


          <div class="form-group">
            <label for="filter6">TAHUN</label>
            <select class="form-control" id="filter6" name="hal">
              <option value="0">Semua</option>
              @foreach ($filter['hal'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('hal') == $value->id  ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="filter6">JENIS</label>
            <select class="form-control" id="filter6" name="unsur">
              <option value="0">Semua</option>
              @foreach ($filter['unsur'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('unsur') == $value->id  ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

         <div class="form-group">
            <label for="filter6">SUMBER</label>
            <select class="form-control" id="filter6" name="bagian">
              <option value="0">Semua</option>
              @foreach ($filter['bagian'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('bagian') == $value->id  ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

          <!-- <div class="form-group">
            <label for="filter8">AKHIR</label>
            <input type="date" class="form-control date-picker" id="filter8" name="akhir" placeholder="Akhir" value="{{ app('request')->input('akhir') }}">
          </div> -->
         


        </div>
      </div>
    </form>


    {{-- TAMPILAN TABEL DATA --}}
    <br>
    <form id="delete-form" action="" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
        Hapus
      </button>
     
      <br><br>
      <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              

              <thead>
                <tr>
                  <th scope="col">
                    <input type="checkbox" class="check-all">
                  </th>
                  <th scope="col" ><font size="1">N0.REKENING</font></th>
                  <th scope="col" ><font size="1">SUBKEGIATAN</font></th>
                  <th scope="col" ><font size="1">OPD</font></th>

                  <th scope="col" ><font size="1">OPERASI</font></th>
                  <th scope="col" ><font size="1">MODAL</font></th>
                  <th scope="col" ><font size="1">T.TERDUGA</font></th>
                  <th scope="col" ><font size="1">TRANSFER</font></th>

                  <th scope="col" ><font size="1">DETAIL</font></th>
                  <th scope="col" ><font size="1">EDIT</font></th>
                </tr>
              </thead>

              <tbody>
               
                @foreach ($data as $key => $value)
                  <tr>
                     <td><input type="checkbox" name="check[]" value="{{ $value->id }}" class="check"></td>
                    <td><font size="1">{{ $value->dusun->dusun_kode }}</font></td>                   
                    <td><font size="1">{{ $value->dusun->nama }}</font></td>
                    <td><font size="1">{{ $value->indikatorrenssasarprogkeg->renssasarprogkeg->indikatorrenssasarprog->renssasarprog->indikatorrenssasar->renssasar->indikatortujuan->tujuan->renstra->sektoral->nama }}</font></td>
                    <td><font size="1">{{ $value->bel_operasi }}</font></td>
                    <td><font size="1">{{ $value->bel_modal }}</font></td>
                    <td><font size="1">{{ $value->bel_takterduga }}</font></td>
                    <td><font size="1">{{ $value->bel_transfer}}</font></td>
                   
                  
                    </td>
                  
                    <td>
                     
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>
  
    {{-- PENGATURAN PAGING --}}
    <div class="pagination-wrapper">
    </div>

  </div>


  {{-- PENGATURAN MODAL DETAIL --}}
  @foreach($data as $key => $value)
    <div class="modal fade" id="detail-modal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="detailModalTitle">
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body" align="center">
          
        
         <div class="table-responsive">
              <table class="table">
              

              <thead>
                <tr >
                  <th width="10%"  ><font size="1">NO.REK</font></th> 
                  <th  width="25%"><font size="1">ITEM</font></th>             
                  <th  ><font size="1">LINGKUP</font></th>
                  <th  ><font size="1">KOEFISIEN</font></th>
                  <th ><font size="1">HARGA</font></th>
                  <th  ><font size="1">TOTAL</font></th>
                  <th  ><font size="1">PPN</font></th>
                  <th  ><font size="1">T.FISIK</font></th>
                  <th ><font size="1">T.KEUANGAN</font></th>
                  <th  ><font size="1">PERSENTASE</font></th>
                 
                </tr>
              </thead>

              <tbody>

               @php

               $biaya_subtot=0;
               $targettot=0;
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
          <td><font size="1">{{ $val->item_targetfisik }} {{ $val->item_satuan }} </font></td>
          <td><font size="1">{{ $val->item_harga * $val->item_targetfisik }}   </font></td> 
          <td><font size="1">{{ (($val->item_harga * $val->item_targetfisik)/
                               ($val->item_harga * $val->item_koefisien))*100 }}%</font></td>

           @php

               $biaya_subtotal   = 0;
               $target_total     = 0;
               $realisasi_total  =0;

          @endphp



          @foreach ($val->jurnalKonsultasi as $key => $valu)
          
         
         
          @php
         

          $biaya_subtotal += ($valu->item->item_koefisien *   $valu->item->item_harga);
          $target_total   += ($valu->item->item_targetfisik * $valu->item->item_harga);
          @endphp

          @endforeach

        </tr>

       
         @php


          
          $biaya_subtot   +=$biaya_subtotal;
          $targettot      +=$target_total;



          @endphp
        @endforeach

          @endforeach



           <tr>
                  <th scope="col" ><font size="1"></font></th> 
                  <th scope="col" ><font size="1"></font></th>             
                  <th scope="col" ><font size="1"></font></th>
                  <th scope="col" ><font size="1"></font></th>
                  <th scope="col" ><font size="3">TOTAL</font></th>
                  <th scope="col" ><font size="2">{{ $biaya_subtot }}</font></th>
                  <th scope="col" ><font size="1"></font></th>
                  <th scope="col" ><font size="1"></font></th>
                  <th scope="col" ><font size="2">{{ $targettot }}</font></th>
                  <th scope="col" ><font size="1"></font></th>
                  <th scope="col" ><font size="1"></font></th>
                 
                  
                  
                </tr>
        </tbody>
      </table>
    
           </div>


        <div class="card" >
          <div class="card-body" >




        </div>
        
       </div>
         
                
    
          </div>
        </div>
      </div>
    </div>
  @endforeach

@endsection
