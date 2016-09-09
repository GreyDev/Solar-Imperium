

function CustomAlert(text) {

    document.getElementById('div_notice').style.display='block';
    document.getElementById('div_notice').style.visibility='visible';
    document.getElementById('div_occluder').style.zIndex=199;
    document.getElementById('div_notice_div').innerHTML = text;

}





function show_info(id)
{

    window.open('show_empire.php?id='+id,'help','scrollbars=yes,status=no,menubar=no,resizable=no,width=460,height=640');
}			
	
function show_coalition(id)
{
    window.open('show_coalition.php?id='+id,'help','scrollbars=yes,status=no,menubar=no,resizable=no,width=460,height=640');
}			

function show_help(topic)
{
    window.open('http://galaxypedia.mrgtech.ca/index.php?search='+topic,'help','scrollbars=yes,status=no,menubar=no,resizable=no,width=760,height=640');
}			
	
	
	
function buy(stuff,label)
{
			 
    var qty = prompt(label,'');
    if (qty == null) return;
    open_page('manage.php?buy=' + stuff + '&quantity='+qty);

}


function sell(stuff,label)
{
			
    var qty = prompt(label,'');
    if (qty == null) return;

    open_page('manage.php?sell=' + stuff + '&quantity='+qty);
}


function market_buy(type,label)
{
			
    var qty = prompt(label,'');
    if (qty == null) return;

    open_page('globalmarket.php?type='+type+'&buy='+qty);
}

function market_sell(type,label)
{

    var qty = prompt(label,'');
    if (qty == null) return;

    open_page('globalmarket.php?type='+type+'&sell='+qty);
}
	
function buy_tickets(label)
{
    var qty = prompt(label,'');
    if (qty == null) return;

    open_page('lottery.php?buy='+qty);
}

function Round(content,theme,width,styles)
{
    output = '';
    output += ('<table style="margin: 0px 0px 10px 0px" border="0" cellspacing="0" cellpadding="0" width="'+width+'">');


    output += ('<tr>');
    output += ('<td background="../images/game/round/'+theme+'/tl.gif" border="0"><img src="../images/game/round/placeholder.gif" border="0" width="15" height="15"></td>');
    output += ('<td background="../images/game/round/'+theme+'/t.gif" border="0" width="100%"><img src="../images/game/round/placeholder.gif" border="0" width="15" height="15"></td>');
    output += ('<td background="../images/game/round/'+theme+'/tr.gif" border="0"><img src="../images/game/round/placeholder.gif" border="0" width="15" height="15"></td>');
    output += ('</tr>');


    output += ('<tr>');
    output += ('<td background="../images/game/round/'+theme+'/l.gif" border="0"><img src="../images/game/round/placeholder.gif" border="0" width="15" height="15"></td>');
    output += ('<td background="../images/game/round/'+theme+'/bg.gif" width="100%" style="'+styles+'">'+content+'</td>');
    output += ('<td background="../images/game/round/'+theme+'/r.gif" border="0"><img src="../images/game/round/placeholder.gif" border="0" width="15" height="15"></td>');
    output += ('</tr>');

    output += ('<tr>');
    output += ('<td background="../images/game/round/'+theme+'/bl.gif" border="0"><img src="../images/game/round/placeholder.gif" border="0" width="15" height="15"></td>');
    output += ('<td background="../images/game/round/'+theme+'/b.gif" border="0" width="100%"><img src="../images/game/round/placeholder.gif" border="0" width="15" height="15"></td>');
    output += ('<td background="../images/game/round/'+theme+'/br.gif" border="0"><img src="../images/game/round/placeholder.gif" border="0" width="15" height="15"></td>');
    output += ('</tr>');

    output += ('</table>');

    return output;
}


/**
*
*  Base64 encode / decode
*  http://www.webtoolkit.info/
*
**/

var Base64 = {

    // private property
    _keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

    // public method for encoding
    encode : function (input) {
        var output = "";
        var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
        var i = 0;

        input = Base64._utf8_encode(input);

        while (i < input.length) {

            chr1 = input.charCodeAt(i++);
            chr2 = input.charCodeAt(i++);
            chr3 = input.charCodeAt(i++);

            enc1 = chr1 >> 2;
            enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
            enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
            enc4 = chr3 & 63;

            if (isNaN(chr2)) {
                enc3 = enc4 = 64;
            } else if (isNaN(chr3)) {
                enc4 = 64;
            }

            output = output +
            this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
            this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

        }

        return output;
    },

    // public method for decoding
    decode : function (input) {
        var output = "";
        var chr1, chr2, chr3;
        var enc1, enc2, enc3, enc4;
        var i = 0;

        input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

        while (i < input.length) {

            enc1 = this._keyStr.indexOf(input.charAt(i++));
            enc2 = this._keyStr.indexOf(input.charAt(i++));
            enc3 = this._keyStr.indexOf(input.charAt(i++));
            enc4 = this._keyStr.indexOf(input.charAt(i++));

            chr1 = (enc1 << 2) | (enc2 >> 4);
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
            chr3 = ((enc3 & 3) << 6) | enc4;

            output = output + String.fromCharCode(chr1);

            if (enc3 != 64) {
                output = output + String.fromCharCode(chr2);
            }
            if (enc4 != 64) {
                output = output + String.fromCharCode(chr3);
            }

        }

        output = Base64._utf8_decode(output);

        return output;

    },

    // private method for UTF-8 encoding
    _utf8_encode : function (string) {
        string = string.replace(/\r\n/g,"\n");
        var utftext = "";

        for (var n = 0; n < string.length; n++) {

            var c = string.charCodeAt(n);

            if (c < 128) {
                utftext += String.fromCharCode(c);
            }
            else if((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }

        }

        return utftext;
    },

    // private method for UTF-8 decoding
    _utf8_decode : function (utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;

        while ( i < utftext.length ) {

            c = utftext.charCodeAt(i);

            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            }
            else if((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i+1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            }
            else {
                c2 = utftext.charCodeAt(i+1);
                c3 = utftext.charCodeAt(i+2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }

        }

        return string;
    }

}

/**
*
*  URL encode / decode
*  http://www.webtoolkit.info/
*
**/

var Url = {

	// public method for url encoding
	encode : function (string) {
		return escape(this._utf8_encode(string));
	},

	// public method for url decoding
	decode : function (string) {
		return this._utf8_decode(unescape(string));
	},

	// private method for UTF-8 encoding
	_utf8_encode : function (string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";

		for (var n = 0; n < string.length; n++) {

			var c = string.charCodeAt(n);

			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}

		}

		return utftext;
	},

	// private method for UTF-8 decoding
	_utf8_decode : function (utftext) {
		var string = "";
		var i = 0;
		var c = c1 = c2 = 0;

		while ( i < utftext.length ) {

			c = utftext.charCodeAt(i);

			if (c < 128) {
				string += String.fromCharCode(c);
				i++;
			}
			else if((c > 191) && (c < 224)) {
				c2 = utftext.charCodeAt(i+1);
				string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
				i += 2;
			}
			else {
				c2 = utftext.charCodeAt(i+1);
				c3 = utftext.charCodeAt(i+2);
				string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
				i += 3;
			}

		}

		return string;
	}

}


var current_color = '#FFFFFF';


function ChangeCurrentcolor(color)
{
    current_color = color;
    current_color_picker.style.backgroundColor = color;
}

function UpdateCellColor(cell,data)
{
    document.getElementById(cell).style.backgroundColor = current_color;
    data.value = current_color;

}

function FillWithColor()
{
    var temp = current_color;

    open_page('logo_editor.php?fill='+escape(temp));
}

