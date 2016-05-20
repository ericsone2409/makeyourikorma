$(document).ready(function() {
	$("#logo").click(function(event) {
		/* Act on the event */
		$(".canvas-container > div").removeClass('show');
		event.preventDefault();
	});

	$("#expand").click(function(event){
		if ($("body").hasClass('overflow-hidden')) {
			$("body").removeClass('overflow-hidden');
		}else{
			$("body").addClass('overflow-hidden');
		}
	});

	$(".canvas-container > div:not('#responsive-canvas-container')").perfectScrollbar();
	$(".canvas-container > div:not('#responsive-canvas-container')").perfectScrollbar('update'); 

});