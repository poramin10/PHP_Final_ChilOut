$(document).ready(function() {
  $(".menu-icon").on("click", function() {
        $("nav ul").toggleClass("showing");
  });
});

// Scrolling Effect

$(window).on("scroll", function() {
  if($(window).scrollTop()) { 
        $('nav').addClass('white');
  }

  else {
        $('nav').removeClass('white');
  }
})