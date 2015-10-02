<?php

include __DIR__ . "/../src/StefanUrban/DateTime.php";
include __DIR__ . "/../src/StefanUrban/DateInterval.php";

$time = "2012-01-01 12:15:11.0111";


$now = new StefanUrban\DateTime($time);

$timestamp = $now->getTimestamp();

$now2 = new StefanUrban\DateTime();
$now2->setTimestamp($timestamp);


echo ' soll: ' . $now->format('Y-m-d H:i:s.u');
echo "\n";
echo ' soll: ' . $now2->format('Y-m-d H:i:s.u');
echo "\n";