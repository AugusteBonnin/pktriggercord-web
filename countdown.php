<!DOCTYPE HTML>
<html>
<head>
                <meta charset="utf-8">
                <title>Final Countdown</title>
        </head>
        <body>
<center >
<table width ="100%" height="100%" id="table">
<tr><td style="font-size: 32px;font-family :Helvetica ;text-align : center ; vertical-align :middle;">
<div id="div0" ></div>
</td>
</tr>
</table>
<script>
var time = 10 ,totalTime = 10;
var div = document.getElementById('div0') ;
document.getElementById('table').style.height =  window.innerHeight+'px' ;
function updateCountDown()
{
div.style['font-size'] = (window.innerHeight/20)+'px' ;
div.style.width = window.innerWidth+'px' ;
div.style.height = window.innerHeight+'px' ;

div.innerHTML = time +" s" ;
if (time)
setTimeout('updateCountDown()',1000);
else
div.innerHTML = "Vous pouvez maintenant d&eacute;brancher votre Raspberry Pi en toute s&eacute;curit&eacute;.";
time-- ;
}

updateCountDown();
</script>
<?php
echo system("sudo poweroff");
?>
</body>
</html>
