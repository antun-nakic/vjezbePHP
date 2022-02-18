<?php

//set up function
$rijec4="";
$rjesenje=0;
$rijec="    otorino       laringo       logija   ";
$rijecica1 = "otokar";
$rijecica2 = "otorino";
$rijec1 = strlen($rijec);
echo "$rijec1\n";
$rijec2 = strrev($rijec);
echo "$rijec2\n";
$spejsova=substr_count($rijec,"  ");
do  {
    $rijec = str_replace("  "," ",$rijec);
    $spejsova=substr_count($rijec,"  ");
} while ($spejsova > 0);
$rjesenje = substr_count(trim($rijec)," ")+1;
echo "rijec ".$rijec." ima ".$rjesenje. " rijeci";


?>