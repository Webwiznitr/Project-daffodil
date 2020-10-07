

$(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
    
            $(".electrical-btn").click(function () {
                $(".electrical").show();
                $(".electronics").hide();
            });
            $(".electronics-btn").click(function () {
                $(".electronics").show();
                $(".electrical").hide();
            });
      });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
            }
      })


