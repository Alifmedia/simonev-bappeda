@extends('view_karyawan_matrix.matrix')

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
          <!--

          <div class="form-group">
            <label for="filter6">UNIT KERJA</label>
            <select class="form-control" id="filter6" name="unsur">
              <option value="0">Semua</option>
              @foreach ($filter['unsur'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('unsur') == $value->id  ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div> -->

        

          <!-- <div class="form-group">
            <label for="filter8">AKHIR</label>
            <input type="date" class="form-control date-picker" id="filter8" name="akhir" placeholder="Akhir" value="{{ app('request')->input('akhir') }}">
          </div> -->
         


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
                <tr  >
                  <td scope="col" ><font size="1.5"></font></td>
                  <td scope="col" ><font size="1.5"><strong>URUSAN</strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>INDIKATOR</strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>TARGET</strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>PAGU</strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>SUMBER</strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>LOKASI</strong></font></td>
               </tr>
                @foreach ($data as $key => $value)
                  <!-- <tr bgcolor="#aaa">
                     <td><input type="checkbox" name="check[]" value="{{ $value->id }}" class="check"></td> -->
                   <!--  <td><font size="1">Sasaran</font></td>
                    <td><font size="1">{{ $value->renssasar_teks }}</font></td>
                    <td><font size="1">{{ $value->renssasar_indikator }}</font></td>
                   <td><font size="1">{{ $value->renssasar_nilaiawal }}</font></td>
                   <td scope="col" ><font size="1.5"><strong></strong></font></td>
                   <td scope="col" ><font size="1.5"><strong></strong></font></td>
                   <td scope="col" ><font size="1.5"><strong></strong></font></td>
                       
                     </tr>  -->


                   

                     @foreach ($value->renssasarprog as $key => $valu)
                      <tr bgcolor="#bbb">

                    <td><font size="1">Program</font></td>    
                    <td><font size="1">{{ $valu->kemukiman['nama'] }}</font></td>
                    <td><font size="1">{{ $valu->renssasarprog_indika }}</font></td>
                    <td><font size="1">{{ $valu->renssasarprog_nilaiawal }}</font></td>
                    <td scope="col" ><font size="1.5"><strong></strong></font></td>
                    <td scope="col" ><font size="1.5"><strong></strong></font></td>
                     <td scope="col" ><font size="1.5"><strong></strong></font></td>
                   
                     </tr>

                      @foreach ($valu->renssasarprogkeg as $key => $val)

                       <tr bgcolor="#eee">
                      <td><font size="1">Kegiatan</font></td>
                      <td><font size="1">{{ $val->gampong['nama'] }}</font></td>
                      <td><font size="1">{{ $val->renssasarprogkeg_indika }}</font></td>
                      <td><font size="1">{{ $val->renssasarprogkeg_nilaiawal }}</font></td>
                      <td scope="col" ><font size="1.5"><strong></strong></font></td>
                      <td scope="col" ><font size="1.5"><strong></strong></font></td>
                       <td scope="col" ><font size="1.5"><strong></strong></font></td>
                    
                    </tr>

                    @foreach ($val->renssasarprogkegsubkeg as $key => $valo)

                       <tr>

                      
                      <td><font size="1">Subkegiatan</font></td>
                      <td><font size="1">{{ $valo->dusun['nama'] }}</font></td>
                      <td><font size="1">{{ $valo->renssasarprogkegsubkeg_indikator }}</font></td>
                      <td><font size="1">{{ $valo->renssasarprogkegsubkeg_target }}</font></td>
                      <td><font size="1">{{ $valo->renssasarprogkegsubkeg_paguindikatif }}</font></td>
                      <td><font size="1">{{ $valo->renssasarprogkegsubkeg_sumberdana }}</font></td>
                      <td><font size="1">{{ $valo->renssasarprogkegsubkeg_lokasi }}</font></td>
                    
                      
                      
                    
                       </tr>
                       @endforeach




                       @endforeach 
                   

                       

                     @endforeach 

                    
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

             </tbody>
      
@endforeach
@endsection
