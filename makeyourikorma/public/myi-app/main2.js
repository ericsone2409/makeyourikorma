"use strict";


var App = new Object();

App.mainMenu         = new source.mainMenu('creation-menu');
App.canvasController = new source.canvasController('draw-canvas');
App.init             = new source.functionStack();
App.serverInterface  = new source.serverInterface();








/*=====================================
=            Menu Routines            =
=====================================*/


App.init.addFunction(function (arg) {

	var mainMenu = arg[0];
	var canvasController = arg[1];

	mainMenu.getItems().each(function() {
		$(this).click(function() {

			var shows = $(this).attr('data-shows');

			if (!mainMenu.isExpanded())
			{
				mainMenu.expand();
				mainMenu.selectItem(this);
				mainMenu.showSlider(shows);


				if( $(this).attr('data-load-layers') == 'true')
					canvasController.showLayers();

			}


			else
			{
				if (mainMenu.isItemSelected(this))
				{
					mainMenu.unselectAllItems();
					mainMenu.unexpand();
					mainMenu.hideSlider(shows);
				}

				else
				{
					mainMenu.unselectAllItems();
					mainMenu.selectItem(this);
					mainMenu.hideSliders();
					mainMenu.showSlider(shows);
					if(shows == '#layers-slider')
						canvasController.showLayers();
				}
			}

			canvasController.hideColors();

		});
	});

	$('.trigger-toggle-slider').each(function() {
		$(this).click(function() {
			$(this).parent().removeClass('show');
			var target = $(this).attr('data-shows');
			mainMenu.hideSliders();
			$(target).addClass('show');
		});
	});

	App.serverInterface.saveImageResource = $(App.mainMenu.buttons.download).attr('data-url');
	App.serverInterface.baseURL           = $('body').attr('data-base-url')

	$(App.mainMenu.buttons.download).click(function() {
		var dataURL = App.canvasController.generateBase64();
		

		App.serverInterface.saveImage(dataURL, function(data) {
			window.location = App.serverInterface.baseURL + "/myi/download/" + data.id;
		});
		e.preventDefault();
	});

	$(App.mainMenu.buttons.share).click(function(event) {

		var dataURL = App.canvasController.generateBase64();
		App.serverInterface.saveImageResource = $(App.mainMenu.buttons.download).attr('data-url');

		App.serverInterface.saveImage(dataURL, function(data) {
			var shareURL = App.serverInterface.baseURL + '/myi/share/' + data.id;
			var imgURL   = App.serverInterface.baseURL + '/myi/show/' + data.id;

			FB.ui(
			{
				method: 'share',
				href: shareURL,
			}, function(response) {
				window.location = shareURL;
			});

		});


		event.preventDefault();
	});
	$(App.mainMenu.buttons.send).click(function(e) {

		var dataURL = App.canvasController.generateBase64();
		App.serverInterface.saveImageResource = $(App.mainMenu.buttons.download).attr('data-url');

		App.serverInterface.saveImage(dataURL, function(data) {
			var shareURL = App.serverInterface.baseURL + '/myi/share/' + data.id;
			var imgURL   = App.serverInterface.baseURL + '/myi/show/' + data.id;
			var sendURL = App.serverInterface.baseURL + '/myi/send/' + data.id;

			window.location = sendURL;
			

		});


		e.preventDefault();
	});



	$(App.mainMenu.buttons._delete).click(function() {
		canvasController.fabricRef.clear();
	});

}, [App.mainMenu, App.canvasController] );


/*=====  End of Menu Routines  ======*/


/*=================================
=            Load Data            =
=================================*/

(function(window){
	window.App.uniques = window.uniques;
	window.App.variants = window.variants;
	window.App.colors = window.colors;
})(window);

/*=====  End of Load Data  ======*/


/*=============================================
=            Render Data from JSON            =
=============================================*/

App.init.addFunction(function(arg) {
	var uniques = arg[0];
	var variants = arg[1];
	var colors = arg[2];
	var numero = 1;

	$.each(uniques, function() {
		if (numero <= 10) {
			$('.allshapes-ul').append(
				'<li data-url="' + this.route + '" data-type=uniques class="eyes" style="background-image:url(' + this.route + ')"></li>'
			);
		}else {
			$('.allshapes-ul').append(
				'<li data-url="' + this.route + '" data-type=uniques class="mouth" style="background-image:url(' + this.route + ')"></li>'
			);
		}
		numero++;
	});
	
	numero = 1;
	$.each(variants, function(index, value) {
		var max = value.variantes.length - 1;
		var i = 10;
		var objeto = this.variantes[i];
		if (numero<=20) {
			$('.allshapes-ul').append(
				'<li data-url="'+ objeto.route +'" data-type=variants class="shapes show" data-index="'+index+'" style="background-image:url(' + objeto.route + ')"></li>'
			);
		}else {
			$('.allshapes-ul').append(
				'<li data-url="'+ objeto.route +'" data-type=variants class="nose" data-index="'+index+'" style="background-image:url(' + objeto.route + ')"></li>'
			);
		}
		numero++;
	});

	$.each(colors, function(id, value) {
		$('#colors-container ul').append(
			'<li data-id="' + id +'" style="background-color:' + value + '"></li>'
		);

	});

}, [App.uniques, App.variants, App.colors]);


/*=====  End of Render Data from JSON  ======*/


/*=======================================
=            Canvas Routines            =
=======================================*/

App.init.addFunction(function(arg) {
	var canvasController = arg[0];
	var mainMenu = arg[1];
	var variants = arg[2];
	var canvas = canvasController.fabricRef;

	canvas.on('object:scaling', function(options) {
		if (options.target)
		{
			// Prevents the images to be flipped
			options.target.flipX = false;
			options.target.flipY = false;

		}
	});

	canvas.on('mouse:down', function(options) {
		if (options.target)
		{
			if (options.target.ikormaData.flavor == 'variants')
			{
				canvasController.showColors();
			}

		} 

		else
		{
			canvasController.hideColors();
		}

		
	});

	$(document).on('click', '#colors-container ul > li', function() {
		var color_id = $(this).attr('data-id');
		var index = canvas.getActiveObject().ikormaData.index;
		var i;
		var target_url;

		for ( i=0; i<variants[index].variantes.length; i++)
		{
			if ( variants[index].variantes[i].id_color == color_id )
			{
				target_url = variants[index].variantes[i].route;
				break;
			}
		}
		canvasController.changeColor(canvas.getActiveObject().ikormaData.layerId, color_id, target_url, index);
		canvasController.hideColors();

	});


	/*$(document).on('click', '.allshapes-ul > li', function() {
		var route = $(this).attr('data-url');
		canvasController.addImage(route, ++canvasController.layers, 'uniques', undefined, undefined, undefined, 0.1);
		mainMenu.hideSliders();
		mainMenu.unselectAllItems();
		mainMenu.unexpand();
	});

	$(document).on('click', '.allshapes-ul > li', function() {
		var route = $(this).attr('data-url');
		var index = $(this).attr('data-index');
		canvasController.addImage(route, ++canvasController.layers, 'variants', index, undefined, undefined, 0.1);
		mainMenu.hideSliders();
		mainMenu.unselectAllItems();
		mainMenu.unexpand();
	});*/

	$(document).on('click', '.allshapes-ul > li', function() {
		var type = $(this).attr('data-type');
		if (type == 'uniques') {
			var route = $(this).attr('data-url');
			canvasController.addImage(route, ++canvasController.layers, 'uniques', undefined, undefined, undefined, 0.1);
			mainMenu.hideSliders();
			mainMenu.unselectAllItems();
			mainMenu.unexpand();
		}else {
			var route = $(this).attr('data-url');
			var index = $(this).attr('data-index');
			canvasController.addImage(route, ++canvasController.layers, 'variants', index, undefined, undefined, 0.1);
			mainMenu.hideSliders();
			mainMenu.unselectAllItems();
			mainMenu.unexpand();
		}
	});

	canvasController.showLayers = function()
	{
			(function(layers) {

			layers.sort(function(a, b)
			{
				return b.ikormaData.zIndex - a.ikormaData.zIndex;
			});
			var layersContainer = $('#layers-container > ul');
			var layer = undefined;
			
			layersContainer.html('');

			$.each(layers, function(index, value) {
				layer = '';
				layer += '<li data-layer-id="' + value.ikormaData.layerId + '">';
				layer += '<div style="background-image:url('+ value._originalElement.currentSrc +');" class="img-container"></div>';
				layer += '<span class="fa fa-trash-o"></span>'
				layer += '<span class="layer-name">Layer ' + value.ikormaData.layerId + '</span>';
				layer += '</li>';
				layersContainer.append(layer);
			});


		})(this.fabricRef._objects);

		this.layerUpdate();



	}

	canvasController.layerUpdate = function()
	{
		var i = undefined;
		var n = canvasController.fabricRef._objects.length - 1;

		$('#layers-container > ul > li').each(function(index) {
			var layerId = (!!$(this).attr('data-layer-id')) ? $(this).attr('data-layer-id') : -2;
			var zIndex = n - index;

			for(i=0; i<n; i++)
			{
				if( canvasController.fabricRef._objects[i].ikormaData.layerId == layerId )
				{
					canvasController.fabricRef._objects[i].ikormaData.zIndex = zIndex;
					canvasController.fabricRef._objects[i].moveTo(zIndex);
				}
			}
		});

		//canvasController.showLayers();
	}

	$(document).on('click', '#layers-container > ul >  li > .fa', function() {
		var layerId = $(this).parent().attr('data-layer-id');
		var i = undefined;

		for (i=0; i<canvasController.fabricRef._objects.length; i++)
		{
			if(canvasController.fabricRef._objects[i].ikormaData.layerId == layerId)
			{
				canvasController.fabricRef.remove(canvasController.fabricRef._objects[i]);
			}
		}
		canvasController.showLayers();
	});


	$('#layers-container > ul').dragsort({
		dragEnd : canvasController.layerUpdate
	});

	$(document).on('click', '.direction-container > div > a', function(e) {
		var direction = $(this).attr('data-direction');
		var canva = $('#draw-canvas');
		var canva2 = $('.upper-canvas');
		var ancho = canva.width();
		var alto = canva.height();
		var aux = 0;
		var imagenes = canvasController.fabricRef._objects;
		var num = imagenes.length;
		var contenedor = $('#responsive-canvas-container');
		var ancho2 = contenedor.width();
		var alto2 = contenedor.height();
		var aux2 = 0;
		var contenedor2 = $('#responsive-canvas-container > .canvas-container');


		if (num == 0) {
			if (direction == 'horizontal') {
				if (ancho < alto) {
					aux = ancho;
					canva.width(alto);
					canva.height(aux);

					contenedor2.width(alto);
					contenedor2.height(aux);

					aux2 = ancho2;
					contenedor.width(alto2);
					contenedor.height(aux2);
				}else {
					e.preventDefault();
				}
			}else {
				if (ancho > alto) {
					aux = ancho;
					canva.width(alto);
					canva.height(aux);

					contenedor2.width(alto);
					contenedor2.height(aux);

					aux2 = ancho2;
					contenedor.width(alto2);
					contenedor.height(aux2);
				}else {
					e.preventDefault();
				}
			}
		}else {
			alert('The canvas must be empty.');
			e.preventDefault();
		}

	});

}, [App.canvasController, App.mainMenu, App.variants]);



/*=====  End of Canvas Routines  ======*/


$(document).on('click', '.allshapes-options > li', function() {
	var dshow = $(this).attr('data-show');

	$('.allshapes-options > li').removeClass('selected');
	$('.allshapes-ul > li').removeClass('show')

	$(this).addClass('selected');
	$('.' + dshow).addClass('show');
	$('#allshapes-container > h4').html(dshow);
});


$(document).ready(function() {
	window.App.init.callAll();
})
