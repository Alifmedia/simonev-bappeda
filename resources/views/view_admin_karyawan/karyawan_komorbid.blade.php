@extends('view_admin_karyawan.karyawan')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" action="" method="get">
      <div class="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan no registrasi" value="{{ app('request')->input('search') }}">
        </div>

        <button type="submit" class="btn btn-primary" name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button>
      </div>
      <div class="filter">
       
        <div class="filter__input__sub">

          <div class="form-group">
            <label for="filter3">DEPARTMEN</label>
            <select class="form-control" id="filter3" name="sektoral" {{ count($filter['sektoral']) > 0 ? '' : 'disabled' }}>
              <option value="0">Semua</option>
              @foreach ($filter['sektoral'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('sektoral') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

         

           <div class="form-group">
            <label for="filter6">TIPE KERJA</label>
            <select class="form-control" id="filter6" name="hal">
              <option value="0">Semua</option>
              @foreach ($filter['hal'] as $key => $value)
                <option value="{{ $value->id }}" {{ app('request')->input('hal') == $value->id  ? 'selected' : '' }}>{{ $value->nama }}</option>
              @endforeach
            </select>
          </div>

           <div class="form-group">
            <label for="filter6">KELAMIN</label>
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
                  <th scope="col">NO.REKAM MEDIK</th>
                  <th scope="col">DETAIL</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $value)
                @if($value->latestRM->jurnalKonsultasiLatest->status_konsultasi_id == 4)
                  <tr>
                    <td><input type="checkbox" name="check[]" value="{{ $value->id }}" class="check"></td>
                    <td>{{ $value->NIK }}</td>
                    <td>{{ $value->Nama }}</td>
                    <td>{{ $value->sektoral['nama'] }}</td>
                    <td>{{ $value->hal['nama'] }}</td>
                    <td>{{ $value->latestRM['no_registrasi'] }}</td>
                      
                    <td>
                      <a href="" data-toggle="modal" data-target="#detail-modal-{{ $value->id }}">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                      </a>
                    </td>
                   
                  </tr>
                  @endif
                @endforeach

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
    <div class="modal fade" id="detail-modal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true" align="center">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="detailModalTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


          <div class="modal-body">
          <h4 align="center">KOMORBID</h4>
          <ol class="pl-4" >
            @foreach ($value->latestRM->pemangku as $i => $pemangku)
              <h6>{{ $pemangku->nama }}</h6>
            @endforeach
          </ol>

         <h4 align="center">HASIL REKAM MEDIS</h4>
          <div class="card" >
           <div class="card-body" >

         <input value=" TINGGI BADAN">
          <input value=" {{ $value->latestRM->RM_TinggiBadan }}   cm">
          <input value=" BERAT BADAN ">
          <input value=" {{ $value->latestRM->RM_BeratBadan }}   kg">
          <input value=" LINGKAR PERUT ">
          <input value=" {{ $value->latestRM->RM_LingkarPerut }}   cm">
          <br>
          <input value=" HEMOGLOBIN ">
          <input value=" {{ $value->latestRM->RM_Hemoglobin }}   gr/dL">
          <input value=" LEUKOSIT  ">
          <input value=" {{ $value->latestRM->RM_Leukosit}}  ribu/Ul">
          <input value=" TROMBOSIT ">
          <input value=" {{ $value->latestRM->RM_Trombosit }}  ribu/Ul">
          <input value=" HEMOTOKRIT ">
           <input value=" {{ $value->latestRM->RM_Hematokrit}} %">
          <input value=" ERITROSIT  ">
          <input value=" {{ $value->latestRM->RM_Eritrosit }} juta/Ul">
          <br>
          <input value=" LED ">
          <input value=" {{ $value->latestRM->RM_LED}}  mm/jam">
          <input value=" GLUKOSA PUASA  ">
          <input value=" {{ $value->latestRM->RM_GlukosaPuasa}}  mg/dL">
          <input value=" HbA1C ">
          <input value=" {{ $value->latestRM->RM_HbA1C }}  %">
          <input value=" UREUM  ">
          <input value=" {{ $value->latestRM->RM_Ureum }}  mg/dL">
          <input value=" CREATININ">
          <input value=" {{ $value->latestRM->RM_Creatinin }}  U/L">
          <input value=" ASAM URAT">
          <input value=" {{ $value->latestRM->RM_AsamUrat }}  mg/dL">
          <input value=" KOLESTEROL TOTAL ">
          <input value=" {{ $value->latestRM->RM_KolesterolTotal }}  mg/dL">
          <input value=" HDL KOLESTEROL ">
          <input value=" {{ $value->latestRM->RM_HDLKolesterol }}  mg/dL">
          <input value=" LDL KOLESTEROL ">
          <input value=" {{ $value->latestRM->RM_LDLKolesterol }}  mg/dL">
          <input value=" TRIGLISERIDA ">
          <input value=" {{ $value->latestRM->RM_Trigliserida }}  mg/dL">
          <br>         
          <input value=" SGOT  ">
          <input value=" {{ $value->latestRM->RM_SGOT }}  U/L">
          <input value=" SGPT ">
          <input value=" {{ $value->latestRM->RM_SGPT }}  U/L">
          <input value=" GAMMA-GT">
          <input value=" {{ $value->latestRM->RM_GammaGT }}  U/L">
          <br>
          <input value=" SISTOLE ">
          <input value=" {{ $value->latestRM->RM_Sistole }}  mmHg">
          <input value=" DIASTOLE ">
          <input value=" {{ $value->latestRM->RM_Diastole }}  mmHg">
     
          </div>
         </div>
        
     
          <p class="font-weight-bold m-0" align="center">DOKUMEN REKAM MEDIK</p>
           <div class="card" >
           <div class="card-body" >
          <ol class="pl-4">
            @foreach ($value->latestRM->dokumen as $i => $dokumen)
              <li>
                <a href="{{ asset('uploads/'.$dokumen->lokasi_file) }}" target="_blank">{{ $dokumen->nama }}</a>
              </li>
            @endforeach
          </ol>
        </div>
      </div>

        
          <p class="font-weight-bold m-0">INSTRUKSI_MEDIS</p>
           <div class="card" >
           <div class="card-body" >

          <p>{{ $value->latestRM->terjadwal['instruksi_komorbid'] }}</p>
           </div>
          </div>


          <p class="font-weight-bold m-0">DOKTER</p>
          <div class="card" >
           <div class="card-body" >
          <p>{{ $value->latestRM->administrator['nama'] }}</p>
            </div>
          </div>

            <p class="font-weight-bold m-0">WAKTU REKAM MEDIK(SELANJUTNA)</p>
          <div class="card" >
           <div class="card-body" >

          <p>{{ $value->latestRM->terjadwal['waktu_rm_lagi'] }}</p>
             </div>
          </div>


          </div>
          
        </div>
      </div>
    </div>
  @endforeach

@endsection
