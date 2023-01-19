$('.filter .form-control').on('change',  
                            function()
                              {
                                $('#search-form').submit();
                              }
                             );

// pilihan di add form
// var selectedOption;
//
// function addOption(selector, option) {
//   selectedOption = selector.children("option:selected").val();
//   option.children('option').not('.default').addClass('d-none');
//   option.children('option[data-on="' + selectedOption + '"]').removeClass('d-none');
//
//   selector.on('change', function(){
//     selectedOption = $(this).children("option:selected").val();
//     option.children('option').not('.default').addClass('d-none');
//     option.children('option[data-on="' + selectedOption + '"]').removeClass('d-none');
//     option.find('.default').prop('selected', true);
//   });
// }

  function dependentInput(from, to, db) 
  {
    $(from).on('change', 
                function()
                {
                    var fk_id = $(this).children("option:selected").val();

                    $.get(getAddressData+"?db="+db+"&fk="+fk_id, 
                                                              function(data, status)
                                                              {
                                                                var $select = $(to);
                                                                $select.children('option').not('.default').remove();
                                                                for (var i = 0; i < data.length; i++) 
                                                                {
                                                                  $select.append(`<option value="${data[i].id}">${data[i].nama}</option>`);
                                                                }
                                                              });
                })
  }

  dependentInput('#kabupaten', '#kecamatan', 'kecamatan');
  dependentInput('#kecamatan', '#kemukiman', 'kemukiman');
  dependentInput('#kemukiman', '#gampong',   'gampong');
  dependentInput('#gampong',   '#dusun',     'dusun');




  function dependentInputBelanja(from, to, db) 
  {
    $(from).on('change', 
                function()
                {
                    var fk_id = $(this).children("option:selected").val();

                    $.get(getAddressDataBelanja+"?db="+db+"&fk="+fk_id, 
                                                              function(data_belanja, status)
                                                              {
                                                                var $select = $(to);
                                                                $select.children('option').not('.default').remove();
                                                                for (var i = 0; i < data_belanja.length; i++) 
                                                                {
                                                                  $select.append(`<option value="${data_belanja[i].id}">${data_belanja[i].nama}</option>`);
                                                                }
                                                              });
                })
  }

  dependentInputBelanja('#kelompok', '#jenis', 'jenis');
  dependentInputBelanja('#jenis', '#objek', 'objek');
  dependentInputBelanja('#objek', '#rinob',   'rinob');
  dependentInputBelanja('#rinob',   '#subrinob',     'subrinob');
