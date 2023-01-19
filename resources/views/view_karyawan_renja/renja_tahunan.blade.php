@extends('view_karyawan_renja.renja')

@section('main-content')



  <div id="data">
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
            <label for="filter4">TAHUN</label>
            <select class="form-control " id="filter4" name="hal" >
              <option value="0">Semua</option>
              @foreach ($filter['hal'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('hal') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>


           <div class="form-group">
            
          </div>

          <div class="form-group">
            
          </div>

           <div class="form-group">
                  <label class="col-sm-5 col-form-label-sm">STATUS:</label>
                  <input type="text"
                         name="program" 
                        class="form-control-sm col-sm-6 " 
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
   
    <form id="delete-form" action="" method="POST">
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
                  <td rowspan="1" colspan="5" scope="col" ><font size="1"><b>KODE</b></font></td>
                  <td rowspan="1" scope="col" ><font size="1"><b>PROGRAM</b></font></td>
                  <td rowspan="1" scope="col" ><font size="1"><b>INDIKATOR</b></font></td>
                  <td colspan="4" scope="col" ><font size="1"><b>RENCANA 2023</b></font></td>
                  <td rowspan="1" scope="col" ><font size="1"><b>CATATAN PENTING</b></font></td>
                  <td colspan="2" scope="col" ><font size="1"><b>PRAKIRAAN MAJU 2024</b></font></td>
                </tr>

                <tr bgcolor="yellow" >
                  <td colspan="5" scope="col" ><font size="1"><b></b></font></td>
                  <td scope="col" ><font size="1"><b></b></font></td>
                  <td scope="col" ><font size="1"><b></b></font></td>
                  <td scope="col" ><font size="1"><b>TARGET KINERJA</b></font></td>
                  <td scope="col" ><font size="1"><b>PAGU INDIKATIF</b></font></td>
                  <td scope="col" ><font size="1"><b>LOKASI</b></font></td>
                  <td scope="col" ><font size="1"><b>SUMBERDANA</b></font></td>
                  <td scope="col" ><font size="1"><b></b></font></td>
                  <td scope="col" ><font size="1"><b>TARGET KINERJA</b></font></td>
                  <td scope="col" ><font size="1"><b>KEBUTUHAN DANA</b></font></td>
                </tr>

               <!--AWAL LOOPING PROGRAM -->
                @foreach ($data as $key => $value)
                  <tr bgcolor="#aaa">
                   <td scope="col"><font size="1">{{ $value->kemukiman->kecamatan->kabupaten->id }}</font></td>
                   <td><font size="1"></font></td>
                   <td><font size="1"></font></td>
                   <td><font size="1"></font></td>
                   <td><font size="1"></font></td>
                   <td colspan="9"><font size="1">{{ $value->kemukiman->kecamatan->kabupaten->nama }}</font></td>
                  </tr>

                  
                    <!--BIDANG URUSAN -->
                    <tr bgcolor="#bbb">                   
                      <td><font size="1">{{ $value->kemukiman->kecamatan->kabupaten->id }}</font></td>
                      <td><font size="1">{{ $value->kemukiman->kecamatan->id }}</font></td>
                      <td><font size="1"></font></td>
                      <td><font size="1"></font></td>
                      <td><font size="1"></font></td>
                      <td colspan="9"><font size="1">{{ $value->kemukiman->kecamatan->nama }}</font></td>
                    </tr>

                    <tr>                     
                      <td><font size="1">{{ $value->kemukiman->kecamatan->kabupaten->id }}</font></td>
                      <td><font size="1">{{ $value->kemukiman->kecamatan->id }}</font></td>
                      <td><font size="1">{{ $value->kemukiman->id }}</font></td>
                      <td><font size="1"></font></td>
                      <td><font size="1"></font></td>
                      <td><font size="1">{{ $value->kemukiman->nama }}</font></td> 


                     
                     
                       
                         <!--AWAL BARIS PROGRAM -->
                        

                       

                                @foreach ($value->indikatorrenssasarprog as $key => $valit)

                                <td><font size="1">{{ $valit->indikatorrenssasarprog_indikator }}</font></td>
                                <td><font size="1">{{ $valit->indikatorrenssasarprog_target1 }}
                                                   {{ $valit->indikatorrenssasarprog_satuan }}</font></td>
                                <td><font size="1">{{ $valit->indikatorrenssasarprog_targetkeuangan1 }}</font></td>
                                <td><font size="1"> - </td>
                                <td><font size="1"> -</font> </td>
                                <td><font size="1">  </td>
                                <td><font size="1"> </font> </td>  
                                <td><font size="1">  </td>        
                                @endforeach 
                         </tr>
                          <!--AKHIR BARIS PROGRAM -->  
                                       
                      

                           <!--AWAL LOOPING KEGIATAN -->
                          @foreach($valit->renssasarprogkeg as $key => $va)

                          <tr bgcolor="#eee">
                          <td><font size="1">{{ $value->kemukiman->kecamatan->kabupaten->id }}</font></td>
                          <td><font size="1">{{ $value->kemukiman->kecamatan->id }}</font></td>
                          <td><font size="1">{{ $value->kemukiman->id }}</font></td>
                          <td><font size="1">{{ $va->gampong->id }}</font></td>
                          <Td><font size="1"></font></td>
                          <td><font size="1">{{ $va->gampong->nama }}</font></td>
                                           
                                  @foreach ($va->indikatorrenssasarprogkeg as $key => $valido)
                                   <td><font size="1">a{{ $valido->indikatorrenssasarprogkeg_indikator }}</font></td>
                                   <td><font size="1">a{{ $valido->indikatorrenssasarprogkeg_target1 }}
                                                      {{ $valido->indikatorrenssasarprogkeg_satuan }}</font></td>
                                   <td><font size="1">a{{ $valido->indikatorrenssasarprogkeg_targetkeuangan1 }}</font></td>
                                   <td><font size="1">   -</font> </td>  
                                   <td><font size="1">  </font></td>
                                   <td><font size="1">  </td>
                                   <td><font size="1">  </font> </td>  
                                   <td><font size="1">  </td>
                                   @endforeach
                           </tr>

                            <!--AWAL LOOPING SUBKEGIATAN -->
                           @foreach($valido->renssasarprogkegsubkeg as $key => $v)
                            <tr bgcolor="#eee">
                             <td><font size="1">{{ $value->kemukiman->kecamatan->kabupaten->id }}</font></td>
                             <td><font size="1">{{ $value->kemukiman->kecamatan->id }}</font></td>
                             <td><font size="1">{{ $value->kemukiman->id }}</font></td>
                            
                             <td><font size="1">{{ $va->gampong->id }}</font></td>

                             <Td><font size="1">{{ $v->dusun->id }}</font></td>
                             <td><font size="1">{{ $v->dusun->nama }}</font></td>
                             <td><font size="1">{{ $v->renssasarprogkegsubkeg_indikator }} </font></td>
                             <td><font size="1">{{ $v->renssasarprogkegsubkeg_targetkinerja }}</font></td>
                             <td><font size="1">{{ $v->renssasarprogkegsubkeg_paguindikatif }} </font></td>
                             <td><font size="1">{{ $v->renssasarprogkegsubkeg_lokasi }} </font> </td>  
                             <td><font size="1">{{ $v->bagian->nama }}</font></td>
                             <td><font size="1">aaa  </td>
                             <td><font size="1"> </font> </td>  
                             <td><font size="1">  </td>
                            </tr>

                             @endforeach
                            <!--AKHIR LOOPING SUBKEGIATAN -->


                           @endforeach
                           <!--AKHIR LOOPING KEGIATAN -->


                       @endforeach
                       <!--AKHIR LOOPING PROGRAM -->

                  
                     <!--AKHIR LOOPING KEMUKIMAN -->

          

                      <!--AKHIR LOOPING KECAMATAN -->


      

                 <!--AKHIR LOOPING KABUPATEN -->

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
