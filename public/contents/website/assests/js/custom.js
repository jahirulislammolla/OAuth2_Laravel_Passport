(function($) {
'use strict';
    //
    //====================================================================//
    // Global Vriable
    //====================================================================//
    //
    var shapers = $(window);
    var page = $('html, body');

    //
    //====================================================================//
    // banar bottom slide Active
    //====================================================================//
    //
    $('.banar_bottom_content_slide_active').owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        //navText:["<i class='icofont-long-arrow-left'></i>","<i class='icofont-long-arrow-right'></i>"],
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    //
    //====================================================================//
    // course slide Active
    //====================================================================//
    $('.course_slide_active').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    //
    //====================================================================//
    // galary slide Active
    //====================================================================//
    $('.galart_slide_active').owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            1000:{
                items:3
            }
        }
    });
    //
    
    //====================================================================//
    // team slide Active
    //====================================================================//
    $('.team_slide_active').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        smartSpeed: 900,
        autoplayTimeout: 7000,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2,
                margin:10,
            },
            768:{
                items:2,
                margin:10,
            },
            1000:{
                items:2
            }
        }
    });

    //
    //====================================================================//
    // testmonial slide Active
    //====================================================================//
    $('.testmonial_slide_active').owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        navText:["<i class='icofont-long-arrow-left'></i>","<i class='icofont-long-arrow-right'></i>"],
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        smartSpeed: 900,
        autoplayTimeout: 9000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    //
    //====================================================================//
    // event slide Active
    //====================================================================//
    $('.event_slide_active').owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        navText:["<i class='icofont-long-arrow-left'></i>","<i class='icofont-long-arrow-right'></i>"],
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        smartSpeed: 900,
        autoplayTimeout: 9000,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2,
                margin:0,
            },
            468:{
                items:2
            },
            1000:{
                items:2
            }
        }
    });

    //
    //====================================================================//
    // brand_slide_active
    //====================================================================//
    $('.brand_slide_active').owlCarousel({
        loop:true,
        margin:20,
        nav:false,
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        smartSpeed: 900,
        autoplayTimeout: 9000,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:4
            },
            1000:{
                items:5
            }
        }
    });

    //
    //====================================================================//
    // scroll top active
    //====================================================================//
    $(".scrolltop").on('click', function(){
        $("html,body").animate({
            scrollTop:0
        }, 1000)
    });
    //
    //====================================================================//
    // menu fix on scroll
    //====================================================================//
    shapers.on('scroll',function(){
        if (shapers.scrollTop() > 100) {
             $('#main_menu').addClass('animated slideInDown fix')
          } else {
              $('#main_menu').removeClass('animated slideInDown fix')
          }
    })

    //
    //====================================================================//
    // vebu box plugin active
    //====================================================================//
    $('.venobox').venobox();

    
    //
    //====================================================================//
    // course details testmonial slide Active
    //====================================================================//
    //
    $('.course_details_testmonial_slide_active').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        navText:["<i class='icofont-long-arrow-left'></i>","<i class='icofont-long-arrow-right'></i>"],
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    $('.tp-banner').revolution({
           delay: 7000,
           startwidth: 1920,            //default:1170
           startheight: 500,
           onHoverStop: "off",
           touchenabled: "on",
           hideThumbs: 0,
           navigationType:"bullet",				// bullet, thumb, none
           navigationStyle: "round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom
           navigationHAlign: "center",				// Vertical Align top,center,bottom
           navigationVAlign: "bottom",					// Horizontal Align left,center,right
           navigationVOffset: 30,
       });
})(jQuery);
//
//====================================================================//
// this is custom mobile menu javascript code
//====================================================================//
//
function openNav() {
  document.getElementById("mySidebar").style.left = "0px";
}
function closeNav() {
  document.getElementById("mySidebar").style.left = "-100%";
}
