<?php
$file = fopen("./saveExample/test.txt","w");
fwrite($file,"Hello World. Testing!");
fclose($file);
?>