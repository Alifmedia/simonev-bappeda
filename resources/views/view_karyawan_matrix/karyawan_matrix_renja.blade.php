@extends('view_karyawan_matrix.matrix')

@section('main-content')



  <div id="data" style="width: 100%;">
    @include('template.flash')
   

    <form id="search-form" action="" method="get">
      
   
      <div class="filter">
        <div class="filter__input__sub">

            <div class="form-group">
            <label for="filter3">PERIODE</label>
            <select class="form-control " id="filter3" name="periode" >
              <option value="0">Semua</option>
              @foreach ($filter['periode'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('periode') == $value->id ? 'selected' : '' }}>{{ $value->periode_rentang }}</option>
              @endforeach
            </select>
          </div> 

           <div class="form-group">
            <label for="filter3">TAHUN</label>
            <select class="form-control " id="filter3" name="hal" >
              <option value="0">Semua</option>
              @foreach ($filter['hal'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('hal') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

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
                  <td rowspan="1" colspan="5" scope="col" ><font size="1"><strong>KODE</strong></font></td>
                  <td rowspan="1"scope="col" ><font size="1">PROGRAM/KEGIATAN/SUBKEGIATAN</strong></font></td>
                  <td rowspan="1"scope="col" ><font size="1">INDIKATOR</strong></font></td>
                  <td rowspan="1" colspan="3" scope="col" ><font size="1">TARGET RENSTRA</b></font></td>
                  <td rowspan="1" colspan="3"scope="col" ><font size="1">REALISASI RENSTRA(TAHUN LALU)</b></font></td>
                  <td rowspan="1"colspan="3" scope="col" ><font size="1">TARGET KA RENJA(TAHUN BERJALAN)</strong></font></td>
                  <td rowspan="1"colspan="8" scope="col" ><font size="1">REALISASAI KA TRIWULAN</b></font></td>
                  <td rowspan="1"colspan="3"scope="col" ><font size="1">REALISASAI KA RENJA</b></font></td>
                
                 <td rowspan="1"colspan="2" scope="col" ><font size="1">CAPAIAN KINERJA & REALISASI ANGGARAN RENJA 2022 (%)</font></td> 
                  <td rowspan="1"colspan="3" scope="col" ><font size="1">REALISASI K&A RENSTRA s/d Tahun 2022 (Akhir Tahun Pelaksanaan Renja)</font></td>
                  <td rowspan="1" colspan="2" scope="col" ><font size="1">CAPAIAN KINERJA & REALISASI ANGGARAN RENSTRA s/d Tahun 2022 (%)</font></td> 
                 
                  </tr>

                 <tr bgcolor="yellow" >
                  <td colspan="5" scope="col" ><font size="1">kode</font></td>
                  <td scope="col" ><font size="1">program</font></td>
                  <td scope="col" ><font size="1">indikator</font></td>

                   <td scope="col" ><font size="1">kinerja</font></td>
                  <td scope="col" ><font size="1">satuan</font></td>
                  <td scope="col" ><font size="1">keuangan</font></td>
                 
                 



                  <td scope="col" ><font size="1">fisik</font></td>
                  <td scope="col" ><font size="1">satuan</font></td>
                  <td scope="col" ><font size="1">keuangan</font></td>


                   <td scope="col" ><font size="1">fisik</font></td>
                  <td scope="col" ><font size="1">satuan</font></td>
                  <td scope="col" ><font size="1">keuangan</font></td>


                  <td scope="col" ><font size="1">fisik</font></td>
                  <td scope="col" ><font size="1">satuan</font></td>
                  <td scope="col" ><font size="1">keuangan</font></td>

                   <td scope="col" ><font size="1">fisik</font></td>
                  <td scope="col" ><font size="1">satuan</font></td>
                  <td scope="col" ><font size="1">keuangan</font></td>


                  <td scope="col" ><font size="1">r</font></td>
                  <td scope="col" ><font size="1">s</font></td>
                  
                


                  <td scope="col" ><font size="1">fisik</font></td>
                  <td scope="col" ><font size="1">satuan</font></td> 
                  <td scope="col" ><font size="1">keuangan</font></td>
                 


                  <td scope="col" ><font size="1">w</font></td>
                  <td scope="col" ><font size="1">x</font></td> 


                   <td scope="col" ><font size="1">fisik</font></td>
                  <td scope="col" ><font size="1">satuan</font></td> 
                  <td scope="col" ><font size="1">keuangan</font></td> 

                    <td scope="col" ><font size="1">&</font></td>
                  <td scope="col" ><font size="1">*</font></td> 
                 
                 </tr>

                 <tr bgcolor="yellow" >
                  <td colspan="5" scope="col" ><font size="1">I</font></td>
                  <td scope="col" ><font size="1">2</font></td>
                  <td scope="col" ><font size="1">3</font></td>
                  <td colspan="3" scope="col" ><font size="1">4</font></td>
                  <td colspan="3" scope="col" ><font size="1">5</font></td>
                  <td colspan="3" scope="col" ><font size="1">6</font></td>
                  <td scope="col" ><font size="1">7</font></td>
                  <td colspan="3" scope="col" ><font size="1">8</font></td>
                  <td colspan="3" scope="col" ><font size="1">9</font></td>
                  <td scope="col" ><font size="1">10</font></td>
                  <td colspan="3" scope="col" ><font size="1">11=7+8+9+10</font></td>
                  <td colspan="2"scope="col" ><font size="1">12=11/6*100</font></td>
                  <td colspan="3"scope="col" ><font size="1">13=5+11</font></td>
                  <td colspan="2"scope="col" ><font size="1">14=13/4*100%</font></td>
              
                </tr>


               <!--URUSAN/UNSUR -->
                @foreach ($data as $key => $value)
                  <tr bgcolor="#aaa">
                   <td scope="col" ><font size="1">{{ $value->id }}</font></td>
                   <td><font size="1"></font></td>
                   <td><font size="1"></font></td>
                   <td><font size="1"></font></td>
                   <td><font size="1"></font></td>
                   <td ><font size="1">{{ $value->nama }}</font></td>
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

                   @foreach ($value->kecamatan as $key => $valu)

                      <!--BIDANG URUSAN -->
                     
                    <tr bgcolor="#bbb">                   
                      <td><font size="1">{{ $value->id }}</font></td>
                      <td><font size="1">{{ $valu->id }}</font></td>
                      <td><font size="1"></font></td>
                      <td><font size="1"></font></td>
                      <td><font size="1"></font></td>
                      <td><font size="1">{{ $valu->nama }}</font></td>
                       <td ><font size="1"></font></td>
                         <td><font size="1"></font></td>
                           <td><font size="1"></font></td>
                             <td><font size="1"></font></td>
                               <td><font size="1"></font></td>
                                 <td><font size="1"></font></td>
                                 <td><font size="1"></font></td>
                            <td><font size="1"></font></td>
                              <td><font size="1"></font></td>
                    </tr>


                    @foreach ($valu->kemukiman as $key => $val)

                        @foreach ($val->renssasarprog as $key => $valit)
                           <!--PROGRAM -->

                        <tr>                     
                          <td><font size="1">{{ $value->id }}</font></td>
                          <td><font size="1">{{ $valu->id }}</font></td>
                          <td><font size="1">{{ $valit->kemukiman->id }}</font></td>
                          <td><font size="1"></font></td>
                          <td><font size="1"></font></td>
                          <td><font size="1">{{ $valit->kemukiman->nama }}</font></td> 
                          <td><font size="1"></font></td>
                            <td><font size="1"></font></td>
                              <td><font size="1"></font></td>
                              <td><font size="1"></font></td>
                              <td><font size="1"></font></td>
                              <td><font size="1"></font></td>
                              <td><font size="1"></font></td>
                              <td><font size="1"></font></td>

                       

                       
                         </tr>
                              
                              @foreach($valit->indikatorrenssasarprog as $key => $valis)         
                      
                          @foreach($valis->renssasarprogkeg as $key => $val)
                           <tr bgcolor="#eee">
                          <td><font size="1">{{ $value->id }}</font></td>
                          <td><font size="1">{{ $valu->id }}</font></td>
                          <td><font size="1">{{ $valit->kemukiman->id }}</font></td>
                          <td><font size="1">{{ $val->gampong->id }}</font></td>
                          <Td><font size="1"></font></td>
                          <td><font size="1">{{ $val->gampong->nama }}</font></td>
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

                            @foreach($val->indikatorrenssasarprogkeg as $key => $va)

                                   @foreach($va->renssasarprogkegsubkeg as $key => $v)
                                   <tr bgcolor="#eee">
                                  <td><font size="1">{{ $value->id }}</font></td>
                                  <td><font size="1">{{ $valu->id }}</font></td>
                                  <td><font size="1">{{ $valit->kemukiman->id }}</font></td>
                                  <td><font size="1">{{ $val->gampong->id }}</font></td>
                                  <Td><font size="1">{{ $v->dusun->id }}</font></td>
                                  <td><font size="1">{{ $v->dusun->nama }}</font></td>
                                  <td><font size="1">{{ $v->renssasarprogkegsubkeg_indikator }}</font></td>
                                  <td><font size="1"> </font></td>
                                   <td><font size="1"> </font></td>
                                   <td><font>{{ $v->renssasarprogkegsubkeg_lokasi }} </font> </td>  
                                   <td><font>{{ $v->bagian->nama }}</font></td>
                                   <td><font size="1"></font></td>
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
