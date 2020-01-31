<?php
		$period = $_GET['period'];
   exec ("rm -f photos.tar");
	exec ("rm -f compressed/*");
		exec("touch timelapseon.txt");
    exec ("./TL.sh ".$period." > /dev/null &");
?>
<script>
window.location="index.php";
</script>
