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
      $('body').css({'width': '84vw', 'margin-left': '16vw'});
      $('.filters-hidden').css({'margin-left': '200px'});
    });

    $("#x-icon").click(function(){
      $(".funciones-container").hide();
      $('#nav-brand, .fa-grip-horizontal').css('display', 'inline-block');
      $('body').css({'width': '100vw', 'margin-left': '0'});
      $('.filters-hidden').css({'margin-left': '0'});

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
function openTab(evt, tabName) {
  let i;
  //Hides all tab cotent
  let x = document.getElementsByClassName("tabcontent");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  //Removes active class from all tabs
  let z = document.getElementsByClassName("tablinks");
  for (i = 0; i < z.length; i++) {
    z[i].className = z[i].className.replace(" active", "");
  }

  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";

}

//Tabs de prueba
// function openCity(evt, cityName) {
//   // Declare all variables
//   var i, tabcontent, tablinks;
//
//   // Get all elements with class="tabcontent" and hide them
//   tabcontent = document.getElementsByClassName("tabcontent");
//   for (i = 0; i < tabcontent.length; i++) {
//     tabcontent[i].style.display = "none";
//   }
//
//   // Get all elements with class="tablinks" and remove the class "active"
//   tablinks = document.getElementsByClassName("tablinks");
//   for (i = 0; i < tablinks.length; i++) {
//     tablinks[i].className = tablinks[i].className.replace(" active", "");
//   }
//
//   // Show the current tab, and add an "active" class to the button that opened the tab
//   document.getElementById(cityName).style.display = "block";
//   evt.currentTarget.className += " active";
// }
