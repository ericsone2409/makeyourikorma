$(document).ready(function() {
	$("#shapes-img").click(function(event) {
		/* Act on the event */
		$("body .center ul li a").removeClass('not-show');
		$("#shapes-img").toggleClass('not-show');
		$("#shapes-container").removeClass('show');
		$("#facials-container").removeClass('show');
		event.preventDefault();
	});
	$("body .center ul li a").click(function(event) {
		/* Act on the event */
		$("body .center ul li a").toggleClass('not-show');
		$("#shapes-img").removeClass('not-show');
		event.preventDefault();
	});
	$("#shapes").click(function(event) {
		/* Act on the event */
		if (!($("#shapes-container").hasClass('show'))) {
			$(".canvas-container > div").removeClass('show');
		}
		$("#shapes-container").toggleClass('show');
		event.preventDefault();
	});
	$("#facials").click(function(event) {
		/* Act on the event */
		if (!($("#facials-container").hasClass('show'))) {
			$(".canvas-container > div").removeClass('show');
		}
		$("#facials-container").toggleClass('show');
		event.preventDefault();
	});
	$("#colors").click(function(event) {
		/* Act on the event */
		if (!($("#colors-container").hasClass('show'))) {
			$(".canvas-container > div").removeClass('show');
		}
		$("#colors-container").toggleClass('show');
		$("body .center ul li a").addClass('not-show');
		$("#shapes-img").removeClass('not-show');
		event.preventDefault();
	});
	$("#layers").click(function(event) {
		/* Act on the event */
		if (!($("#layers-container").hasClass('show'))) {
			$(".canvas-container > div").removeClass('show');
		}
		$("#layers-container").toggleClass('show');
		$("body .center ul li a").addClass('not-show');
		$("#shapes-img").removeClass('not-show');
		event.preventDefault();
	});
});