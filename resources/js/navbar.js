$iconUp   = 'fa-chevron-up';
$iconDown = 'fa-chevron-down';

function changeIcon()
{
  $groups = $('.sidebar__group').each(function(){
    if ($(this).hasClass('active')) {
      $(this).find('.icon').removeClass($iconDown);
      $(this).find('.icon').addClass($iconUp);
    } else {
      $(this).find('.icon').removeClass($iconUp);
      $(this).find('.icon').addClass($iconDown);
    }
  })
}





$('.sidebar__group .icon').on('click', function()
{
  $group = $(this).parent().parent();
  $otherGroups = $('.sidebar__group .icon').parent().parent().not($group.parents('.sidebar__group')).not($group).each(function(){
    $(this).removeClass('active');
  });
  $group.toggleClass('active');
  changeIcon();
})

changeIcon();

// Tab
var currentUrl = window.location.href.split(/[?#]/)[0];

$('.nav-link[href="' + currentUrl + '"]').addClass('active');




if ($('.nav-tabs').length) 
{

  var $el, leftPos, newWidth,
  $mainNav = $(".nav-tabs");

  $mainNav.append("<li id='magic-line'></li>");
  var $magicLine = $("#magic-line");

  $navItemActive = $(".nav-tabs .active").parent();

  $magicLine
  .width($navItemActive.width())
  .css("left", $navItemActive.position().left);



  $('.nav-tabs .nav-link').on('click', function()
  {
    $el = $(this).parents('.nav-item');
    leftPos = $el.position().left;
    newWidth = $el.width();
    $magicLine.stop().animate({
      left: leftPos,
      width: newWidth
    });
  })
  
}
