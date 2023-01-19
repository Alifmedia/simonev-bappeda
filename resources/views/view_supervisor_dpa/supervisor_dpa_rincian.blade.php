@extends('view_supervisor_dpa.dpa')

@section('main-content')



  <div id="data" >
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
   
    <form id="delete-form" action="{{ route('supervisor_dpa.kegiatan.delete') }}" method="POST">
      @csrf
     <!--  <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
        Hapus
      </button> -->

      <div class="card card__table" style="width: 100%;">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              

              <thead>
                
              </thead>

              <tbody>
                <tr bgcolor="yellow" >
                  <td colspan="5" scope="col" ><font size="1.5"><strong>KODE</strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>URAIAN</strong></font></td>
                  <td scope="col" ><font size="1.5"><strong>KOEFISIEN</strong></font></td>
                  <td scope="col" ><font size="1"><b>SATUAN</b></font></td>
                  <td scope="col" ><font size="1"><b>HARGA</b></font></td>
                  <td scope="col" ><font size="1.5"><strong>PPN</strong></font></td>
                  <td scope="col" ><font size="1"><b>JUMLAH</b></font></td>
                </tr>

               <!--URUSAN/UNSUR -->
                @foreach ($data as $key => $value)
                  <tr bgcolor="#aaa">
                   <td scope="col" ><font size="1">{{ $value->subrinob->rinob->objek->jenis->kelompok->kelompok_kode }}</font></td>
                   <td><font size="1"></font></td>
                   <td><font size="1"></font></td>
                   <td><font size="1"></font></td>
                   <td><font size="1"></font></td>
                   <td ><font size="1">{{ $value->subrinob->rinob->objek->jenis->kelompok->kelompok_nama }}</font></td>
                    <td colspan="5"><font size="1"></font></td>
                  </tr>

                

                      <!--BIDANG URUSAN -->
                     
                    <tr bgcolor="#bbb">                   
                      <td><font size="1">{{ $value->subrinob->rinob->objek->jenis->kelompok->kelompok_kode }}</font></td>
                      <td><font size="1">{{ $value->subrinob->rinob->objek->jenis->jenis_kode }}</font></td>
                      <td><font size="1"></font></td>
                      <td><font size="1"></font></td>
                      <td><font size="1"></font></td>
                      <td ><font size="1">{{ $value->subrinob->rinob->objek->jenis->jenis_nama }}</font></td>
                       <td colspan="5"><font size="1"></font></td>
                    </tr>


                  

                      <!--BIDANG URUSAN -->
                     
                    <tr bgcolor="#bbb">                   
                      <td><font size="1">{{ $value->subrinob->rinob->objek->jenis->kelompok->kelompok_kode }}</font></td>
                      <td><font size="1">{{ $value->subrinob->rinob->objek->jenis->jenis_kode }}</font></td>
                      <td><font size="1">{{ $value->subrinob->rinob->objek->objek_kode }}</font></td>
                      <td><font size="1"></font></td>
                      <td><font size="1"></font></td>
                      <td ><font size="1">{{ $value->subrinob->rinob->objek->objek_nama }}</font></td>
                       <td colspan="5"><font size="1"></font></td>
                    </tr>




                

                      <!--BIDANG URUSAN -->
                     
                    <tr bgcolor="#bbb">                   
                      <td><font size="1">{{ $value->subrinob->rinob->objek->jenis->kelompok->kelompok_kode }}</font></td>
                      <td><font size="1">{{ $value->subrinob->rinob->objek->jenis->jenis_kode }}</font></td>
                      <td><font size="1">{{ $value->subrinob->rinob->objek->objek_kode }}</font></td>
                      <td><font size="1">{{ $value->subrinob->rinob->rinob_kode }}</font></td>
                      <td><font size="1"></font></td>
                      <td ><font size="1">{{ $value->subrinob->rinob->rinob_nama }}</font></td>
                       <td colspan="5"><font size="1"></font></td>
                    </tr>

                      

                      <!--BIDANG URUSAN -->
                     
                    <tr bgcolor="#bbb">                   
                      <td><font size="1">{{ $value->subrinob->rinob->objek->jenis->kelompok->kelompok_kode }}</font></td>
                      <td><font size="1">{{ $value->subrinob->rinob->objek->jenis->jenis_kode }}</font></td>
                      <td><font size="1">{{ $value->subrinob->rinob->objek->objek_koefisien }}</font></td>
                      <td><font size="1">{{ $value->subrinob->rinob->rinob_koefisien }}</font></td>
                      <td><font size="1">{{ $value->subrinob->subrinob_koefisien }}</font></td>
                      <td ><font size="1">{{ $value->subrinob->subrinob_nama }}</font></td>
                       <td colspan="5"><font size="1"></font></td>
                    </tr>

                    <tr>
                        @foreach ($value->item as $key => $valid)
                           <!--PROGRAM -->

                                         
                        <tr bgcolor="#bbb"> 
                         <td colspan="5" scope="col" ><font size="1.5">{{ $valid->item_lingkup }}</font></td>                  
                        <td><font size="1">{{ $valid->item_nama }}</font></td>
                        <td><font size="1">{{ $valid->item_koefisien }} {{ $valid->item_satuan }}</font></td>
                        <td><font size="1">{{ $valid->item_satuan }}</font></td>
                        <td><font size="1">{{ $valid->item_harga }}</font></td>
                        <td><font size="1">{{ $valid->item_ppn }}</font></td>
                        <td><font size="1">{{ $valid->item_jumlah }}</font></td> 

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


 
@endsection
