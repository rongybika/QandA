<?php

$myfile = fopen(__DIR__ . "/testfile.txt", "a");

$txt = date('Y-m-d H:i:s') . "\n";

echo $txt;

fwrite($myfile, $txt);

fclose($myfile);