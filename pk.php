<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8"><title>
      Settings
    </title>
    <style>
      body {
        font-family : Helvetica;
        font-size : 32 ;
        text-align : center;
        color: white;
        text-shadow:
          -1px -1px 0 #000,
          1px -1px 0 #000,
          -1px 1px 0 #000,
          1px 1px 0 #000;
      }
      td {
        border : 2px ridge white;
      }

img,input { vertical-align : middle ;}
    </style>
  </head>
  <body  >
    <div id="spacer" >
</div>
<center>
    <?php

function extract_value($array,$index)
{
$pos = strpos($array[$index],':');
return  substr($array[$index],$pos+1,strlen($array[$index])-$pos-1) ;
}

$cmd="pktriggercord-cli -o capture ";
if ((array_key_exists('iso', $_POST))&&($_POST['iso']!=""))
$cmd .= " -i ".$_POST['iso'] ;
if ((array_key_exists('shutter', $_POST))&&($_POST['shutter']!=""))
$cmd .= " -t ".$_POST['shutter'] ;
if ((array_key_exists('aperture', $_POST))&&($_POST['aperture']!=""))
$cmd .= " -a ".$_POST['aperture'] ;
if ((array_key_exists('quality', $_POST))&&($_POST['quality']!=""))
$cmd .= " -q ".$_POST['quality'] ;
exec($cmd);
exec("pktriggercord-cli",$output);

?>
<form id="form" action="pk.php" method="POST">
	<?php
echo "<input type='hidden' id='iso' name='iso' value='".extract_value($output,2)."' />";
echo "<input type='hidden' id='shutter' name='shutter' value='".extract_value($output,3)."' />";
echo "<input type='hidden' id='aperture'name='aperture' value='".extract_value($output,5)."' />"; 
echo "<input type='hidden' id='quality' name='quality' value='".extract_value($output,12)."' />";
?>
</form> 
<select id="settings" onchange="settings_change()">
<option>Settings</option>
<?php 
 echo "<option value='iso'>".$output[2]."</option>"; 
echo "<option value='shutter'>".$output[3]."</option>";
 echo "<option value='aperture'>".$output[5]."</option>";
 echo "<option value='quality'>".$output[12]."</option>"; 
?>
<option>Back To Homepage</option>

  </select>
 <img style="position:absolute;z-index:-1;" src="capture-0000.jpg" id="bgimage"></img> 
<script> 
    var image = document.getElementById('bgimage');
 var form = document.getElementById('form');
 var select = document.getElementById('settings');
 
var resize = function(){
    var image_width = image.naturalWidth ;
    var image_height = image.naturalHeight ;
    var ratio_image = 3/2;
    var ratio_window = window.innerWidth / window.innerHeight ;
    
    if (ratio_image>ratio_window)
    {
    image.width = window.innerWidth ;
    image.height = Math.floor(window.innerWidth/ratio_image) ;
    image.style.top = Math.floor((window.innerHeight-image.height)/2) +'px';
    image.style.left = '0px' ;
    spacer.style.height = image.style.top ;
    }
    else
    {
    image.width = Math.floor(window.innerHeight*ratio_image) ;
    image.height = window.innerHeight ;
    image.style.left = Math.floor((window.innerWidth-image.width)/2) +'px' ;
    image.style.top = '0px' ;
    spacer.style.height = '0px' ;
    }
    }

var settings_change=function()
{
	if (select.selectedIndex==5)
	window.location='index.php';
	else{
	var v = select.value;
	console.log(v);
	var h = document.getElementById(v);
 h.value = prompt("Enter a value");
 console.log(h.value);
 form.submit();
}
}
    resize();


  </script>
  </body>
 </html>
