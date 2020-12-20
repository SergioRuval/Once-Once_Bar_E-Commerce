$(window).scroll(function() {
  $(".onscroll").css("opacity", 1 - $(window).scrollTop() / 250);
});