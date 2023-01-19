@extends('view_karyawan_klinik.karyawan_klinik')

@section('main-content')
  <div id="data">
    @include('template.flash')
    <form id="search-form" action="" method="get">
       


      <div class="container mt-4">
      @include('template.flash')
      <div class="card">
        <div class="card-body"><center>
          <h3 class="card-title">PROFIL KLINIK</h3></center><br>

          <form action="{{ route('karyawan.klinik.profil') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-6">


              <table>
                <tr>
                  <td>
<h5>SELAYANG PANDANG</h5>
                  Klinik UP3K PT. SBA disingkat dengan Klinik SBA, berkedudukan di Kilometer 17 Jalan Raya Banda Aceh – Meulaboh, Desa Mon Ikeun Kecamatan Lhoknga, Kabupaten Aceh Besar, yang didirikan pada tahun 1982 yang saat itu masih bernama PT. Semen Aceh Indonesia (PT. SAI) yang dimiliki oleh Blue Cicle, dan klinik dikomandoi oleh dr. Sulchi Aziz. Klinik SBA bergerak dalam bidang pelayanan kesehatan khusus bagi karyawan dan kontraktor yang bekerja di PT. SBA.
                  Dalam pelaksanaannya, Klinik SBA juga menanamkan prinsip Humanisme Universal adalah prinsip dimana keberpihakan kepada nilai-nilai kebersamaan, proporsionalitas, solidaritas dan keadilan tanpa memandang agama, suku, ras dan afiliasi golongan seseorang. Dengan pemikiran tersebut di atas, kami juga merasa dan ingin berpartisipasi dalam membantu masyarakat sekitar, walaupun mungkin masih terbatas dalam kegiatan pengobatan dan sunatan gratis serta pelaksanaan donor darah serta mengisi materi dan sosialisasi kesehatan bagi
masyarakat, institusi pendidikan yang ada di sekitar PT. SBA yang dalam pelaksanaannya kerjasama dengan divisi CSR PT. SBA<br><br>

<h5>MAKSUD DAN TUJUAN</h5>
Klinik UP3K PT. SBA dimaksudkan sebagai tempat pelayanan medis dasar dan paling
awal dalam penanganan medis pada karyawan dan kontraktor PT. SBA jika mengalami suatu
keadaan medis baik yang diakibatkan oleh sakit, maupun kecelakaan kerja. Terkait dengan biaya
pengobatan maupun tindakan medis menjadi tanggungan dari Klinik SBA yang beroperasi selama
24 jam.
Klinik UP3K PT. SBA keberadaan nya ditujukan untuk memantau, mengontrol dan
menjaga kesehatan dan keselamatan karyawan dan kontraktor yang bekerja sehingga kecelakaan
kerja maupun penyakit akibat kerja dapat dicegah, dan juga bertujuan untuk mendukung program
kesehatan dan keselamatan kerja yang diamanahkan oleh Pemerintah, baik oleh Kementerian
Tenaga Kerja maupun Kementerian Kesehatan sehingga terwujud masyarakat yang sehat fisik dan
jasmani nya baik ketika bekerja maupun di luar jam kerja.<br><br>

<h5>VISI</h5>
 Mewujudkan Pekerja yang Sehat, Aktif dan Produktif<br><br>

<h5>MISI</h5>
 Meningkatkan pelayanan kesehatan kerja melalui pelayanan Klinik UP3K 24 Jam.
 Meningkatkan kegiatan sosial dan kemanusiaan seperti bakti sosial, seperti
pengobatan dan khitanan massal, donor darah, edukasi dan sosialisasi kesehatan
bagi siswa, santri dan masyarakat, serta berpartisipasi dalam respon tanggap bencana
alam.
 Meningkatkan kualitas SDM melalui pelatihan, workshop, seminar, maupun penelitian.
 Meningkatkan cakupan layanan informasi kepada masyarakat, kesehatan reproduksi
remaja, bahaya narkoba dan AIDS kepada masyarakat.
 Meningkatkan pelayanan kesehatan gratis kepada masyarakat kurang mampu.
 Mengembangkan jejaring dan promosi dengan berbagai lembaga Pemerintah, Swasta
maupun LSM Kesehatan.
 Mengembangkan Klinik UP3K menjadi Fasilitas Kesehatan Tingkat Pratama, untuk
keberlanjutan program-program dan kegiatan yang berorientasi pada bidang
kesehatan<br><br>

<h5>MOTTO:</h5>
“ SIGAP, CAKAP, CERMAT “

                  </td>

                </tr>

              </table>
          
              </div>

              <div class="col-6">

              <table>
                <tr>
                  <td>






<img src="{{ asset('images/slides/background4.jpg') }}" width="380"><br><br><br><br>


<img src="{{ asset('images/slides/background5.jpg') }}" width="380"><br><br><br><br>



<img src="{{ asset('images/slides/background6.jpg') }}" width="380"><br><br><br><br>

<img src="{{ asset('images/slides/background7.jpg') }}" width="380"><br><br><br><br>

<img src="{{ asset('images/slides/background8.jpg') }}" width="380"><br><br><br><br>
                  </td>

                </tr>

              </table>
             
              
              </div>



            </div>


            
          </form>




        </div>
      </div>
    </div>
        </div>
      </div>
    </form>

    {{-- Table --}}
    <br>
   
   
  </div>
 

@endsection
