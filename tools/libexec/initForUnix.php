<?php
# Generate site settings for shell scripts dynamically.


$sep = DIRECTORY_SEPARATOR;
$rootDirectory = __DIR__ . $sep . ".." . $sep . "..";
require_once $rootDirectory . $sep . "setting.php";

echo "# Dynamically-generated site settings. Don't edit it" . PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo "root=" . $rootDirectory . PHP_EOL;
echo "content=" . $rootDirectory . $sep . SITE_CONTENT . PHP_EOL;
echo "theme=" . $rootDirectory . $sep . SITE_THEME . PHP_EOL;
echo "asset=" . $rootDirectory . $sep . SITE_ASSET . PHP_EOL;
echo "src=" . $rootDirectory . $sep . SITE_LIBRARY . PHP_EOL;
echo "www=" . $rootDirectory . $sep . SITE_APPLICATION . PHP_EOL;
echo "static=" . $rootDirectory . $sep . SITE_STATIC . PHP_EOL;
echo "public=" . $rootDirectory . $sep . SITE_PUBLIC . PHP_EOL;
