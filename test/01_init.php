<?php

include __DIR__ . "/../src/StefanUrban/DateTime.php";

$format = 'Y-m-d H:i:s.u';

// Now
$dt = new \StefanUrban\DateTime();

echo "\n\n" . 'test #1.1: init with now';
echo "\n";
echo '   now: ' . $dt->format('d.m.Y | H:i:s.u');
echo "\n";


// Now + 100ms
usleep(100 * 1000);
$dt = new \StefanUrban\DateTime();

echo "\n\n" . 'test #1.2: init with now (+100ms)';
echo "\n";
echo '   now: ' . $dt->format('d.m.Y | H:i:s.u');
echo "\n";


// Now + 200ms
usleep(200 * 1000);
$dt = new \StefanUrban\DateTime();

echo "\n\n" . 'test #1.3: init with now (+200ms)';
echo "\n";
echo '   now: ' . $dt->format('d.m.Y | H:i:s.u');
echo "\n";


// Now + 300ms
usleep(300 * 1000);
$dt = new \StefanUrban\DateTime();

echo "\n\n" . 'test #1.4: init with now (+300ms)';
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
$time = '2012-08-22 14:21:58.023114';
$dt = \StefanUrban\DateTime::createFromFormat('Y-m-d H:i:s.u', $time);

echo "\n\n" . 'test #3: (init with static function)';
echo "\n";
echo '  soll: ' . $time;
echo "\n";
echo '   ist: ' . $dt->format('Y-m-d H:i:s.u');
echo "\n";



echo "\n\n";
