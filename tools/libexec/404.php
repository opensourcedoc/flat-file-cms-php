<?php
# 404.html generator.


$sep = DIRECTORY_SEPARATOR;
$rootDirectory = __DIR__ . $sep . ".." . $sep . "..";

# Load third-party package(s).
require_once $rootDirectory . $sep . "vendor" . $sep . "autoload.php";
# Load the internal library.
require_once $rootDirectory . $sep . "src" . $sep . "autoload.php";
# Load site setting(s).
require_once $rootDirectory . $sep . "setting.php";

$post = errorPage(
    404,
    "Page Not Found",
    "This page is not on the site. "
        . "Visit <a href='/'>home</a> instead.");

loadPost();
