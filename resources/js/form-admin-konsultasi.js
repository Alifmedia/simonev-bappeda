
var $formSasaranRenstra = $('#form-sasaran-renstra');


$('#tambah-sasaran-renstra-btn').on('click', 
                                    function()
                                    {
                                     $formSasaranRenstra.append(`
                                
                                            <div class="form-row" align="center">

                                            
                                            <tr>

                                             
                                              
                                            <td>

                                              <label class="col-sm-1.5 col-form-label-sm">Indikator</label>
                                              <input type="text" class="form-control-sm col-sm-6 " name="indikator[]" placeholder="">
                                             </td>  

                                                                      
                                         
                                             <td>
                                              <label class="col-sm-1.5 col-form-label-sm">Satuan</label>
                                              <input type="text" class="form-control-sm col-sm-1 " name="satuan[]" placeholder="">
                                             </td>


                                              <td>
                                              <label class="col-sm-1.5 col-form-label-sm">Data Awal</label>
                                              <input type="text" class="form-control-sm col-sm-1 " name="nilaiawal[]" placeholder="">
                                             </td>


                                             <div class="col-1">
                                              <button type="button" class="btn btn-danger btn-delete-form-tahapan">
                                              <i class="fa fa-trash" aria-hidden="true"></i>
                                              </button>
                                              </div>    

                                             </tr>

                                             <br>
                                             <br>

                                             <tr>
                                             <td>
                                          
                                             <input type="text" class="form-control-sm col-sm-1" name="tahun1[]" value="2023" placeholder="" disabled>
                                             </td>

                                              <td>
                                              <input type="text" class="form-control-sm col-sm-2 " name="target1[]" placeholder="target" >
                                             </td>

                                             <td>
                                             <input type="text" class="form-control-sm col-sm-1 " name="tahun2[]" value="2024" placeholder="" disabled>
                                             </td>

                                              <td>
                                             
                                              <input type="text" class="form-control-sm col-sm-2 " name="target2[]" placeholder="target">
                                             </td>

                                              

                                            
                                             <td>
                                         
                                             <input type="text" class="form-control-sm col-sm-1 " name="tahun3[]" value="2025" placeholder="" disabled>
                                             </td>

                                              <td>
                                         
                                              <input type="text" class="form-control-sm col-sm-2 " name="target3[]" placeholder="target">
                                             </td>

                                         
                                           
                                              <td>
                                          
                                             <input type="text" class="form-control-sm col-sm-1 " name="tahun4[]" value="2026" placeholder="" disabled>
                                             </td>

                                              <td>
                                            
                                              <input type="text" class="form-control-sm col-sm-2 " name="target4[]" placeholder="target">
                                             </td>

                                                                                                      

                                             </tr>




                                             </div>

                                          

                      
                                            </div>
                                            <hr>`);
                                          }
                                          );






$formSasaranRenstra.on('click', '.btn-delete-form-sasaran-renstra', 
                          function()
                          {
                           $(this).parents('.form-row').remove();
                          }
                )








var $formTargetRenstra = $('#form-target-renstra');


$('#tambah-target-renstra-btn').on('click', 
                              function()
                              {
                              $formTargetRenstra.append(`
                                <center><div class="form-row mb-3">

                               

                                 <div >
                                 <label class="col-sm-1.5 col-form-label-sm">Tahun</label>
                                 <select class="form-control-sm col-sm-7 ""  name="tahun" >
                                 <option value="0">Semua</option>
                                  <option value="2023"   'selected' : '' }}>2023</option>
                                  <option value="2024"   'selected' : '' }}>2024</option>
                                  <option value="2025"   'selected' : '' }}>2025</option>
                                  <option value="2026"  'selected' : '' }}>2026</option>
                                </select>
                                </div>

                              
                                                          
                              
                                <div>
                                <label class="col-sm-1.5 col-form-label-sm">Kinerja</label>
                                  <input type="text" class="form-control-sm col-sm-8 " name="fisik[]" placeholder="">
                                </div>

                                 <div>
                                <label class="col-sm-1.5 col-form-label-sm">Keuangan</label>
                                  <input type="text" class="form-control-sm col-sm-8 " name="keuangan[]" placeholder="">
                                </div>


                                 <div class="col-1">
                                  <button type="button" class="btn btn-danger btn-delete-form-target-renstra">
                                  <i class="fa fa-trash" aria-hidden="true"></i>
                                  </button>
                                </div>


                     
                         


                                </div></center> <hr>`);
                              }
                              );






$formTargetRenstra.on('click', '.btn-delete-form-target-renstra', 
                          function()
                          {
                           $(this).parents('.form-row').remove();
                          }
                )









var $formSasaranRenstraTarget = $('#form-sasaran-renstra-target');


$('#tambah-sasaran-renstra-target-btn').on('click', 
                              function()
                              {
                              $formSasaranRenstraTarget.append(`
                                <center>
                                <div class="form-row mb-3">

                               
          
                              
                                                          
                              
                                <div >
                                 <label class="col-sm-1.5 col-form-label-sm">TAHUN</label>
                                 <select class="form-control-sm col-sm-7"  name="tahun[]" >
                                 <option value="0">Semua</option>
                                  <option value="2023"   'selected' : '' }}>2023</option>
                                  <option value="2024"   'selected' : '' }}>2024</option>
                                  <option value="2025"   'selected' : '' }}>2025</option>
                                  <option value="2026"  'selected' : '' }}>2026</option>
                                  <option value="2027"  'selected' : '' }}>2027</option>
                                </select>
                                </div>

                              
                                                          
                              
                                <div>
                                <label class="col-sm-1.5 col-form-label-sm">NILAI</label>
                                  <input type="text" class="form-control-sm col-sm-8 " name="nilai[]" placeholder="">
                                </div>

                                 
                         


                                </div></center> <hr>`);
                              }
                              );






$formSasaranRenstraTarget.on('click', '.btn-delete-form-sasaran-renstra-target', 
                          function()
                          {
                           $(this).parents('.form-row').remove();
                          }
                )















var $formProgramRenstra = $('#form-program-renstra');


$('#tambah-program-renstra-btn').on('click', 
                                    function()
                                    {
                                     $formProgramRenstra.append(`
                                
                                            <div class="form-row" align="center">

                                            
                                            <tr>

                                             
                                              
                                            <td>

                                              <label class="col-sm-1.5 col-form-label-sm">Indikator</label>
                                              <input type="text" class="form-control-sm col-sm-6 " name="indikator[]" placeholder="">
                                             </td>  

                                                                      
                                         
                                             <td>
                                              <label class="col-sm-1.5 col-form-label-sm">Satuan</label>
                                              <input type="text" class="form-control-sm col-sm-1 " name="satuan[]" placeholder="">
                                             </td>


                                              <td>
                                              <label class="col-sm-1.5 col-form-label-sm">Data Awal</label>
                                              <input type="number" class="form-control-sm col-sm-1 " name="nilaiawal[]" placeholder="">
                                             </td>


                                             <div class="col-1">
                                              <button type="button" class="btn btn-danger btn-delete-form-tahapan">
                                              <i class="fa fa-trash" aria-hidden="true"></i>
                                              </button>
                                              </div>    

                                             </tr>

                                             <br>
                                             <br>

                                             <tr>
                                             <td>
                                          
                                             <input type="text" class="form-control-sm col-sm-1" name="tahun1[]" value="2023" placeholder="" disabled>
                                             </td>

                                              <td>
                                              <input type="number" class="form-control-sm col-sm-2 " name="target1[]" placeholder="target" >
                                             </td>

                                              <td>
                                              <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan1[]" placeholder="keuangan" >
                                             </td>

                                             <td>
                                             <input type="text" class="form-control-sm col-sm-1 " name="tahun2[]" value="2024" placeholder="" disabled>
                                             </td>

                                              <td>
                                             
                                              <input type="number" class="form-control-sm col-sm-2 " name="target2[]" placeholder="target">
                                             </td>

                                              <td>
                                              <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan2[]" placeholder="keuangan" >
                                             </td>

                                              

                                            
                                             <td>
                                         
                                             <input type="text" class="form-control-sm col-sm-1 " name="tahun3[]" value="2025" placeholder="" disabled>
                                             </td>

                                              <td>
                                         
                                              <input type="number" class="form-control-sm col-sm-2 " name="target3[]" placeholder="target">
                                             </td>


                                              <td>
                                              <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan3[]" placeholder="keuangan" >
                                             </td>

                                         
                                           
                                              <td>
                                          
                                             <input type="text" class="form-control-sm col-sm-1 " name="tahun4[]" value="2026" placeholder="" disabled>
                                             </td>

                                              <td>
                                            
                                              <input type="number" class="form-control-sm col-sm-2 " name="target4[]" placeholder="target">
                                             </td>

                                              <td>
                                              <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan4[]" placeholder="keuangan" >
                                             </td>

                                                                                                      

                                             </tr>




                                             </div>

                                          

                      
                                            </div>
                                            <hr>`);
                                          }
                                          );






$formProgramRenstra.on('click', '.btn-delete-form-program-renstra', 
                          function()
                          {
                           $(this).parents('.form-row').remove();
                          }
                )




var $formProgramRenstraTarget = $('#form-program-renstra-target');


$('#tambah-program-renstra-target-btn').on('click', 
                              function()
                              {
                              $formProgramRenstraTarget.append(`
                                <center>
                                <div class="form-row mb-3">

                                        
                                                                                      
                              
                                <div >
                                 <label class="col-sm-1.5 col-form-label-sm">TAHUN</label>
                                 <select class="form-control-sm col-sm-7"  name="targettahun[]" >
                                 <option value="0">Semua</option>
                                  <option value="2023"   'selected' : '' }}>2023</option>
                                  <option value="2024"   'selected' : '' }}>2024</option>
                                  <option value="2025"   'selected' : '' }}>2025</option>
                                  <option value="2026"  'selected' : '' }}>2026</option>
                                  <option value="2027"  'selected' : '' }}>2027</option>
                                </select>
                                </div>

                              
                                                          
                              
                                <div>
                                <label class="col-sm-1.5 col-form-label-sm">FISIK</label>
                                  <input type="text" class="form-control-sm col-sm-8 " name="targetfisik[]" placeholder="">
                                </div>


                                  <div>
                                <label class="col-sm-1.5 col-form-label-sm">KEUANGAN</label>
                                  <input type="text" class="form-control-sm col-sm-8 " name="targetkeuangan[]" placeholder="">
                                </div>
                                 
                         


                                </div></center> <hr>`);
                              }
                              );






$formProgramRenstraTarget.on('click', '.btn-delete-form-program-renstra-target', 
                          function()
                          {
                           $(this).parents('.form-row').remove();
                          }
                )














var $formKegiatanRenstra = $('#form-kegiatan-renstra');


$('#tambah-kegiatan-renstra-btn').on('click', 
                                    function()
                                    {
                                     $formKegiatanRenstra.append(`
                                
                                            <div class="form-row" align="center">

                                            
                                            <tr>

                                              
                                            <td>

                                              <label class="col-sm-1.5 col-form-label-sm">Indikator</label>
                                              <input type="text" class="form-control-sm col-sm-6 " name="indikator[]" placeholder="">
                                             </td>  

                                                                      
                                         
                                             <td>
                                              <label class="col-sm-1.5 col-form-label-sm">Satuan</label>
                                              <input type="text" class="form-control-sm col-sm-1 " name="satuan[]" placeholder="">
                                             </td>


                                              <td>
                                              <label class="col-sm-1.5 col-form-label-sm">Data Awal</label>
                                              <input type="number" class="form-control-sm col-sm-1 " name="nilaiawal[]" placeholder="">
                                             </td>


                                             <div class="col-1">
                                              <button type="button" class="btn btn-danger btn-delete-form-tahapan">
                                              <i class="fa fa-trash" aria-hidden="true"></i>
                                              </button>
                                              </div>    

                                             </tr>

                                             <br>
                                             <br>

                                             <tr>
                                             <td>
                                          
                                             <input type="text" class="form-control-sm col-sm-1" name="tahun1[]" value="2023" placeholder="" disabled>
                                             </td>

                                              <td>
                                              <input type="number" class="form-control-sm col-sm-2 " name="target1[]" placeholder="target" >
                                              </td>

                                               <td>
                                              <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan1[]" placeholder="keuangan" >
                                             </td>



                                             <td>
                                             <input type="text" class="form-control-sm col-sm-1 " name="tahun2[]" value="2024" placeholder="" disabled>
                                             </td>

                                              <td>
                                             
                                              <input type="number" class="form-control-sm col-sm-2 " name="target2[]" placeholder="target">
                                             </td>

                                              <td>
                                              <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan2[]" placeholder="keuangan" >
                                             </td>

                                              

                                            
                                             <td>
                                         
                                             <input type="text" class="form-control-sm col-sm-1 " name="tahun3[]" value="2025" placeholder="" disabled>
                                             </td>

                                              <td>
                                         
                                              <input type="number" class="form-control-sm col-sm-2 " name="target3[]" placeholder="target">
                                             </td>


                                              <td>
                                              <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan3[]" placeholder="keuangan" >
                                             </td>

                                         
                                           
                                              <td>
                                          
                                             <input type="text" class="form-control-sm col-sm-1 " name="tahun4[]" value="2026" placeholder="" disabled>
                                             </td>

                                              <td>
                                            
                                              <input type="number" class="form-control-sm col-sm-2 " name="target4[]" placeholder="target">
                                             </td>

                                              <td>
                                              <input type="number" class="form-control-sm col-sm-3 " name="targetkeuangan4[]" placeholder="keuangan">
                                             </td>

                                                                                                      

                                             </tr>




                                             </div>

                                          

                      
                                            </div>
                                            <hr>`);
                                          }
                                          );






$formKegiatanRenstra.on('click', '.btn-delete-form-kegiatan-renstra', 
                          function()
                          {
                           $(this).parents('.form-row').remove();
                          }
                )





var $formKegiatanRenstraTarget = $('#form-kegiatan-renstra-target');


$('#tambah-kegiatan-renstra-target-btn').on('click', 
                              function()
                              {
                              $formKegiatanRenstraTarget.append(`
                                <center><div class="form-row mb-3">

                               

                                 <div >
                                 <label class="col-sm-1.5 col-form-label-sm">Tahun</label>
                                 <select class="form-control-sm col-sm-7 ""  name="targettahun[]" >
                                 <option value="0">Semua</option>
                                  <option value="2023"   'selected' : '' }}>2023</option>
                                  <option value="2024"   'selected' : '' }}>2024</option>
                                  <option value="2025"   'selected' : '' }}>2025</option>
                                  <option value="2026"  'selected' : '' }}>2026</option>
                                </select>
                                </div>

                                                                                        
                              
                                <div>
                                <label class="col-sm-1.5 col-form-label-sm">Fisik</label>
                                  <input type="text" class="form-control-sm col-sm-8 " name="targetfisik[]" placeholder="">
                                </div>

                                 <div>
                                <label class="col-sm-1.5 col-form-label-sm">Keuangan</label>
                                  <input type="text" class="form-control-sm col-sm-8 " name="targetkeuangan[]" placeholder="">
                                </div>


                                 <div class="col-1">
                                  <button type="button" class="btn btn-danger btn-delete-form-kegiatan-renstra-target">
                                  <i class="fa fa-trash" aria-hidden="true"></i>
                                  </button>
                                </div>


                     
                         


                                </div></center> <hr>`);
                              }
                              );



$formKegiatanRenstraTarget.on('click', '.btn-delete-form-kegiatan-renstra-target', 
                          function()
                          {
                           $(this).parents('.form-row').remove();
                          }
                )






//form tahapan

var $formTahapan = $('#form-tahapan');


$('#tambah-tahapan-btn').on('click', 
                              function()
                              {
                              $formTahapan.append(`
                                <div class="form-row mb-3">

                              
                              
                                <div class="col-10 mt-3">
                                  <input type="text" class="form-control" name="item_lingkup[]" placeholder="#-uraian belanja">
                                </div>


                                <div class="col-1">
                                  <button type="button" class="btn btn-danger btn-delete-form-tahapan">
                                  <i class="fa fa-trash" aria-hidden="true"></i>
                                  </button>
                                </div>



                                 <div class="col-12 mt-3">
                                  <input type="text" class="form-control" name="item_nama[]" placeholder="nama">
                                </div>


                                 <div class="col-2 mt-3">
                                  <input type="number" class="form-control" name="item_koefisien[]" placeholder="koefisien">
                                </div>

                                 <div class="col-2 mt-3">
                                  <input type="text" class="form-control" name="item_satuan[]" placeholder="satuan">
                                </div>

                                 <div class="col-2 mt-3">
                                  <input type="number" class="form-control" name="item_harga[]" placeholder="harga">
                                </div>

                                  <div class="col-1 mt-3">
                                  <input type="number" class="form-control" name="item_ppn[]" placeholder="ppn">
                                </div>

                                
                                
                                 <div class="col-2 mt-3">
                                  <input type="number" class="form-control" name="item_targetfisik[]" placeholder="target fisik">
                                </div>
                                <br>

                                <div class="col-3 mt-3">
                                 <select class="form-control"  name="item_sumberdana[]" >
                                 <option value="0">Sumber Dana</option>
                                
                                  <option value="1"   'selected' : '' }}>DAU</option>
                                  <option value="2"   'selected' : '' }}>DAK</option>
                                  <option value="3"   'selected' : '' }}>DAK NON-FISIK</option>
                                  <option value="4"  'selected' : '' }}>DOKA</option>
                                  <option value="5"  'selected' : '' }}>DID</option>
                                  <option value="6"  'selected' : '' }}>DTU</option>
                                  <option value="7"  'selected' : '' }}>DBH-CT</option>
                                  <option value="8"  'selected' : '' }}>DBH-TB</option>
                                  <option value="9"  'selected' : '' }}>DBH-PR</option>
                                  <option value="10"  'selected' : '' }}>BANKEU</option>
                                  <option value="11"  'selected' : '' }}>APBK</option>
                               

                              </select>
                                </div>
                         


                                </div> <hr>`);
                              }
                              );






$formTahapan.on('click', '.btn-delete-form-tahapan', 
                          function()
                          {
                           $(this).parents('.form-row').remove();
                          }
                )





var $selectedPemangku = $('#selected-pemangku');
var $selesaiPilihPemangkuBtn = $('#selesai-pilih-pemangku-btn');

$selesaiPilihPemangkuBtn.on('click', function(){
  $selectedPemangku.html('');
  $('.pemangku-checkbox:checked').each(function(){
    var html = `<li class="list-group-item d-flex justify-content-between align-items-center py-2" data-id="${$(this).val()}">
                  ${$(this).data('value')}
                  <button type="button" class="btn btn-link p-0 hapus-pemangku-btn">
                    <i class="fa fa-times" aria-hidden="true"></i>
                  </button>
                </li>`

    $selectedPemangku.append(html);
  });
});

$selectedPemangku.on('click', '.hapus-pemangku-btn', function(){
  var el = $(this).parents('.list-group-item');
  $('.pemangku-checkbox[value='+el.data('id')+']').prop("checked", false);
  el.remove();
});

//dokumen
$('.custom-file-input').on('change', function() {
  console.log($(this).val());
   let fileName = $(this).val().split('\\').pop();
   $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
