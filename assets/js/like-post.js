jQuery(document).ready(function($) {

	/***************************************
		ajax like shot feature
	***************************************/
	$(".like").stop().click(function(){

		var rel = $(this).data("rel");

		var data = {
			data: rel,
			action: 'like_callback'
		}
		$.ajax({
			action: "like_callback",
			type: "GET",
			dataType: "json",
			url: ajax_var.url,

			data: data,
			success: function(data){

				if(data.status == true){
					$(".like[data-rel="+rel+"]").html(data.likes).addClass("liked").prepend('');
				}else{
					$(".like[data-rel="+rel+"]").html(data.likes).removeClass("liked").prepend('');
				}

			}
		});

	});

});