@extends('master.app')

@section('title', 'E-MONEV APLIKASI')

@section('content')
  <div id="akomodasi-add">
   
    <div class="nav-tabs-flat">
      <a href="{{ route('karyawan_rekammedik.karyawan_rm') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
        Back
      </a>
    </div>



    <div class="container mt-4" align="center">
      @include('template.flash')
      <div class="card">
        <div class="card-body">
          <h3 align="center" class="card-title">REALISASI DPA</h3><br><br>



          <form action="{{ route('karyawan_rekammedik.karyawan_rm.save',$id) }}" method="post" enctype="multipart/form-data">
            @csrf
          

            <div class="row">
              <div class="col-12">


                  <div class="form-group">
                  <label class="col-sm-8 col-form-label-sm">SUBKEGIATAN</label>
                  <input type="text" 
                        class="form-control-sm col-sm-10 " 
                        value="{{ $dusun_kode}}---{{ $nama }}" disabled >
                </div>

               </div>
            </div>



      <br>


       <div class="row">
        <div class="col-12">

           <table class="table">
              

              <thead>
                <tr>
                   <th scope="col" ><font size="2">ID ITEM</font></th>
                  <th scope="col" ><font size="2">NAMA ITEM</font></th>
                  <th scope="col" ><font size="2">HARGA SATUAN</font></th>              
                  <th scope="col" ><font size="2">JUMLAH FISIK</font></th>
                  <th scope="col" ><font size="2">JUMLAH KEUANGAN</font></th>
                                    
                </tr>
              </thead>


               <tbody>

      @foreach ($data as $key => $val)


      <tr>
      <td><input type="number" name="id_item[]" class="form-control-sm col-sm-6 " value="{{ $val->id }}" readonly></td>      
      <td><input type="text" name="nama_item[]" class="form-control-sm col-sm-16 " value="{{ $val->item_nama }}" readonly></td>
      <td><input type="number" name="item_harga[]" value="{{ $val->item_harga }}" class="form-control-sm col-sm-9 "></td>
      <td><input type="number" name="jumlah_fisik[]" class="form-control-sm col-sm-9 "></td>
      <td><input type="number" name="jumlah_keuangan[]" class="form-control-sm col-sm-12 "></td>
     
      </tr>
      
     
       @endforeach 
         </tbody>
          </table>    
             
                

              </div> 
            </div>



      

            <button type="submit" class="btn btn-primary float-right">SIMPAN</button>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection
