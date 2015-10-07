<?php

include __DIR__ . "/../src/StefanUrban/DateTime.php";
include __DIR__ . "/../src/StefanUrban/DateInterval.php";

$time = "2012-01-01 12:15:11.0111";


$pastTime = new StefanUrban\DateTime($time);

$now = new StefanUrban\DateTime();

$diff1000plus = $now->diff($pastTime);
$diff0 = $now->diff($now);


echo ' tage seit 01.01.2012: ' . $diff1000plus->days;
echo "\n";
echo ' 0 tage: ' . $diff0->days;
echo "\n";
