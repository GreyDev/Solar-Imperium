/*
 +-------------------------------------------------------------------+
 |                       J S - M E N U   (v1.3)                      |
 |                                                                   |
 | Copyright Gerd Tentler               www.gerd-tentler.de/tools    |
 | Created: Jul. 19, 2002               Last modified: Feb. 11, 2006 |
 +-------------------------------------------------------------------+ 
 | This program may be used and hosted free of charge by anyone for  |
 | personal purpose as long as this copyright notice remains intact. |
 |                                                                   |
 | Obtain permission before selling the code for this program or     |
 | hosting this software on a commercial website or redistributing   |
 | this software over the Internet or in any other medium. In all    |
 | cases copyright must remain intact.                               |
 +-------------------------------------------------------------------+

======================================================================================================
 This script was tested with the following systems and browsers:

 - Windows XP: IE 6, NN 4, NN 7, Opera 7, Firefox 1
 - Mac OS X:   IE 5, Safari 1

 If you use another browser or system, this script may not work for you - sorry.
======================================================================================================
*/

var DOM = document.getElementById;
var IE4 = document.all;
var NN4 = document.layers;
var GKO = (navigator.userAgent.indexOf('Gecko') != -1) ? true : false;

var mObj = new Array();

function MENU(style) {
//----------------------------------------------------------------------------------------------------
// Configuration
//----------------------------------------------------------------------------------------------------

  this.style = style ? style : "top";      // menu style (top or left)
  this.floatMenu = true;                    // floating menu (true or false)*

  this.fadeInSpeed = 20;                    // fade-in speed (0 - 30; 0 = no fading)
  this.fadeOutSpeed = 10;                   // fade-out speed (0 - 30; 0 = no fading)
  this.fadeOutDelay = 10000;                  // fade-out delay (1/1000 seconds)

  this.imgBlank = "images/menu_blank.gif";              // path to blank image
  this.imgArrow = "images/menu_blank.gif";              // path to arrow image
  this.imgArrowWidth = 7;                   // arrow image width (pixels)

  // main menu configuration:

  this.mainTop = 0;                         // top position (pixels)
  this.mainLeft = 0;                        // left position (pixels)
  this.mainBGColor = "#009900";             //   background color OR background image
  this.mainBorderWidth = 2;                // border width (pixels)
  this.mainArrows = false;                   // show sub menu arrows (true or false)
  this.mainOpacity = 100;                   // opacity (0 - 100)**

  this.mainItemWidth = 100;                 // item width (pixels)
  this.mainItemColor = "#669966";           // item color
  this.mainItemHilight = "#99AA99";         // item hilight color
  this.mainItemFont = "Sans-serif";   // font family (CSS-spec)
  this.mainItemFontColor = "yellow";         // font color
  this.mainItemFontSize = 11;               // font size (pixels)
  this.mainItemAlign = "center";            // text align (left / center / right)
  this.mainItemPadding = 2;                 // text padding (pixels)
  this.mainItemSpacer = 2;                 // space between items (pixels)
  this.mainItem3D = 0;                      // 3D border (pixels); NN4: not supported

  // sub menu(s) configuration:

  this.subBGColor = "black";              // background color OR background image
  this.subBorderWidth = 1;                  // border width (pixels)
  this.subArrows = true;                    // show sub menu arrows (true or false)
  this.subOpacity = 90;                     // opacity (0 - 100)**
  this.subOffsetLeft = 5;                  // left offset (pixels)

  this.subItemWidth = 100;                  // item width (pixels)
  this.subItemColor = "#336633";            // item color
  this.subItemHilight = "#669966";          // item hilight color
  this.subItemFont = "Sans-serif";    // font family (CSS-spec)
  this.subItemFontColor = "yellow";        // font color
  this.subItemFontSize = 11;                // font size (pixels)
  this.subItemAlign = "left";               // text align (left / center / right)
  this.subItemPadding = 3;                  // text padding (pixels)
  this.subItemSpacer = 1;                   // space between items (pixels)
  this.subItem3D = 0;                       // 3D border (pixels); NN4: not supported

// *  With Safari 1 (Mac OS X) performance was poor, i.e. floating speed was slow. With IE 5 (Mac OS X)
//    floating didn't work properly.
//
// ** Opacity was successfully tested only on Windows XP with IE 6, NN 7 and Firefox 1; NN 7 showed
//    different results, though. It seems that other browsers and systems do not support this feature,
//    i.e. opacity will always be 100 percent.

//----------------------------------------------------------------------------------------------------
// Functions
//----------------------------------------------------------------------------------------------------

  this.mOver = false;
  this.mNr = this.iv = this.timer = 0;
  this.sections = new Array();
  this.items = new Array();
  this.targetWindow = 0;

  this.entry = function(level, height, text, url, target, onClick) {
    var nr = this.items.length;
    var parent = nr - 1;
    this.items[nr] = new makeItem(level, height, text, url, target, onClick);
    if(parent >= 0) {
      if(level == this.items[parent].level + 1) this.items[nr].parent = parent;
      else if(level == this.items[parent].level) this.items[nr].parent = this.items[parent].parent;
      else if(level < this.items[parent].level) {
        for(var i = parent; i >= 0; i--) {
          if(this.items[i].level == level) {
            this.items[nr].parent = this.items[i].parent;
            break;
          }
        }
      }
    }
  }

  this.getObj = function(id, cont) {
    var obj;
    if(DOM) obj = document.getElementById(id).style;
    else if(IE4) obj = document.all[id].style;
    else if(NN4) obj = cont ? document.layers[cont].document.layers[id] : document.layers[id];
    return obj;
  }

  this.getScrTop = function() {
    var scrTop = 0;
    if(document.body && document.body.scrollTop) scrTop = document.body.scrollTop;
    else if(window.pageYOffset) scrTop = window.pageYOffset;
    return scrTop;
  }

  this.setOpacity = function(nr, opacity) {
    if(!NN4) {
      var m = 'section' + this.mNr + '_' + nr;
      var obj = 0;
      if(DOM) obj = document.getElementById(m);
      else if(IE4) obj = document.all[m];
      if(obj) {
        obj.style.filter = 'alpha(opacity=' + opacity + ')';
        obj.style.mozOpacity = '.1';
        if(obj.filters) obj.filters.alpha.opacity = opacity;
        if(!IE4 && obj.style.setProperty) obj.style.setProperty('-moz-opacity', opacity / 100, '');
      }
    }
  }

  this.fadeIn = function(nr) {
    if(this.sections[nr].active) {
      var maxOp = (this.items[this.sections[nr].nr].level < 2) ? this.mainOpacity : this.subOpacity;
      if(this.fadeInSpeed && this.sections[nr].opacity < maxOp) {
        this.sections[nr].opacity += this.fadeInSpeed;
        if(this.sections[nr].opacity > maxOp) this.sections[nr].opacity = maxOp;
        this.setOpacity(nr, this.sections[nr].opacity);
        if(this.sections[nr].timer) clearTimeout(this.sections[nr].timer);
        this.sections[nr].timer = setTimeout('mObj[' + this.mNr + '].fadeIn(' + nr + ')', 1);
      }
      else {
        this.sections[nr].opacity = maxOp;
        this.setOpacity(nr, maxOp);
      }
    }
  }

  this.fadeOut = function(nr) {
    if(this.fadeOutSpeed && this.sections[nr].opacity > 0) {
      this.sections[nr].opacity -= this.fadeOutSpeed;
      if(this.sections[nr].opacity < 0) this.sections[nr].opacity = 0;
      this.setOpacity(nr, this.sections[nr].opacity);
      if(this.sections[nr].timer) clearTimeout(this.sections[nr].timer);
      this.sections[nr].timer = setTimeout('mObj[' + this.mNr + '].fadeOut(' + nr + ')', 1);
    }
    else {
      var obj = this.getObj('section' + this.mNr + '_' + nr);
      obj.visibility = NN4 ? 'hide' : 'hidden';
      this.sections[nr].opacity = 0;
    }
  }

  this.showMenu = function(nr) {
    var obj = this.getObj('section' + this.mNr + '_' + nr);
    if(!this.sections[nr].active) {
      if(this.floatMenu) this.sections[nr].y = this.getScrTop() + this.sections[nr].topY;
      if(IE4) obj.pixelTop = this.sections[nr].y;
      else obj.top = this.sections[nr].y + (DOM ? 'px' : '');
      obj.visibility = NN4 ? 'show' : 'visible';
      this.sections[nr].active = true;
      this.fadeIn(nr);
    }
  }

  this.hideMenu = function(nr) {
    var obj = this.getObj('section' + this.mNr + '_' + nr);
    if(this.sections[nr].active) {
      this.sections[nr].active = false;
      this.fadeOut(nr);
    }
  }

  this.hilight = function(section, item, color) {
    var obj = this.getObj('item' + this.mNr + '_' + item, 'section' + this.mNr + '_' + section);
    if(NN4) obj.bgColor = color;
    else obj.backgroundColor = color;
    if(color == this.subItemColor || color == this.mainItemColor) this.mOver = false;
    else this.mOver = true;
  }

  this.getMenu = function(item, section) {
    if(this.sections[section].active) {
      for(var i = section+1; i < this.sections.length; i++) {
        if(this.sections[i].nr == item) {
          if(!this.sections[i].active) this.showMenu(i);
        }
        else if(this.sections[i].active) this.hideMenu(i);
      }
    }
  }

  this.hideSubs = function(start) {
    if(!this.mOver) for(var i = start; i < this.sections.length; i++) {
      if(this.sections[i].active) this.hideMenu(i);
    }
    this.timer = 0;
  }

  this.jumpURL = function(item) {
    if(this.items[item].url) {
      if(this.items[item].target) {
        if(this.items[item].target.indexOf('parent.') == -1 && this.items[item].target.indexOf('top.') == -1) {
          if(this.targetWindow && !this.targetWindow.closed) this.targetWindow.location.href = this.items[item].url;
          else this.targetWindow = window.open(this.items[item].url, 'targetWindow');
          this.targetWindow.focus();
        }
        else eval(this.items[item].target + '.location.href = "' + this.items[item].url + '"');
      }
      else document.location.href = this.items[item].url;
    }
  }

  this.checkIt = function() {
    var active = false;
    var i;
    if(this.floatMenu) for(i = 0; i < this.sections.length; i++) {
      if(this.sections[i].active) this.floatIt(i, this.sections[i].topY);
    }
    if(!this.mOver && !this.timer) {
      for(i = 0; i < this.sections.length && !active; i++) {
        if(this.sections[i].active) active = true;
      }
      if(active) {
        if(this.fadeOutDelay) this.timer = setTimeout('mObj[' + this.mNr + '].hideSubs(1)', this.fadeOutDelay);
        else this.hideSubs(1);
      }
    }
  }

  this.floatIt = function(nr, topY) {
    var obj = this.getObj('section' + this.mNr + '_' + nr);
    if(obj.visibility == 'visible' || obj.visibility == 'show') {
      var scrTop = this.getScrTop() + topY;
      var elmTop = IE4 ? obj.pixelTop : parseInt(obj.top);
      if(elmTop != scrTop) this.smoothIt(obj, nr, scrTop);
    }
  }

  this.smoothIt = function(obj, nr, scrTop) {
    if(scrTop != this.sections[nr].y) {
      var percent = .1 * (scrTop - this.sections[nr].y);
      if(percent > 0) percent = Math.ceil(percent);
      else percent = Math.floor(percent);
      this.sections[nr].y += percent;
      if(IE4) obj.pixelTop = this.sections[nr].y;
      else if(NN4 || DOM) obj.top = this.sections[nr].y + (DOM ? 'px' : '');
    }
  }

  this.buildItems = function(parent, section) {
    var arrows, link, img, color, itemColor, itemHilight, itemAlign, left;
    var width, height, border, spacer, itemPadding, item3D, topY, clsItem, j;

    for(var i = cnt = 0; i < this.items.length; i++) {
      if(this.items[i].parent == parent) {
        if(this.items[i].level < 2) {
          border = this.mainBorderWidth;
          color = this.mainBGColor;
          spacer = this.mainItemSpacer;
          arrows = this.mainArrows;
          itemColor = this.mainItemColor;
          itemHilight = this.mainItemHilight;
          itemAlign = this.mainItemAlign;
          itemPadding = this.mainItemPadding;
          item3D = this.mainItem3D;
          clsItem = 'clsMainItem' + this.mNr;
          width = this.mainItemWidth + itemPadding*2;
          if(this.style == 'top') left = border + (width + item3D*2 + spacer) * cnt++;
          else left = border;
        }
        else {
          border = this.subBorderWidth;
          color = this.subBGColor;
          spacer = this.subItemSpacer;
          arrows = this.subArrows;
          itemColor = this.subItemColor;
          itemHilight = this.subItemHilight;
          itemAlign = this.subItemAlign;
          itemPadding = this.subItemPadding;
          item3D = this.subItem3D;
          clsItem = 'clsSubItem' + this.mNr;
          width = this.subItemWidth + itemPadding*2;
          left = border;
        }
        height = this.items[i].height + itemPadding*2;

        if(!topY) topY = border;
        link = 'javascript:mObj[' + this.mNr + '].jumpURL(' + i + ')';
        if(i+1 < this.items.length && this.items[i+1].level > this.items[i].level) img = this.imgArrow;
        else img = '';

        for(j = 0; j < this.sections.length; j++) {
          if(this.sections[j].nr == i+1) {
            this.sections[j].topY = this.sections[section].topY + topY;
            this.sections[j].y = this.sections[j].topY;
          }
        }

        if(IE4 || DOM) document.write('<div id="item' + this.mNr + '_' + i + '" style="position:absolute' +
                                      '; top:' + topY + 'px' +
                                      '; left:' + left + 'px' +
                                      '; width:' + (GKO ? width : width + item3D*2) + 'px' +
                                      '; height:' + (GKO ? height : height + item3D*2) + 'px' +
                                      (itemColor ? '; background-color:' + itemColor : '') +
                                      (item3D ? '; border:' + item3D + 'px outset white' : '') +
                                      '; z-index:1">');
        else if(NN4) document.write('<layer id="item' + this.mNr + '_' + i + '"' +
                                    ' top=' + topY +
                                    ' left=' + left +
                                    ' width=' + (GKO ? width : width + item3D*2) +
                                    ' height=' + (GKO ? height : height + item3D*2) +
                                    (itemColor ? ' bgcolor=' + itemColor : '') +
                                    ' z-index=1>');
        document.write('<table border=0 cellspacing=0 cellpadding=' + itemPadding +
                       ' width=' + width + ' height=' + height + '><tr>' +
                       '<td class="' + clsItem + '" align="' + itemAlign + '">' +
                       this.items[i].text + '</td>' +
                       (img ? '<td width=' + this.imgArrowWidth + ' align=right><img src="' + img + '" width=' + this.imgArrowWidth + '></td>' : '') +
                       '</tr></table>');
        if(IE4 || DOM) document.write('</div>');
        else if(NN4) document.write('</layer>');

        if(IE4 || DOM) document.write('<div style="position:absolute' +
                                      '; top:' + topY + 'px' +
                                      '; left:' + left + 'px' +
                                      '; z-index:2">');
        else if(NN4) document.write('<layer' +
                                    ' top=' + topY +
                                    ' left=' + left +
                                    ' z-index=2>');
        document.write('<a href="' + link + '" ' +
                       'onMouseOver="mObj[' + this.mNr + '].hilight(' + section + ', ' + i + ', \'' + itemHilight + '\'); ' +
                       'mObj[' + this.mNr + '].getMenu(' + (i+1) + ', ' + section + '); ' +
                       'window.status=\'' + this.items[i].url + '\'; return true" ' +
                       'onMouseOut="mObj[' + this.mNr + '].hilight(' + section + ', ' + i + ', \'' + itemColor + '\'); ' +
                       'window.status=\'\'" ' + (this.items[i].onClick ? 'onClick="' + this.items[i].onClick + '" ' : '') +
                       'onFocus="if(this.blur) this.blur()">' +
                       '<img src="' + this.imgBlank + '" border=0 width=' + (width + item3D*2) + ' height=' + (height + item3D*2) + '></a>');
        if(IE4 || DOM) document.write('</div>');
        else if(NN4) document.write('</layer>');

        if(this.items[i].level > 1 || this.style != 'top') topY += height + item3D*2 + spacer;
      }
    }
  }

  this.buildSections = function() {
    document.write('<style> ' +
                   '.clsMainItem' + this.mNr + ' { color:' + this.mainItemFontColor +
                   '; font-family:' + this.mainItemFont +
                   '; font-size:' + this.mainItemFontSize + 'px; } ' +
                   '.clsSubItem' + this.mNr + ' { color:' + this.subItemFontColor +
                   '; font-family:' + this.subItemFont +
                   '; font-size:' + this.subItemFontSize + 'px; } ' +
                   '</style>');

    var width, border, color, itemPadding, item3D, spacer, left, height, level, section, cnt, j;
    var mainHeight = 0;
    var bgImg = '';

    for(var i = 0; i < this.items.length; i++) {
      if(!i || this.items[i].level > this.items[i-1].level) {
        this.sections[this.sections.length] = new makeSection(i, this.items[i].level, this.mainTop);
      }
    }

    for(i = cnt = 0; i < this.sections.length; i++) {
      section = this.sections[i].nr;
      level = this.sections[i].level;
      if(level < 2) {
        border = this.mainBorderWidth;
        color = this.mainBGColor;
        itemPadding = this.mainItemPadding;
        item3D = this.mainItem3D;
        spacer = this.mainItemSpacer;
        width = (this.style == 'top') ? 0 : this.mainItemWidth + border*2 + itemPadding*2 + item3D*2;
        left = this.mainLeft;
      }
      else {
        border = this.subBorderWidth;
        color = this.subBGColor;
        itemPadding = this.subItemPadding;
        item3D = this.subItem3D;
        spacer = this.subItemSpacer;
        width = this.subItemWidth + border*2 + itemPadding*2 + item3D*2;
        if(this.style == 'top') {
          if(level == 2) for(j = cnt = 0; j < section; j++) {
            if(this.items[j].level == 1) cnt++;
          }
          left = this.mainLeft + this.mainBorderWidth + (this.mainItemWidth + this.mainItemPadding*2 + this.mainItem3D*2 + this.mainItemSpacer) * (cnt-1);
          left += (level-2) * (width - this.subOffsetLeft);
        }
        else left = this.mainLeft + this.mainItemWidth - this.subOffsetLeft + ((this.mainBorderWidth+this.mainItemPadding+this.mainItem3D)*2) + (level-2) * (width-this.subOffsetLeft);
      }
      height = 0;

      for(j = section; j < this.items.length; j++) {
        if(this.items[j].parent == this.items[section].parent) {
          if(level < 2 && this.style == 'top') {
            width += this.mainItemWidth + itemPadding*2 + item3D*2 + spacer;
            if(this.items[j].height > height) height = mainHeight = this.items[j].height;
          }
          else height += this.items[j].height + itemPadding*2 + item3D*2 + spacer;
        }
      }
      if(this.style == 'top') {
        if(level < 2) {
          width += border*2 - spacer;
          height += itemPadding*2 + item3D*2 + spacer;
          mainHeight += border + itemPadding*2 + item3D*2;
        }
        else if(level == 2) {
          this.sections[i].topY += mainHeight;
          this.sections[i].y = this.sections[i].topY;
        }
      }
      height += border*2 - spacer;

      if(color.search(/\.(jpg|jpeg|jpe|gif|png)$/i) != -1) {
        bgImg = color;
        color = '';
      }
      else bgImg = this.imgBlank;

      this.sections[i].width = width;
      this.sections[i].height = height;

      if(IE4 || DOM) document.write('<div id="section' + this.mNr + '_' + i + '" style="position:absolute' +
                                    '; top:' + this.sections[i].topY + 'px' +
                                    '; left:' + left + 'px' +
                                    '; width:' + width + 'px' +
                                    '; height:' + height + 'px' +
                                    (color ? '; background-color:' + color : '') +
                                    '; z-index:' + i +
                                    '; visibility:hidden">');
      else if(NN4) document.write('<layer id="section' + this.mNr + '_' + i + '"' +
                                  ' top=' + this.sections[i].topY +
                                  ' left=' + left +
                                  ' width=' + width +
                                  ' height=' + height +
                                  (color ? ' bgcolor=' + color : '') +
                                  ' z-index=' + i +
                                  ' visibility="hide">');

      document.write('<a href="#" onMouseOver="mObj[' + this.mNr + '].mOver=true" onMouseOut="mObj[' + this.mNr + '].mOver=false">' +
                     '<img src="' + bgImg + '" border=0 width=' + this.sections[i].width +
                     ' height=' + this.sections[i].height + '></a>');

      this.buildItems(section-1, i);

      if(IE4 || DOM) document.write('</div>');
      else if(NN4) document.write('</layer>');

      if(this.mainOpacity && level < 2) this.setOpacity(i, this.mainOpacity);
      else if(this.subOpacity && level > 1) this.setOpacity(i, this.subOpacity);
    }
  }

  this.create = function() {
    this.mNr = mObj.length;
    if(mObj[this.mNr] = this) {
      this.buildSections();
      this.showMenu(0);
      if(this.iv) clearInterval(this.iv);
      this.iv = setInterval('mObj[' + this.mNr + '].checkIt()', 1);
    }
    else alert("Could not create menu!");
  }

  //-------------------------------------------------------------------------------------
  // Arguments: position level 1, [position level 2], ... [position level n]
  // Example:   jumpTo(1, 3, 2, 1) ==> this jumps to menu item 1.3.2.1
  // Note:      does not work with NN 4 (who knows why?)
  //
  this.jumpTo = function() {
    var pos, aktPos;
    var item = 0;
    var level = 1;
    if(!arguments) var arguments = this.jumpTo.arguments;
    for(i = 0; i < arguments.length; i++, level++) {
      pos = arguments[i];
      for(aktPos = 0; item < this.items.length && aktPos < pos; item++) {
        if(this.items[item].level == level) aktPos++;
      }
    }
    if(item) {
      item--;
      if(this.items[item].onClick) eval(this.items[item].onClick);
      this.jumpURL(item);
    }
  }
  //-------------------------------------------------------------------------------------
}

function makeItem(level, height, text, url, target, onClick) {
  this.level = level;
  this.height = height;
  this.text = text;
  this.url = url;
  this.target = target;
  this.onClick = onClick;
  this.parent = -1;
}

function makeSection(nr, level, topY) {
  this.nr = nr;
  this.level = level;
  this.topY = topY;
  this.active = false;
  this.y = topY;
  this.width = 0;
  this.height = 0;
  this.timer = 0;
  this.opacity = 0;
}

//----------------------------------------------------------------------------------------------------
