<?php

include __DIR__ . "/../src/StefanUrban/DateTime.php";

$format = 'Y-m-d H:i:s.u';

// Now
$dt = new \StefanUrban\DateTime();

echo "\n\n" . 'test #1: init with now';
echo "\n";
echo '   now: ' . $dt->format('d.m.Y | H:i:s.u');
echo "\n";


// Specific point in time
$time = '2012-08-22 14:21:58.11';
$dt = new \StefanUrban\DateTime($time);

echo "\n\n" . 'test #2: init with constructor';
echo "\n";
echo '  soll: ' . $time;
echo "\n";
echo '   ist: ' . $dt->format('Y-m-d H:i:s.u');
echo "\n";



// Specific point in time from static constructor
$time = '2012-08-22 14:21:58.222114';
$dt = \StefanUrban\DateTime::createFromFormat('Y-m-d H:i:s.u', $time);

echo "\n\n" . 'test #3: (init with static function)';
echo "\n";
echo '  soll: ' . $time;
echo "\n";
echo '   ist: ' . $dt->format('Y-m-d H:i:s.u');
echo "\n";



echo "\n\n";
