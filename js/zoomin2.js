$("p span").hover(function(){
       $(this).animate({fontSize: "110px"}, 400)
   }, function() {
      $(this).animate({fontSize: "140"}, 400)  
   })