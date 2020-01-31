<?php
exec("gzip -c photos.tar > photos.tgz");
?>
<script>
window.location= 'photos.tgz';
</script>