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

//Responsive tabs
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

//Tabs en pantallas pequeñas
$(function(){

  var showAccordion = function(){
    // $('#vp-width').html($(window).width());
    $(".accordion").hide();

    if($(window).width() < 500){
      $(".tab-container").hide();
      $(".accordion").show();

    }
    else{
      $(".tab-container").show();
      $(".accordion").hide();
    }
    // $(".dpdwn").click(function(){
    //   $(".dpdwn-content").toggle();
    // });

  };

  showAccordion();

  $(window).resize(function() {


    showAccordion();
  });
});

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

//Target image in prenda
$(function(){
  $(".miniature").click(function(){
    let min = $(this).attr("src");
    $(".view-foto").html('<img src="' + min +'">');
  });
});

//Foto seleccionada
// $(function(){
//   $(".foto-selector").click(function(){
//     let min = $(this).attr("value");
//     // $(this).('.link-selected').html(min);
//     // $(this).(".foto-links").attr("value", min);
//   });
// });

//Eliminar elemento de la base de datos
$('.delete-row').click(function(e){
    e.preventDefault() // Don't post the form, unless confirmed
    if (confirm('¿Desea borrar este registro?')) {
        // Post the forms
        $(e.target).closest('form').submit() // Post the surrounding form
    }
});

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
