<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();



Route::get(
  '/get-data',
  'AjaxController@getData'
)->name('getData');


Route::get(
  '/get-data-belanja',
  'AjaxController@getDataBelanja'
)->name('getDataBelanja');




Route::get(
  '/',
  function () {
    return redirect()->route('karyawan_rekammedik.karyawan_rm');
  }
);


Route::get(
  '/home',
  function () {
    return redirect()->route('karyawan_rekammedik.karyawan_rm');
  }
);

Route::get(
  '/tes',
  function () {
    echo ("ini tesing");
  }
);





//LOGIN: SUPERADMIN - MENU: PENGGUNA -ROLE : UMUM
Route::get(
  '/superadmin/pengguna/umum/',
  'SuperadminPenggunaController@umum'
)->name('superadmin.pengguna.umum');

Route::get(
  '/superadmin/tambah-umum',
  'SuperadminPenggunaController@tambahUmum'
)->name('superadmin.tambahUmum');

Route::post(
  '/superadmin/simpan-umum',
  'SuperadminPenggunaController@simpanUmum'
)->name('superadmin.simpanUmum');

Route::post(
  '/superadmin/pengguna/umum/delete',
  'SuperadminPenggunaController@deleteUmum'
)->name('superadmin.pengguna.umum.delete');



//LOGIN: SUPERADMIN - MENU: PENGGUNA -ROLE : SUPERVISOR

Route::get(
  '/superadmin/pengguna/supervisor/',
  'SuperadminPenggunaController@supervisor'
)->name('superadmin.pengguna.supervisor');

Route::get(
  '/superadmin/tambah-supervisor',
  'SuperadminPenggunaController@tambah-supervisor'
)->name('superadmin.tambahSupervisor');

Route::post(
  '/superadmin/simpan-supervisor',
  'SuperadminPenggunaController@simpanSupervisor'
)->name('superadmin.simpanSupervisor');

Route::post(
  '/superadmin/pengguna/supervisor/delete',
  'SuperadminPenggunaController@deleteSupervisor'
)->name('superadmin.pengguna.supervisor.delete');



//LOGIN: SUPERADMIN - MENU: PENGGUNA -ROLE : ADMIN

Route::get(
  '/superadmin/pengguna/administrator/',
  'SuperadminPenggunaController@administrator'
)->name('superadmin.pengguna.administrator');

Route::get(
  '/superadmin/tambah-administrator',
  'SuperadminPenggunaController@tambahAdministrator'
)->name('superadmin.tambahAdministrator');

Route::post(
  '/superadmin/simpan-administrator',
  'SuperadminPenggunaController@simpanAdministrator'
)->name('superadmin.simpanAdministrator');


Route::post(
  '/superadmin/pengguna/administrator/delete',
  'SuperadminPenggunaController@deleteAdministrator'
)->name('superadmin.pengguna.administrator.delete');





///LOGIN:SUPERADMIN | MENU: OPD/SKPD : BADAN
Route::get(
  '/superadmin/opd/badan/',
  'SuperadminOpdController@badan'
)->name('superadmin.opd.badan');

Route::get(
  '/superadmin/tambahBadan',
  'SuperadminOpdController@tambahBadan'
)->name('superadmin.tambahBadan');

Route::post(
  '/superadmin/simpanBadan',
  'SuperadminOpdController@simpanBadan'
)->name('superadmin.simpanBadan');

Route::post(
  '/superadmin/opd/badan/delete',
  'SuperadminOpdController@deleteBadan'
)->name('superadmin.opd.badan.delete');



//LOGIN:SUPERADMIN | MENU: OPD/SKPD : DINAS

Route::get(
  '/superadmin/opd/dinas/',
  'SuperadminOpdController@dinas'
)->name('superadmin.opd.dinas');

Route::get(
  '/superadmin/tambahDinas',
  'SuperadminOpdController@tambahDinas'
)->name('superadmin.tambahDinas');

Route::post(
  '/superadmin/simpanDinas',
  'SuperadminOpdController@simpanDinas'
)->name('superadmin.simpanDinas');


Route::post(
  '/superadmin/opd/dinas/delete',
  'SuperadminOpdController@deleteDinas'
)->name('superadmin.opd.dinas.delete');



//LOGIN:SUPERADMIN | MENU: OPD/SKPD : KANTOR
Route::get(
  '/superadmin/opd/kantor/',
  'SuperadminOpdController@kantor'
)->name('superadmin.opd.kantor');

Route::get(
  '/superadmin/tambahKantor',
  'SuperadminOpdController@tambahKantor'
)->name('superadmin.tambahKantor');

Route::post(
  '/superadmin/simpanKantor',
  'SuperadminOpdController@simpanKantor'
)->name('superadmin.simpanKantor');


Route::post(
  '/superadmin/opd/kantor/delete',
  'SuperadminOpdController@deleteKantor'
)->name('superadmin.opd.kantor.delete');


//SUPERADMIN MENU: OPD/SKPD : KECAMATAN :
Route::get(
  '/superadmin/opd/kecamatan/',
  'SuperadminOpdController@kecamatan'
)->name('superadmin.opd.kecamatan');

Route::get(
  '/superadmin/tambahKecamatan',
  'SuperadminOpdController@tambahKecamatan'
)->name('superadmin.tambahKecamatan');

Route::post(
  '/superadmin/simpanKecamatan',
  'SuperadminOpdController@simpanKecamatan'
)->name('superadmin.simpanKecamatan');


Route::post(
  '/superadmin/opd/kecamatan/delete',
  'SuperadminOpdController@deleteKecamatan'
)->name('superadmin.opd.kecamatan.delete');


















//--------------------------------------------------------------------------



//LOGIN: SUPERADMIN - MENU: OPD

// Route::get('/admin/karyawan/pending', 
//            'AdminKaryawanController@pending'
//           )->name('admin.karyawan.pending');


// Route::post('/admin/karyawan/tambah', 
//             'AdminkaryawanController@tambah'
//            )->name('admin.karyawan.tambah');

// Route::post('/admin/karyawan/edit', 
//             'AdminkaryawanController@edit'
//            )->name('admin.karyawan.edit');

// Route::post('/admin/karyawan/delete', 
//             'AdminkaryawanController@delete'
//            )->name('admin.karyawan.delete');


// Route::get('/admin/karyawan/normal', 
//            'AdminkaryawanController@normal'
//           )->name('admin.karyawan.normal');

// Route::get('/admin/karyawan/prekomorbid', 
//            'AdminkaryawanController@prekomorbid'
//           )->name('admin.karyawan.prekomorbid');

// Route::get(
//            '/admin/karyawan/komorbid', 
//            'AdminkaryawanController@komorbid'
//           )->name('admin.karyawan.komorbid');

// Route::get('/admin/konsultasi/penjadwalan/{id}', 
//            'AdminkaryawanController@penjadwalan'
//           )->name('admin.karyawan.penjadwalan');

// Route::post('/admin/karyawan/proses-penjadwalan/{id}', 
//             'AdminkaryawanController@prosesPenjadwalan'
//           )->name('admin.karyawan.prosesPenjadwalan');

// Route::get('/admin/karyawan/komplikasi', 
//            'AdminkaryawanController@komplikasi'
//           )->name('admin.karyawan.komplikasi');


// Route::get('/admin/karyawan/perekapan/{id}', 
//            'AdminkaryawanController@perekapan'
//           )->name('admin.karyawan.perekapan');

// Route::post('/admin/karyawan/proses-perekapan/{id}', 
//             'AdminkaryawanController@prosesPerekapan'
//            )->name('admin.karyawan.prosesPerekapan');

// Route::post('/admin/karyawan/terekap/proses-tahapan/{konsultasi_id}', 
//             'AdminkaryawanController@prosesTahapan'
//            )->name('admin.karyawan.prosesTahapan');


// Route::get('/admin/karyawan/verifikasi/{id}', 
//            'AdminkaryawanController@verifikasi'
//           )->name('admin.karyawan.verifikasi');

// Route::get('/admin/karyawan/decline/{id}', 
//            'AdminkaryawanController@decline'
//           )->name('admin.karyawan.decline');

// Route::get('/admin/karyawan/undo/{id}/{status}', 
//            'AdminkaryawanController@undo'
//           )->name('admin.karyawan.undo');

// //------------------------------------------------------------------




//ADMIN RENSTRA
Route::get(
  '/admin/renstra/setujuopd',
  'AdminRenstraController@setujuopd'
)->name('admin.renstra.setujuopd');



Route::get(
  '/admin/renstra/rekapitulasi',
  'AdminRenstraController@rekapitulasi'
)->name('admin.renstra.rekapitulasi');



Route::get(
  '/admin/renstra/penormalan/{id}',
  'AdminRenstraController@penormalan'
)->name('admin.renstra.penormalan');


Route::get(
  '/admin/renstra/normal',
  'AdminRenstraController@normal'
)->name('admin.renstra.normal');


Route::get(
  '/admin/renstra/peprekomorbidan/{id}',
  'AdminRenstraController@peprekomorbidan'
)->name('admin.renstra.peprekomorbidan');

Route::post(
  '/admin/renstra/prosesPeprekomorbidan/{id}',
  'AdminRenstraController@prosesPeprekomorbidan'
)->name('admin.renstra.prosesPeprekomorbidan');


Route::get(
  '/admin/renstra/prekomorbid',
  'AdminRenstraController@prekomorbid'
)->name('admin.renstra.prekomorbid');


// Route::get('/admin/realisasi/pekomorbidan/{id}', 
//           'AdminRealisasiController@pekomorbidan'
//           )->name('admin.realisasi.pekomorbidan');

// Route::post('/admin/realisasi/prosesPekomorbidan/{id}', 
//             'AdminRealisasiController@prosesPekomorbidan'
//           )->name('admin.realisasi.prosesPekomorbidan');

// Route::get(
//            '/admin/realisasi/komorbid', 
//            'AdminRekammedikController@komorbid'
//           )->name('admin.realisasi.komorbid');


// Route::get('/admin/realisasi/pekomplikasian/{id}', 
//           'AdminRealisasiController@pekomplikasian'
//           )->name('admin.rekammedik.pekomplikasian');

// Route::post('/admin/realisasi/prosesPekomplikasian/{id}', 
//             'AdminRealisasiController@prosesPekomplikasian'
//            )->name('admin.realisasi.prosesPekomplikasian');

// Route::get('/admin/rekammedik/komplikasi', 
//           'AdminRealisasiController@komplikasi'
//           )->name('admin.realisasi.komplikasi');


// Route::get('/admin/renstra/kegiatan/delete', 
//            'AdminRenstraController@kegiatanDelete'
//           )->name('admin.renstra.kegiatan.delete');



//ADMIN RENJA

Route::get(
  '/admin/renja/tahunan',
  'AdminRenjaController@tahunan'
)->name('admin.renja.tahunan');


Route::get(
  '/admin/renja/rekapitulasi',
  'AdminRenjaController@rekapitulasi'
)->name('admin.renja.rekapitulasi');




Route::get(
  '/admin/renstra/penormalan/{id}',
  'AdminRenstraController@penormalan'
)->name('admin.renstra.penormalan');


Route::get(
  '/admin/renstra/normal',
  'AdminRenstraController@normal'
)->name('admin.renstra.normal');


Route::get(
  '/admin/renstra/peprekomorbidan/{id}',
  'AdminRenstraController@peprekomorbidan'
)->name('admin.renstra.peprekomorbidan');

Route::post(
  '/admin/renstra/prosesPeprekomorbidan/{id}',
  'AdminRenstraController@prosesPeprekomorbidan'
)->name('admin.renstra.prosesPeprekomorbidan');



Route::get(
  '/admin/renstra/prekomorbid',
  'AdminRenstraController@prekomorbid'
)->name('admin.renstra.prekomorbid');



//LOGIN: ADMIN DPA
// Route::get('/admin/dpa/pending',
//            'AdminDpaController@pending'
//           )->name('admin.dpa.pending');



Route::get(
  '/admin/dpa/setuju',
  'AdminDpaController@setuju'
)->name('admin.dpa.setuju');


Route::get(
  '/admin/dpa/rincian',
  'AdminDpaController@rincian'
)->name('admin.dpa.rincian');



Route::get(
  '/admin/dpa/rekapitulasi',
  'AdminDpaController@rekapitulasi'
)->name('admin.dpa.rekapitulasi');


Route::get(
  '/admin/renstra/penormalan/{id}',
  'AdminRenstraController@penormalan'
)->name('admin.renstra.penormalan');


Route::get(
  '/admin/renstra/normal',
  'AdminRenstraController@normal'
)->name('admin.renstra.normal');


Route::get(
  '/admin/renstra/peprekomorbidan/{id}',
  'AdminRenstraController@peprekomorbidan'
)->name('admin.renstra.peprekomorbidan');


Route::post(
  '/admin/renstra/prosesPeprekomorbidan/{id}',
  'AdminRenstraController@prosesPeprekomorbidan'
)->name('admin.renstra.prosesPeprekomorbidan');


Route::get(
  '/admin/renstra/prekomorbid',
  'AdminRenstraController@prekomorbid'
)->name('admin.renstra.prekomorbid');



// Route::get('/admin/dpa/create/{id}/{dusun_kode}/{nama}', 
//            'AdminDpaController@renja'
//            )->name('admin_dpa.dpa.create');


// Route::post('/admin/dpa/save/{id}', 
//            'AdminDpaController@renja'
//            )->name('admin_dpa.dpa.save');


// Route::get('/admin/dpa/edit/{id}', 
//            'AdminDpaController@editDPA'
//            )->name('admin_dpa.dpa.edit');



// Route::post('/admin/dpa/update/{id}/{dusun_id}', 
//             'AdminDpaController@updateDPA'
//           )->name('admin_dpa.dpa.update');


// Route::get('/admin/dpa/delete-file', 
//            'AdminDpaController@deleteFileDPA'
//           )->name('admin_dpa.dpa.deleteFile');


// Route::post('/admin/dpa/delete', 
//             'AdminDpaController@deleteDPA'
//            )->name('admin_dpa.dpa.delete');




//LOGIN: ADMIN - REKAM MEDIK/REALISASI
Route::get(
  '/admin/realisasi/pending',
  'AdminRealisasiController@pending'
)->name('admin.realisasi.pending');


Route::get(
  '/admin/realisasi/rekapitulasi',
  'AdminRealisasiController@rekapitulasi'
)->name('admin.realisasi.rekapitulasi');


Route::get(
  '/admin/realisasi/penormalan/{id}',
  'AdminRealisasiController@penormalan'
)->name('admin.realisasi.penormalan');


Route::get(
  '/admin/realisasi/normal',
  'AdminRealisasiController@normal'
)->name('admin.realisasi.normal');


Route::get(
  '/admin/realisasi/peprekomorbidan/{id}',
  'AdminRealisasiController@peprekomorbidan'
)->name('admin.realisasi.peprekomorbidan');

Route::post(
  '/admin/realisasi/prosesPeprekomorbidan/{id}',
  'AdminRekammedikController@prosesPeprekomorbidan'
)->name('admin.realisasi.prosesPeprekomorbidan');



Route::get(
  '/admin/realisasi/prekomorbid',
  'AdminRekammedikController@prekomorbid'
)->name('admin.realisasi.prekomorbid');


Route::get(
  '/admin/realisasi/pekomorbidan/{id}',
  'AdminRealisasiController@pekomorbidan'
)->name('admin.realisasi.pekomorbidan');

Route::post(
  '/admin/realisasi/prosesPekomorbidan/{id}',
  'AdminRealisasiController@prosesPekomorbidan'
)->name('admin.realisasi.prosesPekomorbidan');

Route::get(
  '/admin/realisasi/komorbid',
  'AdminRekammedikController@komorbid'
)->name('admin.realisasi.komorbid');


Route::get(
  '/admin/realisasi/pekomplikasian/{id}',
  'AdminRealisasiController@pekomplikasian'
)->name('admin.rekammedik.pekomplikasian');

Route::post(
  '/admin/realisasi/prosesPekomplikasian/{id}',
  'AdminRealisasiController@prosesPekomplikasian'
)->name('admin.realisasi.prosesPekomplikasian');

Route::get(
  '/admin/rekammedik/komplikasi',
  'AdminRealisasiController@komplikasi'
)->name('admin.realisasi.komplikasi');


Route::post(
  '/admin/realisasi/komplikasi/prosesTahapan/{konsultasi_id}',
  'AdminRealisasiController@prosesTahapan'
)->name('admin.realisasi.prosesTahapan');


Route::post(
  '/admin/realisasi/delete',
  'AdminRealisasiController@delete'
)->name('admin.realisasi.delete');


Route::get(
  '/admin/realisasi/undo/{id}/{status}',
  'AdminRealisasiController@undo'
)->name('admin.realisasi.undo');






//------------------------------------------------------------------
//LOGIN: SUPERADMIN - MENU: OPD/////////////////////////////////////////
// Route::get('/admin/opd/pending', 
//            'AdminOpdController@pending'
//           )->name('admin.opd.pending');


// Route::get('/admin/opd/setuju', 
//            'AdminOpdController@setuju'
//           )->name('admin.opd.setuju');

// Route::get('/admin/opd/rekapitulasi', 
//            'AdminOpdController@rekapitulasi'
//           )->name('admin.opd.rekapitulasi');


// Route::get('/admin/opd/create/{dusun_id}/{dusun_kode}/{nama}', 
//            'AdminOpdController@createDPA'
//            )->name('admin_opd.opd.create');


// Route::post('/admin/opd/save/{dusun_id}', 
//             'AdminOpdController@saveDPA'
//            )->name('admin_opd.opd.save');


// Route::get('/admin/opd/edit/{id}', 
//            'AdminDpaController@editDPA'
//            )->name('admin_opd.opd.edit');



// Route::post('/admin/odp/update/{id}/{dusun_id}', 
//             'AdminOdpController@updateDPA'
//           )->name('admin_odp.odp.update');


// Route::get('/admin/odp/delete-file', 
//            'AdminOdpController@deleteFileDPA'
//           )->name('admin_odp.odp.deleteFile');


// Route::post('/admin/odp/delete', 
//             'AdminOpdController@deleteDPA'
//            )->name('admin_opd.opd.delete');




// Route::get('/admin/matrix/pending', 
//            'AdminMatrixController@matrix_pending'
//           )->name('admin.matrix.pending');

Route::get(
  '/admin/matrix/rfk',
  'AdminMatrixController@matrixRfk'
)->name('admin.matrix.rfk');


Route::get(
  '/admin/matrix/renja',
  'AdminMatrixController@matrixRenja'
)->name('admin.matrix.renja');




// Route::get('/admin/matrix/tertolak', 
//            'KaryawanMatrixController@matrix_tertolak'
//           )->name('admin.matrix.tertolak');



//LOGIN: SUPERADMIN - MENU: PROFIL_KLINIK
Route::get(
  '/admin/klinik/profil',
  'AdminKlinikController@profil'
)->name('admin.klinik.profil');


Route::get(
  '/admin/klinik/manajemen',
  'AdminKlinikController@manajemen'
)->name('admin.klinik.manajemen');


Route::post(
  '/admin/klinik/tambah',
  'AdminKlinikController@tambah'
)->name('admin.klinik.tambah');

Route::post(
  '/admin/klinik/edit',
  'AdminKlinikController@edit'
)->name('admin.klinik.edit');

Route::post(
  '/admin/klinik/hapus',
  'AdminKlinikController@hapus'
)->name('admin.klinik.hapus');


//LOGIN:SUPERADMIN | MENU: MATKES
Route::get(
  '/admin/matkes/index/',
  'AdminMatkesController@index'
)->name('admin.matkes.index');

Route::get(
  '/admin/matkes/tambah',
  'AdminMatkesController@tambah'
)->name('admin.matkes.tambah');

Route::post(
  '/admin/matkes/simpan',
  'AdminMatkesController@simpan'
)->name('admin.matkes.simpan');;

Route::get(
  '/admin/matkes/edit/{id}',
  'AdminMatkesController@edit'
)->name('admin.matkes.edit');

Route::post(
  '/admin/matkes/update/{id}',
  'AdminMatkesController@update'
)->name('admin.matkes.update');


Route::post(
  '/admin/matkes/delete',
  'AdminMatkesController@delete'
)->name('admin.matkes.delete');




//LOGIN: SUPERADMIN | MENU: FAQ
Route::get(
  '/admin/faq/index/',
  'AdminFaqController@index'
)->name('admin.faq.index');

Route::get(
  '/admin/faq/tambah',
  'AdminFaqController@tambah'
)->name('admin.faq.tambah');

Route::post(
  '/admin/faq/simpan',
  'AdminFaqController@simpan'
);

Route::get(
  '/admin/faq/edit/{id}',
  'AdminFaqController@edit'
)->name('admin.faq.edit');

Route::post(
  '/admin/faq/update/{id}',
  'AdminFaqController@update'
)->name('admin.faq.update');

Route::get(
  '/admin/faq/delete/{id}',
  'AdminFaqController@delete'
)->name('admin.faq.delete');



//TAMPILAN MANAJEMEN RUANG
Route::get(
  '/admin/master/ruang/',
  'AdminDataMasterController@ruang'
)->name('admin.master.ruang');

Route::get(
  '/admin/master/ruang/tambah',
  'AdminDataMasterController@tambahRuang'
)->name('admin.master.ruang.tambah');

Route::post(
  '/admin/master/ruang/tambah',
  'AdminDataMasterController@simpanRuang'
);

Route::get(
  '/admin/master/ruang/edit/{id}',
  'AdminDataMasterController@editRuang'
)->name('admin.master.ruang.edit');

Route::post(
  '/admin/master/ruang/update/{id}',
  'AdminDataMasterController@updateRuang'
)->name('admin.master.ruang.update');

Route::post(
  '/admin/master/ruang/delete',
  'AdminDataMasterController@deleteRuang'
)->name('admin.master.ruang.delete');





//TAMPILAN MANAJEMEN PERATURAN

Route::get(
  '/admin/master/peraturan/',
  'AdminDataMasterController@peraturan'
)->name('admin.master.peraturan');

Route::get(
  '/admin/master/peraturan/tambah',
  'AdminDataMasterController@tambahPeraturan'
)->name('admin.master.peraturan.tambah');

Route::post(
  '/admin/master/peraturan/tambah',
  'AdminDataMasterController@simpanPeraturan'
);

Route::get(
  '/admin/master/peraturan/edit/{id}',
  'AdminDataMasterController@editPeraturan'
)->name('admin.master.peraturan.edit');

Route::post(
  '/admin/master/peraturan/update/{id}',
  'AdminDataMasterController@updatePeraturan'
)->name('admin.master.peraturan.update');

Route::post(
  '/admin/master/peraturan/delete',
  'AdminDataMasterController@deletePeraturan'
)->name('admin.master.peraturan.delete');




//// ////////////////ADMIN MANAJEMEN SOAL
Route::get(
  '/admin/master/penilaian/',
  'AdminDataMasterController@penilaian'
)->name('admin.master.penilaian');


Route::get(
  '/admin/master/penilaian/tambahSoal',
  'AdminDataMasterController@tambahSoal'
)->name('admin.master.penilaian.tambahSoal');


Route::get(
  '/admin/master/penilaian/simpanSoal',
  'AdminDataMasterController@simpanSoal'
)->name('admin.master.penilaian.simpanSoal');

Route::post(
  '/admin/master/penilaian/deleteSoal',
  'AdminDataMasterController@deleteSoal'
)->name('admin.master.penilaian.deleteSoal');


Route::get(
  '/admin/master/penilaian/editSoal/{id}',
  'AdminDataMasterController@editSoal'
)->name('admin.master.penilaian.editSoal');


Route::post(
  '/admin/master/penilaian/updateSoal/{id}',
  'AdminDataMasterController@updateSoal'
)->name('admin.master.penilaian.updateSoal');


Route::get(
  '/admin/master/penilaian/pilihJawaban/{id}',
  'AdminDataMasterController@pilihJawaban'
)->name('admin.master.penilaian.pilihJawaban');

Route::post(
  '/admin/master/penilaian/updateJawaban/{id}',
  'AdminDataMasterController@updateJawaban'
)->name('admin.master.penilaian.updateJawaban');




// ADMIN MANAJEMEN PENILAIAN
Route::get(
  '/admin/verifikasi-kecamatan',
  'AdminVerifikasiController@tampilKecamatan'
)->name('admin.kec');

Route::get(
  '/admin/verifikasi-kecamatan/tema',
  'AdminVerifikasiController@tampilTema'
)->name('admin.kecamatan');


Route::get(
  '/admin/verifikasi-kecamatan/{id}',
  'AdminVerifikasiController@survey'
)->name('admin.kecamatan.survey');


Route::post(
  '/admin/verifikasi-kecamatan/{id}',
  'AdminVerifikasiController@saveSurvey'
)->name('admin.kecamatan.survey.save');


Route::get(
  '/admin/verifikasi-kecamatan_hasil',
  'AdminVerifikasiController@hasilSurvey'
)->name('admin.kecamatan_hasil');






//-----------------------------------------------------------------------------------------------
//LOGIN: SUPERVISOR - MENU: RENSTRA/TUJUAN DAN INDIKATOR
// Route::get('/supervisor/renstra/tujuansasaran', 
//            'SupervisorRenstraController@tujuansasaran'
//           )->name('supervisor.renstra.tujuansasaran');

// Route::get('/supervisor/renstra/create/', 
//            'SupervisorRenstraController@createTujuansasaran'
//            )->name('supervisor_renstra.tujuansasaran.create');


// Route::post('/supervisor/renstra/save', 
//             'SupervisorRenstraController@saveTujuansasaran'
//            )->name('supervisor_renstra.tujuansasaran.save');


// Route::get('/supervisor/renstra/edit/{renstra_id}/{tujuan_id}', 
//            'SupervisorRenstraController@editTujuansasaran'
//            )->name('supervisor_renstra.tujuansasaran.edit');


// Route::post('/supervisor/renstra/update/{renstra_id}/{tujuan_id}', 
//             'SupervisorRenstraController@updateTujuansasaran'
//           )->name('karyawan_renstra.tujuansasaran.update');

Route::post(
  '/karyawan/renstra/delete',
  'SupervisorRenstraController@deleteTujuansasaran'
)->name('supervisor_renstra.tujuansasaran.delete');



//LOGIN: SUPERVISOR - MENU: RENSTRA/SASARAN DAN INDIKATOR

// Route::get('/supervisor/renstra/createsasaran/{indikatortujuan_id}', 
//            'SupervisorRenstraController@createSasaran'
//            )->name('supervisor_renstra.sasaran.create');


// Route::post('/supervisor/renstra/savesasaran/{indikatortujuan_id}', 
//             'SupervisorRenstraController@saveSasaran'
//            )->name('supervisor_renstra.sasaran.save');


// Route::get('/supervisor/renstra/editsasaran/{indikatujuan_id}/{renssasar_id}', 
//            'SupervisorRenstraController@editSasaran'
//            )->name('supervisor_renstra.sasaran.edit');


// Route::post('/supervisor/renstra/updatesasaran/{renssasar_id}', 
//             'SupervisorRenstraController@updateSasaran'
//           )->name('supervisor_renstra.sasaran.update');


Route::post(
  '/supervisor/renstra/deletesasaran',
  'KaryawanRenstraController@deleteSasaran'
)->name('karyawan_renstra.sasaran.delete');

//LOGIN: SUPERVISOR - MENU: RENSTRA/PROGRAM DAN INDIKATOR

// Route::get('/karyawan/renstra/program', 
//            'KaryawanRenstraController@program'
//           )->name('karyawan.renstra.program');



// Route::get('/karyawan/renstra/program/create/{id}/{kemukiman_kode}/{nama}', 
//            'KaryawanRenstraController@createProgram'
//            )->name('karyawan_renstra.program.create');


// Route::post('/karyawan/renstra/program/save/{kemukiman_id}',
//             'KaryawanRenstraController@saveProgram'
//            )->name('karyawan_renstra.program.save');


// Route::get('/karyawan/renstra/program/edit/{renssasarprog_id}', 
//            'KaryawanRenstraController@editProgram'
//            )->name('karyawan_renstra.program.edit');



// Route::post('/karyawan/renstra/program/update/{renssasarprog_id}', 
//             'KaryawanRenstraController@updateProgram'
//           )->name('karyawan_renstra.program.update');

// Route::post('/karyawan/renstra/program/delete', 
//             'KaryawanRenstraController@deleteProgram'
//            )->name('karyawan_renstra.program.delete');



// //LOGIN: KARYAWAN - MENU: RENSTRA/KEGIATAN DAN INDIKATOR
// Route::get('/karyawan/renstra/kegiatan', 
//            'KaryawanRenstraController@kegiatan'
//           )->name('karyawan.renstra.kegiatan');


// Route::get('/karyawan/renstra/kegiatan/create/{renssasarprog_id}/{program_id}/{program_kode}/{program_nama}', 
//            'KaryawanRenstraController@createKegiatan'
//            )->name('karyawan_renstra.kegiatan.create');


// Route::post('/karyawan/renstra/kegiatan/save/{renssasarprog_id}', 
//             'KaryawanRenstraController@saveKegiatan'
//            )->name('karyawan_renstra.kegiatan.save');


// Route::get('/karyawan/renstra/kegiatan/edit/{renssasarprogkeg_id}', 
//            'KaryawanRenstraController@editKegiatan'
//            )->name('karyawan_renstra.kegiatan.edit');



// Route::post('/karyawan/renstra/kegiatan/update/{renssasarprogkeg_id}', 
//             'KaryawanRenstraController@updateKegiatan'
//           )->name('karyawan_renstra.kegiatan.update');

// Route::post('/karyawan/renstra/kegiatan/delete', 
//             'KaryawanRenstraController@deleteKegiatan'
//            )->name('karyawan_renstra.kegiatan.delete');




//LOGIN: SUPERVISOR - MENU: RENSTRA/HASIL DAN REKAPITULASI
Route::get(
  '/supervisor/renstra/setujuopd',
  'SupervisorRenstraController@setuju_opd'
)->name('supervisor.renstra.setujuopd');



Route::get(
  '/supervisor/renstra/rekapitulasi',
  'SupervisorRenstraController@rekapitulasi'
)->name('supervisor.renstra.rekapitulasi');


//-------------------------------------------------------------

Route::get(
  '/supervisor/renja/tahunan',
  'SupervisorRenjaController@tahunan'
)->name('supervisor.renja.tahunan');



Route::get(
  '/supervisor/renja/rekapitulasi',
  'SupervisorRenjaController@rekapitulasi'
)->name('supervisor.renja.rekapitulasi');

//----------------------------------------------------------------

Route::get(
  '/supervisor/dpa/setuju',
  'SupervisorDpaController@setuju'
)->name('supervisor.dpa.setuju');

Route::get(
  '/supervisor/dpa/rekapitulasi',
  'SupervisorDpaController@rekapitulasi'
)->name('supervisor.dpa.rekapitulasi');


//-------------------------------------------------------------------


Route::get(
  '/supervisor/rekammedik/setuju',
  'SupervisorRekammedikController@setuju'
)->name('supervisor_rekammedik.supervisor_rm');

Route::get(
  '/supervisor/rekammedik/rekapitulasi',
  'SupervisorRekammedikController@rekapitulasi'
)->name('supervisor_rekammedik.supervisor_rm_tertolak');


//-------------------------------------------------------------------

Route::get(
  '/supervisor/matrix/rfk',
  'SupervisorMatrixController@rfk'
)->name('supervisor.matrix.rfk');

Route::get(
  '/supervisor/matrix/renja',
  'SupervisorMatrixController@renja'
)->name('supervisor.matrix.renja');

















//----------------------------KARYAWAN---------------------//

//LOGIN: KARYAWAN - MENU: RENSTRA/TUJUAN DAN INDIKATOR
Route::get(
  '/karyawan/renstra/tujuansasaran',
  'KaryawanRenstraController@tujuansasaran'
)->name('karyawan.renstra.tujuansasaran');

Route::get(
  '/karyawan/renstra/create/',
  'KaryawanRenstraController@createTujuansasaran'
)->name('karyawan_renstra.tujuansasaran.create');


Route::post(
  '/karyawan/renstra/save',
  'KaryawanRenstraController@saveTujuansasaran'
)->name('karyawan_renstra.tujuansasaran.save');


Route::get(
  '/karyawan/renstra/edit/{renstra_id}/{tujuan_id}',
  'KaryawanRenstraController@editTujuansasaran'
)->name('karyawan_renstra.tujuansasaran.edit');


Route::post(
  '/karyawan/renstra/update/{renstra_id}/{tujuan_id}',
  'KaryawanRenstraController@updateTujuansasaran'
)->name('karyawan_renstra.tujuansasaran.update');


Route::post(
  '/karyawan/renstra/delete',
  'KaryawanRenstraController@deleteTujuansasaran'
)->name('karyawan_renstra.tujuansasaran.delete');



//LOGIN: KARYAWAN - MENU: RENSTRA/SASARAN DAN INDIKATOR
Route::get(
  '/karyawan/renstra/createsasaran/{indikatortujuan_id}',
  'KaryawanRenstraController@createSasaran'
)->name('karyawan_renstra.sasaran.create');


Route::post(
  '/karyawan/renstra/savesasaran/{indikatortujuan_id}',
  'KaryawanRenstraController@saveSasaran'
)->name('karyawan_renstra.sasaran.save');


Route::get(
  '/karyawan/renstra/editsasaran/{indikatujuan_id}/{renssasar_id}',
  'KaryawanRenstraController@editSasaran'
)->name('karyawan_renstra.sasaran.edit');


Route::post(
  '/karyawan/renstra/updatesasaran/{renssasar_id}',
  'KaryawanRenstraController@updateSasaran'
)->name('karyawan_renstra.sasaran.update');


Route::post(
  '/karyawan/renstra/deletesasaran',
  'KaryawanRenstraController@deleteSasaran'
)->name('karyawan_renstra.sasaran.delete');



//LOGIN: KARYAWAN - MENU: RENSTRA/PROGRAM DAN INDIKATOR

Route::get(
  '/karyawan/renstra/program',
  'KaryawanRenstraController@program'
)->name('karyawan.renstra.program');


Route::get(
  '/karyawan/renstra/program/create/{id}/{kemukiman_kode}/{nama}',
  'KaryawanRenstraController@createProgram'
)->name('karyawan_renstra.program.create');


Route::post(
  '/karyawan/renstra/program/save/{kemukiman_id}',
  'KaryawanRenstraController@saveProgram'
)->name('karyawan_renstra.program.save');


Route::get(
  '/karyawan/renstra/program/edit/{renssasarprog_id}',
  'KaryawanRenstraController@editProgram'
)->name('karyawan_renstra.program.edit');


Route::post(
  '/karyawan/renstra/program/update/{renssasarprog_id}',
  'KaryawanRenstraController@updateProgram'
)->name('karyawan_renstra.program.update');


Route::post(
  '/karyawan/renstra/program/delete',
  'KaryawanRenstraController@deleteProgram'
)->name('karyawan_renstra.program.delete');



//LOGIN: KARYAWAN - MENU: RENSTRA/KEGIATAN DAN INDIKATOR
Route::get(
  '/karyawan/renstra/kegiatan',
  'KaryawanRenstraController@kegiatan'
)->name('karyawan.renstra.kegiatan');


Route::get(
  '/karyawan/renstra/kegiatan/create/{renssasarprog_id}/{program_id}/{program_kode}/{program_nama}',
  'KaryawanRenstraController@createKegiatan'
)->name('karyawan_renstra.kegiatan.create');


Route::post(
  '/karyawan/renstra/kegiatan/save/{renssasarprog_id}',
  'KaryawanRenstraController@saveKegiatan'
)->name('karyawan_renstra.kegiatan.save');


Route::get(
  '/karyawan/renstra/kegiatan/edit/{renssasarprogkeg_id}',
  'KaryawanRenstraController@editKegiatan'
)->name('karyawan_renstra.kegiatan.edit');



Route::post(
  '/karyawan/renstra/kegiatan/update/{renssasarprogkeg_id}',
  'KaryawanRenstraController@updateKegiatan'
)->name('karyawan_renstra.kegiatan.update');

Route::post(
  '/karyawan/renstra/kegiatan/delete',
  'KaryawanRenstraController@deleteKegiatan'
)->name('karyawan_renstra.kegiatan.delete');



//LOGIN: KARYAWAN - MENU: RENSTRA/HASIL DAN REKAPITULASI
Route::get(
  '/karyawan/renstra/setujuopd',
  'KaryawanRenstraController@setuju_opd'
)->name('karyawan.renstra.setujuopd');


Route::get(
  '/karyawan/renstra/rekapitulasi',
  'KaryawanRenstraController@rekapitulasi'
)->name('karyawan.renstra.rekapitulasi');





//LOGIN: KARYAWAN - MENU: RENJA DAN INDIKATOR
Route::get(
  '/karyawan/renja/setup',
  'KaryawanRenjaController@setup'
)->name('karyawan.renja.setup');


Route::get(
  '/karyawan/renja/setujuopd',
  'KaryawanRenjaController@setujuopd'
)->name('karyawan.renja.setujuopd');


Route::get(
  '/karyawan/renja/tahunan',
  'KaryawanRenjaController@tahunan'
)->name('karyawan.renja.tahunan');



Route::get(
  '/karyawan/renja/subkegiatan/create/{id}/{gampong_id}/{gampong_kode}/{nama}',
  'KaryawanRenjaController@createSubkegiatan'
)->name('karyawan_renja.subkegiatan.create');



Route::post(
  '/karyawan/renja/subkegiatan/save/{renssasarprogkeg_id}',
  'KaryawanRenjaController@saveSubkegiatan'
)->name('karyawan_renja.subkegiatan.save');


Route::post(
  '/karyawan/renja/subkegiatan/edit/{id}',
  'KaryawanRenjaController@editSubkegiatan'
)->name('karyawan_renja.subkegiatan.edit');


Route::post(
  '/karyawan/renja/subkegiatan/update/{id}/{dusun_id}',
  'KaryawanRenjaController@updateSubkegiatan'
)->name('karyawan_renja.subkegiatan.update');


Route::post(
  '/karyawan/renja/subkegiatan/delete/{id}',
  'KaryawanRenjaController@deleteSubkegiatan'
)->name('karyawan_renja.subkegiatan.delete');


Route::get(
  '/karyawan/renja/rekapitulasi',
  'KaryawanRenjaController@rekapitulasi'
)->name('karyawan.renja.rekapitulasi');



//-----------------------------------------------------------------------------------
//LOGIN: KARYAWAN - MENU: DPA

Route::get(
  '/karyawan/dpa/renja',
  'KaryawanDpaController@renja'
)->name('karyawan.dpa.renja');

Route::get(
  '/karyawan/dpa/rincian',
  'KaryawanDpaController@rincian'
)->name('karyawan.dpa.rincian');


Route::get(
  '/karyawan/dpa/setuju',
  'KaryawanDpaController@setuju'
)->name('karyawan.dpa.setuju');

Route::get(
  '/karyawan/dpa/rekapitulasi',
  'KaryawanDpaController@rekapitulasi'
)->name('karyawan.dpa.rekapitulasi');


Route::get(
  '/karyawan/dpa/create/{id}/{dusun_kode}/{nama}',
  'KaryawanDpaController@createDPA'
)->name('karyawan_dpa.dpa.create');


Route::post(
  '/karyawan/dpa/save/{id}',
  'KaryawanDpaController@saveDPA'
)->name('karyawan_dpa.dpa.save');


Route::get(
  '/karyawan/dpa/edit/{id}',
  'KaryawanDpaController@editDPA'
)->name('karyawan_dpa.dpa.edit');


Route::post(
  '/karyawan/dpa/update/{id}/{dusun_id}',
  'KaryawanDpaController@updateDPA'
)->name('karyawan_dpa.dpa.update');


Route::get(
  '/karyawan/dpa/delete-file',
  'KaryawanDpaController@deleteFileDPA'
)->name('karyawan_dpa.dpa.deleteFile');


Route::post(
  '/karyawan/dpa/delete',
  'KaryawanDpaController@deleteDPA'
)->name('karyawan_dpa.dpa.delete');





//----------------------------------------------------------------------------------
//LOGIN : UMUM/KARYAWAN - MENU: REKAM MEDIK/REALISASI

Route::get(
  '/karyawan/realisasi',
  'KaryawanController@rekammedik'
)->name('karyawan_rekammedik.karyawan_rm');

Route::get(
  '/karyawan/realisasi/pending',
  'KaryawanController@rekammedik_pending'
)->name('karyawan_rekammedik.karyawan_rm_pending');


Route::get(
  '/karyawan/realisasi/tertolak',
  'KaryawanController@rekammedik_tertolak'
)->name('karyawan_rekammedik.karyawan_rm_tertolak');



Route::get(
  '/karyawan/realisasi/create/{id}/{dusun_id}/{dusun_kode}/{nama}',
  'KaryawanController@createRM'
)->name('karyawan_rekammedik.karyawan_rm.create');


Route::post(
  '/karyawan/realisasi/save/{id}',
  'KaryawanController@saveRM'
)->name('karyawan_rekammedik.karyawan_rm.save');


Route::get(
  '/karyawan/realisasi/edit/{id}',
  'KaryawanController@editRM'
)->name('karyawan_rekammedik.karyawan_rm.edit');

Route::post(
  '/karyawan/realisasi/update/{id}',
  'KaryawanController@updateRM'
)->name('karyawan_rekammedik.karyawan_rm.update');


Route::get(
  '/karyawan/realisasi/delete-file',
  'KaryawanController@deleteFileRM'
)->name('karyawan_rekammedik.karyawan_rm.deleteFile');


Route::post(
  '/karyawan/realisasi/delete',
  'KaryawanController@deleteRM'
)->name('karyawan_rekammedik.karyawan_rm.delete');


Route::get(
  '/karyawan/undangan/{id}',
  'KaryawanController@undangan'
)->name('karyawan_rekammedik.karyawan_rm.undangan');
//------------------------------------------------------------------------------------


//----------------------------------------------------------------------------------
// //LOGIN : UMUM/KARYAWAN - MENU: MATRIX

Route::get(
  '/karyawan/matrix/rfk',
  'KaryawanMatrixController@matrix'
)->name('karyawan_matrix.karyawan_matrix');


Route::get(
  '/karyawan/matrix/renja',
  'KaryawanMatrixController@matrixRenja'
)->name('karyawan_matrix.karyawan_matrix_renja');


Route::get(
  '/karyawan/matrix/pending',
  'KaryawanMatrixController@matrix_pending'
)->name('karyawan_matrix.karyawan_matrix_pending');


Route::get(
  '/karyawan/matrix/tertolak',
  'KaryawanMatrixController@matrix_tertolak'
)->name('karyawan_matrix.karyawan_matrix_tertolak');



Route::get(
  '/karyawan/matrix/create/{id}/{dusun_id}/{dusun_kode}/{nama}',
  'KaryawanMatrixController@createMatrix'
)->name('karyawan_matrix.karyawan_matrix.create');


Route::post(
  '/karyawan/matrix/save/{id}',
  'KaryawanMatrixController@saveMatrix'
)->name('karyawan_matrix.karyawan_matrix.save');


Route::get(
  '/karyawan/realisasi/edit/{id}',
  'KaryawanController@editRM'
)->name('karyawan_rekammedik.karyawan_rm.edit');

Route::post(
  '/karyawan/realisasi/update/{id}',
  'KaryawanController@updateRM'
)->name('karyawan_rekammedik.karyawan_rm.update');


Route::get(
  '/karyawan/realisasi/delete-file',
  'KaryawanController@deleteFileRM'
)->name('karyawan_rekammedik.karyawan_rm.deleteFile');


Route::post(
  '/karyawan/realisasi/delete',
  'KaryawanController@deleteRM'
)->name('karyawan_rekammedik.karyawan_rm.delete');


Route::get(
  '/karyawan/undangan/{id}',
  'KaryawanController@undangan'
)->name('karyawan_rekammedik.karyawan_rm.undangan');
//------------------------------------------------------------------------------------




//LOGIN : UMUM/KARYAWAN - MENU : BIODATA
Route::get(
  '/karyawan/biodata',
  'KaryawanController@biodata'
)->name('karyawan_biodata.karyawan_data');


// Route::get('/karyawan/biodata/create', 
//            'KaryawanController@createBiodata'
//            )->name('karyawan_biodata.karyawan_data.create');


// Route::post('/karyawan/biodata/tatap-muka/save', 
//             'KaryawanController@saveBiodata'
//            )->name('karyawan_biodata.karyawan_data.save');



Route::get(
  '/karyawan/biodata/edit/{id}',
  'KaryawanController@editBiodata'
)->name('karyawan_biodata.karyawan_data.edit');



Route::post(
  '/karyawan/biodata/update/{id}',
  'KaryawanController@updateBiodata'
)->name('karyawan_biodata.karyawan_data.update');


Route::get(
  '/karyawan/biodata/delete-file',
  'KaryawanController@deleteFile'
)->name('karyawan_biodata.karyawan_data.deleteFile');


Route::post(
  '/karyawan/biodata/delete',
  'KaryawanController@delete'
)->name('karyawan_biodata.karyawan_data.delete');


Route::get(
  '/karyawan/undangan/{id}',
  'KaryawanController@undangan'
)->name('karyawan_biodata.karyawan_data.undangan');





//-------------------------------------------------------------------------------------------------------------

//LOGIN : UMUM/KARYAWAN - MENU : PROFIL KLINIK
Route::get(
  '/karyawan/klinik/profil',
  'KaryawanController@profil'
)->name('karyawan.klinik.profil');


Route::get(
  '/karyawan/klinik/manajemen',
  'KaryawanController@manajemen'
)->name('karyawan.klinik.manajemen');


//----------------------------------------------------------------------------
// LOGIN: UMUM/KARYAWAN - MENU: FAQ
// Route::get('/karyawan/faq/', 
//            'KaryawanController@faq'
//            )->name('karyawan_faq.karyawan_faq.faq');

// KARYAWAN INFORMASI
// Route::get('/karyawan/informasi/', 
//            'KaryawanController@informasi'
//            )->name('karyawan_informasi.karyawan_informasi.informasi');



//MENAMPILKAN KECAMATAN
// Route::get('/pengguna/survey-kecamatan', 
//            'PenggunaKecamatanController@tampilTema'
//           )->name('pengguna.kecamatan');


// Route::get('/pengguna/survey-kecamatan/{id}', 
//            'PenggunaKecamatanController@survey'
//           )->name('pengguna.kecamatan.survey');


// Route::post('/pengguna/survey-kecamatan/{id}', 
//             'PenggunaKecamatanController@saveSurvey'
//            )->name('pengguna.kecamatan.survey.save');

// Route::get('/pengguna/survey-kecamatan_hasil', 
//             'PenggunaKecamatanController@hasilSurvey'
//            )->name('pengguna.kecamatan_hasil');




// //PENGGUNA.INDIKATOR_KECAMATAN
// Route::get('/pengguna/survey-indikatorkecamatan', 
//            'PenggunaIndikatorKecamatanController@tampilTema'
//           )->name('pengguna.indikator_kecamatan');


// Route::get('/pengguna/survey-indikatorkecamatan/{id}', 
//            'PenggunaIndikatorKecamatanController@survey'
//           )->name('pengguna.indikator_kecamatan.survey');


// Route::post('/pengguna/survey-indikatorkecamatan/{id}', 
//             'PenggunaIndikatorKecamatanController@saveSurvey'
//            )->name('pengguna.indikator_kecamatan.survey.save');

// Route::get('/pengguna/survey-indikatorkecamatan_hasil', 
//             'PenggunaIndikatorKecamatanController@hasilSurvey'
//            )->name('pengguna.indikator_kecamatan_hasil');




////////////////////////////////////////////////////////////////////////////


Route::get('/user/ubah-email', 'UserController@ubahEmail')->name('user.ubahEmail');
Route::post('/user/ubah-email', 'UserController@prosesUbahEmail');

Route::get('/user/ubah-password', 'UserController@ubahPassword')->name('user.ubahPassword');
Route::post('/user/ubah-password', 'UserController@prosesUbahPassword');



Route::get(
  'bla',
  function () {
    $wa = [
      ['Hidayatullah',  '82294486142'],
      ['Anjany Mardasari',  '82168010971'],
      ['Fajrul Munawir',  '82273727676'],
      ['Muhammad Ikhsan',  '82268782739'],
      ['Muammar Kadafi',  '82273161943'],
      ['Budi Gunawan Manik',  '85361743704'],
      ['Rico Tampaty',  '82268134487'],
      ['Raihan Amalia',  '82361155543'],
      ['Anggun Arwulan Dani',  '81268351809'],
      ['Arif Rahmansyah',  '85333797344'],
      ['Rahma Dhina Salsa Billa',  '81263983637'],
      ['Siti Maghfirah',  '82242374461'],
      ['BINTANG SURI',  '82246406032'],
      ['Arif Rahmansyah',  '85333797344'],
      ['Annisatul Liza',  '81376075040'],
      ['Ayu Maulina',  '82277839609'],
      ['Ayi Wahyuni',  '82290669046'],
      ['Fitrah aulia rizki',  '82312619975'],
      ['Temas Miko',  '82224102350'],
      ['Bunaiya Marfuzah',  '82361481448'],
      ['Rynanda Dwi Pramita',  '82258298982'],
      ['Farach Fazilla Lubis',  '85297018999'],
      ['Ulfa nurrahmi',  '82219866294'],
      ['Desvia Ananda',  '82247039211'],
      ['Cut Putroe Salsabila',  '89501505710'],
      ['Putri Rezekina',  '82267700150'],
      ['Layna Zhalilta',  '82367236397'],
      ['Ima ulina Sirait',  '81360261090'],
      ['Ikhwanul ikhsan',  '82351596656'],
      ['Suci putri mahdi',  '82213117226'],
      ['Elvira Nasida',  '82360730193'],
      ['Suci Ramadian Adha',  '81377030487'],
      ['Kania Indah Azhari',  '85372657622'],
      ['Wina Aprillia',  '85296102862'],
      ['Cherly Ofita',  '81315741502'],
      ['Muzainah',  '85361727682'],
      ['Syalsa Selvira Aulia',  '85294619151'],
      ['Farah Nabila',  '82273236562'],
      ['Neira Salsabila',  '8116702001'],
      ['Raudhiatuz Zahra',  '82243263030'],
      ['Fitri Amalia',  '82370001814'],
      ['Bestari',  '85270781527'],
      ['Syifa Nabila',  '82311423549'],
    ];

    foreach ($wa as $key => $value) {
      $text = "Assalamu'alaikum $value[0],\nSudah bayar uang pendaftaran kak?\nKalau belum silahkan melakukan pembayaran terakhir hari ini karena kita mau buat sertifikatnya.\nPembayaran bisa di posko infest, kita punya dua posko\n1. BEM MIPA di Gelanggang Unsyiah\n2. Lt. 1 Perpustakaan di pintu masuk\nAtau bisa hubungi panitia langsung, minta janjian ketemu +62 821-4463-7249\n\nDan jangan lupa juga untuk bergabung ke group peserta di https://chat.whatsapp.com/ISX8GfExJZl1litCxWUdLM";
      $text = rawurlencode($text);
      echo "<a href='https://web.whatsapp.com/send?phone=62$value[1]&text=$text' target='_blank'>$value[0], $value[1]</a><br>";
    }
  }

);
