
//////////////////////////////////////////////////////////////

function ajax_request_update_onlinecount() {
	

	var xmlhttp = get_xmlhttp();
	var obj = document.getElementById('online_count');
	
	xmlhttp.open('GET', 'top_frame.php?AJAX&action=get_online_count');

	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		
			if (xmlhttp.responseText == 'session_failed')
				window.location='welcome.php'; 
			else {
			
				obj.innerHTML = xmlhttp.responseText;
			}
		}
	}
	
    xmlhttp.send(null);
}

