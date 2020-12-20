$("p span").hover(function(){
       $(this).animate({fontSize: "190px"}, 400)
   }, function() {
      $(this).animate({fontSize: "220"}, 400)  
   })