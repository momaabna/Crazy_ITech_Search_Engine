<?php

/* counter */

//opens countlog.txt to read the number of hits
$datei = fopen("./counter/countlog.txt","r");
$count = (int) fgets($datei,1000);
fclose($datei);
$count=$count + 1 ;


// opens countlog.txt to change new hit number
$datei = fopen("./counter/countlog.txt","w");
fwrite($datei, $count);
fclose($datei);

?>