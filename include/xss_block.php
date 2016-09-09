<?php


// Security check against XSS exploits
while(list($key,$value) = each($_POST)) {
   if (strpos($key,"<") !== false) die("Invalid information!");
   if (strpos($key,">") !== false) die("Invalid information!");
   if (strpos($key,"%") !== false) die("Invalid information!");
   if (strpos($key,"'") !== false) die("Invalid information!");
   if (strpos($key,"\"") !== false) die("Invalid information!");

   $tainted = false;
   if (strpos(strtolower($value),"<") !== false) {
       $value = str_replace("<","_",$value);
       $tainted = true;
   }

   if (strpos($value,"&#") !== false) {
       $value = str_replace("&#","_",$value);
       $tainted = true;

   }


   if (strpos($value,"%") !== false) {
       $value = str_replace("%","_",$value);
       $tainted = true;

   }

   if ($tainted) {
       $_POST[$key] = $value;
   }

}

// repeat for GET variables

while(list($key,$value) = each($_GET)) {
   if (strpos($key,"<") !== false) die("Invalid information!");
   if (strpos($key,">") !== false) die("Invalid information!");
   if (strpos($key,"%") !== false) die("Invalid information!");
   if (strpos($key,"'") !== false) die("Invalid information!");
   if (strpos($key,"\"") !== false) die("Invalid information!");

   $tainted = false;
   if (strpos(strtolower($value),"<script") !== false) {
		die("Invalid information");
   }

   if (strpos(strtolower($value),"onload") !== false) die("Invalid information");
   if (strpos(strtolower($value),"onmouseover") !== false) die("Invalid information");
   if (strpos(strtolower($value),"onchange") !== false) die("Invalid information");
   if (strpos(strtolower($value),"onclick") !== false) die("Invalid information");
   if (strpos(strtolower($value),"ondblclick") !== false) die("Invalid information");
   if (strpos(strtolower($value),"onabort") !== false) die("Invalid information");
   if (strpos(strtolower($value),"ondragdrop") !== false) die("Invalid information");
   if (strpos(strtolower($value),"onerror") !== false) die("Invalid information");
   if (strpos(strtolower($value),"onfocus") !== false) die("Invalid information");
   if (strpos(strtolower($value),"onkeydown") !== false) die("Invalid information");
   if (strpos(strtolower($value),"onkeypress") !== false) die("Invalid information");
   if (strpos(strtolower($value),"onmouseout") !== false) die("Invalid information");
   if (strpos(strtolower($value),"onreset") !== false) die("Invalid information");
   if (strpos(strtolower($value),"onresize") !== false) die("Invalid information");
   if (strpos(strtolower($value),"onselect") !== false) die("Invalid information");
   if (strpos(strtolower($value),"onsubmit") !== false) die("Invalid information");
   if (strpos(strtolower($value),"onunload") !== false) die("Invalid information");



   if (strpos($value,"&#") !== false) {
       $value = str_replace("&#","_",$value);
       $tainted = true;

   }


   if (strpos($value,"%") !== false) {
       $value = str_replace("%","_",$value);
       $tainted = true;

   }

   if ($tainted) {
       $_GET[$key] = $value;
   }

}

?>
