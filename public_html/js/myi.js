$(document).ready(function() {
	$("#logo").click(function(event) {
		/* Act on the event */
		$(".canvas-container > div").removeClass('show');
		event.preventDefault();
	});

	$(".canvas-container > div").perfectScrollbar();
	$(".canvas-container > div").perfectScrollbar('update'); 



	function check() {
		if (($("#shapes-container").hasClass('show'))||($("#facials-container").hasClass('show'))|| ($("#colors-container").hasClass('show')) || ($("#layers-container").hasClass('show')) ) {
			$("body").addClass('overflow-hidden');
		}else {
			$("body").removeClass('overflow-hidden');
		}
	}

	setInterval(check, 100);

});