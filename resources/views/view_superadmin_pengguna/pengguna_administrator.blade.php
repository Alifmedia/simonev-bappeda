@extends('view_superadmin_pengguna.pengguna')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" action="{{ route('superadmin.pengguna.administrator') }}" method="get">
     <!--  <div class="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan nama" value="{{ app('request')->input('search') }}">
        </div>

        <button type="submit" class="btn btn-primary" name="button">
          <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
          Cari
        </button> -->
      </div>
    </form>

    {{-- Table --}}
    <br>
    <form id="delete-form" action="{{ route('superadmin.pengguna.administrator.delete') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger">
        <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
        Hapus
      </button>
      <a class="btn btn-primary" href="{{ route('superadmin.tambahAdministrator') }}">
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
                  <th scope="col">NAMA</th>
                  <th scope="col">USERNAME</th>
                  <th scope="col">PASSWORD</th>
                  <th scope="col">DETAIL</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $value)
                  <tr>
                    <td><input type="checkbox" name="check[]" value="{{ $value->id }}" class="check"></td>
                    <td><font size="1">{{ $key+1 }}</font></td>
                    <td><font size="1">{{ $value->umum->Nama }}</font></td>
                    <td><font size="1">{{ $value->umum->user->email }}</font></td>
                    <td><font size="1">{{ $value->umum->user->password }}</font></td>
                    
                    
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
    <div class="pagination-wrapper">
         </div>
  </div>
  
  @foreach ($data as $key => $value)
    <div class="modal fade" id="detail-modal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content"><center>
         
          <div class="modal-header" align="center">
            <p class="m-0" ></p>

            <h5 class="modal-title font-weight-bold" id="detailModalTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>




         </center>
      <div class="modal-body">
          <h4 align="center">PROFIL PENGGUNA</h4>
          <h6 align="center">(ADMIN)</h6>
          
      <div class="card" >
        <div class="card-body" align="center">
          <input value=" Email/Username">
          <input value=" {{ $value->email  }}">
          <input value=" Nama ">
          <input value=" {{ $value->umum['Nama']}}">
          <input value=" NIP ">
          <input value=" {{ $value->umum['NIK'] }}">
          <input value=" Gelar ">
          <input value=" {{ $value->umum['gelar'] }}">
          <input value=" Alamat  ">
          <input value=" {{ $value->umum['alamat'] }}">
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
