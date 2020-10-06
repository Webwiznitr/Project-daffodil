$(window).scroll(function(){
        var wscroll = $(this).scrollTop();
        if(wscroll > 50){
         $(".navbar").addClass("shrink-nav");
        }
        else{
          $(".navbar").removeClass("shrink-nav");
        }
});