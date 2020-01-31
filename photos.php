<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      Settings
    </title>
    <style>
      body {
        font-family : Helvetica;
        font-size : 32 ;
        text-align : center;
        }
      td {
        border : 2px ridge grey;
      }
    </style>
  </head>
  <body  >
  <script>

function histogram(img,canvasName)
        {
        //var img = document.getElementById('image'+num) ;
        var canvas = document.getElementById(canvasName) ;
        var ctx = canvas.getContext('2d');
        canvas.width = img.width ;
        canvas.height = img.height ;
        ctx.drawImage(img,0,0);
        var data = ctx.getImageData(0,0,img.width,img.height).data ;

        var histo = new Array(256);
        for (var i = 0 ; i < 256 ; i++)
                histo[i]=0 ;

        for (var i = 0 ; i < data.length ; i++ )
            histo[Math.floor((data[i++]+data[i++]+data[i++])/3)]++ ;

        var max = 0 ;
        for (var i = 0 ; i < 256 ; i++)
                if (histo[i]>max)
                        max = histo[i] ;

        canvas.width = 256 ;
        canvas.height = 128 ;
        ctx.clearRect(0,0,canvas.width,canvas.height);
        ctx.strokeStyle="#FFF";
        ctx.beginPath();
        ctx.moveTo(0,canvas.height);
        for (var i = 0 ; i < canvas.width ; i++)
                {
                //ctx.fillRect(i,0,i+1,canvas.height-(Math.floor(canvas.height*histo[i]/max)));

                ctx.lineTo(i,canvas.height-(Math.floor(canvas.height*histo[i]/max)));
                }

        ctx.lineTo(255,canvas.height);
        ctx.fill();

        }

</script>
  <font color="#00F">
  <table>
      <?php


$myDirectory = opendir($_GET['dir']);

// get each entry
while($entryName = readdir($myDirectory)) {
        $dirArray[] = $entryName;
}

// close directory
closedir($myDirectory);

sort($dirArray);

$indexCount	= count($dirArray);

for($index=0; $index < $indexCount; $index++) {
        if (substr($dirArray[$index], 0, 1) != "."){ // don't list hidden files
                $filename = '/var/www/'.$_GET['dir'].'/'.$dirArray[$index] ;
                print("<TR onclick='window.location=\"".$_GET['dir']."/".$dirArray[$index]."\";' ><TD>");
                print("<img id='image$index' src='thumb.php?file=".$_GET['dir']."/".$dirArray[$index]."' onload='histogram(this,\"canvas$index\")' /></td>");
                print("<td><canvas id='canvas$index' style='border:1px solid black' ></canvas></td>");
                print("<td>$dirArray[$index]</td><td>");
                print(filesize($filename));
                print(" octets</td>");
                print("<td>");
                print(date ("Y-m-d H:i:s", filemtime($filename)));
                print("</td></tr>");

                }
            }

print ("<TR><TD><a id='end'>".($indexCount-2)." files</a></TD></TR>");

?>
</table>
</font>
   </body>
</html>
