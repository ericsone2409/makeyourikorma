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
	});



	$(App.mainMenu.buttons.share).click(function(e) {

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


		e.preventDefault();
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

	console.log(colors);



	$.each(uniques, function() {
		$('#facials-container > ul').append(
			'<li data-url="' + this.route + '" style="background-image:url(' + this.route + ')"></li>'
		);

	});

	$.each(variants, function(index, value) {
		$('#shapes-container > ul').append(
			'<li data-url="'+ this.ruta+'" data-index="'+index+'" style="background-image:url(' + this.ruta + ')"></li>'
		);

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


	$(document).on('click', '#facials-container > ul > li', function() {
		var route = $(this).attr('data-url');
		canvasController.addImage(route, ++canvasController.layers, 'uniques', undefined, undefined, undefined, 0.1);
		mainMenu.hideSliders();
		mainMenu.unselectAllItems();
		mainMenu.unexpand();
	});

	$(document).on('click', '#shapes-container > ul > li', function() {
		var route = $(this).attr('data-url');
		var index = $(this).attr('data-index');
		canvasController.addImage(route, ++canvasController.layers, 'variants', index, undefined, undefined, 0.1);
		mainMenu.hideSliders();
		mainMenu.unselectAllItems();
		mainMenu.unexpand();
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
				layer += '<span class="layer-name">Layer ' + value.ikormaData.layerId + '</span>';
				layer += '<span class="fa fa-trash-o"></span>'
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



}, [App.canvasController, App.mainMenu, App.variants]);



/*=====  End of Canvas Routines  ======*/





$(document).ready(function() {
	window.App.init.callAll();
})
