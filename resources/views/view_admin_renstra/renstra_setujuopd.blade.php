@extends('view_karyawan_renstra.renstra')

@section('main-content')



  <div id="data">
    @include('template.flash')
   

    <form id="search-form" action="" method="get">
      
   
      <div class="filter">
        <div class="filter__input__sub">

           <div class="form-group">
            <label for="filter3">PERIODE</label>
            <select class="form-control " id="filter3" name="sektoral" {{ count($periode) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($periode as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('periode') == $value->id ? 'selected' : '' }}>{{ $value->periode_rentang }}</option>
              @endforeach
            </select>
          </div>


            <div class="form-group">
            
          </div>

          <div class="form-group">
            
          </div>

           <div class="form-group">
                  <label class="col-sm-4 col-form-label-sm">STATUS:</label>
                  <input type="text"
                         name="program" 
                        class="form-control-sm col-sm-7 " 
                        value="" 
                        placeholder="" 
                        disabled >
                        
                 
            </div> 



           <a class="btn btn-dark" href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['export' => 1])) }}">
          
          CETAK
        </a>
        </div>
      </div>

     
    </form>


    {{-- TAMPILAN TABEL DATA --}}
   
    <form id="delete-form" action="{{ route('karyawan_renstra.kegiatan.delete') }}" method="POST">
      @csrf
     <!--  <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
        Hapus
      </button> -->

      <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              

              <thead>
                
              </thead>

              <tbody>
                <tr bgcolor="yellow" >
                  <td scope="col" ><font size="1.5"><strong>TUJUAN</strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>INDIKATOR TUJUAN/SASARAN </strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>INDIKATOR SASARAN/KODE</strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>PROGRAM </strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>INDIKATOR PROGRAM/KEGIATAN</strong></font></td>
                 
                  <td scope="col" ><font size="1"><b>SATUAN</b></font></td>
                  <td scope="col" ><font size="1"><b>AWAL</b></font></td>
                  <td align="center" colspan="2" scope="col" ><font size="1"><b>2023</b></font></td>
                  <td align="center" colspan="2" scope="col" ><font size="1"><b>2024</b></font></td>
                  <td align="center" colspan="2" scope="col" ><font size="1"><b>2025</b></font></td>
                  <td align="center" colspan="2" scope="col" ><font size="1"><b>2026</b></font></td>
                  <td align="center" colspan="2" scope="col" ><font size="1"><b>AKHIR</b></font></td>
                  <td align="center" colspan="2" scope="col" ><font size="1"><b>UNIT</b></font></td>
                 
                </tr>
                @foreach ($data as $key => $value)
                  <tr bgcolor="#aaa">
                    <td scope="col" ><font size="1">{{ $value->tujuan_nama }}</font></td>
                     <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                      <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                      <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                  </tr>

                    @foreach ($value->indikatortujuan as $key => $valu)
                    <tr>
                         <td><font size="1"></font></td>
                    <td><font size="1">{{ $valu->indikatortujuan_nama }}</font></td>
                    <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                    <td><font size="1">{{ $valu->indikatortujuan_satuan }}</font></td>
                    <td><font size="1">{{ $valu->indikatortujuan_nilaiawal }}</font></td>
                    <td><font size="1">{{ $valu->indikatortujuan_target1 }}</font></td>
                    <td><font size="1">{{ $valu->indikatortujuan_keuangan1 }}</font></td>
                    <td><font size="1">{{ $valu->indikatortujuan_target2 }}</font></td>
                    <td><font size="1">{{ $valu->indikatortujuan_keuangan2 }}</font></td>
                    <td><font size="1">{{ $valu->indikatortujuan_target3 }}</font></td>
                    <td><font size="1">{{ $valu->indikatortujuan_keuangan3 }}</font></td>
                    <td><font size="1">{{ $valu->indikatortujuan_target4 }}</font></td>
                    <td><font size="1">{{ $valu->indikatortujuan_keuangan4 }}</font></td>
                    <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                        <td><font size="1"></font></td>
                     </tr>

                   

                  @foreach ($valu->renssasar as $key => $valo)
                      <tr bgcolor="#bbb">

                       <td><font size="1"></font></td>
                       <td scope="col" > <font size="1">{{ $valo->renssasar_teks }}</font></td>
                       <td><font size="1"></font></td>
                       <td><font size="1"></font></td>
                       <td><font size="1"></font></td>
                       <td><font size="1"></font></td>
                       <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                      <td><font size="1"></font></td>
                       <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                      <td><font size="1"></font></td>
                       <td><font size="1"></font></td>
                      </tr>
                       @foreach ($valo->indikatorrenssasar as $key => $val)
                       <tr>
                         <td><font size="1"></font></td>
                       <td><font size="1"></font></td>
                        <td><font size="1">{{ $val->indikatorrenssasar_indikator }}</font></td>
                        <td><font size="1"></font></td>
                       <td><font size="1"></font></td>

                        <td><font size="1">{{ $val->indikatorrenssasar_satuan }}</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasar_nilaiawal }}</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasar_target1 }}</font></td>
                        <td><font size="1">-</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasar_target2 }}</font></td>
                        <td><font size="1">-</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasar_target3 }}</font></td>
                        <td><font size="1">-</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasar_target4 }}</font></td>
                        

                        <td><font size="1">-</font></td>
                        <td><font size="1"></font></td>
                        <td><font size="1"></font></td>
                        <td><font size="1"></font></td>
                         <td><font size="1"></font></td>
                   
                         </tr>
                    
                   
                        @foreach ($val->renssasarprog as $key => $vali)
                          <tr>

                          <td><font size="1"></font></td>
                          <td><font size="1"></font></td>
                          <td><font size="1">{{ $vali->kemukiman['kemukiman_kode'] }}</font></td>
                          <td><font size="1">{{ $vali->kemukiman['nama'] }}</font></td>
                           <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                             <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                    <td><font size="1"></font></td>
                     <td><font size="1"></font></td>

                        </tr>
                            @foreach ($vali->indikatorrenssasarprog as $key => $val)
                            <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                     <td><font size="1"></font></td>
                             
                            <td><font size="1">{{ $val->indikatorrenssasarprog_indikator }}</font></td>
                      
                            <td><font size="1">{{ $val->indikatorrenssasarprog_satuan }}</font></td>
                            <td><font size="1">{{ $val->indikatorrenssasarprog_nilaiawal }}</font></td>
                            <td><font size="1">{{ $val->indikatorrenssasarprog_target1 }}</font></td>
                             <td><font size="1">{{ $val->indikatorrenssasarprog_targetkeuangan1 }}</font></td>
                            <td><font size="1">{{ $val->indikatorrenssasarprog_target2 }}</font></td>
                             <td><font size="1">{{ $val->indikatorrenssasarprog_targetkeuangan2 }}</font></td>
                            <td><font size="1">{{ $val->indikatorrenssasarprog_target3 }}</font></td>
                             <td><font size="1">{{ $val->indikatorrenssasarprog_targetkeuangan3 }}</font></td>
                            <td><font size="1">{{ $val->indikatorrenssasarprog_target4 }}</font></td>
                             <td><font size="1">{{ $val->indikatorrenssasarprog_targetkeuangan4 }}</font></td>
                           
                            <td><font size="1"></font></td>
                           <td><font size="1"></font></td>
                           <td><font size="1"></font></td>
                                     <td><font size="1"></font></td>

                         </tr>
                             
         

                   
                                           
                            @foreach ($val->renssasarprogkeg as $key => $va)

                            <tr bgcolor="#eee">
                            
                            <td scope="col" ></td>
                            <td scope="col" ></td>
                            <td><font size="1">{{ $va->gampong['gampong_kode'] }}</font></td>
                               <td scope="col" ></td>
                            <td><font size="1">{{ $va->gampong['nama'] }}</font></td>
                
                            @foreach ($va->indikatorrenssasarprogkeg as $key => $v)
                                         
                            <td><font size="1">{{ $v->indikatorrenssasarprogkeg_indikator }}</font></td>
                            <td><font size="1">{{ $v->indikatorrenssasarprogkeg_satuan }}</font></td>
                            <td><font size="1">{{ $v->indikatorrenssasarprogkeg_nilaiawal }}</font></td>
                            <td><font size="1">{{ $v->indikatorrenssasarprogkeg_target1 }}</font></td>
                            <td><font size="1">{{ $v->indikatorrenssasarprogkeg_targetkeuangan1 }}</font></td>
                            <td><font size="1">{{ $v->indikatorrenssasarprogkeg_target2 }}</font></td>
                            <td><font size="1">{{ $v->indikatorrenssasarprogkeg_targetkeuangan2 }}</font></td>
                            <td><font size="1">{{ $v->indikatorrenssasarprogkeg_target3 }}</font></td>
                            <td><font size="1">{{ $v->indikatorrenssasarprogkeg_targetkeuangan3 }}</font></td>
                            <td><font size="1">{{ $v->indikatorrenssasarprogkeg_target4 }}</font></td>
                             <td><font size="1">{{ $v->indikatorrenssasarprogkeg_targetkeuangan4 }}</font></td>
                           <td><font size="1"></font></td>
                        <td><font size="1"></font></td>
                        <td><font size="1"></font></td>
                      </tr>


                    





                           @endforeach 
                        
                            


                            @endforeach 







                      @endforeach 






                      @endforeach 




   @endforeach 

                 
          @endforeach 

                 @endforeach 

                 
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


 
@endsection
