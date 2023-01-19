$('.carousel').carousel();


$('.check-all').on('click', function()
{
  $('.check').prop('checked', this.checked);
})

// tooltip
$('body').tooltip(
{
    selector: '[data-toggle="tooltip"]'
});

// auto tambah * pada input yg ada required
$('.form-control[required]').siblings('label').addClass('required');


//owl carousel
$('.owl-carousel').owlCarousel(
{
    margin:10,
    loop:false,
    autoWidth:true,
    items:4,
});



//date time picker
flatpickr(".date-picker", 
{
  altInput: true,
  altFormat: "F j, Y",
  dateFormat: "Y-m-d",
});


flatpickr(".time-picker", 
{
  enableTime: true,
  noCalendar: true,
  dateFormat: "H:i",
  time_24hr: true
});
