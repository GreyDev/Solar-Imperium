window.onload = initializeHacks;


function initializeHacks() {
    if ((navigator.appVersion.indexOf('MSIE 5') != -1) 	&& (navigator.platform.indexOf('Mac') != -1) && getStyleObject('blankDiv')) {
		window.onresize = explorerMacResizeFix;
    }
    resizeBlankDiv();
	createFakeEventObj();
}



function createFakeEventObj() {
    if (!window.event) {
	window.event = false;
    }
} 



function resizeBlankDiv() {
    if ((navigator.appVersion.indexOf('MSIE 5') != -1) 
	&& (navigator.platform.indexOf('Mac') != -1)
	&& getStyleObject('blankDiv')) {
	getStyleObject('blankDiv').width = document.body.clientWidth - 20;
	getStyleObject('blankDiv').height = document.body.clientHeight - 20;
    }
}

function explorerMacResizeFix () {
    location.reload(false);
}

function getStyleObject(objectId, doc) {
    if(document.getElementById && document.getElementById(objectId)) {
	return document.getElementById(objectId).style;
    } else if (document.all && document.all(objectId)) {
	return document.all(objectId).style;
    } else if (document.layers && document.layers[objectId]) {
		return getObjNN4(document,objectId);
    } else {
	return false;
    }
} 

function changeObjectVisibility(objectId, newVisibility) {
    var styleObject = getStyleObject(objectId, document);
    if(styleObject) {
	styleObject.visibility = newVisibility;
	return true;
    } else {
	return false;
    }
} 

function getElementHeight(Elem) {
	var elem;
	if(document.getElementById) {
		var elem = document.getElementById(Elem);
	} else if (document.all){
		var elem = document.all[Elem];
	}
	if ((navigator.userAgent.indexOf("Opera 5")!=-1) ||(navigator.userAgent.indexOf("Opera/5")!=-1)) {
		xPos = elem.style.pixelHeight;
	} else {
		xPos = elem.offsetHeight;
	}
	return xPos;
}

function getElementWidth(Elem) {
	var elem;
	if(document.getElementById) {
		var elem = document.getElementById(Elem);
	} else if (document.all){
		var elem = document.all[Elem];
	}
	if ((navigator.userAgent.indexOf("Opera 5")!=-1) ||(navigator.userAgent.indexOf("Opera/5")!=-1)) {
		xPos = elem.style.pixelWidth;
	} else {
		xPos = elem.offsetWidth;
	}
	return xPos;
}

function getElementLeft(Elem) {
	var elem;
	if(document.getElementById) {
		var elem = document.getElementById(Elem);
	} else if (document.all){
		var elem = document.all[Elem];
	}
	xPos = elem.offsetLeft;
	tempEl = elem.offsetParent;
  	while (tempEl != null) {
  		xPos += tempEl.offsetLeft;
  		tempEl = tempEl.offsetParent;
  	}
	return xPos;
}

function getElementTop(Elem) {
	if(document.getElementById) {
	
		var elem = document.getElementById(Elem);
	} else if (document.all) {
		var elem = document.all[Elem];
	}
	yPos = elem.offsetTop;
	tempEl = elem.offsetParent;
	while (tempEl != null) {
  		yPos += tempEl.offsetTop;
  		tempEl = tempEl.offsetParent;
  	}
	return yPos;
}

function findImage(name, doc) {
	var i, img;
	for (i = 0; i < doc.images.length; i++) {
    	if (doc.images[i].name == name) {
			return doc.images[i];
		}
	}
	for (i = 0; i < doc.layers.length; i++) {
    	if ((img = findImage(name, doc.layers[i].document)) != null) {
			img.container = doc.layers[i];
			return img;
    	}
	}
	return null;
}

function getImage(name) {
	if (document.layers) {
    	return findImage(name, document);
	}
	return null;
}

function getImagePageLeft(img) {
	var x, obj;
	if (document.layers) {
    	if (img.container != null)
			return img.container.pageX + img.x;
		else
			return img.x;
  	}
	return -1;
}

function getImagePageTop(img) {
	var y, obj;
	if (document.layers) {
		if (img.container != null)
			return img.container.pageY + img.y;
		else
			return img.y;
	}
	return -1;
}

function getImagePageWidth(img) {
	var x, obj;
	if (document.layers) {
		return img.width;
	}
	return -1;
}

function getImagePageHeight(img) {
	var y, obj;
	if (document.layers) {
		return img.height;
	}
	return -1;
}

function getObjNN4(obj,name)
{
	var x = obj.layers;
	var foundLayer;
	for (var i=0;i<x.length;i++)
	{
		if (x[i].id == name)
		 	foundLayer = x[i];
		else if (x[i].layers.length)
			var tmp = getObjNN4(x[i],name);
		if (tmp) foundLayer = tmp;
	}
	return foundLayer;
}
