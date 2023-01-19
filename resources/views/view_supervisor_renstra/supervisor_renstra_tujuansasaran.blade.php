@extends('view_supervisor_renstra.renstra')

@section('main-content')

  <div id="data">
    @include('template.flash')
   
    {{-- TAMPILAN TABEL DATA --}}


     <div class="filter" align="margin-right">
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
         </div>
       </div>
      <br>



                
    <form id="delete-form" action="{{ route('supervisor_renstra.tujuansasaran.delete') }}" method="POST">
      @csrf

     <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
        Hapus
      </button> 

      
       <a class="btn btn-primary" href="{{ route('supervisor_renstra.tujuansasaran.create') }}">
        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
        Tambah
      </a>

    
      <br>

        <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
              

              <thead>
               <center><h5>TUJUAN</h5></center>

              </thead>

              <tbody>
  




                 

                @foreach ($data as $key => $value)


                                    
                @foreach ($value->tujuan as $key => $valu)
                 

                    <tr bgcolor="">
                    <td><font size="2">TUJUAN:</font></td>            
                    <td colspan="6" align="margin-left"><font size="3">{{ $valu->tujuan_nama }}</font></td>

                    <td></td>

                   
                    <td  align="margin-right"><font size="1"> 
                    <a class="btn btn-primary" href="{{ route('supervisor_renstra.tujuansasaran.edit', 
                                                              [$valu->renstra->id, 
                                                               $valu->id
                                                              ]
                                                              ) 
                                                     }}">
                     EDIT
                    </a> 
                  </font>
                    </td>

                    
                    </tr>


                    <tr>
                  <th scope="col" ><font size="1"><b><center>NO</center></b></font></th>
                  <th scope="col" ><font size="1"><b>INDIKATOR</b></font></th>
                  <th scope="col" ><font size="1"><b>SATUAN</b></font></th>
                  <th scope="col" ><font size="1"><b>AKTUAL</b></font></th>
                  <th scope="col" ><font size="1"><b>2023</b></font></th>
                  <th scope="col" ><font size="1"><b>2024</b></font></th>
                  <th scope="col" ><font size="1"><b>2025</b></font></th>
                  <th scope="col" ><font size="1"><b>2026</b></font></th>
                   <th scope="col" ><font size="1"><b></b></font></th>

                            
                </tr>


                    @foreach($valu->indikatortujuan as $key => $val)
                    <tr bgcolor="">
                       <td align="margin-left"><font size="1"><center>{{ $key+1 }}</center></font></td> 
                 
                    <td align="margin-left"><font size="1">{{ $val->indikatortujuan_nama }}</font></td>
                    <td align="margin-left"><font size="1">{{ $val->indikatortujuan_satuan }}</font></td>
                    <td align="margin-left"><font size="1">{{ $val->indikatortujuan_nilaiawal }}</font></td>
                    <td align="margin-left"><font size="1">{{ $val->indikatortujuan_target1 }}</font></td>
                    <td align="margin-left"><font size="1">{{ $val->indikatortujuan_target2 }}</font></td>
                    <td align="margin-left"><font size="1">{{ $val->indikatortujuan_target3 }}</font></td>
                    <td align="margin-left"><font size="1">{{ $val->indikatortujuan_target4 }}</font></td>
                    <td  align="margin-right"><font size="1"> 
                    <a class="btn btn-primary" href="{{ route('karyawan_renstra.sasaran.create', 
                                                              
                                                               $val->id
                                                           
                                                              ) 
                                                     }}">
                     +SASARAN
                    </a> 
                  </font>
                    </td>
                     </tr>
                     
       
                    @endforeach

                
                
                     @endforeach



             

                 @endforeach
               
              </tbody>


            </table>

             
          </div>
        </div>
      </div>

    </form>

    <br>







    <form id="delete-form" action="{{ route('supervisor_renstra.sasaran.delete') }}" method="POST">
      @csrf

     <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
        Hapus
      </button> 

      
    

    
      <br>

        <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
              

              <thead>
               <center><h5>SASARAN</h5></center>
              </thead>

              <tbody>
              

                @foreach ($data_tujuan as $key => $value)



                @foreach ($value->indikatortujuan as $key => $valu)
                 <tr bgcolor="">
                    <td><font size="1">INDIKATOR TUJUAN</font></td>            
                    <td colspan="7" align="margin-left"><font size="2">{{ $valu->indikatortujuan_nama }}</font></td>
                   
                 </tr> 

                 @foreach ($valu->renssasar as $key => $val)
                 
                    <tr bgcolor="">
                    <td><font size="1">({{ $key+1 }}) SASARAN:</font></td>            
                    <td colspan="6" align="margin-left"><font size="3">{{ $val->renssasar_teks }}</font></td>
                    <td  align="margin-right"><font size="1"> 
                    <a class="btn btn-primary" href="{{ route('supervisor_renstra.sasaran.edit', 
                                                              [
                                                               $valu->id, 
                                                               $val->id
                                                               ]
                                                              ) 
                                                     }}">
                     Edit
                    </a>  
                  </font>
                    </td>
                    
                    </tr>

                    
                   <tr>
                  <th scope="col" ><font size="1"><b><center>NO</center></b></font></th>
                  <th scope="col" ><font size="1"><b>INDIKATOR</b></font></th>
                  <th scope="col" ><font size="1"><b>SATUAN</b></font></th>
                  <th scope="col" ><font size="1"><b>AKTUAL</b></font></th>
                  <th scope="col" ><font size="1"><b>2023</b></font></th>
                  <th scope="col" ><font size="1"><b>2024</b></font></th>
                  <th scope="col" ><font size="1"><b>2025</b></font></th>
                  <th scope="col" ><font size="1"><b>2026</b></font></th>
                            
                </tr>
              

                    @foreach($val->indikatorrenssasar as $key => $va)
                    <tr bgcolor="">
            
                    <td align="margin-left"><font size="1"><center>{{ $key+1 }}</center></font></td>
                    <td align="margin-left"><font size="1">{{ $va->indikatorrenssasar_indikator }}</font></td>
                    <td align="margin-left"><font size="1">{{ $va->indikatorrenssasar_satuan }}</font></td>
                    <td align="margin-left"><font size="1">{{ $va->indikatorrenssasar_nilaiawal }}</font></td>
                    <td align="margin-left"><font size="1">{{ $va->indikatorrenssasar_target1 }}</font></td>
                    <td align="margin-left"><font size="1">{{ $va->indikatorrenssasar_target2 }}</font></td>
                    <td align="margin-left"><font size="1">{{ $va->indikatorrenssasar_target3 }}</font></td>
                    <td align="margin-left"><font size="1">{{ $va->indikatorrenssasar_target4 }}</font></td               
                                        
                   
                  </tr>
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


    </div>




@endsection
