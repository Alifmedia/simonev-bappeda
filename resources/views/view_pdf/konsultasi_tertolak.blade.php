<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      tbody:before, tbody:after { display: none; }
      table {
          font-family: sans-serif;
          color: #232323;
          border-collapse: collapse;
      }
      table, th, td {
          border: 1px solid #999;
          padding: 2px 4px;
      }
      .cop {
        padding: 10px 10px 0;
      }
      .header {
        font-size: 18px;
        margin:0 0 2px;
      }
      .sub-header  {
        font-size: 16px;
        margin:10px 0 0;
      }
    </style>
  </head>
  <body>
      <div class="cop">
        <img src="{{ public_path('images/pancacita.png') }}" style="display:inline-block;width:100px" alt="">
        {{-- <img src="{{ asset('images/pancacita.png') }}" style="display: inline-block;width:100px" alt=""> --}}

        <div style="display: inline-block;margin-left:10px;">
          <p class="header"><b>UNIT LAYANAN KONSULTASI PEMERINTAHAN</b></p>
          <p class="header"><b>BIRO TATA PEMERINTAHAN - SEKRETARIAT DAERAH</b></p>
          <p class="header"><b>PEMERINTAH ACEH</b></p>
          <p class="sub-header">Jln. T. Nyak Arief Gp. Jeulingke – Kec. Syiah Kuala, Kota Banda Aceh - Aceh</p>
        </div>
      </div>
      <hr style="margin-top: 0;">
      <h4 style="text-align:center;"><b>DAFTAR PERMOHONAN TERTOLAK</b></h4>
      <table style="width:100%;">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">No Registrasi</th>
            <th scope="col">Pemohon</th>
            <th scope="col">Hal</th>
            <th scope="col">Waktu Konsultasi</th>
            <th scope="col">Jumlah Delegasi</th>
            <th scope="col">Verifikator</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value['no_registrasi'] }}</td>
              <td>{{ $value['umum']['nama'] }}</td>
              <td>{{ $value['hal']['nama'] }}</td>
              @php
                $count = count($value['jurnal_konsultasi']);
              @endphp
              <td>{{ $value['jurnal_konsultasi'][$count-1]['waktu'] }}</td>
              <td>{{ $value['jurnal_konsultasi'][$count-1]['jumlah_delegasi'] }}</td>
              <td>{{ $value['jurnal_konsultasi'][0]['administrator']['nama'] }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </body>
</html>
