@extends('view_karyawan_renstra.renstra')

@section('main-content')

 <div class="card card__table">
        <div class="card-body">
         <div class="table-responsive" >
            <table class="table table-bordered" >
              

              <thead>
                
              </thead>

              <tbody border="1px">

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
                      <td scope="col" ><font size="1"><b>PROGRAM/KEGIATAN</b></font></td>
                      <td scope="col" ><font size="1"><b>INDIKATOR</b></font></td>
                      <td scope="col" ><font size="1"><b>SATUAN</b></font></td>
                      <td scope="col" ><font size="1"><b>AWAL</b></font></td>
                      <td align="center" colspan="2" scope="col" ><font size="1"><b>2023</b></font></td>
                      <td align="center" colspan="2" scope="col" ><font size="1"><b>2024</b></font></td>
                      
                      <td align="center" colspan="2" scope="col" ><font size="1"><b>2025</b></font></td>
                      
                      <td align="center" colspan="2" scope="col" ><font size="1"><b>2026</b></font></td>
                     
                      <td scope="col" ><font size="1"><b>KEGIATAN</b></font></th>
                     
                    </tr>


                    @foreach($renssasarprog as $key => $value)
                  
                   <tr bgcolor="#aabbb">
                   <!--   <td><input type="checkbox" name="check[]" value="{{ $value->id }}" class="check"></td> -->
                    
                        <td><font size="1">{{ $value->kemukiman['nama'] }}</font></td>

                        @foreach ($value->indikatorrenssasarprog as $key => $valu)
                        <td><font size="1">{{ $valu->indikatorrenssasarprog_indikator }}</font></td>
                        <td><font size="1">{{ $valu->indikatorrenssasarprog_satuan }}</font></td>
                        <td><font size="1">{{ $valu->indikatorrenssasarprog_nilaiawal }}</font></td>
                        <td><font size="1">{{ $valu->indikatorrenssasarprog_target1 }}</font></td>
                        <td><font size="1">{{ $valu->indikatorrenssasarprog_targetkeuangan1 }}</font></td>
                        <td><font size="1">{{ $valu->indikatorrenssasarprog_target2 }}</font></td>
                        <td><font size="1">{{ $valu->indikatorrenssasarprog_targetkeuangan2 }}</font></td>
                        <td><font size="1">{{ $valu->indikatorrenssasarprog_target3 }}</font></td>
                        <td><font size="1">{{ $valu->indikatorrenssasarprog_targetkeuangan3 }}</font></td>
                        <td><font size="1">{{ $valu->indikatorrenssasarprog_target4 }}</font></td>
                        <td><font size="1">{{ $valu->indikatorrenssasarprog_targetkeuangan4 }}</font></td>
                        
                         @endforeach

                         <td><font size="1"></font>
                          <a class="btn btn-primary" 
                          href="{{ route('karyawan_renstra.kegiatan.create',
                                         [$value->id, 
                                          $value->kemukiman->id, 
                                          $value->kemukiman->kemukiman_kode, 
                                          $value->kemukiman->nama
                                         ]
                                         ) }}">
                         <i class="fa fa-plus" aria-hidden="true"></i>
                         </a>
                        </td> 
     
                     </tr>



                    @foreach($valu->renssasarprogkeg as $key => $valo)
                      <tr bgcolor="#aaa">
                   
                       <td><font size="1">{{ $valo->gampong['nama'] }}</font></td>

                        @foreach ($valo->indikatorrenssasarprogkeg as $key => $val)
                        <td><font size="1">{{ $val->indikatorrenssasarprogkeg_indikator }}</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasarprogkeg_satuan }}</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasarprogkeg_nilaiawal }}</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasarprogkeg_target1 }}</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasarprogkeg_targetkeuangan1 }}</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasarprogkeg_target2 }}</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasarprogkeg_targetkeuangan2 }}</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasarprogkeg_target3 }}</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasarprogkeg_targetkeuangan3 }}</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasarprogkeg_target4 }}</font></td>
                        <td><font size="1">{{ $val->indikatorrenssasarprogkeg_targetkeuangan4 }}</font></td>
                           
                    <td>
                      <a class="btn btn-primary" 
                          href="{{ route('karyawan_renstra.kegiatan.edit',$valo->id) }}">
                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                    </td> 
 
                         @endforeach 
     

                   
                

                                     
                     @endforeach 

                    </tr>

                 
                @endforeach
               
               
              </tbody>
            </table>
          </div>

        </div>
      </div>


<br><br><br>




{{-- TAMPILAN TABEL FILTER --}}

<!-- <div id="data"> 
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
            <label for="filter1" class="col-sm-4.5 " ><h6>URUSAN</h6></label>
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
            <label for="filter2" class="col-sm-4.5"><h6>BIDANG</h6></label>
            <select class="form-control" id="filter2" name="kecamatan" {{ count($filter['kecamatan']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['kecamatan'] as $key => $value)
                <option value="{{ $value->id }}" 
                               {{ app('request')->input('kecamatan') == $value->id ? 'selected' : '' }}>
                               {{ $value->nama }}</option>
              @endforeach
            </select>
          </div>


           <div class="form-group">
            <label for="filter3" class="col-sm-4.5"><h6>PROGRAM</h6></label>
            <select class="form-control" id="filter3" name="kemukiman" {{ count($filter['kemukiman']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['kemukiman'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('kemukiman') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

        </div> 

        </div>  

    </form>

  </div>
 -->






<br>










    {{-- TAMPILAN TABEL DATA --}}
  
   <!--  <form id="delete-form" action="{{ route('karyawan_renstra.kegiatan.delete') }}" method="POST">
      @csrf
     <!--  <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
        Hapus
      </button> 
     

      <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              

              <thead>
                <tr>
                 
           
                  <th scope="col" ><font size="2">PROGRAM</th>
                  <th scope="col" ><font size="2">N0.REKENING</font></th>
                  <th scope="col" ><font size="2">KEGIATAN</font></th>
                  <th scope="col" ><font size="2">TAMBAH</th>
                  
                </tr>
              </thead>



              <tbody>
               
                @foreach ($data as $key => $value)
                  <tr>
                    
                   
                    <td><font size="1">{{ $value->kemukiman->nama }}</font></td> 
                    <td><font size="1">{{ $value->gampong_kode }}</font></td> 
                    <td><font size="1">{{ $value->nama }}</font></td>
                    <td>
                      <a class="btn btn-primary" 
                          href="{{ route('karyawan_renstra.kegiatan.create', 
                                  [
                                   $value->id, 
                                   $value->gampong_kode, 
                                   $value->nama,
                                   $value->kemukiman->id, 
                                   $value->kemukiman->kemukiman_kode, 
                                   $value->kemukiman->nama
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


  
 -->

    {{-- PENGATURAN PAGING --}}
  <!--   <div class="pagination-wrapper">

       @if (method_exists($data,'links'))
      <div class="pagination-wrapper">
        {{ $data->links() }}
      </div>
    @endif
    </div>
 -->
  


  

@endsection
