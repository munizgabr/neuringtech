function calculaForm() {
	var height_slider = $(".slider-home").height();
	var height_formulario = $(".formulario-slider").height();
	$(".formulario-slider").css("top", (height_slider-height_formulario)/2);
}

function iframe(This, id) {
    id = $(This).closest(".swiper-slide").attr("id");
    $("#"+id+" .loader-fake").show();
    setTimeout(function(){
        $(".loader-fake").hide();
    }, 3000);
    $("#"+id+" .play-js").hide();
    idVideo = $(This).closest(".swiper-slide").attr("data-id-video");
    $(".iframe").html("");
    $("#"+id+" .iframe").append($('<iframe width="100%" height="424" src="https://www.youtube.com/embed/'+idVideo+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'));
    $("#"+id+" .image-with-video").hide();
}

$(document).ready(function(){

	$('body').on('click', '.top-button' ,function() {
		var header_top = $('body').offset();
		$('html, body').animate({ scrollTop: header_top.top }, 900);
	});

	if($(window).width() > 800) {

		calculaForm();

		$(window).on('scroll',function() {
			if ($(document).scrollTop() > 50) {
	            $(".header").addClass("small");
	        } else {
	            $(".header").removeClass("small");
	   		}

			if ($(document).scrollTop() > 450) {
	            $(".top-button").addClass("show");
	        } else {
	            $(".top-button").removeClass("show");
	   		}
		});

	}

	$(".cols p:empty").remove();

	$('body').on('click', '.cookie-notice .accept', function(){
		localStorage.setItem("cookie-alvoradas", 'aceito');
		$(".cookie-notice").fadeOut();
	});

	var status_cookie = localStorage.getItem('cookie-alvoradas');
	if (localStorage.getItem("cookie-alvoradas") == null) {
		$(".cookie-notice").css("display", "block");
	}

    $('body').on('click', '.play-js' ,function(e, id) {
        e.preventDefault();
        iframe(this);
    });

    $('body').on('click', '.gallery-thumbs .swiper-slide-thumb-active', function(e){
        e.preventDefault();
        id = $(this).attr("data-id");
        $("#"+id+" .loader-fake").show();
        setTimeout(function(){
            $(".loader-fake").hide();
        }, 3000);
        $("#"+id+" .play-js").hide();
        idVideo = $(this).attr("data-id-video");
        $(".iframe").html("");
        $("#"+id+" .iframe").append($('<iframe width="100%" height="424" src="https://www.youtube.com/embed/'+idVideo+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'));
        $("#"+id+" .image-with-video").hide();
    });

    $('body').on('click', '.gallery-top .swiper-button-prev, .gallery-top .swiper-button-next' ,function(e) {
        $(".gallery-top iframe").remove();
        $(".gallery-top .image-with-video").show();
        $(".play-js").show();
    });

});