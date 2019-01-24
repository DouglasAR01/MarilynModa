// Sticky navbar
$(document).ready(function() {
  var stickyNavTop = $('.navbar').offset().top;

  var stickyNav = function(){
    var scrollTop = $(window).scrollTop();

    if (scrollTop > stickyNavTop) {
        $('.navbar').addClass('sticky-top');
        $('.content').css('margin-top','3em');
    } else {
        $('.navbar').removeClass('sticky-top');
        $('.content').css('margin-top','0em');
    }
  };

  stickyNav();

  $(window).scroll(function() {
      stickyNav();
  });
});

//Catálogo Dropdown
$(function(){
    $('.dropdown-toggle').dropdown();
});

//Dropdown en pantallas pequeñas
// $(function(){
//
//   var showVpWidth = function(){
//     $('#vp-width').html($(window).width());
//     $(".dpdwn-content").hide();
//
//     if($(window).width() < 975){
//       $(".dpdwn-content").css({'top': '0','position': 'relative'});
//
//     }
//     else{
//       $(".dpdwn-content").css({'top': '40px','position': 'absolute'});
//     }
//     $(".dpdwn").click(function(){
//       $(".dpdwn-content").toggle();
//     });
//
//   };
//
//   showVpWidth();
//
//   $(window).resize(function() {
//
//
//     showVpWidth();
//   });
// });

//Efecto de flecha en las tabs de género del dropdown en catálogo
$(function(){
  $(".has-tab").click(function(){
    $(this).toggleClass('has-tab-active');
  });
});

//Botones de tabs en el dropdown en catálogo
function openTab(tabName) {
  var i;
  var x = document.getElementsByClassName("tab");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(tabName).style.display = "flex";
}
