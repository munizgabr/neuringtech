function closeModal() {
	$(".bg-modal").fadeOut();
	$(".modal").fadeOut();
	$("#modal .conteudo-modal").html("");
    $("#modal .content").removeClass("image-content iframe-content video-content");
}

$(document).ready(function(){

	$('body').on('click', '.close-modal' ,function(e) {
    	closeModal();
    });

    $('body').on('click', '.open-modal-js' ,function(e) {
    	e.preventDefault();
    	$(".loader-fake").show();
    	setTimeout(function(){
	        $(".loader-fake").hide();
	    }, 3000);
    	tipoMidia = $(this).attr("data-type");
        idVideo = $(this).attr("data-id-video");
        urlIframe = $(this).attr("data-url-iframe");
    	urlMidia = $(this).attr("data-url-image");
    	var loader = '<div class="loader-fake"><img src="'+neuringtechData.siteUrlTemplate+'/src/images/loading.svg"></div>';
        // Se for vídeo do Youtube
    	if(tipoMidia == "video") {
    		$("#modal .content").addClass("video-content");
    		$("#modal .conteudo-modal").append($(loader+'<iframe width="100%" height="600" src="https://www.youtube.com/embed/'+idVideo+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'));
    	}
        // Se for iframe tour ou 360º
        if(tipoMidia == "iframe") {
            $("#modal .content").addClass("iframe-content");
            $("#modal .conteudo-modal").append($(loader+'<iframe width="100%" height="600" src="'+urlIframe+'" frameborder="0"></iframe>'));
        }
        // Se for imagem
        if(tipoMidia == "image") {
            $("#modal .content").addClass("image-content");
            $("#modal .conteudo-modal").append("<img src="+urlMidia+">")
        }
    	$(".bg-modal").fadeIn();
    	$("#modal").fadeIn();
    });

    $("body").on("click", ".bg-modal", function(){
    	closeModal();
    });

	$(document).keyup(function(event){
	    if(event.which=='27'){
	        closeModal();
	    }
	});
});