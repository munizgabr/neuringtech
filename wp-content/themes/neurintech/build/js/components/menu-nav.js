function screenSizeMobile() {
    $(".menu-item-has-children").prepend("<span class='icon-submenu'></span>");
    $(".nav-item").on("click", function(e) {
        e.preventDefault();
        $(this).toggleClass("open");
        $("header .rmm").toggleClass("open");
        if($("header .rmm").hasClass("open")){
            $(".tap-mobile").addClass("open");
        } else {
            $(".tap-mobile").removeClass("open");
        }
    });
    $("body").on("click", ".menu .sub-menu li a", function(){
        $("header .rmm, .nav-item, .tap-mobile").removeClass("open");
    });
    $(".menu-item-has-children > .icon-submenu").click();
    $(".icon-submenu").on("click", function(e) {
        $(this).siblings().next(".sub-menu").toggleClass("sub-menu-show-mobile");
        $(this).toggleClass("active");
    });
    $("body").on("click", ".tap-mobile", function(){
        $("header .rmm, .nav-item, .tap-mobile").removeClass("open");
    });
}

$(document).ready(function(){

    if($(window).width() < 1185) {
        screenSizeMobile();
    }

    $( window ).resize(function() {

        if($(window).width() < 1185) {
            screenSizeMobile();
        }
    });

    $('body.home').on('click', '.scroll-js a' ,function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var scrollBottom = $(url).offset();
        $('html, body').animate({
            scrollTop: scrollBottom.top-64
        }, 1200);
        $(".nav-item").removeClass("open");
        $(".rmm").removeClass("open");
        $(".tap-mobile").removeClass("open");
    });

    $( "body.home .menu li a" ).each(function( index ) {
        var url = $(this).attr('href');
        if($(this).attr('href').indexOf("#") > -1) {
            var urlSplit = url.split("#");
            var scrollBottom = $(this).attr("href", "#"+urlSplit[1]).offset();

            if($(window).width() > 1185) {
                $('html, body.home').animate({
                    scrollTop: scrollBottom.top-150
                }, 100);
            }
        }

    });

});