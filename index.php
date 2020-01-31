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
$timelapseon = file_exists("timelapseon.txt");
if (!$timelapseon)
	exec("pktriggercord-cli -o capture ");
?>

<select id="settings" onchange="option_change()">
<option value='index.php'>Choose an option</option>

<option value='index.php'>Update View</option>
<option value='pk.php'
<?php
if ($timelapseon)
	echo " disabled ";
?>
>Camera Settings</option>
<option>      
	<?php
	if ($timelapseon)
		echo "Stop Timelapse";
	else
		echo "Launch Timelapse";
	?>
</option>
<option value='photos.php?dir=compressed'>View Pictures</option>
<option value='zip.php'>Download Pictures</option>
<option value='countdown.php'>Shutdown</option>

  </select>
 <img style="position:absolute;z-index:-1;" src="capture-0000.jpg" id="bgimage"></img> 
<script> 
    var image = document.getElementById('bgimage');
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

var option_change= function()
{
	if (select.selectedIndex==3)
	{
		<?php
		if ($timelapseon)
		{
			echo "if (confirm('Are you sure?'))";
			echo "window.location = 'killTL.php';";
			echo "else window.location = 'index.php';";
		}
		else
		{
			echo "if (confirm('Are you sure?')) {";
			echo "var period = prompt('Enter a period',900);";
			echo "window.location = 'startTL.php?period='+period;";
			echo "} else window.location = 'index.php';";
		}
		?>
	}
 else
	window.location=select.value;
	}
    resize();


  </script>
  </body>
 </html>
