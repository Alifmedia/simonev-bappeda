@extends('view_superadmin_opd.opd')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" action="{{ route('superadmin.opd.kecamatan') }}" method="get">
      <!-- <div class="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan nama" value="{{ app('request')->input('search') }}">
        </div>

        <button type="submit" class="btn btn-primary" name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button>
      </div> -->
    </form>

    {{-- Table --}}
    <br>
    <form id="delete-form" action="{{ route('superadmin.opd.kecamatan.delete') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger">
        <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
        Hapus
      </button>
      <a class="btn btn-primary" href="{{ route('superadmin.tambahKecamatan') }}">
        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
        Tambah
      </a>
      <br><br>
      <div class="card card__table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">
                    <input type="checkbox" class="check-all">
                  </th>
                  <th scope="col">NO</th>
                  <th scope="col">SKPD/OPD</th>
                   <th scope="col">NIP</th>
                  <th scope="col">NAMA</th>
                  <th scope="col">KONTAK</th>
                  <th scope="col">EMAIL</th>                         
                  <th scope="col">DETAIL</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $value)
                  <tr>
                    <td><input type="checkbox" name="check[]" 
                              value="{{ $value->id }}" class="check"></td>
                    <td><font size="1">{{ $key+1 }}</font></td>
                    <td><font size="1">{{ $value->sektoral->nama }}</font></td>
                    <td><font size="1">{{ $value->umum->NIK }}</font></td>
                    <td><font size="1">{{ $value->umum->Nama }}</font></td>
                    <td><font size="1">{{ $value->umum->No_Handphone }}</font></td>
                    <td><font size="1">{{ $value->umum->Email }}</font></td>                   
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
  
  </div>
  @foreach ($data as $key => $value)
    <div class="modal fade" id="detail-modal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <p class="m-0"></p>

            <h5 class="modal-title font-weight-bold" id="detailModalTitle">{{ $value->umum['no_registrasi'] }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>



          <div class="modal-body">
          <h4 align="center">PROFIL PENGGUNA</h4>
          <h6 align="center">(OPERATOR OPD)</h6>
          <div class="card" >
          <div class="card-body" align="center">

          <input value=" Email/Username">
          <input value=" {{ $value->email  }}">
          <input value=" Nama ">
          <input value=" {{ $value->umum['Nama']}}">
          <input value=" NIP ">
          <input value=" {{ $value->umum['NIK'] }}">
              
        
          <input value=" Alamat ">
          <input value=" {{ $value->umum['Alamat']  }}">
          <input value=" Ktp ">
           <input value=" {{ asset('umum/ktp/'.$value->umum['ktp']) }}">
         
        </div>

        
       </div>


          </div>




        </div>
      </div>
    </div>
  @endforeach

@endsection
