$(document).ready(function() {
	$("#shapes-img").click(function(event) {
		/* Act on the event */
		$("body .center ul li a").removeClass('not-show');
		$("#shapes-img").toggleClass('not-show');
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
		$(".canvas-container > div").removeClass('show');
		$("#shapes-container").toggleClass('show');
		event.preventDefault();
	});
	$("#facials").click(function(event) {
		/* Act on the event */
		$(".canvas-container > div").removeClass('show');
		$("#facials-container").toggleClass('show');
		event.preventDefault();
	});
	$("#colors").click(function(event) {
		/* Act on the event */
		$(".canvas-container > div").removeClass('show');
		$("#colors-container").toggleClass('show');
		event.preventDefault();
	});
	$("#layers").click(function(event) {
		/* Act on the event */
		$(".canvas-container > div").removeClass('show');
		$("#layers-container").toggleClass('show');
		event.preventDefault();
	});
});