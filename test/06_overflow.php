<?php

include __DIR__ . "/../src/StefanUrban/DateTime.php";
include __DIR__ . "/../src/StefanUrban/DateInterval.php";

$time = "2012-01-01 12:15:11.95";


$time = new StefanUrban\DateTime($time);
$interval = new StefanUrban\DateInterval(0.10);

echo $time->format('d.m.Y | H:i:s.u') . ' + 0.1 s =';
echo "\n";

$time->add($interval);

$out = $time->format('d.m.Y | H:i:s.u');
echo $out . ' - ' . ($out == "01.01.2012 | 12:15:12.050000" ? 'ok' : 'not ok');
echo "\n";

echo '-----------------------------------';
echo "\n";


$time = "2012-01-01 12:15:11.05";

$time = new StefanUrban\DateTime($time);
$interval = new StefanUrban\DateInterval(1.10);

echo $time->format('d.m.Y | H:i:s.u') . ' - 1.1 s =';
echo "\n";

$time->sub($interval);

$out = $time->format('d.m.Y | H:i:s.u');
echo $out . ' - ' . ($out == "01.01.2012 | 12:15:09.950000" ? 'ok' : 'not ok');
echo "\n";
