<?php

include __DIR__ . "/../src/StefanUrban/DateTime.php";
include __DIR__ . "/../src/StefanUrban/DateInterval.php";


$time1 = new \StefanUrban\DateTime();

usleep(512 * 1000);

$time2 = new \StefanUrban\DateTime();


$diff = $time1->diff($time2);

echo $diff->format('%H:%I:%S:%U');
echo "\n";