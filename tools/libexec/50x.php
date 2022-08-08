<?php
# 50x.html generator.


$sep = DIRECTORY_SEPARATOR;
$rootDirectory = __DIR__ . $sep . ".." . $sep . "..";

# Load third-party package(s).
require_once $rootDirectory . $sep . "vendor" . $sep . "autoload.php";
# Load the internal library.
require_once $rootDirectory . $sep . "src" . $sep . "autoload.php";
# Load site setting(s).
require_once $rootDirectory . $sep . "setting.php";

$post = errorPage(
    500,
    "Internal Server Error",
    "The page you are looking for is currently unavailable.<br/>"
        . "Please try again later.");

loadPost();
