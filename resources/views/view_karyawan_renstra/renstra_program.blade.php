@extends('view_karyawan_renstra.renstra')



@section('main-content')


 <div class="card card__table">
        <div class="card-body">
         <div class="table-responsive" >
            <table class="table table-bordered" >
              

              <thead>
                
              </thead>

              <tbody >

                   <div class="filter" >
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
           </div>
         </div>


                  <tr border="1px" bgcolor="yellow">
                      <td scope="col" ><font size="1"><b></b></font></td>
                      <td scope="col" ><font size="1"><b>TUJUAN/SASARAN/PROGRAM</b></font></td>
                      <td scope="col" ><font size="1"><b>SATUAN</b></font></td>
                      <td scope="col" ><font size="1"><b>AWAL</b></font></td>
                      <td align="center" colspan="2" scope="col" ><font size="1"><b>2023</b></font></td>
                      <td align="center" colspan="2" scope="col" ><font size="1"><b>2024</b></font></td>
                      
                      <td align="center" colspan="2" scope="col" ><font size="1"><b>2025</b></font></td>
                      
                      <td align="center" colspan="2" scope="col" ><font size="1"><b>2026</b></font></td>
                      
      
                       <td scope="col" ><font size="1"><b>EDIT</b></font></td>
                   
                     
                    </tr>




                @foreach ($data_program as $key => $value)
                  
                   <tr bgcolor="#aabbbc">
                   <!--   <td><input type="checkbox" name="check[]" value="{{ $value->id }}" class="check"></td> -->
                     <td  ><font size="1">TUJUAN</font></td>
                     <td colspan="19" ><font size="1">{{ $value->tujuan_nama }}</font></td>
                        <td  ><font size="1"></font></td>

                   </tr>
                
                  @foreach ($value->indikatortujuan as $key => $valut)
                     <tr>
                    <td rowspan="$key+1"><font size="1">INDIKATOR<br> TUJUAN</font></td>
                    <td><font size="1">{{ $valut->indikatortujuan_nama }}</font></td>
                    <td><font size="1">{{ $valut->indikatortujuan_satuan }}</font></td>
                    <td><font size="1">{{ $valut->indikatortujuan_nilaiawal }}</font></td>
                    <td><font size="1">{{ $valut->indikatortujuan_target1 }}</font></td>
                    <td><font size="1">-</font></td>
                    <td><font size="1">{{ $valut->indikatortujuan_target2 }}</font></td>
                    <td><font size="1">-</font></td>
                    <td><font size="1">{{ $valut->indikatortujuan_target3 }}</font></td>
                    <td><font size="1">-</font></td>
                    <td><font size="1">{{ $valut->indikatortujuan_target4 }}</font></td>
                    <td><font size="1">-</font></td>
                     <td><font size="1">-</font></td>
                             
                     </tr>


               
                   @foreach ($valut->renssasar as $key => $valus)
                  
                   <tr bgcolor="#aabbb">
                   <!--   <td><input type="checkbox" name="check[]" value="{{ $value->id }}" class="check"></td> -->
                    <td  ><font size="1">SASARAN</font></td>
                    <td colspan="19"  ><font size="1">{{ $valus->renssasar_teks }}</font></td>
                      <td  ><font size="1"></font></td>
                    </tr>

                     @foreach ($valus->indikatorrenssasar as $key => $valu)
                    <tr>
                      <td  ><font size="1">INDIKATOR <br>SASARAN</font></td>
                    <td><font size="1">{{ $valu->indikatorrenssasar_indikator }}</font></td>
                    <td><font size="1">{{ $valu->indikatorrenssasar_satuan }}</font></td>
                    <td><font size="1">{{ $valu->indikatorrenssasar_nilaiawal }}</font></td>
                    <td><font size="1">{{ $valu->indikatorrenssasar_target1 }}</font></td>
                    <td><font size="1">-</font></td>
                    <td><font size="1">{{ $valu->indikatorrenssasar_target2 }}</font></td>
                    <td><font size="1">-</font></td>
                    <td><font size="1">{{ $valu->indikatorrenssasar_target3 }}</font></td>
                    <td><font size="1">-</font></td>
                    <td><font size="1">{{ $valu->indikatorrenssasar_target4 }}</font></td>
                    <td><font size="1">-</font></td>
                   <td><font size="1">-</font></td>
                     </tr>
                                



                    @foreach ($valu->renssasarprog as $key => $valo)
                      <tr bgcolor="#aaa">

                      <td><font size="1">PROGRAM</font></td>
                      <td colspan="19"><font size="1">{{ $valo->kemukiman['nama'] }}</font></td>
                      

                    <td>
                      <a class="btn btn-primary" 
                          href="{{ route('karyawan_renstra.program.edit',$valo->id) }}">
                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                    </td> 


                       </tr>



                        @foreach ($valo->indikatorrenssasarprog as $key => $val)
                        <tr>
                           <td><font size="1">INDIKATOR <br>PROGRAM</font></td>
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
                            <td></td>

                      
                      

                        </tr>
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



<br><br>






{{-- PENGATURAN FILTER --}}

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

      <div class="filter" >

        <div class="filter__input__sub">
        
            <div class="form-group" >
            <label for="filter1" class="col-sm-6 " ><font size="2"> URUSAN/UNSUR</font></label>
            <select class="form-control"  id="filter1" name="kabupaten">
              <option value="0" >Semua</option>
              @foreach ($filter['kabupaten'] as $key => $value)
                <option value="{{ $value->id }}" 
                               {{ app('request')->input('kabupaten') == $value->id?'selected':''}}>
                               {{ $value->nama }}
                </option>
              @endforeach
            </select>
          </div>


          <div class="form-group">
            <label for="filter2" class="col-sm-6"><font size="2">BIDANG URUSAN</font></label>
            <select class="form-control" id="filter2" name="kecamatan" {{ count($filter['kecamatan']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['kecamatan'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('kecamatan') == $value->id ? 'selected' : '' }}>
                               {{ $value->nama }}
                </option>
              @endforeach
            </select>
          </div>

  
 
        </div> 

        </div>  

    </form>

  </div>








      <br>

    {{-- TAMPILAN TABEL DATA --}}
    <form id="delete-form" action="{{ route('karyawan_renstra.program.delete') }}" method="POST">
      @csrf
     <!--  <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
        Hapus
      </button> -->
     

      <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              

              <thead align="margin-left">
                <tr>
                  <th align="center" scope="col" ><font size="2">URUSAN/UNSUR</th>
                  <th align="center" scope="col" ><font size="2">BIDANG URUSAN</th>
                  <th align="center" scope="col" ><font size="2">N0.REKENING</font></th>
                  <th align="center" scope="col" ><font size="2">PROGRAM</th>
                  <th align="center" scope="col" ><font size="2">TAMBAH</th>
                  
                </tr>
              </thead>

              <tbody align="margin-left">
               
                @foreach($data as $key => $value)
                  <tr>
                    <td><font size="1">{{ $value->kecamatan->kabupaten->nama }}</font></td> 
                    <td><font size="1">{{ $value->kecamatan->nama }}</font></td> 
                    <td><font size="1">{{ $value->kemukiman_kode }}</font></td> 
                    <td><font size="1">{{ $value->nama }}</font></td>
                    <td>
                      <a class="btn btn-primary" 
                          href="{{ route('karyawan_renstra.program.create', 
                                  [
                                   $value->id, 
                                   $value->kemukiman_kode, 
                                   $value->nama
                                   
                                   
                                  ]
                                  ) 
                                }}">
                        <i class="fa fa-plus" aria-hidden="true"></i>
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




  
    {{-- PENGATURAN PAGING --}}
    <div class="pagination-wrapper">

       @if (method_exists($data,'links'))
      <div class="pagination-wrapper">
        {{ $data->links() }}
      </div>
       @endif

    </div>




  
     





@endsection
