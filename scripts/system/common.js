

function get_xmlhttp() 
{
	//Check if we are using IE.
	try {
		//If the javascript version is greater than 5.
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
	//If not, then use the older active x object.
		try {
		//If we are using IE.
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			//Else we must be using a non-IE browser.
			xmlhttp = false;
		}
	}
	//If we are using a non-IE browser, create a JavaScript instance of the object.
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	
	return xmlhttp;
}


function swap(){

	if (document.images){
		for (var x=0;x<swap.arguments.length;x+=2) {
			document[swap.arguments[x]].src = eval(swap.arguments[x+1] + ".src");
		}
	}
}
