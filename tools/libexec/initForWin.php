<?php
# Generate site settings for batch scripts dynamically.


$sep = DIRECTORY_SEPARATOR;
$rootDirectory = __DIR__ . $sep . ".." . $sep . "..";
require_once $rootDirectory . $sep . "setting.php";

echo "@echo off" . PHP_EOL;
echo "rem Dynamically-generated site settings. Don't edit it" . PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo "set root=" . $rootDirectory . PHP_EOL;
echo "set content=" . $rootDirectory . $sep . SITE_CONTENT . PHP_EOL;
echo "set theme=" . $rootDirectory . $sep . SITE_THEME . PHP_EOL;
echo "set asset=" . $rootDirectory . $sep . SITE_ASSET . PHP_EOL;
echo "set src=" . $rootDirectory . $sep . SITE_LIBRARY . PHP_EOL;
echo "set www=" . $rootDirectory . $sep . SITE_APPLICATION . PHP_EOL;
echo "set static=" . $rootDirectory . $sep . SITE_STATIC . PHP_EOL;
echo "set public=" . $rootDirectory . $sep . SITE_PUBLIC . PHP_EOL;