<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      tbody:before, tbody:after { display: none; }
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
      <div style="position:relative;">
        <p style="position:absolute;right:0;">{{ $data['jurnal_konsultasi_created_at']  }}</p>
        <table>
          <tr>
            <td>Nomor </td>
            <td>: </td>
          </tr>
          <tr>
            <td>Sifat </td>
            <td>: Biasa</td>
          </tr>
          <tr>
            <td>Lampiran </td>
            <td>: 1</td>
          </tr>
          <tr>
            <td>Hal </td>
            <td>: Undangan Konsultasi</td>
          </tr>
        </table>
      </div>

      <p>Yth. Bpk/Ibu Pengguna</p>
      <p style="text-align:justify;">Sehubungan dengan permintaan saudara untuk melakukan konsultasi pada Unit Layanan Konsultasi Pemerintahan(ULKP) Biro Tata Pemerintahan Aceh dengan no registrasi {{ $data['no_registrasi'] }}, dengan ini kami mengundang Saudara/Saudari untuk hadir pada kegiatan dimaksud yang akan diselenggarakan pada:</p>
      <table style="margin-left:40px;">
        <tr>
          <td style="width:180px;">Tanggal </td>
          <td>: {{ $data['tanggal_konsultasi'] }}</td>
        </tr>
        <tr>
          <td>Pukul </td>
          <td>: {{ $data['pukul_konsultasi'] }} WIB</td>
        </tr>
        <tr>
          <td>Tempat </td>
          <td>: {{ $data['terjadwal']['ruang']['nama'] }}</td>
        </tr>
        <tr>
          <td>Maksimal Peserta </td>
          <td>: {{ $data['jumlah_delegasi'] }}</td>
        </tr>
      </table>

      <p style="text-align:justify;">Perlu kami beritahukan bahwa peserta wajib hadir 30 (Tiga puluh) menit sebelum jadwal yang telah ditetapkan, bagi peserta yang terlambat hadir pada jadwal yang telah ditetapkan maka ULKP hanya memberikan waktu toleransi selama 20 Menit. ULKP tidak menanggung biaya Transportasi dan Akomodasi Peserta.</p>
      <p style="text-align:justify;">Demikian kami sampaikan, atas kerjasamanya diucapkan terimakasih.</p>
      <br>
      <p style="text-align:right;">a.n Kepala Biro Pemerintahan Aceh</p>
      <br><br><br>
      <p style="text-align:right;">Restuandi Surya, S.Stp, MP</p>

  </body>
</html>
