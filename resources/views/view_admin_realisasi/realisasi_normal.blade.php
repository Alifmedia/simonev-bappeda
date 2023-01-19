@extends('view_admin_realisasi.realisasi')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" action="" method="get">
     <!--  <div class="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan no registrasi" value="{{ app('request')->input('search') }}">
        </div>

        <button type="submit" class="btn btn-primary" name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button>
      </div> -->
      <div class="filter">
       
       
        <div class="filter__input__sub">

                         
         
        </div>

          <div class="form-group">
            <label for="filter3">OPD</label>
            <select class="form-control " id="filter3" name="sektoral" {{ count($filter['sektoral']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['sektoral'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('sektoral') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
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
            <label for="filter7">MULAI</label>
            <input type="date" class="form-control date-picker" id="filter7" name="mulai" placeholder="Mulai" value="{{ app('request')->input('mulai') }}">
          </div>
          <div class="form-group">
            <label for="filter8">AKHIR</label>
            <input type="date" class="form-control date-picker" id="filter8" name="akhir" placeholder="Akhir" value="{{ app('request')->input('akhir') }}">
          </div>
         


        </div>
      </div>
    </form>

    {{-- Table --}}
    <br>
    <form id="delete-form" action="{{ route('admin.realisasi.delete') }}" method="POST">
      @csrf
      <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
          Hapus
        </button>
        <a class="btn btn-dark" href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['export' => 1])) }}">
          <i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;
          Export PDF
        </a>
      </div>
      <br>
      <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">
                    <input type="checkbox" class="check-all">
                  </th>
                  <th scope="col">NO.REKENING</th>
                 
                  <th scope="col">SUBKEGIATAN</th>
                   <th scope="col">OPD</th>
                   <th scope="col">WAKTU</th>
         
                  <th scope="col">DETAIL</th>
                 
                   
                
                 
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $value)
                  <tr>
                    <td><input type="checkbox" name="check[]" value="{{ $value->id }}" class="check"></td>
                    <td><font size="1">{{ $value->item->item_nama }}</font></td>
                    <td><font size="1">{{ $value->item->item_nama }}</font></td>
                    <td><font size="1">{{ $value->item->item_nama}}</font></td>
                    <td><font size="1">{{ $value->created_at }}</font></td>
                    
                  
                   
                                   
                    <td>
                      <a href="" data-toggle="modal" data-target="#detail-modal-{{ $value->id }}">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                      </a>
                    </td>

                 <!--     
                    <td>
                      <a href="{{ route('admin.rekammedik.peprekomorbidan', $value->id) }}">
                        <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
                      </a>
                    </td> -->

                     <!--  <td>
                      <a href="{{ route('admin.rekammedik.penormalan', $value->id) }}">
                        <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                      </a>
                    </td> -->

                   
                              

                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>
    @if (method_exists($data,'links'))
      <div class="pagination-wrapper">
        {{ $data->links() }}
      </div>
    @endif
  </div>
  @foreach ($data as $key => $value)
    <div class="modal fade" id="detail-modal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true" align="center">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
        
         <h4 align="center">REALISASI BELANJA</h4>
          <div class="card" >
              <div class="card-body" >

          <input value=" ID ITEM">
          <input value=" {{ $value->item_id }}   ">
          <input value=" NAMA ITEM ">
          <input value=" {{ $value->item->item_nama }} ">
          <input value=" REALISASI FISIK ">
          <input value=" {{ $value->realisasi_fisik }} {{ $value->item->item_satuan }}">
          <input value=" REALISASI KEUANGAN ">
          <input value=" Rp. {{ $value->realisasi_keuangan }}">
        </div>  
       </div>

          <p class="font-weight-bold m-0" align="center">DOKUMEN </p>
          <div class="card" >
              <div class="card-body" >
          <ol class="pl-4">
            @foreach ($value->item->konsultasi->dokumen as $i => $dokumen)
             
                <a href="{{ asset('uploads/'.$dokumen->lokasi_file) }}" target="_blank">{{ $dokumen->nama }}</a>
              
            @endforeach
          </ol>    
          </div>
        </div>

          <hr>
        </div>



        </div>
      </div>
    </div>
  @endforeach

@endsection
