@extends('view_supervisor_rekammedik.supervisor')

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

      <div class="filter"  >

        <div class="filter__input__sub">

           <div class="form-group">
            <label for="filter5" class="col-sm-5  col-form-label-sm">TAHUN APBK</label>
            <select class="form-control-sm col-sm-6" id="filter5" name="hal" {{ count($filter['hal']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['hal'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('hal') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

           <div class="form-group">
            <label for="filter6" class="col-sm-5  col-form-label-sm">JENIS APBK</label>
            <select class="form-control-sm col-sm-6" id="filter6" name="unsur" {{ count($filter['unsur']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['unsur'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('unsur') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>


           <div class="form-group">
            <label for="filter7" class="col-sm-6  col-form-label-sm">SUMBER DANA</label>
            <select class="form-control-sm col-sm-6" id="filter7" name="bagian" {{ count($filter['unsur']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['bagian'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('bagian') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

           


        </div>
        

        </div>  
      </div>
    </form>




    {{-- Table --}}
    <br>
    <form id="delete-form" action="{{ route('supervisor_rekammedik.supervisor_rm.delete') }}" method="POST">
      @csrf
     
      <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              

              <thead>
                <tr>
                  <th scope="col" ><font size="2"></font></th>             
                
                  
              
                  
                </tr>
              </thead>

              <tbody >
               <figure class="highcharts-figure">
                <div id="belanja" align="center"></div>
              </figure>
              <br><br>

           <!--    <figure class="highcharts-figure">
                <div id="sumberdana" align="center"></div>
              </figure>
                -->
              </tbody>




            </table>
          </div>
        </div>
      </div>
    </form>
    <div class="pagination-wrapper">
   
    </div>
  </div>


  @foreach ($data as $key => $value)
   
    <div class="modal fade" id="detail-modal-{{ $value->real_id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
      

      <div class="modal-dialog" role="document">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="detailModalTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        <div class="modal-body" align="center">        
        <h4 align="center">REALISASI BELANJA</h4>      
        <div class="card" >
          <div class="card-body" >
          <input value=" OPERASI">
          <input value=" Rp. {{ $value->jur_beloperasi }}   ">
          <input value=" MODAL ">
          <input value=" Rp. {{ $value->jur_belmodal }} ">
          <input value=" TIDAK TERDUGA ">
          <input value=" Rp. {{ $value->jur_beltakterduga }}">
          <input value=" TRANSFER ">
          <input value=" Rp. {{ $value->jur_beltransfer }}">
          </div>
        </div>
        </div>

    </div>
    </div>
  </div>

  @endforeach

@endsection
