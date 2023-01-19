@extends('view_admin_karyawan.karyawan')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" action="" method="get">
      <div class="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan Nomor Induk Karyawan" value="{{ app('request')->input('search') }}">
        </div>

        <button type="submit" class="btn btn-primary" name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button>
      </div>
      <div class="filter">
       
        <div class="filter__input__sub">

          <div class="form-group">
            <label for="filter3">OPD</label>
            <select class="form-control" id="filter3" name="sektoral" {{ count($filter['sektoral']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['sektoral'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('sektoral') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
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
        

          
          
        </div>
        <div class="filter__input__sub">
           


          <!--   <div class="form-group">
            <label for="filter1">KABUPATEN</label>
            <select class="form-control" id="filter1" name="kabupaten">
              <option value="0">Semua</option>
              @foreach ($filter['kabupaten'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('kabupaten') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="filter2">KECAMATAN</label>
            <select class="form-control" id="filter2" name="kecamatan" {{ count($filter['kecamatan']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['kecamatan'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('kecamatan') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

                   <div class="form-group">
            <label for="filter9">JUMLAH BARIS</label>
            <select class="form-control" id="filter9" name="pagination">
              @foreach ([15,30,50] as $key => $value)
                <option value="{{ $value}}" {{ app('request')->input('pagination') == $value  ? 'selected' : '' }}>{{ $value }}</option>
              @endforeach
              <option value="0">Semua</option>
            </select>
          </div> -->
         
        </div>
        <div class="filter__input__sub">
          
         
        </div>
      </div>
    </form>

    {{-- Table --}}
    <br>
    <form id="delete-form" action="{{ route('admin.karyawan.delete') }}" method="POST">
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
                  <th scope="col">NIK</th>
                  <th scope="col">NAMA LENGKAP</th>
                  <th scope="col">DEPARTEMEN</th>
                  <th scope="col">TIPE KERJA</th>
                  <th scope="col">DETAIL</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $value)
                  <tr>
                    <td><input type="checkbox" name="check[]" value="{{ $value->id }}" class="check"></td>
                    <td>{{ $value->NIK }}</td>
                    <td>{{ $value->Nama }}</td>
                    <td>{{ $value->sektoral['nama'] }}</td>
                    <td>{{ $value->hal['nama'] }}</td> 
                   <td>
                      <a href="" data-toggle="modal" data-target="#detail-modal-{{ $value->id }}">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
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
    @if (method_exists($data,'links'))
      <div class="pagination-wrapper">
        {{ $data->links() }}
      </div>
    @endif
  </div>
  @foreach ($data as $key => $value)
    <div class="modal fade" id="detail-modal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="detailModalTitle">{{ $value->umum['Nama'] }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <p class="font-weight-bold h4">DATA KARYAWAN</p><br>
          

          <p class="font-weight-bold m-0">TEMPAT LAHIR</p>
          <p>{{ $value->Tempat_Lahir }}</p>

          <p class="font-weight-bold m-0">TANGGAL_LAHIR</p>
          <p>{{ $value->Tanggal_Lahir }}</p>

          <p class="font-weight-bold m-0">ALAMAT</p>
          <p>{{ $value->Alamat }}</p>
                  
          <p class="font-weight-bold m-0">HANDPHONE</p>
          <p>{{ $value->No_Handphone }}</p>

          <p class="font-weight-bold m-0">EMAIL</p>
          <p>{{ $value->Email }}</p>

          <p class="font-weight-bold m-0">GOLONGAN DARAH</p>
          <p>{{ $value->Goldar }}</p>

        <p class="font-weight-bold m-0">STATUS PERNIKAHAN</p>
          <p>{{ $value->Status_Nikah }}</p>

          <p class="font-weight-bold m-0">NO ASURANSI</p>
          <p>{{ $value->No_Asuransi }}</p>

          <p class="font-weight-bold m-0">NO BPJS KESEHATAN</p>
          <p>{{ $value->No_BPJSKes }}</p>

                  
          
          
          <p class="font-weight-bold m-0">STATUS OLAHRAGA</p>
          <p>{{ $value->umum['Olahraga'] }}</p>

          <p class="font-weight-bold m-0">OBAT KONSUMSI</p>
          <p>{{ $value->umum['Obat_Konsumsi'] }}</p>

          <p class="font-weight-bold m-0">RIWAYAT PENYAKIT PRIBADI</p>
          <p>{{ $value->umum['Riwayat_Penyakit'] }}</p>

           <p class="font-weight-bold m-0">RIWAYAT PENYAKIT KELUARGA</p>
          <p>{{ $value->umum['Riwayat_Penyakit_Keluarga'] }}</p>

          <p class="font-weight-bold m-0">ALERGI MAKANAN</p>
          <p>{{ $value->umum['Alergi_Makanan'] }}</p>

          <p class="font-weight-bold m-0">ALERGI OBAT</p>
          <p>{{ $value->umum['Alergi_Obat'] }}</p>

                  
          
          
          <p class="font-weight-bold m-0">PAPARAN LINGKUNGAN</p>
          <p>{{ $value->umum['Paparan_Lingkungan'] }}</p>

          <p class="font-weight-bold m-0">URAIAN KERJA</p>
          <p>{{ $value->umum['Uraian_Kerja'] }}</p>


          

          <p class="font-weight-bold m-0">Dokumen</p>
          <ol class="pl-4">
            @foreach ($value->dokumen as $i => $dokumen)
              <li>
                <a href="{{ asset('uploads/'.$dokumen->lokasi_file) }}" target="_blank">{{ $dokumen->nama }}</a>
              </li>
            @endforeach
          </ol>

          </div>
        </div>
      </div>
    </div>
  @endforeach

@endsection
