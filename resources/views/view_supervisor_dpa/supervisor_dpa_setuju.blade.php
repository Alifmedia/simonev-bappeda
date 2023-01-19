@extends('view_supervisor_dpa.dpa')

@section('main-content')



  <div id="data">
    @include('template.flash')
   

    <form id="search-form" action="" method="get">
      
  

          <div class="filter">
       
       
        <div class="filter__input__sub">

                         
         
       
        <div class="filter__input__sub">
           <div class="form-group">
            <label for="filter6">PERIODE</label>
            <select class="form-control" id="filter6" name="periode">
              <option value="0">Semua</option>
              @foreach ($filter['periode'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('periode') == $value->id  ? 'selected' : '' }}>{{ $value->periode_rentang }}</option>
              @endforeach
            </select>
          </div>


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

        
        </div>
      </div>
    </form>


    {{-- TAMPILAN TABEL DATA --}}
    <br>
    <form id="delete-form" action="{{ route('supervisor_dpa.dpa.delete') }}" method="POST">
      @csrf

     

      <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              

              <thead>
               
              </thead>

              <tbody>

                 <tr  >
                  <td scope="col" ><font size="1.5"></font></td>
                  <td scope="col" ><font size="1.5"><strong>URUSAN</strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>INDIKATOR</strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>TARGET</strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>SUMBER</strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>DANA</strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>URAIAN</strong></font></td>
               </tr>
               
              

                      @foreach ($data as $key => $valu)
                      <tr bgcolor="#bbb">

                    <td><font size="1">Kegiatan</font></td>    
                    <td><font size="1">{{ $valu->renssasarprogkegsubkeg->dusun->gampong->nama }}</font></td>
                    <td><font size="1">{{ $valu->renssasarprogkegsubkeg->indikatorrenssasarprogkeg->renssasarprogkeg->renssasarprogkeg_indika }}</font></td>
                    <td><font size="1">{{ $valu->renssasarprogkegsubkeg->indikatorrenssasarprogkeg->renssasarprogkeg->renssasarprogkeg_indika }}</font></td>
                    <td scope="col" ><font size="1.5"><strong></strong></font></td>
                    <td scope="col" ><font size="1.5"><strong></strong></font></td>
                     <td scope="col" ><font size="1.5"><strong></strong></font></td>
                   
                     </tr>

                      @foreach ($data as $key => $val)

                       <tr bgcolor="#eee">
                      <td><font size="1">Subkegiatan</font></td>
                      <td><font size="1">{{ $val->renssasarprogkegsubkeg->dusun->nama }}</font></td>
                      <td><font size="1">{{ $val->renssasarprogkegsubkeg->renssasarprogkegsubkeg_indikator }}</font></td>
                      <td><font size="1">{{ $val->renssasarprogkegsubkeg->renssasarprogkegsubkeg_target }}</font></td>
                      <td><font size="1">{{ $val->renssasarprogkegsubkeg->bagian->nama }}</font></td>
                      <td scope="col" ><font size="1.5"><strong></strong></font></td>
                      <td scope="col" ><font size="1.5"><strong></strong></font></td>
                    
                    
                    </tr>

                    @foreach ($data as $key => $valo)

                       <tr>

                      
                      <td><font size="1">Belanja</font></td>
                      <td><font size="1">{{ $valo->subrinob['subrinob_kode'] }}-{{ $valo->subrinob['subrinob_nama'] }}</font></td>
                       <td><font size="1"></font></td>
                       <td><font size="1"></font></td>
                      <td><font size="1">{{ $valo->bagian->nama }}</font></td>
                      <td><font size="1">{{ $valo->lokasi }}</font></td>
                      <td><font size="1">{{ $valo->waktu }}</font></td>

                      

                      @foreach ($valo->item as $key => $valon)

                       <tr>

                      
                      <td><font size="1">Item</font></td>
                       <td><font size="1">{{ $valon->item_nama }}</font></td>
                      <td><font size="1">{{ $valon->item_satuan }}</font></td> 
                      <td><font size="1">{{ $valon->item_targetfisik }}</font></td>
                      <td><font size="1">{{ $valon->bagian->nama }}</font></td>
                      <td><font size="1"></font></td>
                      <td><font size="1">{{ $valon->item_lingkup }}</font></td>
                

                     
                      </tr>
                      @endforeach
                      
                    



                       @endforeach




                       @endforeach 
                   

                       

               

                    
                 </tr>


                <!-- @endforeach -->

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


       @foreach ($value->item as $key => $val)
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
