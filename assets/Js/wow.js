$(document).ready(function () {
  $("#card2").hide(); //hide your div initially
  $("#card3").hide();
  $("#card4").hide();
  $("#card5").hide();
  $("#card6").hide();
  $("#card7").hide();

  var topOfOthDiv = $("#card1").offset().top;
  var card3 = $("#card3").offset().top;
  console.log(topOfOthDiv);

  $(window).scroll(function () {
    if ($(window).scrollTop() > 100) {
      //scrolled past the other div?
      $("#card2").show(2000); //reached the desired point -- show div
      document.getElementById("card2").style.animation = "bounceInUp 2s 1";
    }
    if ($(window).scrollTop() > topOfOthDiv) {
      //scrolled past the other div?
      $("#card3").show(2000); //reached the desired point -- show div
      $("#card4").show(2000); //reached the desired point -- show div
      document.getElementById("card3").style.animation = "bounceInLeft 2s 1";
      document.getElementById("card4").style.animation = "bounceInRight 2s 1";
    }

    if ($(window).scrollTop() > 1000) {
      //scrolled past the other div?
      $("#card5").show(2000); //reached the desired point -- show div
      document.getElementById("card5").style.animation = "fadeIn 2s 1";
    }

    if ($(window).scrollTop() > 1300) {
        //scrolled past the other div?
        $("#card6").show(2000); //reached the desired point -- show div
        document.getElementById("card6").style.animation = "fadeIn 2s 1";
        $("#card7").show(2000); //reached the desired point -- show div
        document.getElementById("card7").style.animation = "fadeIn 2s 1";
      }


  });
});
