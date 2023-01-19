@extends('view_admin_renja.renja')

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






      <div class="filter" align="margin-right"  >

      <div class="filter__input__sub" >

      <div class="form-group" >
            <label for="filter1" class="col-sm-0 " ><h6>URUSAN</h6></label>
            <select class="form-control"  id="filter1" name="kabupaten">
              URUSAN<option value="0" >Semua</option>
              @foreach ($filter['kabupaten'] as $key => $value)
                <option value="{{ $value->id }}" 
                               {{ app('request')->input('kabupaten') == $value->id?'selected':''}}>{{ $value->nama }}
                </option>
              @endforeach
            </select>
          </div>



          <div class="form-group" >
            <label for="filter2" class="col-sm-0"><h6>BIDANG</h6></label>
            <select class="form-control" id="filter2" name="kecamatan" {{ count($filter['kecamatan']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['kecamatan'] as $key => $value)
                <option value="{{ $value->id }}" 
                               {{ app('request')->input('kecamatan') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group" >
            <label for="filter3" class="col-sm-0"><h6>PROGRAM</h6></label>
            <select class="form-control" id="filter3" name="kemukiman" {{ count($filter['kemukiman']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['kemukiman'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('kemukiman') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>
          

        </div>


        <div class="filter__input__sub" align="margin-right">  

                   

           <div class="form-group">
            <label for="filter4" class="col-sm-0"><h6>KEGIATAN</h6></label>
            <select class="form-control" id="filter4" name="gampong" {{ count($filter['gampong']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['gampong'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('gampong') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

           <div class="form-group">
            <label for="filter4" class="col-sm-0"><h6>SUBKEGIATAN</h6></label>
            <select class="form-control" id="filter5" name="dusun" {{ count($filter['dusun']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['dusun'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('dusun') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

           <div class="form-group" >
            <label  for="filter5" class="col-sm-0">BARIS</label>
            <select class="form-control col-sm-6-sm" id="filter5" name="pagination">
              @foreach ([15,30,50] as $key => $value)
                <option value="{{ $value}}" {{ app('request')->input('pagination') == $value  ? 'selected' : '' }}>{{ $value }}</option>
              @endforeach
              <option value="0">Semua</option>
            </select>
          </div> 


         

        </div>
<br>
          <div class="filter__input__sub"  >  

         
</div>
        
        </div>




    </form>





<br>


    {{-- TAMPILAN TABEL DATA --}}
  
    <form id="delete-form" action="" method="POST">
      @csrf
     <!--  <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
        Hapus
      </button> -->
     

      <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              

              <thead>
                <tr>
                 
                  <th scope="col" ><font size="2">N0.REKENING</font></th>
                  <th scope="col" ><font size="2">KEGIATAN</th>
                  <th scope="col" ><font size="2">SUBKEGIATAN</th>
                  <th scope="col" ><font size="2">TAMBAH</th>
                  
                </tr>
              </thead>

              <tbody>
               
                @foreach ($data as $key => $value)
                  <tr>

                    <td><font size="1">{{ $value->gampong_kode }}</font></td> 
                    <td><font size="1">{{ $value->kemukiman->nama }}</font></td>
                    <td><font size="1">{{ $value->nama }}</font></td>
                    <td>
                      <a class="btn btn-primary" 
                          href="{{ route('karyawan_renja.subkegiatan.create',
                                          [ $value->id, 
                                            $value->kemukiman->id, 
                                            $value->gampong_kode,       
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
  
    @if (method_exists($data,'links'))
      <div class="pagination-wrapper">
        {{ $data->links() }}
      </div>
    @endif 
   

  </div>







  {{-- PENGATURAN MODAL DETAIL --}}
  @foreach($data as $key => $value)
    <div class="modal fade" id="detail-modal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="detailModalTitle">
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body" align="center">
          
        
         <h4 align="center">INPUTAN ANGGARAN</h4>
          <div class="card" >
          <div class="card-body" >

          <input value=" BELANJA OPERASI">
          <input value=" Rp. {{ $value->bel_operasi }}   ">
          <input value=" BELANJA MODAL ">
          <input value=" Rp. {{ $value->bel_modal }} ">
          <input value=" BELANJA TIDAK TERDUGA ">
          <input value=" Rp. {{ $value->bel_takterduga }}">
          <br>
          <input value=" BELANJA TRANSFER ">
          <input value=" Rp. {{ $value->bel_transfer }}">
          
        </div>

        
       </div>

         
                
    
          </div>
        </div>
      </div>
    </div>
  @endforeach

@endsection
