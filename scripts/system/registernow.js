
function ajax_request_signup() {
	
	var obj = document.getElementById('warning_message');
	var xmlhttp = get_xmlhttp();
	
	xmlhttp.open('POST', 'registernow.php?SIGNUP');
	var post_data = "";
	
	for (i=0;i<document.signup_form.elements.length;i++) {
	
		if (document.signup_form.elements[i].type == 'checkbox') {
			post_data += document.signup_form.elements[i].name + "=" + document.signup_form.elements[i].checked + "&";
		} else {
			post_data += document.signup_form.elements[i].name + "=" + escape(document.signup_form.elements[i].value) + "&";
		}
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		
			if (xmlhttp.responseText == 'register_complete')
				window.location='register_complete.php'; 
			else {
				obj.style.visibility = 'visible';
                obj.style.display = 'block';
				obj.innerHTML = xmlhttp.responseText;
			}
		}
	}
	
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.send(post_data);
	
}
