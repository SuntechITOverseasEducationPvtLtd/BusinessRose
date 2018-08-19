/*
------------------------------------------------------------------------
* Template Name    : Brezon | Responsive Bootstrap 4 Landing Template * 
* Author           : ThemesBoss                                       *
* Version          : 1.0.0                                            *
* Created          : July 2018                                        *
* File Description : Main Js file of the template                     *
*-----------------------------------------------------------------------
*/

$(window).on('scroll',function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 50) {
        $(".sticky").addClass("stickyadd");
    } else {
        $(".sticky").removeClass("stickyadd");
    }
});

$('.nav-item a, .scroll_down a').on('click', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top - 0
    }, 1500, 'easeInOutExpo');
    event.preventDefault();
});

$("#navbarCollapse").scrollspy({
    offset: 70
});

var a = 0;
/*$(window).on('scroll',function() {
    var oTop = $('#counter').offset().top - window.innerHeight;
    if (a == 0 && $(window).scrollTop() > oTop) {
        $('.fun_value').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-count');
            $({
                countNum: $this.text()
            }).animate({
                    countNum: countTo
                },
                {
                    duration: 2000,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                        //alert('finished');
                    }

                });
        });
        a = 1;
    }
});*/


$('.video_play').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
});

$(window).on('scroll',function(){
    if ($(this).scrollTop() > 100) {
        $('.back_top').fadeIn();
    } else {
        $('.back_top').fadeOut();
    }
}); 
$('.back_top').on('click',function(){
    $("html, body").animate({ scrollTop: 0 }, 1000);
    return false;
});

//Client Slider
$("#owl-demo").owlCarousel({
    autoPlay: 7000,
    stopOnHover: true,
    navigation: false,
    paginationSpeed: 1000,
    goToFirstSpeed: 2000,
    singleItem: true,
    autoHeight: true,
});


$(document).ready(function(){
    $(".investshow").click(function(){
        $('.hideinvest').css('display','block');
    });

    $(".investhides").click(function(){
        $('.hideinvest').css('display','none');
    });


     $(".skillperson").click(function(){
        $('.Investorform').css('display','none');

        $('.Skillpersonform').css('display','block');
    });

$(".smallinvestor").click(function(){
        $('.Investorform').css('display','block');

        $('.Skillpersonform').css('display','none');
    });



});

