$(document).ready(function() {
	$("#shapes-img").click(function(event) {
		/* Act on the event */
		$("#dropdown-menu-mine").slideToggle(370);
		event.preventDefault();
	});
	$("#shapes").click(function(event) {
		/* Act on the event */
		if (!($("#shapes-container").hasClass('show'))) {
			$(".canvas-container > div").removeClass('show');
		}
		$("#dropdown-menu-mine").slideToggle(370);
		$("#shapes-container").toggleClass('show');
		event.preventDefault();
	});
	$("#facials").click(function(event) {
		/* Act on the event */
		if (!($("#facials-container").hasClass('show'))) {
			$(".canvas-container > div").removeClass('show');
		}
		$("#dropdown-menu-mine").slideToggle(370);
		$("#facials-container").toggleClass('show');
		event.preventDefault();
	});
	$("#colors").click(function(event) {
		/* Act on the event */
		if (!($("#colors-container").hasClass('show'))) {
			$(".canvas-container > div").removeClass('show');
		}
		$("#colors-container").toggleClass('show');
		$("#dropdown-menu-mine").slideUp(370);
		event.preventDefault();
	});
	$("#layers").click(function(event) {
		/* Act on the event */
		if (!($("#layers-container").hasClass('show'))) {
			$(".canvas-container > div").removeClass('show');
		}
		$("#layers-container").toggleClass('show');
		$("#dropdown-menu-mine").slideUp(370);
		event.preventDefault();
	});
	$("#logo").click(function(event) {
		/* Act on the event */
		$(".canvas-container > div").removeClass('show');
	});
	$(".canvas-container > div").perfectScrollbar();
	$(".canvas-container > div").perfectScrollbar('update'); 

	$("#delete").click(function(event) {
		/* Act on the event */
		canvas.width= canvas.width;
		event.preventDefault();
	});

	$("#download").click(function(event) {
		/* Act on the event */
		var dato = canvas.toDataURL("image/png");
		dato = dato.replace("image/png", "image/octet-stream");
		document.location.href = dato;	
		event.preventDefault();
	});
});