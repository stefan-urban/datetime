<?php

include __DIR__ . "/../src/StefanUrban/DateTime.php";
include __DIR__ . "/../src/StefanUrban/DateInterval.php";


$diff = new StefanUrban\DateInterval(2 * 60 * 60);


$now = new StefanUrban\DateTime();
echo $now->format('Y-m-d H:i:s') . "\n";

$now->add($diff);
echo $now->format('Y-m-d H:i:s') . "\n";
