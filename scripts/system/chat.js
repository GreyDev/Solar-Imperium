
//////////////////////////////////////////////////////////////

function ajax_request_list_sessions_initial() {
	
	var xmlhttp = get_xmlhttp();
	var obj = document.getElementById('td_right');
	
	xmlhttp.open('GET', 'chat.php?AJAX&action=list_sessions');

	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		
			if (xmlhttp.responseText == 'session_failed')
				StopTheClock();
			else {
				obj.innerHTML = xmlhttp.responseText;
			}
		}
	}
	
    xmlhttp.send(null);
}

//////////////////////////////////////////////////////////////

function ajax_request_list_sessions_delta() {
	
	var xmlhttp = get_xmlhttp();
	var obj = document.getElementById('td_right');
	
	xmlhttp.open('GET', 'chat.php?AJAX&action=list_sessions&DELTA');

	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		
			if (xmlhttp.responseText == 'session_failed')
				StopTheClock();
			else {
				if (xmlhttp.responseText.length > 0) 
					obj.innerHTML = xmlhttp.responseText;
			}
		}
	}
	
    xmlhttp.send(null);
}

//////////////////////////////////////////////////////////////


function ajax_request_list_messages_initial() {
	
	var xmlhttp = get_xmlhttp();
	var obj = document.getElementById('td_left');
	
	xmlhttp.open('GET', 'chat.php?AJAX&action=list_messages');

	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		
			if (xmlhttp.responseText == 'session_failed')
				StopTheClock();
			else {
		
				obj.innerHTML = xmlhttp.responseText;

				var timerID = self.setTimeout("update_list_messages_scroll()", 200);
				
			}
		}
	}
	
    xmlhttp.send(null);
}

//////////////////////////////////////////////////////////////
function update_list_messages_scroll() {
	var obj = document.getElementById('td_left');
        obj.scrollTop = obj.scrollHeight; 
	
}
//////////////////////////////////////////////////////////////

function ajax_request_list_messages_delta() {
	
	var xmlhttp = get_xmlhttp();
	var obj = document.getElementById('td_left');
	
	xmlhttp.open('GET', 'chat.php?AJAX&action=list_messages&DELTA');

	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		
			if (xmlhttp.responseText == 'session_failed')
				StopTheClock();
			else {
				if (xmlhttp.responseText != '') {

					obj.innerHTML += xmlhttp.responseText;
					var timerID = self.setTimeout("update_list_messages_scroll()", 200);

				}
			}
		}
	}
	
    xmlhttp.send(null);
}

//////////////////////////////////////////////////////////////

function ajax_request_send_message() {
	
	var v = escape(document.chatfrm.textfield.value);
    if (v.length == 0) return;
    
	document.chatfrm.textfield.value = '';
	document.chatfrm.textfield.focus();

	var xmlhttp = get_xmlhttp();

	xmlhttp.open('GET', 'chat.php?SMALL&AJAX&action=send_message&msg='+v);

	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

			if (xmlhttp.responseText == 'session_failed')
				StopTheClock();
			else {
			
				if (xmlhttp.responseText != 'message_sent') {
                    alert(xmlhttp.responseText);
                }
			
				ajax_request_list_messages_delta();
				
			}
		}
	}
	
    xmlhttp.send(null);
}


