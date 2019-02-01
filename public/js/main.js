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

//Filtros en Catálogo
$(function(){

  var showFilters = function(){
    if($('.filters-hidden').is(':visible')){
      $(".filters-container").hide();
    }
    else{
      $(".filters-container").css('display', 'flex');
    }
    $(".filters-hidden").click(function(){
      $(".filters-container").show();
    });
    $(".fa-times").click(function(){
      $(".filters-container").hide();
    });
  };

  showFilters();

  $(window).resize(function() {
    showFilters();
  });
});

//Barra de funciones de empleado
$(function(){
    $(".fa-grip-horizontal").click(function(){
      $(".funciones-container").css('display', 'flex');
      $('#nav-brand, .fa-grip-horizontal').hide();
      $('.navbar').css({'width': '84vw', 'margin-left': '16vw'});
    });

    $("#x-icon").click(function(){
      $(".funciones-container").hide();
      $('#nav-brand, .fa-grip-horizontal').css('display', 'inline-block');
      $('.navbar').css({'width': '100vw', 'margin-left': '0'});
    });
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
