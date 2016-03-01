var source = new Object();



/*=========================================
=            Main Menu Handler            =
=========================================*/

source.mainMenu = 
function mainMenu(id)
{
	var r = new Object();


	r.buttons = {
		'share'    : '#share',
		'download' : '#download'
	}

	r.id = id;
	r.getId = function() { return this.id };


	r.getItems = function()
	{
		return $('#' + this.id + ' > .main-options > .option');
	};


	r.expand = function()
	{
		$('#' + this.getId() ).addClass('expanded');

	}

	r.isExpanded = function() {

		return $('#' + this.getId()).hasClass('expanded');
	}

	r.unexpand = function()
	{
		$('#' + this.getId() ).removeClass('expanded');
	};

	r.toggleExpand = function()
	{
		$('#' + this.getId() ).toggleClass('expanded');
	};


	r.selectItem = function(item)
	{
		if ( isNaN(item) )
		{
			$(item).addClass('selected');
			
		}


		else
		{
			$('#' + this.getId() + ' > .main-options > .option:nth-child(' + item + ')').addClass('selected');
		}
		
	}

	r.getItem = function(n)
	{
		return $('#' + this.getId() + ' > .main-options > .option:nth-child(' + item + ')');
	}


	r.unselectAllItems = function()
	{
		this.getItems().each(function() {
			$(this).removeClass('selected');
		});
	}

	r.isItemSelected = function(item)
	{
		if ( isNaN(item) )
		{
			return $(item).hasClass('selected');
		}


		else
		{
			return $('#' + this.getId() + ' > .main-options > .option:nth-child(' + item + ')').hasClass('selected');
		}
	}

	r.hideSliders = function()
	{
		$('.menu-slider-target').each(function() {
			$(this).removeClass('show');
		});
	}

	r.showSlider = function(shows)
	{
		$(shows).addClass('show');
	}

	r.hideSlider = function(shows)
	{
		$(shows).removeClass('show');
	}

	return r;


}
/*=====  End of Main Menu Handler  ======*/


/*==============================================================
=            Stack of functions for initializations            =
==============================================================*/

source.functionStack = function()
{
	r = new Object();

	r.stack = new Array();

	r.addFunction = function(anon, arg)
	{
		this.stack.push( new Object() );
		this.stack[this.stack.length - 1].anon = anon;
		this.stack[this.stack.length - 1].arg = arg;
	}


	r.callAll = function()
	{
		var i;

		for (i=0; i<this.stack.length; i++)
			this.stack[i].anon( this.stack[i].arg );
	}

	r.cleanStack = function()
	{
		this.stack = new Array();
	}


	return r;
}



/*=====  End of Stack of functions for initializations  ======*/


/*=========================================
=            Canvas Controller            =
=========================================*/

source.canvasController = function(canvasId)
{
	this.canvasId = canvasId;

	this.fabricRef = new fabric.Canvas( canvasId, {
		uniScaleTransform: false,
	});

	this.fabricRef.backgroundColor = '#ffffff';
	var canvas = this.fabricRef;

	var bgtarget = $('#' + canvasId).attr('data-background');
	canvas.setBackgroundImage(bgtarget, canvas.renderAll.bind(canvas), {
	    backgroundImageOpacity: 0.5,
	    backgroundImageStretch: false
	});



	this.fabricRef.renderAll();
	this.zIndex = 0;
	this.selectedObject = undefined;
	this.layers = 0;
	this.showLayers = undefined;
	this.layerUpdate = undefined;

	this.showColors = function()
	{
		$('#colors-container').addClass('show');
	}

	this.hideColors = function()
	{
		$('#colors-container').removeClass('show');
	}


	this.addImage = function(route, id, flavor, index, options, zIndex, scale)
	{
		var currentZIndex = this.zIndex;
		ikormaData = new Object();

		ikormaData = new Object();
		ikormaData.flavor = flavor;
		
		if (isNaN(zIndex))
		{
			ikormaData.zIndex = ++this.zIndex;
			
			
		}

		else
		{
			ikormaData.zIndex = zIndex;
		}
		

		ikormaData.index = 'undefined';
		if ( flavor == 'variants' ) 
			ikormaData.index = index;

		ikormaData.layerId = id;
		var canvas = this.fabricRef;
		var r = undefined;

		fabric.Image.fromURL(route, function(oImg) {

			oImg.ikormaData = ikormaData;
			if (scale)
			{
				oImg.scaleX = scale;
				oImg.scaleY = scale;
			}
			if (options)
			{
				oImg.scaleX = options.scaleX;
				oImg.scaleY = options.scaleY;
				oImg.left = options.left;
				oImg.top = options.top;
				oImg.angle = options.angle;

			}

			canvas.add(oImg);
			canvas.moveTo(oImg, ikormaData.zIndex);
			
		});


	}


	this.changeColor = function(layer, color_id, target_url, index)
	{
		var i = undefined;
		var canvas = this.fabricRef;
		var images = this.fabricRef._objects;
		var n = images.length;

		for ( i=0; i<n; i++)
		{
			if( images[i].ikormaData.layerId == layer )
			{
				break;
			}
		}

		var zIndex = images[i].ikormaData.zIndex;
        var options =
        {
        	scaleX : images[i].getScaleY(),
        	scaleY : images[i].getScaleX(),
        	left : images[i].getLeft(),
        	top : images[i].getTop(),
        	angle : images[i].getAngle()
        }
        canvas.remove(this.fabricRef._objects[i]);
        images = this.addImage(target_url, layer, 'variants', index, options, zIndex);
        canvas.renderAll();

	}


	this.generateBase64 = function()
	{
		this.fabricRef.deactivateAll().renderAll();
		return this.fabricRef.toDataURL('image/jpeg');
	}

}


source.serverInterface = function()
{
	this.saveImageResource = undefined;

	this.baseURL = undefined;


	this.saveImage = function( dataURL, callback )
	{
		var url = this.saveImageResource;

		$.post(
		url,
		{
			data : dataURL
		},
		function(data)
		{
			callback(data);
		});
	}
}

/*=====  End of Canvas Controller  ======*/





/*========================================================
=            Fabric custom Data serialization            =
========================================================*/

fabric.Object.prototype.toObject = (function (toObject) {
    return function () {
        return fabric.util.object.extend(toObject.call(this), {
            textID: this.textID
        });
    };
})(fabric.Object.prototype.toObject);

/*=====  End of Fabric custom Data serialization  ======*/



