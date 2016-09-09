
function ajax_request_login() {

	var obj = document.getElementById('warning_message');
	var xmlhttp = get_xmlhttp();
	xmlhttp.open('POST', 'welcome.php?LOGIN');
	var post_data = "";
	
	for (i=0;i<document.login_form.elements.length;i++) {
	
		if (document.login_form.elements[i].type == 'checkbox') {
			post_data += document.login_form.elements[i].name + "=" + document.login_form.elements[i].checked + "&";
		} else {
			post_data += document.login_form.elements[i].name + "=" + escape(document.login_form.elements[i].value) + "&";
		}
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		
			if (xmlhttp.responseText == 'login_complete')
				window.location='preferences.php?WELCOMEBACK'; 
			else {
				obj.style.visibility = 'visible';
                obj.style.display = 'block';
				obj.innerHTML = xmlhttp.responseText;
				document.login_form.nickname.value = '';
				document.login_form.password.value = '';
				document.login_form.nickname.focus();
				
			}
		}
	}
	
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.send(post_data);
	
}
