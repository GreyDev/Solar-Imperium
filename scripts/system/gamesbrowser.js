function ToggleDetails(obj_from_str,obj_div_str)
{
	
	var obj_from = document.getElementById(obj_from_str);
	var obj_div = document.getElementById(obj_div_str);

	if (obj_div.style.visibility != 'visible') {
	
		obj_div.style.visibility = 'visible';
		obj_div.style.margin = '10px';
		obj_div.style.height = 180;
		obj_div.style.display = 'inline';
		
	} else {
	
		obj_div.style.visibility = 'hidden';
		obj_div.style.height = 0;
		obj_div.style.margin = 0;
		obj_div.style.display = 'none';
		
	}
	
}


function ToggleLastScores(obj_from_str,obj_div_str)
{
	
	var obj_from = document.getElementById(obj_from_str);
	var obj_div = document.getElementById(obj_div_str);

	if (obj_div.style.visibility != 'visible') {
	
		obj_div.style.visibility = 'visible';
		obj_div.style.margin = '10px';        
		obj_div.style.height = 180;
		obj_div.style.display = 'inline';
		
	} else {
	
		obj_div.style.visibility = 'hidden';
		obj_div.style.height = 0;
		obj_div.style.margin = 0;
		obj_div.style.display = 'none';
		
	}
	
}
